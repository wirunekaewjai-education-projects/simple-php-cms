<?php require_once('auth.php'); ?>
<?php require_once('header.php'); ?>
<?php require_once('menu.php'); ?>

<div class="container">
    <div class="padding-box">
        <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label>Content</label>
            <textarea class="form-control" id="content" name="content" ></textarea>
        </div>
        <br>
        <button class="btn btn-default btn-fullwidth" onclick="add()">Save</button>
    </div>
</div>

<script src="js/add.js"></script>
<?php require_once('footer.php'); ?>
