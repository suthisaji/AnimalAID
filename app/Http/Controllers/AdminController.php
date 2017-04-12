<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepositoryInterface;
use App\Repositories\AnimalRepositoryInterface;
use App\Adoption;

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
        $countRecipient = $this->AnimalRepository->countRecipient();
    	$data = array(
    		'all_users'=>$this->UserRepository->getAllUser(),
        'countRecipient'=>$countRecipient,
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


  }
