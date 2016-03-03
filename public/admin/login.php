<?php

require_once('../../private/autoload.php');
require_once('header.php');

if(Auth::check())
{
    Redirect::to('./index.php');
}

$username = Input::post('username', '');
$password = Input::post('password', '');

if(Auth::login($username, $password)) :

    Redirect::to('./index.php');

elseif(Request::method('POST')) : ?>

<div class="container">
    <br>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Oops!</strong> Username or Password is incorrect.
    </div>
</div>

<?php endif; ?>

<div class="container">
    <div class="padding-box">
        <form method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $username; ?>" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo $password; ?>" required>
            </div>
            <br>
            <button type="submit" class="btn btn-default btn-fullwidth">Login</button>
        </form>
    </div>
</div>

<?php require_once('footer.php') ?>
