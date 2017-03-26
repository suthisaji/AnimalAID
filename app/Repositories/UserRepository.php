<?php
namespace App\Repositories;
use App\User;
  class UserRepository implements UserRepositoryInterface{
    	function getAllUser(){
    	   return User::all();
    	}

          	function isAdmin($username){
          		$admin = User::where('username','=',$username)->where('position','=','admin')->first();
            		if(count($admin) >0 ){
            			return true;
                }else{
                  return false;
            	      }
           }

                  function deleteUser($id){
                  	$result = User::where('id',$id)->delete();
                    	if($result>0){
                    		return true;
                    	}else{
                    		return false;
                    	}
                  }




}
