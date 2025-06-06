<?php
require_once "main.php";
// printd($_POST);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user->load($_POST);
    if (!$user -> validateRegister()) {
        // var_dump($user->save());
        if ($user->save()) {

            // header("Location: index.php"); exit;
        } 
    }
}