$(document).ready(function() {
    // Submit changes to database
    $('.save_settings').on('click', function() {
        save_settings();
    });
});

function save_settings(){
    var title = $('#dm_title').val();
    var styles = $('#dm_styles').val();
    var scripts = $('#dm_scripts').val();
    var description = $('#dm_description').val();
    var keywords = $('#dm_keywords').val();
    var author = $('#dm_author').val();

    console.log(author);

    $.ajax({
        type: 'POST',
        data: {
            submit: 'submit',
            mode: 'system',
            title: title,
            styles: styles,
            scripts: scripts,
            description: description,
            keywords: keywords,
            author: author
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
