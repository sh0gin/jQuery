<?php
require_once __DIR__ . "/function.php";


if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    if (! empty($_POST)) {
        $login  = isset($_POST['login']) ? $_POST['login'] : "";
        $password  = isset($_POST['password']) ? $_POST['password'] : ""; 
        
        // trim (strip_tags())
        // проверка на пустые данные
        if (true) {
            $result = userAuth([
                'login' => $login,
                'password' => $password,
            ]); 

            if (is_string($result)) { // не понятно что это
                $result = "?error=" . $result;
            } else {
                header("Location: " . ACCOUNT_FILE . "?id=$result");
                exit;
            }
            
        }            


    }
    
    header("Location: " . AUTH_FILE . $result);
    exit; // ? что делает ?
}
