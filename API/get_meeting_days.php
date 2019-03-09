<?php
/**
 * Created by PhpStorm.
 * User: Bra Emma
 * Date: 8/17/2018
 * Time: 4:21 AM
 */
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
require_once dirname(__FILE__) . "/DBOperations.php";
$db = new DBOperations();

$response = array();

if (isset($_POST["id"])) {
    $id = $_POST["id"];

    $event = $db->getMeetings($id);
    $response["Meeting_days"] = $event;
    echo json_encode($response, JSON_PRETTY_PRINT);
} else {
    $response["error_msg"] = "Schedule not found";
    echo json_encode($response, JSON_PRETTY_PRINT);
}