<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepositoryInterface;
use App\Repositories\AnimalRepositoryInterface;
use App\Adoption;
use Auth;
class AdminController extends Controller

{
    protected $UserRepository;
        protected $AnimalRepository;
    public function __construct(UserRepositoryInterface $UserRepository,AnimalRepositoryInterface $AnimalRepository)
    {
    	$this->middleware('auth');
        $this->AnimalRepository = $AnimalRepository;
        $this->UserRepository = $UserRepository;
    }

    function index(){
      $admin = Auth::user()->id;
    $countRecipientEachAdmin = $this->AnimalRepository->countRecipientEachAdmin($admin);
    	$data = array(
    		'all_users'=>$this->UserRepository->getAllUser(),
        'countRecipientEachAdmin'=>$countRecipientEachAdmin,
        'admin'=>true
    		);

    	return view('admin',$data);
    }
    function delete($id){
    	$result = $this->UserRepository->deleteUser($id);
    	if($result){
    		return redirect('admin');
    	}else{
    		echo "Can not Delete this user";
    	}
    }






    function userProfile2(){
      $userId  =   Auth::user()->id;
      $name    =   Auth::user()->name;
      $username=   Auth::user()->username;
          $email   =   Auth::user()->email;
      $tel     =   Auth::user()->tel;

      $created =   Auth::user()->created_at;
        $everAdoption = $this->AnimalRepository->countEverAdoption($userId);
        $data = array(
          'userId'=>$userId ,
          'name' =>$name ,
          'username' =>$username,
          'email' =>$email,
          'tel' =>$tel,
          'created' =>$created,
                  'everAdoption'=>$everAdoption,


          );

        return view('userProfile2',$data);
    }




        function AdminProfile(){
          $userId  =   Auth::user()->id;
          $name    =   Auth::user()->name;
          $username=   Auth::user()->username;
              $email   =   Auth::user()->email;
          $tel     =   Auth::user()->tel;

          $created =   Auth::user()->created_at;
                $everAdoption = $this->AnimalRepository->countEverAdoption($userId);

                $admin = Auth::user()->id;
              $countRecipientEachAdmin = $this->AnimalRepository->countRecipientEachAdmin($admin);
                $admins = $this->AnimalRepository ->getAllAdmin();
            $data = array(
              'userId'=>$userId ,
              'name' =>$name ,
              'username' =>$username,
              'email' =>$email,
              'tel' =>$tel,
              'created' =>$created,
              'everAdoption'=>$everAdoption,
              'all_users'=>$this->UserRepository->getAllUser(),
              'countRecipientEachAdmin'=>$countRecipientEachAdmin,
              'admin'=>true,
              'admins'=>$admins
              );

            return view('adminProfile',$data);
        }



  }
