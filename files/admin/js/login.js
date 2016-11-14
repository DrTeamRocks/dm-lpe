$(document).ready(function () {

    $('#login').on('click', function () {
        login();
    });

});

/**
 * Login into system
 */
function login() {
    var username = $('#username').val();
    var password = $('#password').val();

    if (username == '' || password == '') return;

    $.ajax({
        type: 'POST',
        data: {
            submit: 'submit',
            username: username,
            password: password
        },
        beforeSend: function () {
            $('#login').button('loading');
        },
        success: function (html) {
            console.log(html);
            window.location.reload();
        },
        complete: function () {
            $('#login').button('reset');
        }
    });

}
