<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admins';
     protected $fillable = ['admin_id','hospital_id','contact_info'];



     public function join_Hospital(){
       return $this->belongsTo('App\Hospital','hospital_id', 'hospital_id');
     }
}
