<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emp->load($_POST);
    // var_dump($emp);
    if ($emp -> validateRegister()) {

    } else {
        die;
    }
}