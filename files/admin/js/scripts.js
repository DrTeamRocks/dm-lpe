$(document).ready(function () {

    $('#sections')
        .sortable({
            items: '.sortable',
            update: function (event, ui) {
                $('#sections > .nav-pills li').each(function (i) {
                    section_order($(this), i);
                });
            }
        });

    $('#section_add').on('click', function () {
        section_add();
    });

    $('.section_save').on('click', function () {
        section_save($(this));
    });

    $('.section_delete').on('click', function () {
        section_delete($(this));
    });

    $('.dm-item').on('click', function () {
        show_section($(this));
    });

});

/**
 * Show section after click on anc pill
 *
 * @param obj
 */
function show_section(obj) {
    var id = obj.data('id');

    $('.dm-item').removeClass('active');
    $('.dm-content').removeClass('active');

    obj.addClass('active');
    $('[data-id=' + id + ']').addClass('active');
}

/**
 * Update order in database
 */
function section_order(obj, i) {
    //console.log(obj);
    var num = obj.find('.dm-section-number');
    var id = obj.find('.section_id').data('id');

    //console.log(num);
    num.html(i + 1);

    $.ajax({
        type: 'POST',
        data: {
            submit: 'submit',
            mode: 'order',
            id: id,
            order: i
        },
        success: function (html) {
            //console.log(html);
            //window.location.reload();
        }
    });
}

/**
 * Remove the section
 */
function section_delete(obj) {
    console.log(obj);
    var id = obj.parent().parent().parent().parent().data('id');

    $.ajax({
        type: 'POST',
        data: {
            submit: 'submit',
            mode: 'delete',
            id: id
        },
        beforeSend: function () {
            obj.button('loading');
        },
        success: function (html) {
            console.log(html);
            window.location.reload();
        },
        complete: function () {
            obj.button('reset');
        }
    });
}

/**
 * Update selected section
 *
 * @param obj
 */
function section_save(obj) {
    console.log(obj);
    //return;

    var id = obj.parent().parent().data('id');
    var title = obj.parent().parent().find('.dm_title').val();
    var section_id = obj.parent().parent().find('.dm_id').val();
    var section_class = obj.parent().parent().find('.dm_class').val();
    var content = obj.parent().parent().find('.dm-textarea').val();

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
            $('.dm-item[data-id=' + id + '] a').html(title);
            //panel_title.html(title);
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