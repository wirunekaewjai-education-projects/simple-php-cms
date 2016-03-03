<?php

require_once('../../private/autoload.php');

Request::accept('POST');
Request::validate($_POST, ['username', 'password', 'email']);

$inputs = $_POST;
$username = $inputs['username'];
$password = $inputs['password'];
$email = $inputs['email'];

if(User::insert($username, $password, $email))
{
    $result =
    [
        'header' =>
        [
            'code' => 200,
            'msg'  => 'Register successfully'
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
            'msg'  => 'Register failed'
        ]
    ];

    Response::json($result);
}

?>
