<?php
namespace App\Repositories;
interface AnimalRepositoryInterface{

function addAnimal($admin_id,$animal_name,$animal_type,$animal_picture,$animal_color,$animal_gender,$animal_age,$symptomCase,$statusDonation,$doType_id);
function getAllAnimal();
function getAllMoney();
function getAllBlood();
function getAllAdoption();
function findById($id);
 function updateAnimal($animal_id,$admin_id,$animal_name,$animal_type,$animal_picture,$animal_color,$animal_gender,$animal_age,$symptomCase,$statusDonation,$doType_id);
 function updateAnimal1($animal_id,$admin_id,$animal_name,$animal_type,$animal_color,$animal_gender,$animal_age,$symptomCase,$statusDonation,$doType_id);
function deleteAnimal($id);
function addAdoption($animal_id,$user_id,$address,$status,$date_time);  //$animal_id,$adoption_id
function getAllAdoptionTable();
function getAllRecipient();
function getAllAdminChecked();
function deleteAdoptionTable($id);
function getAllAdoptionDone();
function getAllHospital();
function getAllAdmin();
function getAnimalNotInAdoption();
function countRecipient();
//  function count();






}
