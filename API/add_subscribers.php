<?php
/**
 * Created by PhpStorm.
 * User: Bra Emma
 * Date: 8/17/2018
 * Time: 2:22 AM
 */

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
require_once dirname(__FILE__) . "/DBOperations.php";
$db = new DBOperations();

$response = array();
if (isset($_POST["token"]) and isset($_POST["id"])) {
    $id = $_POST["id"];
    $token = $_POST["token"];

    $sub = $db->subscribe($token,$id);
    echo json_encode($sub, JSON_PRETTY_PRINT);
} else {
    $response["error_msg"] = "Couldn't add subscriber";
    echo json_encode($response, JSON_PRETTY_PRINT);
}