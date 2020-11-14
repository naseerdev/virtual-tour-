<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    public function basic_email(Request $request) {
        $emaildata = json_decode($request['emaildata']);
      
         $senderName=$emaildata->name;
         $senderEmail=$emaildata->email;
         $senderSubject=$emaildata->subject;
         $senderMessage=$emaildata->message;
       // return response()->json(['emaildata' => $senderEmail]);
      

        $data = array('name'=>$senderName);
       

     
        Mail::send(['text'=>'pages.mail'], $data, function($message) {
           $message->to('talhaaslam72@gmail.com', 'Virtual Tour To Hostel')->subject
              ('Issue Related');
           $message->from(  $senderEmail,$senderName);
        });
        echo "Basic Email Sent. Check your inbox.";
     }
}
