<?php

require_once __DIR__ . '/mainPhp.php';


$post = new Post($user, $request, $response);
$post->findOne($_POST["id"]);
$post->user->identity($post->autor_id);


echo json_encode($post);