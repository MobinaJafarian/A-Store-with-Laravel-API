'use strict';
$(document).ready(function () {

    $('#wizard1').steps({
        headerTag: 'h3',
        bodyTag: 'section',
        autoFocus: true,
        titleTemplate: '#index# #title#',
		labels: {
			cancel: 'انصراف',
			current: 'قدم کنونی:',
			pagination: 'صفحه بندی',
			finish: 'پایان',
			next: 'بعدی',
			previous: 'قبلی',
			loading: 'در حال بارگذاری ...'
		}
    });

    $('#wizard2').steps({
        headerTag: 'h3',
        bodyTag: 'section',
        autoFocus: true,
        titleTemplate: '#index# #title#',
		labels: {
			cancel: 'انصراف',
			current: 'قدم کنونی:',
			pagination: 'صفحه بندی',
			finish: 'پایان',
			next: 'بعدی',
			previous: 'قبلی',
			loading: 'در حال بارگذاری ...'
		},
        onStepChanging: function (event, currentIndex, newIndex) {
            if (currentIndex < newIndex) {
                var form = document.getElementById('form1'),
                    form2 = document.getElementById('form2');

                if (currentIndex === 0) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                        form.classList.add('was-validated');
                    } else {
                        return true;
                    }
                } else if (currentIndex === 1) {
                    if (form2.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                        form2.classList.add('was-validated');
                    } else {
                        return true;
                    }
                } else {
                    return true;
                }
            } else {
                return true;
            }
        }
    });

});
