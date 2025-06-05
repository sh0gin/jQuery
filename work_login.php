<?php
require_once "main.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user->load($_POST);
    if ($user->validateLogin()) {
        
    } else {
        if ($user->login()) {

            $response->redirect("index.php");
        }
    }
}
