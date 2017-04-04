<?php
namespace App\Repositories;
use App\Animal;
  class AnimalRepository implements AnimalRepositoryInterface{

    function addAnimal($animal_name,$animal_type,$animal_picture,$animal_color,$animal_gender,$animal_age,$symptomCase,$statusDonation,$doType_id){ // รับเป็น array
        $data = array(

            'animal_name'=>$animal_name,
            'animal_picture'=>$animal_picture,
            'animal_color'=>$animal_color,
            'animal_gender'=>$animal_gender,
            'animal_age'=>$animal_age,
            'symptomCase'=>$symptomCase,
            'statusDonation'=>$statusDonation,
            'doType_id'=>$doType_id,
            'animal_type'=>$animal_type
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
   function updateAnimal($animal_id,$animal_name,$animal_type,$animal_picture,$animal_color,$animal_gender,$animal_age,$symptomCase,$statusDonation,$doType_id){
       $data = array(//ช่องนี้ = ตัวแปรที่ใส่มาใน parameter
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

   function deleteAnimal($id){
     $result = Animal::where('animal_id',$id)->delete();
       if($result>0){
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



  }
