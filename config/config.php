<?php
$menu_array =
[
    ["title" => "Главная", "link" => "index.php"],
    ["title" => "Блоги", "link" => "posts.php"],
    ["title" => "Пользователи", "link" => "users.php", "isAdmin" => true],
    ["title" => "О нас", "link" => "about.php"],
    ["title" => "Вход", "link" => "login.php", "isGuest" => true],
    ["title" => "Регистрация", "link" => "register.php", "isGuest" => true],
    ["title" => "Выход", "link" => "logout.php",  "isGuest" => false],
];
