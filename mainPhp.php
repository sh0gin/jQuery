<?php
require_once __DIR__ . "/config/config.php";
require_once __DIR__ . "/config/db.php";
require_once __DIR__ . "/autoload.php";


function printd($data)
    {
        print_r('<pre><p style="background-color: beige; color: maroon; padding: 10px; margin: 5px; border: 1px maroon solid;">');
        print_r($data);
        print_r('</p></pre>');
    }

$request = new Request();
$mysql = new MySql($db);
$user = new User($request, $mysql);

$response = new Response($user);
$pagination = new Pagination($mysql, $response);
$menu = new Menu($menu_array, $response, $user);
$post = new Post($user, $request, $response);
$comment = new Comment($user, $request, $post, $response);
$block = new Block($user, $post);
