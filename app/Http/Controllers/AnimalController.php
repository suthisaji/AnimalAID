<?php

namespace App\Http\Controllers;

use Request;
use Illuminate\Support\Facades\Input;
use App\Animal;
use App\Adoption;
use App\User;
use App\Admin;
use Auth;
use App\Repositories\AnimalRepositoryInterface;
use App\Repositories\DonationTypeRepositoryInterface;
use App\Repositories\NewsAniRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use DB;
use DateTime;


class AnimalController extends Controller
{
    protected $AnimalRepository;
    protected $DonationTypeRepository;
    protected $NewsAniRepository;
    protected $UserRepository;
    function __construct(AnimalRepositoryInterface $AnimalRepository,DonationTypeRepositoryInterface $DonationTypeRepository,NewsAniRepositoryInterface $NewsAniRepository ,UserRepositoryInterface $UserRepository){
        $this->AnimalRepository = $AnimalRepository;
        $this->DonationTypeRepository = $DonationTypeRepository;
        $this->NewsAniRepository = $NewsAniRepository;
          $this->UserRepository = $UserRepository;
    }
//เรียกใช้  repo ที่สร้าง
    function animal(){
        $animals = $this->AnimalRepository->getAllAnimal();
        $donationType = $this->DonationTypeRepository->getAllDonationType();
          $newsAnis = $this->NewsAniRepository->getAllNewsAni();
          $hospitals =$this->AnimalRepository->getAllHospital();
          $admins = $this->AnimalRepository ->getAllAdmin();
          $admin = Auth::user()->id;
        $countRecipientEachAdmin = $this->AnimalRepository->countRecipientEachAdmin($admin);



        //$donationType_name = $this->DonationTypeRepository->findTypeById($type_id); //ไมไ่ด้ 55555 คิดแปป ****************************
        $data = array(
            'animals'=>$animals  , //'animalsคีย์ที่จะส่งไปให้ view ใ้ช้'=>$animals
            'donationType'=>$donationType,
              'newsAnis'=>$newsAnis,
              'hospitals'=>$hospitals,
              'adminId' =>Auth::user()->id,
              'admins' =>$admins,
              'all_users'=>$this->UserRepository->getAllUser(),
              'countRecipientEachAdmin'=>$countRecipientEachAdmin,
              'admin'=>true

        );
        //return view('animal',$data); มึงจะให้มันไปหน้าไหน
        return view('animal',$data);
    }
/*    function animalAll(){
        $animals = $this->AnimalRepository->getAllAnimal();
          $donationType = $this->DonationTypeRepository->getAllDonationType();
            $newsAnis = $this->NewsAniRepository->getAllNewsAni();
            $users = $this->UserRepository->getAllUser();
            $position =  Auth::user()->position;
        $data = array(
            'animals'=>$animals,   //'animalsคีย์ที่จะส่งไปให้ view ใ้ช้'=>$animals
            'donationType'=>$donationType,
              'newsAnis'=>$newsAnis,
              'users'=>$users,
              'position'=>$position

        );

        return view('all',$data);
    }*/
    function animalAll(){
      if(Auth::guest()){
        $animals = $this->AnimalRepository->getAllAnimal();
          $donationType = $this->DonationTypeRepository->getAllDonationType();
            $newsAnis = $this->NewsAniRepository->getAllNewsAni();
            $users = $this->UserRepository->getAllUser();
              $hospitals =$this->AnimalRepository->getAllHospital();
                $admins = $this->AnimalRepository ->getAllAdmin();
            $data = array(
                'animals'=>$animals,   //'animalsคีย์ที่จะส่งไปให้ view ใ้ช้'=>$animals
                'donationType'=>$donationType,
                  'newsAnis'=>$newsAnis,
                  'users'=>$users,
                    'hospitals'=>$hospitals,
                    'admins' =>$admins


            );
      }else{
        $animals = $this->AnimalRepository->getAllAnimal();
          $donationType = $this->DonationTypeRepository->getAllDonationType();
            $newsAnis = $this->NewsAniRepository->getAllNewsAni();
            $users = $this->UserRepository->getAllUser();
            $position =  Auth::user()->position;
              $hospitals =$this->AnimalRepository->getAllHospital();
              $admins = $this->AnimalRepository ->getAllAdmin();
        $data = array(
            'animals'=>$animals,   //'animalsคีย์ที่จะส่งไปให้ view ใ้ช้'=>$animals
            'donationType'=>$donationType,
              'newsAnis'=>$newsAnis,
              'users'=>$users,
              'position'=>$position,
                'hospitals'=>$hospitals,
                'admins' =>$admins

        );

      }
          return view('all',$data);

    }

