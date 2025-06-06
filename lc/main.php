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

// echo $pagination->give_html(2);

// $user->validateRegister();
// $user->login();
// var_dump($mysql->repeat_check("user", "login", "login"));
// $arr = [
//     '<p>Параграф.</p><!-- Комментарий --> <a href="#fragment">Ещё текст</a>   ',
//  "sdasd", 
//  [],
//   [["lend" => '<p>Параграф.</p><!-- Комментарий --> <a href="#fragment">Ещё текст</a>   ', [], []], [[]]]
// ];


// echo $request->parameter_cleaning('<p>Параграф.</p><!-- Комментарий --> <a href="#fragment">Ещё текст</a>   ');
// var_dump($request -> array_cleaning($arr));
// var_dump($request -> post_parameter("name"));
// var_dump($request -> get_parameter());
// var_dump($request -> take_host());



// var_dump( $user->load(["name" => "", "patronymic" => "Ivanovish", "surname" => "Ivanov", "login" => "login1937", "email" => "mail_tg@mail.ru", "password" => "parol231", "passwordRepeat" => "pagrol231",]));

// var_dump($user->validateRegister());
// var_dump($user);