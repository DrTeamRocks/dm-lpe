$(document).ready(function () {

    $('#sections')
        .accordion({
            active: false,
            header: 'div.panel-heading'
        })
        .sortable({
            items: '.s_panel',
            stop: function (event, ui) {
                console.log('done');
            }
        });

    $('#section_add').on('click', function () {
        section_add();
    });

    $('.section_save').on('click', function () {
        section_save($(this));
    });

});

/**
 * Update selected section
 *
 * @param obj
 */
function section_save(obj) {
    console.log(obj);

    var id = obj.parent().data('id');
    var title = obj.parent().find('.dm_title').val();
    var panel_title = obj.parent().parent().find('.panel-title');
    var section_id = obj.parent().find('.dm_id').val();
    var section_class = obj.parent().find('.dm_class').val();
    var content = obj.parent().find('.dm_textarea').val();

    $.ajax({
        type: 'POST',
        data: {
            submit: 'submit',
            mode: 'update',
            id: id,
            title: title,
            section_id: section_id,
            section_class: section_class,
            content: content
        },
        beforeSend: function () {
            obj.button('loading');
        },
        success: function (html) {
            console.log(html);
            panel_title.html(title);
            //window.location.reload();
        },
        complete: function () {
            obj.button('reset');
        }
    });
}

/**
 * Add new section
 */
function section_add() {
    $.ajax({
        type: 'POST',
        data: {
            submit: 'submit',
            mode: 'new'
        },
        beforeSend: function () {
            $('#section_add').button('loading');
        },
        success: function (html) {
            console.log(html);
            window.location.reload();
        },
        complete: function () {
            $('#section_add').button('reset');
        }
    });
}