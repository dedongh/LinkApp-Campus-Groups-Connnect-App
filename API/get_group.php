<?php
/**
 * Created by PhpStorm.
 * User: Bra Emma
 * Date: 8/17/2018
 * Time: 1:34 AM
 */

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
require_once dirname(__FILE__) . "/DBOperations.php";
$db = new DBOperations();

$response = array();

if(isset($_POST["id"])){
	$id = $_POST["id"];
	$group = $db->getGroups($id);
if ($group) {
   echo json_encode($group, JSON_PRETTY_PRINT);
} else {
    $response["error_msg"] = "Group not found";
    echo json_encode($response, JSON_PRETTY_PRINT);
}
}else{
	$response["error_msg"] = "Error Occurred";
    echo json_encode($response, JSON_PRETTY_PRINT);
}
