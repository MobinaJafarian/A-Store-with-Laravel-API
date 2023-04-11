'use strict';
$(document).ready(function () {

    $(document).on('click', 'a.tour', function(){
        Tour.run([
            {
                element: $('.header .header-body ul.navbar-nav'),
                content: 'این نوار ابزار است.',
                position: 'bottom'
            },
            {
                element: $('.page-title'),
                content: 'این عنوان اصلی صفحه است.',
                position: 'bottom'
            },
            {
                element: $('.tour-card'),
                content: 'اینجا قسمت دربرگیرنده محتواست.',
                position: 'top'
            },
            {
                element: $('.tour-card a.btn'),
                content: 'این دکمه آشنایی بیشتر است.',
                position: 'top'
            }
        ],
		{
			language: 'fa'
		});
    });

});