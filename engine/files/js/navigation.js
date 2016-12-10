$(document).ready(function () {
    check_url();
});

/*menu handler*/
function check_url() {
    function stripTrailingSlash(str) {
        //if (str.substr(-1) == '/') {
        //    return str.substr(0, str.length - 1);
        //}
        return str;
    }

    var url = window.location.pathname;
    var activePage = stripTrailingSlash(url);

    $('.dm-card-header .btn-group a.btn').each(function () {
        var currentPage = stripTrailingSlash($(this).attr('href'));
        if (activePage == currentPage) $(this).addClass('active');
    });

}
