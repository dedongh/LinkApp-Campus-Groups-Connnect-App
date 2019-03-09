<?php
/**
 * Created by PhpStorm.
 * User: Bra Emma
 * Date: 8/25/2018
 * Time: 8:23 PM
 */

#include_once dirname(__FILE__) . "/DBConnect.php";
require_once dirname(__FILE__) . "/DBOperations.php";
include_once dirname(__FILE__) . "/DBConnect.php";

$db = new DBOperations();

$message = $_POST["message"];
$title = $_POST["title"];
$image = $_POST["image"];

/*
 * looks something like this
 * https://fcm.googleapis.com/fcm/send*/
$firebase_server_URL = "add firebase server url here";

/*
 * open firebase console
 * go to settings
 * cloud messaging tab and copy server kay and paste here*/
$server_key = "ADD Server Key Here";

$headers = array(
    "Authorization:key=". $server_key,
    "Content-Type:application/json"
);

$key = $db->sendNotif();

$fields = array(
    "to"=>$key,
    "notification"=> array(
        "title"=> $title,
        "body"=> $message,
        "image"=> $image
    )
);

$response = json_encode($fields, JSON_PRETTY_PRINT);

echo $response;

// pass info to FCM
$curl_session = curl_init();
curl_setopt($curl_session, CURLOPT_URL, $firebase_server_URL);
curl_setopt($curl_session, CURLOPT_POST, true );
curl_setopt($curl_session, CURLOPT_HTTPHEADER, $headers );
curl_setopt($curl_session, CURLOPT_RETURNTRANSFER, true );
curl_setopt($curl_session, CURLOPT_SSL_VERIFYPEER, false );
curl_setopt($curl_session, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4 );
curl_setopt($curl_session, CURLOPT_POSTFIELDS, $response );

$results = curl_exec($curl_session);
curl_close($curl_session);


