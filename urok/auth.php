<?php
// понятно что делает
require_once __DIR__ . "/config.php";
//  https://ya.ru/search/ ?  text=1

// https://ya.ru/search/?text=%D0%BC%D0%B0%D0%BC%D0%B0+%D0%BC%D1%8B%D0%BB%D0%B0+%D1%80%D0%B0%D0%BC%D1%83&lr=2&src=suggest_Pers


// https://www.google.com/search?q=%D0%BC%D0%B0%D0%BC%D0%B0+%D0%BC%D1%8B%D0%BB%D0%B0+%D1%80%D0%B0%D0%BC%D1%83&sca_esv=d0a9eaf1d562b5fc&source=hp&ei=EDUbZ9HeMtLUwPAP5o7q4QE&iflsig=AL9hbdgAAAAAZxtDIImazwOtkq0JWR-fPSYROI-dwXWU&ved=0ahUKEwjRpuCz7qiJAxVSKhAIHWaHOhwQ4dUDCA4&uact=5&oq=%D0%BC%D0%B0%D0%BC%D0%B0+%D0%BC%D1%8B%D0%BB%D0%B0+%D1%80%D0%B0%D0%BC%D1%83&gs_lp=Egdnd3Mtd2l6IhrQvNCw0LzQsCDQvNGL0LvQsCDRgNCw0LzRgzIFEAAYgAQyBRAAGIAEMgUQABiABDIFEAAYgAQyBRAAGIAEMgUQABiABDIFEAAYgAQyBRAAGIAEMgUQABiABDIFEAAYgARI3tsBUM3UAVjN1AFwAngAkAEAmAEdoAEdqgEBMbgBA8gBAPgBAvgBAZgCA6ACM6gCCsICFhAAGAMYtAIY5QIY6gIYjAMYjwHYAQHCAhYQLhgDGLQCGOUCGOoCGIwDGI8B2AEBmAMJugYECAEYCpIHATOgB6kG&sclient=gws-wiz

// METHODS HTTP 
// GET
// POST

//// мы проверяем каким методом происходит получения данных, используя суперглобальный массив _SERVER,
// а php скрипт register выполняется когда отправленна форма
if ($_SERVER["REQUEST_METHOD"] == "GET") { 
    $requestror = $_GET['error'] ?? "";
}

    // if ($_SERVER["REQUEST_METHOD"] == "GET") {
    //     if (! empty($_GET)) {
    //         $login  = isset($_GET['login']) ? $_GET['login'] : "";
    //         $password  = isset($_GET['password']) ? $_GET['password'] : ""; 
    //         $name  = isset($_GET['name']) ? $_GET['name'] : ""; 
    //         $age  = isset($_GET['age']) ? $_GET['age'] : "";

    //         // проверка на пустые данные
    //         if (true) {
    //             write([
    //                 'login' => $login,
    //                 'password' => $password,
    //                 'name' => $name,
    //                 'age' => $age,
    //             ]); 
    //         }            

    //         header("Location: " . REGISTER_FILE);
    //         exit;
    //     }
    // }
    
// var_dump($_SERVER);
?>
<!-- HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>
        <?= $requestror ?>
    </p>
    <form action="<?= POST_AUTH ?>" method="post" enctype="multipart/form-data">
        login: <input type="text" name="login"><br>
        password: <input type="text" name="password"><br>
        <input type="submit" value="Отправить">
    </form>
</body>
</html>