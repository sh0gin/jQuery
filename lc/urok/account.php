<?php
require_once __DIR__ . "/function.php";
VAR_DUMP(FOLDER_UPLOAD);
var_dump(pathinfo($_SERVER["SCRIPT_NAME"]));
$user =false;
if (isset($_GET['id'])) {
    $user = userIdentity($_GET["id"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if ($user): ?>
        <p> Login: <?=$user["login"]?></p>
        <p> Name: <?=$user["name"]?></p>
        <p> Age: <?=$user["age"]?></p>
        <img
         src="<?= UPLOAD_URL . $user['file']?>" 
         alt=""
         style="width: 150px";
        >
    <?php endif ?>
    <p>
        <a href="<?= MAIN_FILE ?>">Выход</a><br>
    </p>
</body>
</html>
