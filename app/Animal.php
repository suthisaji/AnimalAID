<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $fillable = ['animal_id','animal_name','animal_picture','animal_type','animal_color','animal_gender','animal_age','symptomCase','statusDonation','do_typeId'];
}
