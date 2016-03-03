<?php

session_start();
class Session
{
    public static function has($key)
    {
        return isset($_SESSION[$key]) || !empty($_SESSION[$key]);
    }

    public static function get($key, $defaultValue)
    {
        if(!Session::has($key))
            return $defaultValue;

        return $_SESSION[$key];
    }

    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function delete($key)
    {
        if(!empty($_SESSION))
        {
            unset($_SESSION[$key]);
        }
    }
}

?>
