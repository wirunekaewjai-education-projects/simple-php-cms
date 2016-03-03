<?php

require_once('../../private/autoload.php');

Request::authorized();
Request::accept('POST');
Request::validate($_POST, ['id']);

if(Post::delete($_POST['id']))
{
    $result =
    [
        'header' =>
        [
            'code' => 200,
            'msg'  => 'Delete successfully'
        ]
    ];

    Response::json($result);
}
else
{
    $result =
    [
        'header' =>
        [
            'code' => 400,
            'msg'  => 'Delete failed'
        ]
    ];

    Response::json($result);
}

?>
