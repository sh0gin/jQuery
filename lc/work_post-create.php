<?php
require_once __DIR__ . "/main.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && $request->get("id")) {
    $post->findOne($request->get("id"));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // if (!$request->post("message")) {
        if (!$user->isAdmin && !$user->isGuest) {
            if (isset($_FILES["image"]) && empty($_FILES['image']['error'])) {
                $fileTemp = $_FILES['image']['tmp_name'];
                $fileName = "images/" . $_FILES['image']['name'];
                if (move_uploaded_file($fileTemp, $fileName)){
                    $post->url_image = $fileName;
                    
            }
        }
        $post->load_post($_POST);
        if (!$post->validate()) {
            if ($post->save()) {
                if ($request->get("id")) {
                    $id = $request->get("id");
                 } else {
                    $id = $post->user->mysql->insert_id;
                }

                $post->save_image($id);
                $post->findOne($id);
                $response->redirect("post.php", ["id" => $id]);
            }
        }
    } else {
        $response->redirect("index.php");
    }
}