    function animalMoney(){
      if(Auth::guest()){
        $animals = $this->AnimalRepository->getAllAnimal();
        $animalsMoneys = $this->AnimalRepository->getAllMoney();
          $newsAnis = $this->NewsAniRepository->getAllNewsAni();
            $hospitals =$this->AnimalRepository->getAllHospital();
              $admins = $this->AnimalRepository ->getAllAdmin();
          $data = array(
              'animals'=>$animals ,
              'animalsMoneys'=>$animalsMoneys,
            'newsAnis'=>$newsAnis,
            'hospitals'=>$hospitals,
              'admins' =>$admins

    );
      }else {
        $animals = $this->AnimalRepository->getAllAnimal();
        $animalsMoneys = $this->AnimalRepository->getAllMoney();
          $newsAnis = $this->NewsAniRepository->getAllNewsAni();
            $hospitals =$this->AnimalRepository->getAllHospital();
              $admins = $this->AnimalRepository ->getAllAdmin();
          $position =  Auth::user()->position;
        $data = array(
            'animals'=>$animals ,
            'animalsMoneys'=>$animalsMoneys,
          'newsAnis'=>$newsAnis,
          'position'=>$position,
          'hospitals'=>$hospitals,
            'admins' =>$admins

  );

      }

       return view('allMoney',$data);
    }

    function animalBlood(){
        if(Auth::guest()){
          $animals = $this->AnimalRepository->getAllAnimal();
          $animalsMoneys = $this->AnimalRepository->getAllMoney();
          $animalsBloods= $this->AnimalRepository->getAllBlood();
          $newsAnis = $this->NewsAniRepository->getAllNewsAni();
            $hospitals =$this->AnimalRepository->getAllHospital();
                    $admins = $this->AnimalRepository ->getAllAdmin();
           $data = array(
                'animals'=>$animals ,
                'animalsMoneys'=>$animalsMoneys,
                'animalsBloods'=>$animalsBloods,
                  'newsAnis'=>$newsAnis,
                  'hospitals'=>$hospitals,
                  'admins' =>$admins

            );
        }else{
        $animals = $this->AnimalRepository->getAllAnimal();
        $animalsMoneys = $this->AnimalRepository->getAllMoney();
        $animalsBloods= $this->AnimalRepository->getAllBlood();
        $newsAnis = $this->NewsAniRepository->getAllNewsAni();
        $position =  Auth::user()->position;
          $hospitals =$this->AnimalRepository->getAllHospital();
                  $admins = $this->AnimalRepository ->getAllAdmin();
        $data = array(
            'animals'=>$animals ,
            'animalsMoneys'=>$animalsMoneys,
            'animalsBloods'=>$animalsBloods,
              'newsAnis'=>$newsAnis,
              'position'=>$position,
              'hospitals'=>$hospitals,
              'admins' =>$admins

        );
}
       return view('allBlood',$data);
    }


    function animalAdoption(){
        if(Auth::guest()){
            $animalsAdoptions= $this->AnimalRepository->getAllAdoption();
          $newsAnis = $this->NewsAniRepository->getAllNewsAni();
          $animals = $this->AnimalRepository->getAllAnimal();
            $hospitals =$this->AnimalRepository->getAllHospital();
                $admins = $this->AnimalRepository ->getAllAdmin();
          $data = array(
            'animalsAdoptions'=>$animalsAdoptions,
            'newsAnis'=>$newsAnis,
              'animals'=>$animals,
              'hospitals'=>$hospitals,
                'admins' =>$admins
          );
        }
          else{
          $animalsAdoptions= $this->AnimalRepository->getAllAdoption();
          $newsAnis = $this->NewsAniRepository->getAllNewsAni();
          $position =  Auth::user()->position;
          $animals = $this->AnimalRepository->getAllAnimal();
            $hospitals =$this->AnimalRepository->getAllHospital();
                $admins = $this->AnimalRepository ->getAllAdmin();


              $data = array(
                'animalsAdoptions'=>$animalsAdoptions,
                  'newsAnis'=>$newsAnis,
                  'position'=>$position,
                  'animals'=>$animals,
                  'hospitals'=>$hospitals,
                    'admins' =>$admins

    );
      }
   return view('allAdoption',$data);
    }


