<?php

require_once('../../private/autoload.php');

Request::accept('GET');

$fields = ['id', 'title', 'content', 'created_date', 'modified_date'];
$whereClause = DB::where($_GET, $fields);
$orderby = DB::orderby($_GET, 'created_date');
$order = DB::order($_GET, 'DESC');
$limit = DB::limit($_GET);
$offset = DB::offset($_GET);

$items = Post::select($whereClause, $orderby, $order, $limit, $offset);
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
