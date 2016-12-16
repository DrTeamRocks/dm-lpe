$(document).ready(function () {

    // Change roles after start
    roles_init();

    // Call the role changing
    $('.dm-user-role').on('change', function () {
        field_change($(this));
    });

    // On username change
    $('.dm-user-name').on('blur', function () {
        field_change($(this));
    });

    // On username change
    $('.dm-user-email').on('blur', function () {
        field_change($(this));
    });

});

/**
 * Change some value
 * @param obj
 */
function field_change(obj) {
    var id = obj.parent().parent().parent().parent().parent().data('id');
    var field = obj.attr('name');
    var value = obj.val();

    $.ajax({
        type: 'POST',
        data: {
            submit: 'submit',
            mode: 'update',
            id: id,
            field: field,
            value: value
        },
        success: function (html) {
            console.log(html);
        }
    });
}

/**
 * On ready roles updater updater
 */
function roles_init() {
    $('.dm-user-role').each(function (i, j) {
        var def = $(j).data('default');
        $(j).val(def);
    });
}
