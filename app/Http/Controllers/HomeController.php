<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepositoryInterface;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     protected  $UserRepository;
     public function __construct(UserRepositoryInterface $UserRepository)
       {
           $this->middleware('auth');
           $this->middleware('checkadmin');
           $this->UserRepository = $UserRepository;
       }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data = array(
           'your_name'=>Auth::user()->name,
           'your_email'=>Auth::user()->email,
           'your_position'=>Auth::user()->position,
           'your_tel'=>Auth::user()->tel

           );
     //  $data2 = array(
        //       'all_users'=>$this->UserRepository->getAllUser()
        //   );

      return view('home',$data);

    }



    /* function  userDetail()
    {
      $users = $this->UserRepository->getAllUser();
      $data = array(
           'your_name'=>Auth::user()->name,
           'your_email'=>Auth::user()->email,
           'your_position'=>Auth::user()->position,
           'your_tel'=>Auth::user()->tel
           );

      return view('userProfile',$data);

    }*/






}
