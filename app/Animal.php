<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $table = 'animals';
    protected $fillable = ['animal_id','animal_name','animal_picture','animal_type','animal_color','animal_gender','animal_age','symptomCase','statusDonation','doType_id'];

    //เอา donation type มาjoin
    public function join_donationType(){
      //return $this->belongsTo('App\DonationType','forenge key of animal', 'primary key of donationtype');
      return $this->belongsTo('App\DonationType','doType_id', 'do_typeId');
    }
    
}
//animal เชื่อมกับ donationtype
