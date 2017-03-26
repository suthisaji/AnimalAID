<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Money extends Model
{
    protected $fillable = ['money_id','money_status','money'];
}
