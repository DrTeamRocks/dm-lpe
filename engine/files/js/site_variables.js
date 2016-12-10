$(document).ready(function () {

    $('#sections')
        .sortable({
            items: '.sortable',
            update: function (event, ui) {
                $('#sections li').each(function (i) {
                    section_order($(this), i);
                });
            }
        });

    $('.section_save').on('click', function () {
        section_save($(this));
    });

    $('.dm-item').on('click', function () {
        show_section($(this));
    });

    $('[data-toggle="tooltip"]').tooltip();

});

/**
 * Update order in database
 */
function section_order(obj, i) {
    //console.log(obj);
    var id = obj.data('id');
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
 * Show section after click on anc pill
 *
 * @param obj
 */
function show_section(obj) {
    var id = obj.data('id');

    $('.dm-item').removeClass('text-white bg-blue');
    $('.dm-content').removeClass('active');

    obj.addClass('text-white bg-blue');
    $('.dm-content[data-id=' + id + ']').addClass('active');
}

/**
 * Update selected section
 *
 * @param obj
 */
function section_save(obj) {
    var id = obj.parent().parent().data('id');
    var variables = obj.parent().parent().find('.dm-variable');

    // If we have a variables
    if (variables.length > 0) {
        // Initial state
        var name;
        var val;
        var array = [];
        var json;

        // For each variables create new array item
        variables.each(function (index, value) {
            name = $(value).data('name');
            val = $(value).val();
            console.log(name, val);
            array.push({name: name, value: val});
        });

        // Convert array to json
        json = JSON.stringify(array);

        // If all ok then submit the json string
        $.ajax({
            type: 'POST',
            data: {
                submit: 'submit',
                mode: 'update',
                id: id,
                json: json
            },
            beforeSend: function () {
                obj.attr('disabled', true);
            },
            success: function (html) {
                console.log(html);
            },
            complete: function () {
                obj.attr('disabled', false);
            }
        });
    }

}
