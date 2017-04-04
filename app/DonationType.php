<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonationType extends Model
{
  protected $table = 'donationTypes';
  protected $fillable = ['do_typeId','do_typeName'];
}
