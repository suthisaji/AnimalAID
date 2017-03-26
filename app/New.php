<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class New extends Model
{
    protected $fillable = ['news_id','admin_id','head_News','content','news_type'];
}
