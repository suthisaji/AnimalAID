<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adoption extends Model
{
    protected $table = 'adoptions';
  protected $fillable = ['adoption_id','user_id','address','status','date_time','animal_id'];
  public function join_User(){
    //return $this->belongsTo('App\DonationType','forenge key of animal', 'primary key of donationtype');
    return $this->belongsTo('App\User','user_id', 'id');
  }
  public function join_Animal(){
    return $this->belongsTo('App\Animal','animal_id', 'animal_id');
  }
  
}