    function addAnimal(){
      if(Request::isMethod('get')){
        $donationType = $this->DonationTypeRepository->getAllDonationType();
        $data = array(
          'donationType'=>$donationType
        );
        return view('add_animal',$data);
      }else if(Request::isMethod('post')){

            $adminId = Auth::user()->id;
            $animalName = Input::get('ani_name');
              $animalType= Input::get('ani_type');
            //$animalPicture = Input::get('ani_picture');
            //------upload image and store------
            $temp = Request::file('ani_picture')->getPathName();
            $imageName = Request::file('ani_picture')->getClientOriginalName();
            $path = base_path().'/public/images/';
            $newImageName = 'animal_'.str_random(5).$imageName;
            Request::file('ani_picture')->move($path, $newImageName);
            //----------------------------------
            $animalColor= Input::get('ani_color');
            $animalGender= Input::get('ani_gender');
            $animalAge= Input::get('ani_age');
            $symptomCase= Input::get('symptomCase');



            $doTypeId= Input::get('doType_id');
            if($doTypeId==3){
                $statusDonation= '-';
            }else{
              $statusDonation= Input::get('statusDonation');
            }

            $result = $this->AnimalRepository->addAnimal($adminId,$animalName,$animalType,$newImageName,$animalColor,
            $animalGender,$animalAge,$symptomCase,$statusDonation,$doTypeId);

            if($result){
                return redirect('/animal');
            }else{
                echo "Failed to add animal";
            }

      }
    }
    function editAnimal($animal_id=0){
        if(Request::isMethod('post')){
          $animalId = Input::get('ani_id');
          $animalName = Input::get('ani_name');//
            $adminId = Auth::user()->id;
          //------upload image and store------

        //  $animalPicture = Input::get('ani_picture');
          $animalColor= Input::get('ani_color');
          $animalGender= Input::get('ani_gender');
          $animalAge= Input::get('ani_age');
          $symptomCase= Input::get('symptomCase');
          $statusDonation= Input::get('statusDonation');
          $animalType= Input::get('ani_type');//
          $doTypeId= Input::get('doType_id');
          if (Input::hasFile('ani_picture')) {
          $temp = Request::file('ani_picture')->getPathName();
          $imageName = Request::file('ani_picture')->getClientOriginalName();
          $path = base_path().'/public/images/';
          $newImageName = 'animal_'.str_random(5).$imageName;
          Request::file('ani_picture')->move($path, $newImageName);
          //----------------------------------
            $result = $this->AnimalRepository->updateAnimal($animalId,$adminId,$animalName,$animalType,$newImageName,$animalColor,$animalGender,$animalAge,$symptomCase,$statusDonation,$doTypeId);

          }else {
            $result = $this->AnimalRepository->updateAnimal1($animalId,$adminId,$animalName,$animalType,$animalColor,$animalGender,$animalAge,$symptomCase,$statusDonation,$doTypeId);
          }
            if($result){
                return redirect('/animal');
            }else{
                echo "Can not Update"."". $result;
            }
        }elseif(Request::isMethod('get')){
            $animal = $this->AnimalRepository->findById($animal_id);
            //เรียกใช้ method getalldonaationtype ละส่งค่าไปหน้าวิว
            $donationType = $this->DonationTypeRepository->getAllDonationType();//ใช่ชื่อนี้อ่อ5555
            $data = array(
                'animal'=>$animal,
                'donationType'=>$donationType //เรา เอาอันนี้ไปใช้ในหน้าวิว donationType --คือ key มัน
            );
            return view('edit', $data);
            //ในนี้บอกว่า เอาไอดีที่ส่งมาเอาไปหาใน ดีบี ละดึงค่ามาแสดง
            // $animal_id=0 ตรงนี้หมายความว่า ถ้าไม่มี anumalid ส่งมา มันจะเปน0
            // พอเวลามึงกดส่งค่า มันจะเป็น url localhost:8000/edit
            //จะเห็นว่า มันไม่มีไอดีาส่งเข้ามาทาง url   $animal_id จึงเท่ากับ 0
            // ทีนี้มันมาเข้า post method
            // ละมึงเอา $animal_i ส่งไป repo ซึ่งมันมีค่า 0 มันเลย เออเร่อ

            //จอบอ เดวว ๆ
        }

    }
    function deleteAnimal($animal_id){
      $result = $this->AnimalRepository->deleteAnimal($animal_id);
      if($result){
          return redirect('/animal');
      }else{
          echo "Can not delete animal";
      }
    }

    function badEditRequest(){
      return redirect('animal');
    }



