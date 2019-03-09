<?php
/**
 * Created by PhpStorm.
 * User: Bra Emma
 * Date: 8/17/2018
 * Time: 3:47 AM
 */
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
require_once dirname(__FILE__) . "/DBOperations.php";
$db = new DBOperations();

$response = array();
if (isset($_POST["time"]) and isset($_POST["day"]) and isset($_POST["venue"]) and isset($_POST["lat"]) and isset($_POST["long"]) and isset($_POST["id"]) ) {
    $time = $_POST["time"];
    $day = $_POST["day"];
    $venue = $_POST["venue"];
    $lat = $_POST["lat"];
    $long = $_POST["long"];
    $id = $_POST["id"];

    $group = $db->addMeetings($time,$day,$venue,$lat,$long,$id);
    if ($group) {
        echo json_encode($group, JSON_PRETTY_PRINT);
    } else {
        $response["error_msg"] = "Unable to add meeting schedules ";
        echo json_encode($response, JSON_PRETTY_PRINT);
    }
}