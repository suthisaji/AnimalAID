<?php
namespace App\Repositories;
interface DonationTypeRepositoryInterface{
    function getAllDonationType();
    function findTypeById($type_id);
}
