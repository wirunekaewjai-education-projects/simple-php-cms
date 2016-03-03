<?php

require_once('../../private/autoload.php');

Request::accept('GET');

$fields = ['id', 'username', 'email'];
$whereClause = DB::where($_GET, $fields);
$orderby = DB::orderby($_GET, 'created_date');
$order = DB::order($_GET, 'DESC');
$limit = DB::limit($_GET);
$offset = DB::offset($_GET);

$items = User::select($whereClause, $orderby, $order, $limit, $offset);
$result =
[
    'header' =>
    [
        'code' => 200,
        'msg'  => 'Success'
    ],
    'body' => $items
];

Response::json($result);

?>
