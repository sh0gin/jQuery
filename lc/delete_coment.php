<?php

require_once "main.php";

$comment->delete_comment($request->get("comment_id"));

$response->redirect("post.php",  $request->get());