window.onload = function()
{
    function onAjaxSuccess(json)
    {
        var title = document.getElementById('title');
        var content = document.getElementById('content');
        var created_date = document.getElementById('created_date');

        var item = json.body[0];

        title.value = item.title;
        content.value = item.content;
        created_date.value = item.created_date;
    }

    var queryString = '';
    var search = _get('id');
    if(search)
    {
        queryString = '?id=' + search;
    }

    var opts =
    {
        "url" : "../../api/posts/select.php" + queryString,
        "success" : onAjaxSuccess
    };

    ajax_get(opts);
}

function update(id)
{
    function onAjaxSuccess(json)
    {
        var tb = document.getElementById('toast-box');
        toast(tb, 'success', json.header.msg);
        // console.log(json.header.msg);
    }

    var title = document.getElementById('title');
    var content = document.getElementById('content');

    var opts =
    {
        "url" : "../../api/posts/update.php",
        "parameters" : { 'id' : id, 'title' : title.value, 'content' : content.value },
        "success" : onAjaxSuccess
    };

    ajax_post(opts);
}
