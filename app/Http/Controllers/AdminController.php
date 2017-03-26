<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepositoryInterface;


class AdminController extends Controller

{
    protected $UserRepository;
    public function __construct(UserRepositoryInterface $UserRepository)
    {
    	$this->middleware('auth');
        $this->UserRepository = $UserRepository;
    }

    function index(){
    	$data = array(
    		'all_users'=>$this->UserRepository->getAllUser(),
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
