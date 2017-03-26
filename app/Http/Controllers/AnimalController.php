<?php

namespace App\Http\Controllers;

use Request;
use Illuminate\Support\Facades\Input;
use App\Animal;
use App\Repositories\AnimalRepositoryInterface;
use App\Repositories\DonationTypeRepositoryInterface;
class AnimalController extends Controller
{
    protected $AnimalRepository;
    protected $DonationTypeRepository;
    function __construct(AnimalRepositoryInterface $AnimalRepository,DonationTypeRepositoryInterface $DonationTypeRepository){
        $this->AnimalRepository = $AnimalRepository;
        $this->DonationTypeRepository = $DonationTypeRepository;
    }
//เรียกใช้  repo ที่สร้าง
    function animal(){
        $animals = $this->AnimalRepository->getAllAnimal();
        //$donationType_name = $this->DonationTypeRepository->findTypeById($type_id); //ไมไ่ด้ 55555 คิดแปป ****************************
        $data = array(
            'animals'=>$animals   //'animalsคีย์ที่จะส่งไปให้ view ใ้ช้'=>$animals
        );
        return view('animal',$data);
    }

    function addAnimal(){
      if(Request::isMethod('get')){
        return view('add_animal');
      }else if(Request::isMethod('post')){
            $animalName = Input::get('ani_name');
            $animalPicture = Input::get('ani_picture');
            $animalColor= Input::get('ani_color');
            $animalGender= Input::get('ani_gender');
            $animalAge= Input::get('ani_age');
            $symptomCase= Input::get('symptomCase');
            $statusDonation= Input::get('statusDonation');
            $animalType= Input::get('ani_type');
            $doTypeId= Input::get('doType_id');
            $result = $this->AnimalRepository->addAnimal($animalName,$animalType,$animalPicture,$animalColor,$animalGender,$animalAge,$symptomCase,$statusDonation,$doTypeId);
            if($result){
                return redirect('/add');
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
          return redirect('/home');
      }else{
          echo "Can not delete animal";
      }
    }

    function badEditRequest(){
      return redirect('animal');
    }





}
