<?php require_once('auth.php'); ?>
<?php require_once('header.php'); ?>
<?php require_once('menu.php'); ?>

<?php

$id = Input::get('id', 0);
if($id <= 0)
{
    Redirect::to('./index.php');
}

$title = Input::post('title', '');
$content = Input::post('content', '');
$created_date = Input::post('created_date', '');//Date::now('Y-m-d H:i:s'));

?>

<div class="container">

    <div id="toast-box"></div>

    <div class="padding-box">
        <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" id="title" name="title" value="<?php echo $title; ?>" required>
        </div>
        <div class="form-group">
            <label>Content</label>
            <textarea class="form-control" id="content" name="content" ><?php echo $content; ?></textarea>
        </div>
        <br>
        <div class="form-group">
            <label>Published Date</label>
            <input type="text" class="form-control" id="created_date" value="<?php echo $created_date; ?>" disabled>
            <!-- <input type="time" class="form-control" name="created_date" value="<?php echo $created_date; ?>" required> -->
        </div>
        <br>
        <button class="btn btn-default btn-fullwidth" onclick="update(<?php echo $id; ?>)">Save</button>
    </div>
</div>

<script src="js/edit.js"></script>
<?php require_once('footer.php'); ?>
