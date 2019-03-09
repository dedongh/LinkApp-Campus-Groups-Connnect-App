<?php
/**
 * Created by PhpStorm.
 * User: Bra Emma
 * Date: 8/16/2018
 * Time: 11:38 AM
 */

require_once dirname(__FILE__) . "/DBOperations.php";
$db = new DBOperations();


if (isset($_POST["username"]) and isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($user = $db->userLogin($username, $password)) {
        $_SESSION["id"] = $user["id"];
        $_SESSION["name"] = $user["Name"];
        $_SESSION["role"] = $user["Role"];
        $_SESSION["email"] = $user["Email"];
        $_SESSION["group_name"] = $user["GroupName"];
        echo "success";
        exit();
    } else {
        echo "Failed";
    }
}