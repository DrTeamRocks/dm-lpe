$(document).ready(function () {

    $('#sections')
        .accordion({
            header: 'div.panel-heading'
        })
        .sortable({
            items: '.s_panel',
            stop: function (event, ui) {
                console.log('done');
            }
        });

});
