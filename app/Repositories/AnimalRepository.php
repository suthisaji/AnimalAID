<?php
namespace App\Repositories;
use App\Animal;
use App\Adoption;
use App\User;
use App\Hospital;
use App\Admin;
use File;
use DB;
  class AnimalRepository implements AnimalRepositoryInterface{

    function addAnimal($admin_id,$animal_name,$animal_type,$animal_picture,$animal_color,$animal_gender,$animal_age,$symptomCase,$statusDonation,$doType_id){ // รับเป็น array
        $data = array(
            'admin_id'=>$admin_id,
            'animal_name'=>$animal_name,
            'animal_type'=>$animal_type,
            'animal_picture'=>$animal_picture,
            'animal_color'=>$animal_color,
            'animal_gender'=>$animal_gender,
            'animal_age'=>$animal_age,
            'symptomCase'=>$symptomCase,
            'statusDonation'=>$statusDonation,
            'doType_id'=>$doType_id

            //'student_password'=>Hash::make(str_random(32))
        );
        try{
            $result = Animal::create($data);
            return true;
        }catch(Exception $e){
            return false;
        }
    }
    function getAllAnimal(){
      return Animal::orderBy('created_at')->get();
  }



    function animal(){
       $animals = $this->AnimalRepository->getAllAnimal();
       $data = array(
           'animals'=>$animals
       );
       return view('animal',$data);
   }

   function findById($id){
      return Animal::where('animal_id',$id)->first();
  }
   function updateAnimal($animal_id,$admin_id,$animal_name,$animal_type,$animal_picture,$animal_color,$animal_gender,$animal_age,$symptomCase,$statusDonation,$doType_id){

       $data = array(//ช่องนี้ = ตัวแปรที่ใส่มาใน parameter

           'admin_id'=>$admin_id,
           'animal_name'=>$animal_name,
           'animal_picture'=>$animal_picture,
           'animal_color'=>$animal_color,
           'animal_gender'=>$animal_gender,
           'animal_age'=>$animal_age,
           'symptomCase'=>$symptomCase,
           'statusDonation'=>$statusDonation,
           'doType_id'=>$doType_id,
           'animal_type'=>$animal_type
       );
       $result = Animal::where('animal_id',$animal_id)->update($data);
       if($result > 0){
           return true;
       }else{
           return false;
       }
   }
   function updateAnimal1($animal_id,$admin_id,$animal_name,$animal_type,$animal_color,$animal_gender,$animal_age,$symptomCase,$statusDonation,$doType_id){

       $data = array(//ช่องนี้ = ตัวแปรที่ใส่มาใน parameter

           'admin_id'=>$admin_id,
           'animal_name'=>$animal_name,
           'animal_type'=>$animal_type,
           'animal_color'=>$animal_color,
           'animal_gender'=>$animal_gender,
           'animal_age'=>$animal_age,
           'symptomCase'=>$symptomCase,
           'statusDonation'=>$statusDonation,
           'doType_id'=>$doType_id

       );
       $result = Animal::where('animal_id',$animal_id)->update($data);
       if($result > 0){
           return true;
       }else{
           return false;
       }
   }
   function updateAnimalClose($animal_id,$statusDonation){

       $data = array(//ช่องนี้ = ตัวแปรที่ใส่มาใน parameter
   'statusDonation'=>$statusDonation
        );
       $result = Animal::where('animal_id',$animal_id)->update($data);
       if($result > 0){
           return true;
       }else{
           return false;
       }
   }
   function updateAdoption($adoption_id,$user_id,$address,$status,$date_time,$animal_id){
      $data = array(
                'adoption_id'=>$adoption_id  ,
                  'address'=>$address,
                  'status'=>$status,
                  'date_time'=>$date_time,
                  'user_id'=>$user_id,
                  'animal_id'  =>  $animal_id
      );
      $result = Adoption::where('adoption_id',$adoption_id)->update($data);
      if($result > 0){
          return true;
      }else{
          return false;
      }
   }

   function deleteAnimal($id){
     $animal = Animal::where('animal_id',$id)->first();
    File::delete('images/'.$animal->animal_picture);
     $result = Animal::where('animal_id',$id)->delete();
      $result2 = Adoption::where('animal_id',$id)->delete();
       if($result>=0 && $result2>=0){
         return true;
       }else{
         return false;
       }
   }
  function getAllMoney(){
     $result = Animal::where('doType_id','1')->get();
     return $result;
  }

  function getAllBlood(){
     $result = Animal::where('doType_id','2')->get();
     return $result;
  }
  function getAllAdoption(){
    $result = Animal::where('doType_id','3')->get();
    return $result;
  }

  function getAllAdoptionTable(){

      return Adoption::orderBy('created_at')->get();
  }
 function getAllRecipient(){
   return Adoption::where('status','Recipient')->get();
 }
 function getAllAdminChecked(){
      return Adoption::where('status','Wait')->get();
 }
function getAllAdoptionDone(){
  return Adoption::where('status','Done')->get();
}

function getAllAdmin(){
   return Admin::orderBy('created_at')->get();
}

function addAdoption($animal_id,$user_id,$address,$status,$date_time){//$animal_id
      $data = array(

          'address'=>$address,
          'status'=>$status,
          'date_time'=>$date_time,
          'user_id'=>$user_id,
          'animal_id'  =>  $animal_id


      );
      try{
          $result = Adoption::create($data);
          return true;
      }catch(Exception $e){
          return false;
      }

      }

      /*function count(){
        return Animal::where('doType_id','3')->count();
      }*/
      function countRecipient(){ //มีผู้ประสงทั้งหมด
       return Adoption::where('status','Recipient')->count();
      }
      function countDone(){ //มีรับแล้วทั้้งหมด
       return Adoption::where('status','Done')->count();
      }
      function countWait(){ //มีรับแล้วทั้้งหมด
       return Adoption::where('status','Wait')->count();
      }
      function countAnimalEachAdmin($admin){
       return Animal::where('admin_id',$admin)->count();
      }


    //  function countRecipientEachAdmin($admin){
    //    return    DB::table('adoptions')
    //    ->join('animals', 'adoptions.animal_id', '=', 'animals.animal_id')->where('adoptions.status', '=','Recipient','AND','adoptions.user_id','=',10 )
    //    ->count();
    //  }


     function countRecipientEachAdmin($admin){
      return    DB::table('adoptions')
      ->join('animals', 'adoptions.animal_id', '=', 'animals.animal_id')
      ->where('animals.admin_id','=',$admin)
      ->where('adoptions.status', '=','Recipient')
    ->count();
    }

  /*  function countDoneEachAdmin($admin){
      return    DB::table('adoptions')
        ->join('animals', 'adoptions.animal_id', '=', 'animals.animal_id')->where('adoptions.user_id','=',$admin)
        ->where('adoptions.status', '=','Done')
      ->count();
    }*/
    function countWaitEachAdmin($admin){
      return    DB::table('adoptions')
      ->join('animals', 'adoptions.animal_id', '=', 'animals.animal_id')
      ->where('animals.admin_id','=',$admin)
      ->where('adoptions.status', '=','Wait')
    ->count();
    }

 function countDoneEachAdmin($admin){
   return    DB::table('adoptions')
     ->join('animals', 'adoptions.animal_id', '=', 'animals.animal_id')
     ->where('animals.admin_id','=',$admin)
     ->where('adoptions.status', '=','Done')
   ->count();
 }

 function countAdoptionEachAdmin($admin){
   return    DB::table('animals')
     ->where('doType_id','=',3)
     ->where('admin_id','=',$admin)
   ->count();
 }

function countEverAdoption($userId){
  return DB::table('adoptions')
  ->where('user_id','=',$userId)
  ->where('status', '=','Done')
  ->count();
}




//function showAdoptionNoRecip(){
//  return $adopNoRecip = $this->AnimalRepository->getAllAdoption()->join_Adoption()::where('status','')
//}
  function getAnimalNotInAdoption(){
    return Adoption::all();

  }
  function deleteAdoptionTable($id){
  $result = Adoption::where('animal_id',$id)->delete();
        if($result>0){
          return true;
        }else{
          return false;
        }

  }
  function getAllHospital(){
      return Hospital::orderBy('created_at')->get();
  }










  }
