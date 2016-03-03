<?php

class Date
{
    public static function now($pattern)
    {
        global $settings;

        date_default_timezone_set($settings['timezone']);
        return date($pattern);
    }
}

?>
