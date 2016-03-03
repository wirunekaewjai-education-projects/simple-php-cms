function add()
{
    function onAjaxSuccess(json)
    {
        // var tb = document.getElementById('toast-box');
        // toast(tb, 'success', json.header.msg);
        // console.log(json.header.msg);

        var id = json.body.id;
        window.location = 'edit.php?id=' + id;
    }

    var title = document.getElementById('title');
    var content = document.getElementById('content');

    var opts =
    {
        "url" : "../../api/posts/create.php",
        "parameters" : { 'title' : title.value, 'content' : content.value },
        "success" : onAjaxSuccess
    };

    ajax_post(opts);
}