    function addNews(){


  if(Request::isMethod('post')){
              $headNews = Input::get('head_News');
              $content= Input::get('content');
              $newstype= Input::get('news_type');
              $adminId = Auth::user()->id;//จะได้ค่า id ของคนที่ login อยู่
              $result = $this->NewsAniRepository->addNewsAni($headNews,$adminId,$content,$newstype);


              if($result){
                  return redirect('/addNews');
              }else{
                  echo "Failed to add news";
              }

        }else{
          $news = $this->NewsAniRepository->getAllNewsAni();
          $admin = Auth::user()->id;
        $countRecipientEachAdmin = $this->AnimalRepository->countRecipientEachAdmin($admin);

          $data = array(
            'news'=>$news,
              'adminId' => Auth::user()->id  ,
              'all_users'=>$this->UserRepository->getAllUser(),
              'countRecipientEachAdmin'=>$countRecipientEachAdmin,
              'admin'=>true
          );
          return view('add_news', $data);
        }
      }

    /*  function NewsAniAll(){
          $animals = $this->AnimalRepository->getAllAnimal();
            $donationType = $this->DonationTypeRepository->getAllDonationType();
              $newsAnis = $this->NewsAniRepository->getAllNewsAni();

          $data = array(
              'animals'=>$animals,   //'animalsคีย์ที่จะส่งไปให้ view ใ้ช้'=>$animals
              'donationType'=>$donationType,
              'newsAnis'=>$newsAnis

          );

          return view('new',$data);
      }*/

          function animalhasnews(){
              $animals = $this->AnimalRepository->getAllAnimal();
              $animalsMoneys = $this->AnimalRepository->getAllMoney();
              $animalsBloods= $this->AnimalRepository->getAllBlood();
              $animalsAdoptions= $this->AnimalRepository->getAllAdoption();
              $newsAnis = $this->NewsAniRepository->getAllNewsAni();
              $data = array(
                  'animals'=>$animals ,
                  'animalsMoneys'=>$animalsMoneys,
                  'animalsBloods'=>$animalsBloods,
                  'animalsAdoptions'=>$animalsAdoptions,
                  'newsAnis'=>$newsAnis
              );

             return view('addNews',$data);
          }

          function newsPage(){
              $animals = $this->AnimalRepository->getAllAnimal();
              $animalsMoneys = $this->AnimalRepository->getAllMoney();
              $animalsBloods= $this->AnimalRepository->getAllBlood();
              $animalsAdoptions= $this->AnimalRepository->getAllAdoption();
              $newsAnis = $this->NewsAniRepository->getAllNewsAni();
              $admin = Auth::user()->id;
            $countRecipientEachAdmin = $this->AnimalRepository->countRecipientEachAdmin($admin);
              $data = array(
                  'animals'=>$animals ,
                  'animalsMoneys'=>$animalsMoneys,
                  'animalsBloods'=>$animalsBloods,
                  'animalsAdoptions'=>$animalsAdoptions,
                  'news'=>$newsAnis,
                  'all_users'=>$this->UserRepository->getAllUser(),
                  'countRecipientEachAdmin'=>$countRecipientEachAdmin,
                  'admin'=>true
              );

             return view('new',$data);
          }


          function deleteNews($news_id){
            $result = $this->NewsAniRepository->deleteNews($news_id);
            if($result){
                return redirect('/addNews');
            }else{
                echo "Can not delete news";
            }
          }

          function addAdoption(){

            if(Request::isMethod('post')){
                        $address = Input::get('address');
                        $status= Input::get('status');
                        $date_time= Input::get('date_time');
                        $user_id = Auth::user()->id;//จะได้ค่า id ของคนที่ login อยู่
                        $animal_id = Input::get('animal_id');
                        $result = $this->AnimalRepository->addAdoption($animal_id,$user_id,$address,$status,$date_time);//$animal_id

                        if($result){
                            return redirect('/addAdoption');
                        }else{
                            echo "Failed to add adopt";
                        }

                  }else{
                    /*$adoption = $this->AnimalRepository->getAllAdoptionTable();
                    $data = array(
                      'adoption'=>$adoption,

                    );
                    return view('allAdoption', $data);*/
                    return redirect('da');
                  }


    }

