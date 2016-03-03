<?php

class Auth
{
    public static function login($username, $password)
    {
        if(empty($username) || empty($password))
        {
            return false;
        }

        $encoded = md5($password);
        $where = "`username` = '$username' AND `password` = '$encoded'";
        if(sizeof(User::select($where, '', '', '', '')) > 0)
        {
            $credential = base64_encode($username . ':' . $password);
            Cookie::set('credential', $credential, 30);
            return true;
        }

        return false;
    }

    public static function logout()
    {
        if(Auth::check())
        {
            Cookie::delete('credential');
            return true;
        }

        return false;
    }

    public static function check()
    {
        return Cookie::has('credential');
    }

    public static function get_credential()
    {
        return Cookie::get('credential', '');
    }
}

?>
