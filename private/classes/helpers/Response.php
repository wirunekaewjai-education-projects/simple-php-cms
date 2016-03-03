<?php

class Response
{
    public static function json($arr)
    {
        header('Content-type: application/json');
        echo json_encode($arr, JSON_PRETTY_PRINT);

        exit(0);
    }
}

?>
