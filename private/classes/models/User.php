<?php

class User
{
    public $id;
    public $username;
    //public $password;
    public $email;
    public $created_date;

    public static function select($whereClause, $orderby, $order, $limit, $offset)
    {
        $fields = '`id`, `username`, `email`, `created_date`';
        $sql = DB::select('users', $fields, $whereClause, $orderby, $order, $limit, $offset);

        $assoc = DB::query_assoc($sql);
        $arr = [];

        foreach($assoc as $item)
        {
            $obj = new User();
            $obj->id = intval($item['id']);
            $obj->username = $item['username'];
            //$obj->password = $item['password'];
            $obj->email = $item['email'];
            $obj->created_date = $item['created_date'];

            $arr[] = $obj;
        }

        return $arr;
    }

    public static function insert($username, $password, $email)
    {
        $sql = "INSERT INTO `users`(`username`, `password`, `email`, `created_date`)
                VALUES ('$username', '$password', '$email', NOW())";

        return DB::query_insert_id($sql);
    }
}

?>
