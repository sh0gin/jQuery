<?php

require_once __DIR__ . '/mainPhp.php';


$post = new Post($user, $request, $response);
$result = [];
foreach ($post -> getPosts() as $value) {
    $result[] = $value;
}

echo json_encode($result);


