<?php

class Post
{
    public $id;
    public $date;
    public $autor_id;
    public $comments;

    public $title;
    public $preview;
    public $content;

    public $url_image;

    public $valid_title;
    public $valid_preview;
    public $valid_content;

    public $user;
    public $request;
    public $response;

    public function __construct($user, $request, $response)
    {
        $this->user = $user;
        $this->request = $request;
        $this->response = $response;
        if ($this->request->get("id")) {
            $this->findOne($this->request->get("id"));
        }
    }

    public function validate(): bool
    {
        return Asists::validateDate($this);
    }

    public function load_post($array): void
    {
        Asists::loadData($this, $array);
    }

    public function findOne(?int $id = null): bool
    {
        $result = false;
        if ($id) {
            $mas = $this->user->mysql->select("select * from post where id = '$id'");

            $this->load_post($mas[0]);

            $this->date = Asists::format_date(new Datetime($this->date));
            $this->comments = $this->user->mysql->select("SELECT COUNT(*) FROM `comment` WHERE post_id = '$id'")[0]['COUNT(*)'];
            $result = true;
            $this->url_image = $this->user->mysql->select("SELECT image FROM image where post_id ='$id' ORDER BY id DESC limit 1");
            if ($this->url_image) {

                $this->url_image = $this->url_image[0]["image"];
            }
        }

        return $result;
    }

    public function save(): bool
    {
        $content = Asists::replace_rn($this->content);

        if (!$this->request->get("id")) {
            if ($this->user->mysql->query("INSERT into post (autor_id, content, title, preview) VALUES ('{$this->user->id}', '$content', '{$this->title}', '{$this->preview}')")) {
                return true;
            }
        } else {
            if ($this->user->mysql->query("UPDATE post set content = '{$content}', title = '{$this->title}', preview = '{$this->preview}' Where id = '{$this->request->get("id")}'")) {
                return true;
            }
        }
        return false;
    }

    public function save_image($id)
    {
        if ($this->url_image) {

            if ($this->user->mysql->query("INSERT into image (post_id, image) VALUES ('$id', '{$this->url_image}')")) {

                return true;
            };
        }
        return false;
    }
    public function get_date(): bool | string
    {
        return Asists::format_date($this->date);
    }

    public function get_post($limit = false, $offset = 0): array
    {
        if ($_SERVER["SCRIPT_NAME"] == "/posts.php") {
            if ($offset === NULL) {
                $offset = 0;
            } else {
                $offset = ($offset - 1) * 5;
            }
        }

        if (!$limit) {
            $limit = $this->user->mysql->select('SELECT count(id) FROM POST')[0]["count(id)"];
        }

        $result = [];
        foreach ($this->user->mysql->select("SELECT * FROM POST ORDER BY date DESC Limit $limit OFFSET $offset") as $value) {
            $exam_user = new user($this->request, $this->user->mysql);
            $exam_user->identity($value["autor_id"]);
            $exam_post = new static($exam_user, $this->request, $this->response);
            $exam_post->findOne($value['id']);
            $result[] = $exam_post;
        }
        return $result;
    }

    public function get_post_ten(): array
    {
        return $this->get_post(10);
    }

    public function delete_post($id = null): void
    {

        if ($id) {
            $this->findOne($id);
            if ($this->user->isAdmin) {
                $this->user->mysql->query("DELETE FROM POST WHERE id = '{$id}'");
            } else {
                if (!$this->comments) {
                    $this->user->mysql->query("DELETE FROM POST WHERE id = '{$id}'");
                }
            }
        }
    }
}
