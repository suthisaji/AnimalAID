<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    protected $fillable = ['hospital_id','hospital_name','hospital_address','hospital_tel','hospital_account','hospital_pic'];
}
