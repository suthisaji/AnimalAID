<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $table = 'animals';
    protected $fillable = ['animal_id','admin_id','animal_name','animal_picture','animal_type','animal_color','animal_gender','animal_age','symptomCase','statusDonation','doType_id'];

    //เอา donation type มาjoin
    public function join_donationType(){
      //return $this->belongsTo('App\DonationType','forenge key of animal', 'primary key of donationtype');
      return $this->belongsTo('App\DonationType','doType_id', 'do_typeId');
    }
    public function join_Adoption(){
      return $this->belongsTo('App\Adoption','animal_id', 'animal_id');
    }
    public function join_User(){
        return $this->belongsTo('App\User','admin_id', 'id');
    }
    public function join_Admin(){
        return $this->belongsTo('App\Admin','admin_id', 'admin_id');
    }

}
//animal เชื่อมกับ donationtype
