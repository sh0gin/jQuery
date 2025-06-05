<?php
require_once "main.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $da = new Datetime($request->post("date_block"));
    $date = $da->format('Y-m-d H:i:s');
    $block->block($date, $request->get("id_c"));
    $response->redirect("users.php");
}

if ($request->get("ban")) {
    $block->vac($request->get("id_c"));
    $response->redirect("users.php");
}
