<?php
require_once "main.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user->load($_POST);
    if (!$user -> validateRegister()) {
        if ($user->save()) {
        } 
    }
}