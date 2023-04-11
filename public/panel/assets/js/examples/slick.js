'use strict';
$(document).ready(function () {

    $('.slick-single').slick({
		rtl: true
	});

    $('.slick-multiple').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 4,
		rtl: true
    });

    $('.slick-autoplay').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
		rtl: true
    });

    $('.slick-center-mode').slick({
        centerMode: true,
        centerPadding: '60px',
        slidesToShow: 3,
		rtl: true,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 1
                }
            }
        ]
    });

    $('.slick-fade-effect').slick({
        dots: true,
        infinite: true,
        speed: 500,
        fade: true,
        cssEase: 'linear',
		rtl: true
    });

    $('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.slider-nav',
		rtl: true
    });

    $('.slider-nav').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: '.slider-for',
        centerMode: true,
        focusOnSelect: true,
		rtl: true
    });


});