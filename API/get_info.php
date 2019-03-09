<?php
/**
 * Created by PhpStorm.
 * User: Bra Emma
 * Date: 8/17/2018
 * Time: 12:27 AM
 */

/*
 * This Service returns all the data from a specified table*/
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
require_once dirname(__FILE__) . "/DBOperations.php";
$db = new DBOperations();

$response = array();
if (isset($_POST["table"])) {
    $table = $_POST["table"];
    $table = $db->getAllRecord($table);
    echo json_encode($table, JSON_PRETTY_PRINT);
} else {
    $response["error_msg"] = " Specified Table does not exist";
    json_encode($response, JSON_PRETTY_PRINT);
}