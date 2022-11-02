<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../service/PostService.php';

// Instantiate DB & connect
$database = new Database();

$db = $database->connect();

// Instantiate blog post object

$postService = new Post($db);

$data=json_decode(file_get_contents("php://input"));

if(isset($data)){

    $postService->id=$data->id ;

    if ($postService->delete()){
        echo  json_encode(array("message" => "Line deleted"));
    }
    else
    {
        echo  json_encode(array("message" => "Line not deleted"));
    }
}

