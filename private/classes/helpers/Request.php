<?php

class Request
{
    public static function method($name)
    {
        return $_SERVER['REQUEST_METHOD'] === $name;
    }

    public static function accept($method)
    {
        if($_SERVER['REQUEST_METHOD'] !== $method)
        {
            $response =
            [
                'header' =>
                [
                    'code' => 400,
                    'msg'  => 'Wrong Request Method'
                ]
            ];

            Response::json($response);
        }
    }

    public static function validate($inputs, $keys)
    {
        for($i = 0; $i < sizeof($keys); $i++)
        {
            $key = $keys[$i];
            if(empty($inputs[$key]))
            {
                $response['header'] =
                [
                    'code' => 400,
                    'msg' => "Input \'$key\' is empty"
                ];

                Response::json($response);
            }
        }
    }

    public static function authorized()
    {
        $b1 = empty($_SERVER['PHP_AUTH_USER']);
        $b2 = empty($_SERVER['PHP_AUTH_PW']);

        if($b1 || $b2)
        {
            $response['header'] =
            [
                'code' => 400,
                'msg' => "Unauthorized"
            ];

            Response::json($response);
        }

        $username = $_SERVER['PHP_AUTH_USER'];
        $password = md5($_SERVER['PHP_AUTH_PW']);

        $where = "`username` = '$username' AND `password` = '$password'";
        if(sizeof(User::select($where, '', '' , '', '')) <= 0)
        {
            $response['header'] =
            [
                'code' => 400,
                'msg' => "Unauthorized"
            ];

            Response::json($response);
        }
    }
}

?>
