<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adoption extends Model
{
  protected $fillable = ['adoption_id','user_id','address','status','date_time','animal_id'];
}
