<?php

namespace App\Helpers;

use App\Models\FirebaseConfig;

function sendNotification($title, $body, $token)
{
    $firebase_config= FirebaseConfig::first();
    
        // $dataArr = array('click_action' => 'FLUTTER_NOTIFICATION_CLICK', 'id' => $req->id,'status'=>"done");
        $notification = array('title' =>$title, 'text' => $body,'sound' => 'default', 'badge' => '1',);
        $arrayToSend = array('to' => $token, 'notification' => $notification, 'priority'=>'high');
        $fields = json_encode ($arrayToSend);
        $headers = array (
            'Authorization: ' . $firebase_config->server_key,
            'Content-Type: application/json'
        );
       // return array($fields, $headers);
        $ch = curl_init ();
        curl_setopt ( $ch, CURLOPT_URL, $firebase_config->url );
        curl_setopt ( $ch, CURLOPT_POST, true );
        curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );
        $result = curl_exec ( $ch );
        //var_dump($result);
        curl_close ( $ch );
        return $result;//request->all();
}