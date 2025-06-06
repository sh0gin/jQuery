<?php

class Pagination
{
    public $mysql;
    public $response;

    public function __construct($mysql, $response)
    {
        $this->mysql = $mysql;
        $this->response = $response;
    }

    public function give_html($num_string) 
    {
        if ($num_string === NULL) {
            $num_string = 1;
        }
        $final = ceil($this->mysql->select("SELECT COUNT(*) FROM POST")[0]['COUNT(*)'] / 5);
        $result = "<div class='row'><div class='col'><div class='block-27'><ul>";
        $i = 1;

        if ($num_string != 1) {
            $result.= "<li><a href='{$this->response->getLink("posts.php", ["num" => $num_string-1])}'>&lt;</a></li> ";
        } 

        while ($i <= $final) {
            if ($i != $num_string) {
                $result .= "<li><a href='{$this->response->getLink("posts.php", ["num" => $i])}'>$i</a></li> ";
            } else {
                $result .= "<li class='active'><span>$i</span></li> ";
            }
            $i++;
        };

        if ($num_string != $final) {
            $result .= "<li><a href='{$this->response->getLink("posts.php", ["num" => $num_string+1])}'>&gt;</a></li>";
        }
        
        $result .= "</ul></div></div></div>";
        return $result;
    }
}
