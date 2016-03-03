<?php require_once('auth.php'); ?>
<?php require_once('header.php'); ?>
<?php require_once('menu.php'); ?>

<div class="container">
    <br><div id="toast-box"></div>
    <form class="navbar" role="search">
        <div class="form-group">
            <input type="text" class="form-control" name="search" placeholder="Search..." value="<?php echo Input::get('search', ''); ?>">
        </div>
        <input type="submit" hidden="true">
    </form>

    <table id="table" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th> </th>
                <th>Title</th>
                <th>Excerpt</th>
                <th>Created Date</th>
                <th>Modified Date</th>
            </tr>
        </thead>
        <tbody id="table-body">
        </tbody>
    </table>

    <div class="row">
        <div class="col-xs-3">
            <button class="btn btn-default" onclick="delete_rows()">Delete</button>
        </div>
    </div>

</div>
<script src="js/index.js" ></script>
<?php require_once('footer.php') ?>
