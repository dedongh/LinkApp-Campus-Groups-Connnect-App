<?php
/**
 * Created by PhpStorm.
 * User: Bra Emma
 * Date: 8/17/2018
 * Time: 1:35 AM
 */
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
require_once dirname(__FILE__) . "/DBOperations.php";
$db = new DBOperations();

$response = array();

if (isset($_POST["id"])) {
    $id = $_POST["id"];

    $annon = $db->getAnnouncements($id);
    echo json_encode($annon, JSON_PRETTY_PRINT);
} else {
    $response["error_msg"] = "Announcement not found";
    echo json_encode($response, JSON_PRETTY_PRINT);
}