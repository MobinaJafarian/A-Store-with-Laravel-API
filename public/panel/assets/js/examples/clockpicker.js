'use strict';
$(document).ready(function () {

    $('.clockpicker-demo').clockpicker({
        donetext: 'انجام شد',
		align: 'right'
    });

    $('.clockpicker-autoclose-demo').clockpicker({
        autoclose: true,
		align: 'right'
    });

    var input = $('.clockpicker-minutes-demo').clockpicker({
        placement: 'bottom',
        align: 'right',
        autoclose: true,
        'default': 'now'
    });

    $(document).on('click', '#check-minutes', function (e) {
        e.stopPropagation();
		input.clockpicker('show').clockpicker('toggleView', 'minutes');
    });

    $('.create-event-demo').clockpicker({
        donetext: 'انجام شد',
		autoclose: true
    });

});