    function addAdoptionAllPage(){

      if(Request::isMethod('post')){
                  $address = Input::get('address');
                  $status= Input::get('status');
                  $date_time= Input::get('date_time');
                  $user_id = Auth::user()->id;//จะได้ค่า id ของคนที่ login อยู่
                  $animal_id = Input::get('animal_id');
                  $result = $this->AnimalRepository->addAdoption($animal_id,$user_id,$address,$status,$date_time);//$animal_id

                  if($result){
                      return redirect('/addAdoptionAllPage');
                  }else{
                      echo "Failed to add adopt";
                  }

            }else{
              /*$adoption = $this->AnimalRepository->getAllAdoptionTable();
              $data = array(
                'adoption'=>$adoption,

              );
              return view('allAdoption', $data);*/
              return redirect('all');
            }


  }



    function checkAdoption(){
      if(Request::isMethod('post')){
        $status = Input::get('status');
        $adoption_id = Input::get('adoption_id');
            $animal_id = Input::get('animal_id');
            $date_time= Input::get('date_time');
          $user_id = Auth::user()->id;
          $admin = Auth::user()->id;
            $animal_id = Input::get('animal_id');
            $address = Input::get('address');
            $this->AnimalRepository->countAnimalEachAdmin($admin);
        $result = $this->AnimalRepository->updateAdoption($adoption_id,$user_id,$address,$status,$date_time,$animal_id);
        if($result){
            return redirect('/checkAdoption');
        }else{
            echo "Can not Update";
        }


    }else{
          $admin = Auth::user()->id;
        $countAnimalEachAdmin=$this->AnimalRepository->countAnimalEachAdmin($admin);
      $adoptions = $this->AnimalRepository->getAllAdoptionTable();
        $users = $this->UserRepository->getAllUser();
        $countRecipient = $this->AnimalRepository->countRecipient();
        $recipient = $this->AnimalRepository->getAllRecipient();
          $animals = $this->AnimalRepository->getAllAnimal();
            $animalsAdoptions= $this->AnimalRepository->getAllAdoption();
            $adminChecked = $this->AnimalRepository->getAllAdminChecked();
          $adoptionDone = $this->AnimalRepository  ->getAllAdoptionDone();
            $hospitals =$this->AnimalRepository->getAllHospital();
             $countRecipientEachAdmin =$this->AnimalRepository->countRecipientEachAdmin($admin);
            $countDone=$this->AnimalRepository-> countDone();

              $countWait =$this->AnimalRepository->countWait();
            $countWaitEachAdmin =$this->AnimalRepository->countWaitEachAdmin($admin);
            $countDoneEachAdmin =$this->AnimalRepository-> countDoneEachAdmin($admin);
          $countAdoptionEachAdmin =$this->AnimalRepository->  countAdoptionEachAdmin($admin);
          $hospitals =$this->AnimalRepository->getAllHospital();
            $admins = $this->AnimalRepository ->getAllAdmin();


          $data = array(
              'adoptions'=>$adoptions ,
                'users'=>$users,
                'countRecipient'=>$countRecipient,
                'recipient'=>$recipient,
                  'animals'=>$animals,
                  'animalsAdoptions'=>$animalsAdoptions,
                  'adminChecked'=>$adminChecked,
                  'adoptionDone'=>  $adoptionDone,
                          'hospitals'=>$hospitals,
                          'adminId' => Auth::user()->id,
                            'countAnimalEachAdmin'=>$countAnimalEachAdmin,
                            'countRecipientEachAdmin' =>$countRecipientEachAdmin,
                            'countDone'=>$countDone,

                            'countWait'=> $countWait,
                            'countWaitEachAdmin'=>  $countWaitEachAdmin,
                            'countDoneEachAdmin'=>$countDoneEachAdmin,
                          'countAdoptionEachAdmin'=>  $countAdoptionEachAdmin,
                              'hospitals'=>$hospitals,
                              'admins' =>$admins


          );

         return view('checkAdoption',$data);
      }
}


