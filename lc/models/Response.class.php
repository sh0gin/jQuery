<?php

class Response
{

    public $user;

    public function __construct(object $user)
    {
        $this->user = $user;
        if ($this->user->request->get("token") && $this->user->isGuest) {
            $this->redirect("index.php");
        }
    }

    public function getLink(string $url, array $param = [])
    {
        if (!$this->user->isGuest && !array_key_exists("token", $param)) {
            $param["token"] = $this->user->token;
        }
        if (!strripos("url", "?") && $param) {
            $url .= "?";
        }
        if ($param) {
            $url .= implode("&", array_map(fn($keys, $elem) => "$keys=$elem", array_keys($param), array_values($param)));
        }
        return $url;
    }
    
    public function redirect(string $url, array $param = [])
    {
        // printd("http://{$this->user->request->take_host()}/{$this->getLink($url,$param)}"); die;
        header("Location: http://{$this->user->request->take_host()}/{$this->getLink($url,$param)}");
    }
}
