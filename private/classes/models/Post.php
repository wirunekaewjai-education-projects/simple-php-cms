<?php

class Post
{
    public $id;
    public $title;
    public $content;
    public $created_date;
    public $modified_date;

    public static function select($whereClause, $orderby, $order, $limit, $offset)
    {
        $sql = DB::select('posts', $whereClause, $orderby, $order, $limit, $offset);

        $assoc = DB::query_assoc($sql);
        $arr = [];

        foreach($assoc as $item)
        {
            $obj = new Post();
            $obj->id = intval($item['id']);
            $obj->title = $item['title'];
            $obj->content = $item['content'];
            $obj->created_date = $item['created_date'];
            $obj->modified_date = $item['modified_date'];

            $arr[] = $obj;
        }

        return $arr;
    }

    public static function insert($title, $content)
    {
        $sql = "INSERT INTO `posts`(`title`, `content`, `created_date`, `modified_date`)
                VALUES ('$title', '$content', NOW(), NOW())";

        return DB::query_insert_id($sql);
    }

    public static function update($id, $title, $content)
    {
        $sql = "UPDATE `posts` SET `title`='$title',`content`='$content', `modified_date`=NOW() WHERE id=$id";

        return DB::query_bool($sql);
    }

    public static function delete($id)
    {
        $sql = "DELETE FROM `posts` WHERE `id` = $id";

        return DB::query_bool($sql);
    }
}

?>
