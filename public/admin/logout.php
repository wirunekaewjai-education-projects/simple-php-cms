<?php

require_once('../../private/autoload.php');

if(Auth::logout())
{
    Redirect::to('./login.php');
}
else
{
    Redirect::to('./index.php');
}

?>
