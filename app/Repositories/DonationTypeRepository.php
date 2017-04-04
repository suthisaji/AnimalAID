<?php
namespace App\Repositories;
use App\DonationType;
  class DonationTypeRepository implements DonationTypeRepositoryInterface{

        function getAllDonationType(){
            return DonationType::orderBy('do_typeId')->get();//เรียงตามวันที่สร้าวงแต่ค่ามึงเปน nullถถถถถถ
        }

        function findTypeById($type_id){
          return DonationType::where('do_typeId',$type_id)->first(); //beacuse the only first one for search
        }
      }
