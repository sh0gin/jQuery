<?php

const REGISTER_FILE = 'register.php';
const AUTH_FILE = 'auth.php';
const POST_REGISTER = 'post_register.php';
const POST_AUTH = "post_auth.php";
const FOLDER_DB = "data";
const ACCOUNT_FILE = "account.php";
const MAIN_FILE = "main.php";
const FILE_DB = "user.db";
const FOLDER_UPLOAD = "/uploads/";

$dirName = pathinfo($_SERVER["SCRIPT_NAME"])['dirname'];
define("UPLOAD_URL", ($dirName == "\\" ? "" : $dirName) . FOLDER_UPLOAD);

define( "UPLOADS_PATH", __DIR__ . FOLDER_UPLOAD);

define("PATH_FILE_DB", __DIR__ . "/" . FOLDER_DB . "/" . FILE_DB); // путь к базе данных