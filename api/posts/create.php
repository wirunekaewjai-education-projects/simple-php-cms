<?php

require_once('../../private/autoload.php');

Request::authorized();
Request::accept('POST');
Request::validate($_POST, ['title']);

$inputs = $_POST;
$title = $inputs['title'];
$content = (!empty($inputs['content'])) ? $inputs['content'] : '';

$id = Post::insert($title, $content);
if($id)
{
    $result =
    [
        'header' =>
        [
            'code' => 200,
            'msg'  => 'Create post successfully'
        ],
        'body' =>
        [
            'id' => $id
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
            'msg'  => 'Create post failed'
        ]
    ];

    Response::json($result);
}

?>
