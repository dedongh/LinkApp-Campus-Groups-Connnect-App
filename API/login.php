<?php
/**
 * Created by PhpStorm.
 * User: Bra Emma
 * Date: 8/16/2018
 * Time: 12:31 AM
 */
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
require_once dirname(__FILE__) . "/DBOperations.php";
$db = new DBOperations();

$response = array();

if (isset($_POST["email"]) and isset($_POST["password"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    if ($user = $db->userLogin($email, $password)) {
            $response["id"] = $user["id"];
            $response["name"] = $user["Name"];
            $response["role"] = $user["Role"];
            $response["email"] = $user["Email"];
            $response["group_name"] = $user["GroupName"];

            echo json_encode($response, JSON_PRETTY_PRINT);
    }else {
        $response["error_msg"] = "Invalid Email and/or Password";
        echo json_encode($response, JSON_PRETTY_PRINT);
    }
}else {
    $response["error_msg"] = "An error occurred during Login please try again later";
    echo json_encode($response, JSON_PRETTY_PRINT);
}