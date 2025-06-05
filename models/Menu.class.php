<?php

class Menu
{
    public $val;
    public $response;
    public $user;

    public function __construct($array, $response, $user)
    {
        $this->val = $array;
        $this->response = $response;
        $this->user = $user;
    }

    public function give_html(): string
    {
        $result = "<ul>";

        foreach ($this->val as $elem) {

            if (array_key_exists("isGuest", $elem)) {
                if ($elem["isGuest"] == $this->response->user->isGuest) {
                    if ("/" . $elem["link"] == $_SERVER["SCRIPT_NAME"]) {
                        if ($elem['title'] == "Вход") {
                            $result .= "<li><a class='colorlib-active' href='{$this->response->getLink($elem['link'])}'>$elem[title]</a> / ";
                        } else {
                            $result .= "<a class='colorlib-active' href='{$this->response->getLink($elem['link'])}'>$elem[title]</a></li>";
                        }
                    } else {
                        if ($elem['isGuest'] == false) {
                            $result .= "<li><a href='{$this->response->getLink($elem['link'])}'>$elem[title]({$this->user->login})</a></li>";
                        } else {
                            if ($elem['title'] == "Вход") {
                                $result .= "<li><a href='{$this->response->getLink($elem['link'])}'>$elem[title]</a> / ";
                            } else {
                                $result .= "<a href='{$this->response->getLink($elem['link'])}'>$elem[title]</a>";
                            }
                        }
                    }
                }
            } else if (array_key_exists("isAdmin", $elem)) {
                if ($elem["isAdmin"] == $this->response->user->isAdmin) {
                    if ("/" . $elem["link"] == $_SERVER["SCRIPT_NAME"]) {
                        $result .= "<li class='colorlib-active'><a href='{$this->response->getLink($elem['link'])}'>$elem[title]</a></li>";
                    } else {
                        $result .= "<li><a href='{$this->response->getLink($elem['link'])}'>$elem[title]</a></li>";
                    }
                }
            } else {
                if ("/" . $elem["link"] == $_SERVER["SCRIPT_NAME"]) {
                    $result .= "<li class='colorlib-active'><a href='{$this->response->getLink($elem['link'])}'>$elem[title]</a></li>";
                } else {
                    $result .= "<li><a href='{$this->response->getLink($elem['link'])}'>$elem[title]</a></li>";
                }
            }
        }
        $result .= "<ul>";
        return $result;
    }
}
