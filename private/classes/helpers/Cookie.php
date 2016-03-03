<?php

class Cookie
{
    public static function has($key)
    {
        return isset($_COOKIE[$key]) || !empty($_COOKIE[$key]);
    }

    public static function get($key, $defaultValue)
    {
        if(!Cookie::has($key))
            return $defaultValue;

        return $_COOKIE[$key];
    }

    public static function set($key, $value, $day)
    {
        setcookie($key, $value, time() + (86400 * $day), "/");
    }

    public static function delete($key)
    {
        unset($_COOKIE[$key]);
        setcookie($key, "", -3600, "/");
    }
}

?>
