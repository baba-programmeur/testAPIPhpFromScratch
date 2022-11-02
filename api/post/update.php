<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');

include_once '../../config/Database.php';

include_once '../../service/PostService.php';

//accees à la base

$db=new Database();

$connexion=$db->connect();

$postService =new Post($connexion);

$data=json_decode(file_get_contents("php://input"));

if(isset($data)) {
    $postService->title = $data->title;

    $postService->body = $data->body;

    $postService->author = $data->author;

    $postService->category_id = $data->category_id;

    if ($postService->update()) {

        echo json_encode(array("message" => "Message update"));
    } else
        echo json_encode(array("mssage" => "Not updated"));
}
else
{
    echo  "erreur sur la donne" .$data ;
}
