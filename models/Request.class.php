<?php

class Request
{
    public $isPost = false;
    public $isGet = false;

    public function __construct()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->isPost = true;
        } else {
            $this->isGet = true;
        }
    }

    public function parameter_cleaning($value)
    {
        if (!is_null($value)) {
            return trim(strip_tags($value));
        } else {
            return null;
        }
        
    }

    public function array_cleaning($arr)
    {
        foreach ($arr as &$value) {
            if (!is_array($value)) {
                $value = $this->parameter_cleaning($value);
            } else {
                $value = $this->array_cleaning($value);
            }
        }

        return $arr;
    }

    public function post($param = null)
    {
        if ($this->isPost) {
            if ($param === null) {
                return $this->array_cleaning($_POST);
            } else {
                if ($_POST && array_key_exists($param, $_POST)) {
                    return $this->parameter_cleaning($_POST[$param]);
                }
            }
        }
        return null;
    }

    public function get($param = null)
    {

            if ($param === null) {
                return $this->array_cleaning($_GET);
            } else {
                if ($_GET && array_key_exists($param, $_GET)) {
                    return $this->parameter_cleaning($_GET[$param]);
                }
            }
        return null;
    }

    public function take_host()
    {
        return $_SERVER["HTTP_HOST"];
    }


    public function take_token()
    {
        if (array_key_exists("token", $_GET)) {
            return $_GET['token'];
        } else {
            return null;
        }
    }

}
