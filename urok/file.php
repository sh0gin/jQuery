<?php


define( "UPLOADS_PATH", __DIR__ . "/uploads/");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_FILES["avatar"]) && empty($_FILES['avarat']['error'])) {
            $fileTemp = $_FILES['avatar']['tmp_name'];
            $fileName = UPLOADS_PATH . $_FILES['avatar']['name'];
            if (move_uploaded_file($fileTemp, $fileName)){
                echo "file uppload!!!";
                die;
            }
        }
        var_dump($_POST);
        var_dump($_FILES);
        sleep(10);
        die;
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
    <form action="" method="post" enctype="multipart/form-data" >
        login: <input type="text" name="login"><br>
        password: <input type="text" name="password"><br>
        аватар: <input type="file" name="avatar"> <br>       
        <input type="submit" value="Отправить">


    </form>
</body>
</html>