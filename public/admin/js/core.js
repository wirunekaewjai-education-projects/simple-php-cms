

function _get(variable)
{
    var query = window.location.search.substring(1);
    var vars = query.split("&");

    for (var i=0;i<vars.length;i++)
    {
        var pair = vars[i].split("=");
        if(pair[0] == variable)
        {
            return pair[1];
        }
    }

    return(false);
}

function ajax_get(options)
{
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function()
    {
        if (xhttp.readyState == 4 && xhttp.status == 200)
        {
            options.success(JSON.parse(xhttp.responseText));
        }
    };

    xhttp.open("GET", options.url, true);
    xhttp.send();
}

function ajax_post(options)
{
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function()
    {
        if (xhttp.readyState == 4 && xhttp.status == 200)
        {
            options.success(JSON.parse(xhttp.responseText));
        }
    };

    var queryString = '';

    if(options.parameters)
    {
        var first = true;
        var params = options.parameters;
        for (var key in params)
        {
            if(!first)
            {
                queryString += '&';
            }
            else
            {
                first = false;
            }

            var param = params[key];
            queryString += key + '=' + param;
        }
    }

    var credential = unescape(get_cookie('credential'));

    xhttp.open("POST", options.url, true);

    if(credential)
    {
        xhttp.setRequestHeader("Authorization", "Basic " + credential);
        // console.log("Basic " + credential);
    }

    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(queryString);
}

// http://www.w3schools.com/js/js_cookies.asp
function get_cookie(cname)
{
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++)
    {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
    }
    return "";
}

function get_excerpt(text)
{
    if(text.length > 55)
        return text.substring(0, 55) + '...';

    return text;
}

function toast(e, type, text)
{
    var html = '<div class="alert alert-' + type + ' alert-dismissible" role="alert">';
    html += '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
    html += text;
    html += '</div>';

    e.innerHTML = html;
}
