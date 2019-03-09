<?php
/**
 * Created by PhpStorm.
 * User: Bra Emma
 * Date: 8/15/2018
 * Time: 11:28 PM
 */
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
require_once dirname(__FILE__) . "/DBOperations.php";
$db = new DBOperations();

$response = array();

if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["role"]) && isset($_POST["phone"]) && isset($_POST["group_name"]) && isset($_POST["password"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $role = $_POST["role"];
    $phone = $_POST["phone"];
    $grpName = $_POST["group_name"];
    $password = $_POST["password"];

    if ($db->checkUser($email)) {
        $response["error_msg"] = "User with Email ". $email. " already exists";
        echo json_encode($response, JSON_PRETTY_PRINT);
    } else {
        //create new user
        $user = $db->createNewUser($name, $email, $role, $phone, $grpName, $password);
        if ($user) {
            $response["name"] = $user["Name"];
            $response["email"] = $user["Email"];
            $response["role"] = $user["Role"];
            $response["phone"] = $user["Phone"];
            $response["group_name"] = $user["GroupName"];
            $response["password"] = $user["Password"];

            echo json_encode($response, JSON_PRETTY_PRINT);
        } else {
            $response["error_msg"] = "An error occurred during registration please try again later";
            echo json_encode($response, JSON_PRETTY_PRINT);
        }
    }
} else {
    $response["error_msg"] = "Required parameter (Name, Email, Role, Phone, Group Name, Password) is missing";
    echo json_encode($response, JSON_PRETTY_PRINT);
}