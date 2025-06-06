<?php

class Asists
{
    public static function load(object $class, ?array $array = null): bool
    {
        if ($array) {
            foreach ($array as $key => $value) {
                if (property_exists($class, $key)) {
                    $class->$key = $value;
                }
            }
            return true;
        }
        return false;
    }

    public static function validateDate(object $class): bool
    {
                $result = false;
        $mas = get_object_vars($class);

        $result = false;
        foreach ($mas as $key => $value) {

            if (str_contains($key, "valid")) {
                $form = str_replace("valid_", "", $key);

                if (is_null($class->request->parameter_cleaning($class->$form)) || $class->request->parameter_cleaning($class->$form) === "") {
                    $class->$key = "Пустое либо некорректное значение";
                    $result = true;
                }
                
            };
        }
        return $result;
    }

    public static function loadData($class, $mas)
    {
        foreach ($mas as $key => $value) {
            if (property_exists($class, $key)) {
                $class->$key = $value;
            }
        }
    }

    public static function replace_rn($string): string | false
    {
        if ($string != null) {
            return preg_replace('/\v+|\\\r\\\n/ui', '<br/>', $string);
        } else {
            return false;
        }
    }

    public static function replace_br($string): string | false
    {
        if ($string != null) {
            return str_replace('<br/>', '\r\n', $string);
        } else {
            return false;
        }
    }

    public static function format_date(object $object_date): string | false {
        if ($object_date) {
            return $object_date->format('d.m Y H:i:s');
        } else {
            return false;
        }
    }

}
