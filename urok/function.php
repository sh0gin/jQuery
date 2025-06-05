<?php
require_once __DIR__ . "/config.php";

function read(): array {    
    if (file_exists(PATH_FILE_DB)) {
        if ($data = file_get_contents(PATH_FILE_DB)) {
            return json_decode($data, true); // можно ещё раз подробно про json_decode
        }
    }

    return [];
}

function write(array $data): bool|string {
    $dataFile = read();
    // проверка на 
    if (array_filter($dataFile, fn($user) => $user['login'] == $data['login'])) {
        // return "Пользователь с таким именем уже существует";
        return "user: {$data['login']} is exist!!!";
    }

    $fieldName = $data['file'];
    // error - код ошибки который возникая при загрузке
    if (isset($_FILES[$fieldName]) && empty($_FILES[$fieldName]['error'])) { // что делает константа _FILES \ как я понял, когда мы используем POST появляется константа _FILES со всеми данными об озображении
        $fileTemp = $_FILES[$fieldName]['tmp_name']; // временное имя файла
        $fileName = str_replace(' ', '_', microtime()) 
            . '.' 
            . pathinfo($_FILES[$fieldName]['name'])['extension'] // pathinfo - возвращает информацию о пути файла
            ;
        if (move_uploaded_file($fileTemp, UPLOADS_PATH . $fileName)) { // move_uploaded_file — Перемещает загруженный файл в новое место
            $data['file'] = $fileName;  
            return (bool)file_put_contents(PATH_FILE_DB, // file_put_contents — Записывает данные в файл
                json_encode([...$dataFile, $data])
            ); 
        }
    }

    return "ошибка регистрации";
    
    // $dataFile[] = $data;
    // return (bool)file_put_contents(PATH_FILE_DB, json_encode($dataFile));
   
}

function userAuth(array $data): int | string {
    if ($dataFile = read()){
        foreach($dataFile as $id => $user) {
        if ($user["login"] == $data["login"] && $user['password'] == $data['password']) {
            return $id;
        };
    } 

    return "Ошибка аутентификации";
}
}

function userIdentity(int $id): array| bool {
    if ($dataFile = read()) {
        if (array_key_exists($id, $dataFile)) {
            return $dataFile[$id];
        }
    }
    return false;
}