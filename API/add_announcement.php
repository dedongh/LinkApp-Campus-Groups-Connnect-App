<?php
/**
 * Created by PhpStorm.
 * User: Bra Emma
 * Date: 8/17/2018
 * Time: 2:11 AM
 */

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
require_once dirname(__FILE__) . "/DBOperations.php";
$db = new DBOperations();

$response = array();

if (isset($_POST["annon_desc"]) and isset($_POST["group_name"]) and isset($_POST["annon_title"]) and isset($_POST["icon"]) and isset($_POST["id"])) {
    $id = $_POST["id"];
    $desc = $_POST["annon_desc"];
    $name = $_POST["group_name"];
    $title = $_POST["annon_title"];
    $icon = $_POST["icon"];

    $annon = $db->addAnnouncements($desc, $name, $title, $icon, $id);
    if ($annon) {
        echo json_encode($annon, JSON_PRETTY_PRINT);
    } else {
        $response["error_msg"] = "Unable to add an Announcements";
        echo json_encode($response, JSON_PRETTY_PRINT);
    }
}