<?php
require_once "main.php";
printd($_POST); die;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user->load($_POST);
    if (!$user -> validateRegister()) {
        if ($user->save()) {
            header("Location: index.php"); exit;
        } 
    }
}