<?php
namespace App\Repositories;
use App\DonationType;
  class DonationTypeRepository implements DonationTypeRepositoryInterface{

        function getAllDonationType(){
            return DonationType::orderBy('doType_id')->get();//เรียงตามวันที่สร้าวงแต่ค่ามึงเปน nullถถถถถถ
        }

        function findTypeById($type_id){
          return DonationType::where('doType_id',$type_id)->first(); //beacuse the only first one for search
        }
      }
