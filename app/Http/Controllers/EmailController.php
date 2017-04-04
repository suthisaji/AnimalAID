<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
class EmailController extends Controller
{
    function sendEmail(){
      $data = array(
        'name'=>'Thank you' //name เอาไปใช้ในหน้า mail_layoout
      );
      //เรียกใช้ Mail
      Mail::send('emails.mail_layout', $data, function($message){
        $message->to('asihtus10@gmail.com')->subject('Test Email from laravel');//ดึงemail มาจากuer ที่ login มา
          $message->to('asihtus10@gmail.com')->subject('Test Email from laravel');//ดึง emailของ รพ ที่ user เลือก click บริจาคให้
      });
      echo "Send email successfully!.";

    }
}
