<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
     protected $fillable = ['admin_id','hospital_id','contact_info'];
}