    function checkAdoption2(){
      if(Request::isMethod('post')){
        $status = Input::get('status');
        $adoption_id = Input::get('adoption_id');
            $animal_id = Input::get('animal_id');
            $date_time= Input::get('date_time');
          $user_id = Auth::user()->id;
          $admin = Auth::user()->id;
            $animal_id = Input::get('animal_id');
            $address = Input::get('address');
            $this->AnimalRepository->countAnimalEachAdmin($admin);
        $result = $this->AnimalRepository->updateAdoption($adoption_id,$user_id,$address,$status,$date_time,$animal_id);
        if($result){
            return redirect('/checkAdoption2');
        }else{
            echo "Can not Update";
        }


    }else{
          $admin = Auth::user()->id;
        $countAnimalEachAdmin=$this->AnimalRepository->countAnimalEachAdmin($admin);
      $adoptions = $this->AnimalRepository->getAllAdoptionTable();
        $users = $this->UserRepository->getAllUser();
        $countRecipient = $this->AnimalRepository->countRecipient();
        $recipient = $this->AnimalRepository->getAllRecipient();
          $animals = $this->AnimalRepository->getAllAnimal();
            $animalsAdoptions= $this->AnimalRepository->getAllAdoption();
            $adminChecked = $this->AnimalRepository->getAllAdminChecked();
          $adoptionDone = $this->AnimalRepository  ->getAllAdoptionDone();
            $hospitals =$this->AnimalRepository->getAllHospital();
             $countRecipientEachAdmin =$this->AnimalRepository->countRecipientEachAdmin($admin);
            $countDone=$this->AnimalRepository-> countDone();

              $countWait =$this->AnimalRepository->countWait();
            $countWaitEachAdmin =$this->AnimalRepository->countWaitEachAdmin($admin);
            $countDoneEachAdmin =$this->AnimalRepository-> countDoneEachAdmin($admin);
          $countAdoptionEachAdmin =$this->AnimalRepository->  countAdoptionEachAdmin($admin);
          $hospitals =$this->AnimalRepository->getAllHospital();
            $admins = $this->AnimalRepository ->getAllAdmin();


          $data = array(
              'adoptions'=>$adoptions ,
                'users'=>$users,
                'countRecipient'=>$countRecipient,
                'recipient'=>$recipient,
                  'animals'=>$animals,
                  'animalsAdoptions'=>$animalsAdoptions,
                  'adminChecked'=>$adminChecked,
                  'adoptionDone'=>  $adoptionDone,
                          'hospitals'=>$hospitals,
                          'adminId' => Auth::user()->id,
                            'countAnimalEachAdmin'=>$countAnimalEachAdmin,
                            'countRecipientEachAdmin' =>$countRecipientEachAdmin,
                            'countDone'=>$countDone,

                            'countWait'=> $countWait,
                            'countWaitEachAdmin'=>  $countWaitEachAdmin,
                            'countDoneEachAdmin'=>$countDoneEachAdmin,
                          'countAdoptionEachAdmin'=>  $countAdoptionEachAdmin,
                              'hospitals'=>$hospitals,
                              'admins' =>$admins


          );

         return view('checkAdoption2',$data);
      }
}


function closeAnimal($animal_id=0){

      if(Request::isMethod('post')){
        $animalId = Input::get('ani_id');
        $statusDonation= Input::get('statusDonation');
        $result = $this->AnimalRepository->updateAnimalClose($animalId,$statusDonation);

          if($result){
              return redirect('/animal');
          }else{
              echo "Can not Update";
          }
      }elseif(Request::isMethod('get')){
        $animals = $this->AnimalRepository->getAllAnimal();
          $data = array(
              'animals'=>$animal,

          );
          return view('animal', $data);

      }

  }



      function deleteAdoptionTable($animal_id){
        $result = $this->AnimalRepository->deleteAdoptionTable($animal_id);
        if($result){
            return redirect('/checkAdoption');
        }else{
            echo "Can not delete animal";

      }
}



          function everAdoption(){
             $userId = Auth::user()->id;
              $everAdoption = $this->AnimalRepository->countEverAdoption($userId);
              $data = array(
                  'everAdoption'=>$everAdoption,

              );
              return view('userProfile2', $data);


          }




                    function newsUser(){
                        $animals = $this->AnimalRepository->getAllAnimal();
                        $animalsMoneys = $this->AnimalRepository->getAllMoney();
                        $animalsBloods= $this->AnimalRepository->getAllBlood();
                        $animalsAdoptions= $this->AnimalRepository->getAllAdoption();
                        $newsAnis = $this->NewsAniRepository->getAllNewsAni();
                        $admin = Auth::user()->id;
                      $countRecipientEachAdmin = $this->AnimalRepository->countRecipientEachAdmin($admin);
                        $data = array(
                            'animals'=>$animals ,
                            'animalsMoneys'=>$animalsMoneys,
                            'animalsBloods'=>$animalsBloods,
                            'animalsAdoptions'=>$animalsAdoptions,
                            'news'=>$newsAnis,
                            'all_users'=>$this->UserRepository->getAllUser(),
                            'countRecipientEachAdmin'=>$countRecipientEachAdmin,
                            'admin'=>true
                        );

                       return view('newsUser',$data);
                    }


}
