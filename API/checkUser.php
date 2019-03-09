<?php
/**
 * Created by PhpStorm.
 * User: Bra Emma
 * Date: 8/15/2018
 * Time: 11:05 PM
 */
require_once dirname(__FILE__) . "/DBOperations.php";
$db = new DBOperations();
$response = array();
if (isset($_POST["email"])) {
    $email = $_POST["email"];
    if ($db->checkUser($email)) {
        $response["exists"] = TRUE;
        echo json_encode($response, JSON_PRETTY_PRINT);
    } else {
        $response["exists"] = FALSE;
        echo json_encode($response, JSON_PRETTY_PRINT);
    }
} else {
    $response["error_msg"] = "Required Parameter (Email) is missing";
    echo json_encode($response, JSON_PRETTY_PRINT);
}