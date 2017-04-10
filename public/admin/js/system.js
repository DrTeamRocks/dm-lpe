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

    // Change user password modal
    $('.dm-user-password').on('click', function() {
        var id = $(this).data('id');
        $('#user_pass_id').val(id);
        $('#passUser').modal();
    });

    // Open delete user modal
    $('.dm-user-delete').on('click', function() {
        var id = $(this).data('id');
        $('#user_id').val(id);
        $('#deleteUser').modal();
    });

    // On click to delete button show the modal box
    $('#delete_user').on('click', function () {
        var id = $('#user_id').val();
        delete_user(id);
    });
});

/**
 * Remove the user
 * @param id
 */
function delete_user (id) {
    $.ajax({
        type: 'POST',
        data: {
            submit: 'submit',
            mode: 'delete',
            id: id
        },
        success: function (html) {
            //console.log(html);
            window.location.reload();
        }
    });
}

/**
 * Change some value
 * @param obj
 */
function field_change(obj) {
    var id = obj.data('id');
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

