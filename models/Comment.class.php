<?php

class Comment
{
    public $id;
    public $date;
    public $autor_id;
    public $post_id;
    public $comment_id;
    public $message;
    public $valid_message;

    public $user;
    public $request;
    public $post;
    public $response;

    public function __construct($user, $request, $post, $response)
    {
        $this->user = $user;
        $this->request = $request;
        $this->post = $post;
        $this->response = $response;
    }

    public function validate()
    {
        return Asists::validateDate($this);
    }

    public function load_comment($array)
    {
        Asists::loadData($this, $array);
    }

    public function findOne(?int $id = null): bool
    {
        $result = false;
        if ($id) {
            $mas = $this->user->mysql->select("select * from comment where id = '$id'");
            $this->load_comment($mas[0]);

            $this->date = Asists::format_date(new Datetime($this->date));
            $result = true;
        }

        return $result;
    }

    public function save($comment = null): bool
    {

        $message = Asists::replace_rn($this->message);
        if ($comment === null) {
            if ($this->user->mysql->query("INSERT into comment (autor_id, message, post_id) VALUES ('{$this->user->id}', '$message', '{$this->post->id}')")) {
                return true;
            }
        } else {
            if ($this->user->mysql->query("INSERT into comment (autor_id, message, post_id, comment_id) VALUES ('{$this->user->id}', '$message', '{$this->post->id}', $comment)")) {
                return true;
            }
        }

        return false;
    }

    public function get_date()
    {
        return Asists::format_date($this->date);
    }

    public function get_comments(): array
    {

        $result = [];
        $answers = [];
        foreach ($this->user->mysql->select("SELECT * FROM COMMENT WHERE post_id = '{$this->request->get("id")}' ORDER BY comment_id, date DESC") as $value) {
                $exam_user = new User($this->request, $this->user->mysql);
                $exam_user->identity($value["autor_id"]);
    
                $exam_post = new Post($exam_user, $this->request, $this->response);
                $exam_post->findOne($value["post_id"]);
                
                $exam_comment = new static($exam_user, $exam_post, $this->post, $this->response);
                $exam_comment->findOne($value['id']);

            if (!$value['comment_id']) {
                $result[] = $exam_comment;
            } else {
                $answers[] = $exam_comment;
            }

        }


        foreach ($answers as $value) {

            $index = array_shift(array_filter(array_map(fn ($elem, $key) =>
            $elem->id == $value->comment_id ? $key : "", $result, array_keys($result)), fn($elem) => is_int($elem))); // индекс элемента к которому принадлежит комментарий
            $result = array_merge(array_slice($result, 0, $index+1), [$value], array_slice($result, $index+1));
        }

        return $result;
    }

    public function delete_comment($id = null)
    {
        if ($id) {
            $this->user->mysql->query("DELETE FROM COMMENT WHERE id = '{$id}'");
        }
    }
}
