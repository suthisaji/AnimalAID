<?php

namespace App\Http\Controllers;

use Request;
use Illuminate\Support\Facades\Input;
use App\Animal;
use Auth;
use App\Repositories\AnimalRepositoryInterface;
use App\Repositories\DonationTypeRepositoryInterface;
use App\Repositories\NewsAniRepositoryInterface;
class AnimalController extends Controller
{
    protected $AnimalRepository;
    protected $DonationTypeRepository;
    protected $NewsAniRepository;
    function __construct(AnimalRepositoryInterface $AnimalRepository,DonationTypeRepositoryInterface $DonationTypeRepository,NewsAniRepositoryInterface $NewsAniRepository){
        $this->AnimalRepository = $AnimalRepository;
        $this->DonationTypeRepository = $DonationTypeRepository;
        $this->NewsAniRepository = $NewsAniRepository;
    }
//เรียกใช้  repo ที่สร้าง
    function animal(){
        $animals = $this->AnimalRepository->getAllAnimal();
        //$donationType_name = $this->DonationTypeRepository->findTypeById($type_id); //ไมไ่ด้ 55555 คิดแปป ****************************
        $data = array(
            'animals'=>$animals   //'animalsคีย์ที่จะส่งไปให้ view ใ้ช้'=>$animals
        );
        //return view('animal',$data); มึงจะให้มันไปหน้าไหน
        return view('animal',$data);
    }
    function animalAll(){
        $animals = $this->AnimalRepository->getAllAnimal();
          $donationType = $this->DonationTypeRepository->getAllDonationType();

        $data = array(
            'animals'=>$animals,   //'animalsคีย์ที่จะส่งไปให้ view ใ้ช้'=>$animals
            'donationType'=>$donationType
        );

        return view('all',$data);
    }

    function animalMoney(){
        $animals = $this->AnimalRepository->getAllAnimal();
        $animalsMoneys = $this->AnimalRepository->getAllMoney();
        //$donationType_name = $this->DonationTypeRepository->findTypeById($type_id); //ไมไ่ด้ 55555 คิดแปป ****************************
        $data = array(
            'animals'=>$animals ,  //'animalsคีย์ที่จะส่งไปให้ view ใ้ช้'=>$animals
            'animalsMoneys'=>$animalsMoneys
        );
        //return view('animal',$data); มึงจะให้มันไปหน้าไหน
         //echo "d".$animalsMoneys;
       return view('allMoney',$data);
    }

    function animalBlood(){
        $animals = $this->AnimalRepository->getAllAnimal();
        $animalsMoneys = $this->AnimalRepository->getAllMoney();
        $animalsBloods= $this->AnimalRepository->getAllBlood();

        $data = array(
            'animals'=>$animals ,
            'animalsMoneys'=>$animalsMoneys,
            'animalsBloods'=>$animalsBloods
        );

       return view('allBlood',$data);
    }


    function animalAdoption(){
        $animals = $this->AnimalRepository->getAllAnimal();
        $animalsMoneys = $this->AnimalRepository->getAllMoney();
        $animalsBloods= $this->AnimalRepository->getAllBlood();
        $animalsAdoptions= $this->AnimalRepository->getAllAdoption();
        $data = array(
            'animals'=>$animals ,
            'animalsMoneys'=>$animalsMoneys,
            'animalsBloods'=>$animalsBloods,
            'animalsAdoptions'=>$animalsAdoptions
        );

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
          //------upload image and store------
          $temp = Request::file('ani_picture')->getPathName();
          $imageName = Request::file('ani_picture')->getClientOriginalName();
          $path = base_path().'/public/images/';
          $newImageName = 'animal_'.str_random(10).$imageName;
          Request::file('ani_picture')->move($path, $newImageName);
          //----------------------------------
            $animalName = Input::get('ani_name');
            //$animalPicture = Input::get('ani_picture');
            $animalColor= Input::get('ani_color');
            $animalGender= Input::get('ani_gender');
            $animalAge= Input::get('ani_age');
            $symptomCase= Input::get('symptomCase');
            $statusDonation= Input::get('statusDonation');
            $animalType= Input::get('ani_type');
            $doTypeId= Input::get('doType_id');
            $result = $this->AnimalRepository->addAnimal($animalName,$animalType,$newImageName,$animalColor,
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
          $animalPicture = Input::get('ani_picture');
          $animalColor= Input::get('ani_color');
          $animalGender= Input::get('ani_gender');
          $animalAge= Input::get('ani_age');
          $symptomCase= Input::get('symptomCase');
          $statusDonation= Input::get('statusDonation');
          $animalType= Input::get('ani_type');//
          $doTypeId= Input::get('doType_id');
            $result = $this->AnimalRepository->updateAnimal($animalId,$animalName,$animalType,$animalPicture,$animalColor,$animalGender,$animalAge,$symptomCase,$statusDonation,$doTypeId);
            if($result){
                return redirect('/home');
            }else{
                echo "Can not Update";
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
                  return redirect('/new');
              }else{
                  echo "Failed to add news";
              }

        }else{
          return view('add_news');
        }
      }

      function NewsAniAll(){
          $animals = $this->AnimalRepository->getAllAnimal();
            $donationType = $this->DonationTypeRepository->getAllDonationType();
              $newsAnis = $this->NewsAniRepository->getAllNewsAni();

          $data = array(
              'animals'=>$animals,   //'animalsคีย์ที่จะส่งไปให้ view ใ้ช้'=>$animals
              'donationType'=>$donationType,
              'newsAnis'=>$newsAnis
              
          );

          return view('new',$data);
      }
    }
