<?php
/**
 * Created by PhpStorm.
 * User: Bra Emma
 * Date: 8/16/2018
 * Time: 1:39 AM
 */

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
$host = "localhost";
$user = "engineerskasa";
$pwd = '$eng$kasa';
$dbm = "giloo";

$con = new mysqli($host, $user, $pwd, $dbm) or die();

#$sql = "select * from products";
$sql = "select c.name as category_name, p.p_id, p.title, p.price, c.c_id, p.image, 
p.description, p.conditions, p.memory, p.color, p.b_id, b.name as brand_name, b.b_id
from products p
left join categories c
    on p.c_id = c.c_id
    LEFT JOIN brands b
    ON p.b_id = b.b_id
order by p.title asc";
$results = $con->query($sql);

while ($row = $results->fetch_assoc()) {
    $response[] = $row;
}
echo json_encode($response, JSON_PRETTY_PRINT);
