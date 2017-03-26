<?php
namespace App\Repositories;
interface AnimalRepositoryInterface{

function addAnimal($animal_name,$animal_type,$animal_picture,$animal_color,$animal_gender,$animal_age,$symptomCase,$statusDonation,$doType_id);
function getAllAnimal();
function findById($id);
 function updateAnimal($animal_id,$animal_name,$animal_type,$animal_picture,$animal_color,$animal_gender,$animal_age,$symptomCase,$statusDonation,$doType_id);
function deleteAnimal($id);
}
