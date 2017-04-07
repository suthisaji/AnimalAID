<?php
namespace App\Repositories;
use App\NewsAni;
  class NewsAniRepository implements NewsAniRepositoryInterface{
    function getAllNewsAni(){
      return NewsAni::orderBy('created_at')->get();
  }
      function addNewsAni($head_News,$adminId,$content,$news_type){

            $data = array(

                'head_News'=>$head_News,
                'content'=>$content,
                'news_type'=>$news_type,
                'admin_id'=>  $adminId
            );
            try{
                $result = NewsAni::create($data);
                return true;
            }catch(Exception $e){
                return false;
            }
        }
        function deleteNews($news_id){
          $result = NewsAni::where('news_id',$news_id)->delete();
            if($result>0){
              return true;
            }else{
              return false;
            }
        }

        }
