<?php

class DB
{
    private static function connect()
    {
        global $settings;

        $database = $settings['database'];
        $server_name = $database['server_name'];
        $database_name = $database['database_name'];
        $username = $database['username'];
        $password = $database['password'];

        $conn = new mysqli($server_name, $username, $password, $database_name);

        // Check connection
        if ($conn->connect_error)
        {
            if($settings['debug'])
            {
                $assoc['header'] = [ 'code' => 500, 'msg' => "Connection failed: " . $conn->connect_error ];
                Response::json($result);
            }

            exit(0);
        }

        return $conn;
    }

    public static function query_assoc($sql)
    {
        $conn = DB::connect();
        $result = $conn->query($sql);

        $assoc = [];
        if ($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                $assoc[] = $row;
            }
        }

        $conn->close();
        return $assoc;
    }

    public static function query_bool($sql)
    {
        $conn = DB::connect();
        $result = $conn->query($sql);

        $b = boolval($result);
        $conn->close();

        return $b;
    }

    public static function query_insert_id($sql)
    {
        $conn = DB::connect();
        $result = $conn->query($sql);

        $b = false;
        if($result === TRUE)
        {
            $b = $conn->insert_id;
        }

        $conn->close();

        return $b;
    }


    public static function select($table, $whereClause, $orderby, $order, $limit, $offset)
    {
        $sql = "SELECT * FROM `$table`";

        if($whereClause)
        {
            $sql .= " WHERE " . $whereClause;
        }

        if($orderby)
        {
            $sql .= " ORDER BY " . $orderby;

            if($order)
            {
                $sql .= " " . $order;
            }
        }

        if($limit)
        {
            $sql .= " LIMIT " . $limit;
        }

        if($offset)
        {
            $sql .= " OFFSET " . $offset;
        }

        return $sql;
    }

    public static function where($inputs, $fields)
    {
        $whereClause = '';

        if(!empty($inputs['search']))
        {
            $keyword = $inputs['search'];

            $length = sizeof($fields);
            for($i = 0; $i < $length; $i++)
            {
                $field = $fields[$i];
                $whereClause .= "`$field` LIKE '%$keyword%'";

                if($i + 1 < $length)
                {
                    $whereClause .= " OR ";
                }
            }
        }
        else
        {
            // Query by Table Field
            foreach($fields as $field)
            {
                if(!empty($inputs[$field]))
                {
                    $value = $inputs[$field];
                    $whereClause = "`$field` LIKE '%$value%'";

                    break;
                }
            }
        }

        return $whereClause;
    }

    public static function orderby($inputs, $defaultValue)
    {
        if(!empty($inputs['orderby']))
        {
            return $inputs['orderby'];
        }

        return '';
    }

    public static function order($inputs, $defaultValue)
    {
        if(!empty($inputs['order']))
        {
            return $inputs['order'];
        }

        return '';
    }

    public static function limit($inputs)
    {
        if(!empty($inputs['limit']))
        {
            return $inputs['limit'];
        }

        return 25;
    }

    public static function offset($inputs)
    {
        if(!empty($inputs['offset']))
        {
            return $inputs['offset'];
        }

        return 0;
    }
}

?>
