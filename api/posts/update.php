<?php

require_once('../../private/autoload.php');

Request::authorized();
Request::accept('POST');
Request::validate($_POST, ['id', 'title']);

$inputs = $_POST;
$id = $inputs['id'];
$title = $inputs['title'];
$content = (!empty($inputs['content'])) ? $inputs['content'] : '';

if(Post::update($id, $title, $content))
{
    $result =
    [
        'header' =>
        [
            'code' => 200,
            'msg'  => 'Update post successfully'
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
            'msg'  => 'Update post failed'
        ]
    ];

    Response::json($result);
}

?>
