$(document).ready(function() {
    // Submit changes to database
    $('#save_template').on('click', function() {
        save_template();
    });
});

function save_template(){
    var title = $('#dm_title').val();
    var styles = $('#dm_styles').val();
    var scripts = $('#dm_scripts').val();
    var description = $('#dm_description').val();
    var keywords = $('#dm_keywords').val();
    var author = $('#dm_author').val();
    var top = $('#dm_top').val();
    var bottom = $('#dm_bottom').val();
    $.ajax({
        type: 'POST',
        data: {
            submit: 'submit',
            title: title,
            styles: styles,
            scripts: scripts,
            description: description,
            keywords: keywords,
            author: author,
            top: top,
            bottom: bottom
        },
        beforeSend: function() {
            $('#save_template').button('loading');
        },
        success: function (html) {
            console.log(html);
        },
        complete: function() {
            $('#save_template').button('reset');
        }
    });
}
