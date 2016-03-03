
window.onload = function()
{
    function onAjaxSuccess(json)
    {
        function createRow(tableBody)
        {
            var tr = document.createElement('tr');
            tableBody.appendChild(tr);

            for (var i = 0; i < 5; i++)
            {
                var td = document.createElement('td');
                tr.appendChild(td);
            }

            return tr;
        }

        var tableBody = document.getElementById('table-body');

        var body = json.body;
        var length = body.length;

        for (var i = 0; i < length; i++)
        {
            var item = body[i];
            var tr = createRow(tableBody);
            var tds = tr.childNodes;

            tr.setAttribute('id', 'post-' + item.id);
            tds[0].setAttribute('class', 'td-checkbox');

            tds[0].innerHTML = '<input type="checkbox">';
            tds[1].innerHTML = get_excerpt(item.title);
            tds[2].innerHTML = get_excerpt(item.content);
            tds[3].innerHTML = item.created_date;
            tds[4].innerHTML = item.modified_date;

            var href = './edit.php?id=' + item.id;
            for (var j = 1; j < tds.length; j++)
            {
                var td = tds[j];

                td.setAttribute('class', 'td-clickable');
                td.setAttribute('href', href);
                td.onclick = function()
                {
                    window.location = this.getAttribute('href');
                }
            }
        }

    }

    var queryString = '';
    var search = _get('search');
    if(search)
    {
        queryString = '?search=' + search;
    }

    var opts =
    {
        "url" : "../../api/posts/select.php" + queryString,
        "success" : onAjaxSuccess
    };

    ajax_get(opts);

}

function delete_rows()
{
    if(!confirm('Delete All Checkeds ?'))
        return;

    var tableBody = document.getElementById('table-body');
    var trs = tableBody.getElementsByTagName('tr');

    for (var i = 0; i < trs.length;)
    {
        var tr = trs[i];
        var ck = tr.getElementsByTagName('input')[0];

        if(ck.checked)
        {
            var id = tr.id.split('-')[1];
            tableBody.removeChild(tr);

            function onAjaxSuccess(json)
            {
                var tb = document.getElementById('toast-box');
                toast(tb, 'success', json.header.msg);

                //console.log(json.header.msg);
            }

            var opts =
            {
                "url" : "../../api/posts/delete.php",
                "parameters" : { 'id' : id },
                "success" : onAjaxSuccess
            };

            ajax_post(opts);
        }
        else
        {
            i++;
        }
    }
}
