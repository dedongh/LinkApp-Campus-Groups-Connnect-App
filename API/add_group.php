<?php
/**
 * Created by PhpStorm.
 * User: Bra Emma
 * Date: 8/17/2018
 * Time: 3:17 AM
 */

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
require_once dirname(__FILE__) . "/DBOperations.php";
$db = new DBOperations();

$response = array();
if (isset($_POST["group_name"]) and isset($_POST["about"]) and isset($_POST["aim"]) and isset($_POST["icon"]) and isset($_POST["vision"]) and isset($_POST["contact"]) ) {
    $name = $_POST["group_name"];
    $about = $_POST["about"];
    $icon = $_POST["icon"];
    $vision = $_POST["vision"];
    $contact = $_POST["contact"];
    $aim = $_POST["aim"];

    $group = $db->addGroup($name, $about, $aim, $icon, $vision, $contact);
    if ($group) {
        echo json_encode($group, JSON_PRETTY_PRINT);
    } else {
        $response["error_msg"] = "Unable to add group ";
        echo json_encode($response, JSON_PRETTY_PRINT);
    }
}