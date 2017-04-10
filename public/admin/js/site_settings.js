$(document).ready(function() {
    // Submit changes to database
    $('.save_settings').on('click', function() {
        save_settings($(this));
    });
});

function save_settings(obj){
    var title = $('#dm_title').val();
    var styles = $('#dm_styles').val();
    var scripts = $('#dm_scripts').val();
    var description = $('#dm_description').val();
    var keywords = $('#dm_keywords').val();
    var author = $('#dm_author').val();
    var url = $('#dm_url').val();
    var alias = $('#dm_alias').val();

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
            author: author,
            url: url,
            alias: alias
        },
        beforeSend: function() {
            obj.attr('disabled', true);
        },
        success: function (html) {
            console.log(html);
        },
        complete: function() {
            obj.attr('disabled', false);
        }
    });
}
