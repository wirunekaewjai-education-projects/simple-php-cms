<?php

class Input
{
    public static function get($key, $defaultValue)
    {
        if(empty($_GET[$key]))
            return $defaultValue;

        return $_GET[$key];
    }

    public static function post($key, $defaultValue)
    {
        if(empty($_POST[$key]))
            return $defaultValue;

        return $_POST[$key];
    }
}

?>
