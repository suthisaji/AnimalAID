<?php
namespace App\Repositories;
interface NewsAniRepositoryInterface{
  function getAllNewsAni();
  function addNewsAni($head_News,$adminId,$content,$news_type);
}
