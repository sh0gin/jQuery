<?php
require_once "main.php";

// printd($_POST);
// printd($_GET);
// die;

if (!$mysql->repeat_check("post", "id", $request->get("id"))) {
    $response->redirect("index.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (!$user->isAdmin && !$user->isGuest) {
        $comment->load_comment($_POST);

        $comment->post->findOne($request->get("id"));
        
        // if ($comment->validate()) {

        // } else {
        //     if ($comment->save()) {
        //         $response->redirect("post.php", ["id" => $request->get("id")]);
        //     }
        // }
        if (!$comment->validate()) {
            if($request->get("comment_id")) {
                if ($comment->save($request->get("comment_id"))) {
                    $response->redirect("post.php", ["id" => $request->get("id")]);
                }
            } else {
                if ($comment->save()) {
                    $response->redirect("post.php", ["id" => $request->get("id")]);
                }
            }
        } 
    }
}

if ($request->get("id")) {
	$login = $mysql->select("SELECT login FROM USER WHERE id = '{$mysql->select("SELECT autor_id FROM POST WHERE id = '{$request->get('id')}'")[0]['autor_id']}'")[0]['login'];
}
if ($request->get("token")) {
	$mylogin = $mysql->select("SELECT login from USER where token = '{$request->get("token")}'")[0]['login'];
} else {
	$mylogin = false;
}

// if ($request->get("id")) {
//     $post->findOne($request->get("id"));
// } else {
//     $response->redirect("index.php");
// }

// $mas = $mysql->select("SELECT * FROM post WHERE id = '{$request->get("id")}'");
// var_dump($post); die;