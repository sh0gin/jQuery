<?php

require_once "main.php";
// printd($request->get()); die;
$post->delete_post($request->get("id"));
$response->redirect("index.php", [$request->get("token")]);