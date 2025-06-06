<?php

class Block
{

    public $user;
    public $post;

    public function __construct($user, $post) {
        $this->user = $user;
        $this->post = $post;
    }

    public function block($date, $user_id) { // time
        if (!($this->user->mysql->select("SELECT role FROM user where id = '$user_id'")[0]['role'])) {
            $this->user->mysql->query("INSERT into block (date_end, user_id)
            VALUES ('$date', '$user_id')");
            $this->user->mysql->query("UPDATE user SET token = NULL WHERE id = '{$user_id}'");
        }
    }

    public function vac($user_id) { // always
        if (!($this->user->mysql->select("SELECT role FROM user where id = '$user_id'")[0]['role'])) {
            $this->user->mysql->query("INSERT into block (user_id) VALUES ('$user_id')");
            $this->user->mysql->query("UPDATE user SET token = NULL WHERE id = '{$user_id}'");
            foreach ($this->user->mysql->select("SELECT id FROM post where autor_id = '$user_id'") as $value) {
                $this->post->delete_post($value["id"]); // удивлён, что работает
            }
        }
    }


}