<?php

require_once('../../private/autoload.php');

if(!Auth::check())
{
    Redirect::to('./login.php');
}

?>
