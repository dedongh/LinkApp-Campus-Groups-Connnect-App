<?php
/**
 * Created by PhpStorm.
 * User: Bra Emma
 * Date: 8/20/2018
 * Time: 2:40 PM
 */

$input = [
    [
        "id"=> 12345,
        "link"=> 3456,
        "ref"=> 1
    ],
    [
        "id"=> 35345,
        "link"=> 6756,
        "ref"=> 2
    ]
    ];

$output = new stdClass();
foreach ($input as $arr) {
    $obj = new stdClass();
    $key = $arr["id"];
    $obj->job_id = $arr["id"];
    $obj->url = $arr["link"];
    $obj->status = $arr["ref"];

    $output ->{$key} = $obj;
}

echo json_encode($output, JSON_PRETTY_PRINT);