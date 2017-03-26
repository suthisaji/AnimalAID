<?php
namespace App\Repositories;
interface UserRepositoryInterface{
  	function getAllUser();
  	function isAdmin($username);
  	function deleteUser($id);






}
