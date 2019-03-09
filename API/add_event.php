<?php
/**
 * Created by PhpStorm.
 * User: Bra Emma
 * Date: 8/16/2018
 * Time: 11:44 PM
 */

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
require_once dirname(__FILE__) . "/DBOperations.php";
$db = new DBOperations();

$response = array();
if (isset($_POST["event_desc"]) and  isset($_POST["event_name"]) and isset($_POST["icon"]) and isset($_POST["group_name"])) {
    $eName = $_POST["event_name"];
    $eDesc = $_POST["event_desc"];
    $eIcon = $_POST["icon"];
    $grpName = $_POST["group_name"];

    $event = $db->addEvent($eDesc, $eName, $eIcon, $grpName);

    if ($event) {
        $title = $event["EventName"];
        $icon = $event["Icon"];
        $topic = "events";
        $url = "https://fcm.googleapis.com/fcm/send";
        $server_key = "";
        $headers = array(
            "Authorization:key=". $server_key,
            "Content-Type:application/json"
        );

        $response["name"] = $title;
        $response["icon"] = $icon;

        $fields = array(
            "to"=> "/topics/".$topic,
            "data"=> $response,
        );

        //uncomment below code to make things work
        $ch = curl_init();
        //url
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

        $result = curl_exec($ch);
        if($result === FALSE){
            die('Curl failed: ' . curl_error($ch));
        }
        // Close connection
        curl_close($ch);
        echo json_encode($fields, JSON_PRETTY_PRINT);
    } else {
        $response["error_msg"] = "Unable to add Event ".$eName;
        echo json_encode($response, JSON_PRETTY_PRINT);
    }
}