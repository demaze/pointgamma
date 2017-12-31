$(document).ready(function () {
    var uniqueDblclick = false;
    $("#desc").bind("dblclick", function () {
        if (!uniqueDblclick) {
            OriginalText = $(this).html();
            uniqueDblclick = true;
            $(this).html("<form id='formDesc' method='post' action='content/content_bars_desc.php?todo=changeDesc'><input type='text' class='editBox' name='contentDesc' value='" + OriginalText + "' /><input type='submit' value='change' /> </form>");
        }
    });
});

$('body').delegate('#formDesc', 'submit', function (e) {
    e.preventDefault();
    var form = $(this);
    var post_url = form.attr('action');
    var post_data = form.serialize();
    $.ajax({
        type: 'POST',
        url: post_url,
        data: post_data,
        success: function (msg) {
            $(form).fadeOut(500, function () {
                form.html(msg).fadeIn();
            });
        }
    });
});