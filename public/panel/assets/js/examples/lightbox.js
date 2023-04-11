'use strict';
$(document).ready(function () {

	$.extend(true, $.magnificPopup.defaults, {
		tClose: "بستن",
		tLoading: "در حال بارگذاری ...",
		gallery: {
			tPrev: 'قبلی',
			tNext: 'بعدی',
			tCounter: '%curr% از %total%'
		},
		image: {
			tError: '<a href="%url%">تصویر</a> بارگذاری نشد.'
		},
		ajax: {
			tError: '<a href="%url%">درخواست</a> ناموفق بود.'
		}
	});

    $('.image-popup').magnificPopup({
        type: 'image',
        zoom: {
            enabled: true,
            duration: 300,
            easing: 'ease-in-out',
            opener: function(openerElement) {
                return openerElement.is('img') ? openerElement : openerElement.find('img');
            }
        }
    });

    var magnificPopupGalleryConfig = {
        type: 'image',
        gallery: {
            enabled: true
        },
        zoom: {
            enabled: true,
            duration: 300,
            easing: 'ease-in-out',
            opener: function(openerElement) {
                return openerElement.is('img') ? openerElement : openerElement.find('img');
            }
        }
    };

    $('.image-popup-gallery-item').magnificPopup(magnificPopupGalleryConfig);

    $('.chat-app-wrapper .chat-app .chat-body .chat-body-messages .message-items .message-item:not(.outgoing-message).message-item-media ul a').magnificPopup(magnificPopupGalleryConfig);

    $('.chat-app-wrapper .chat-app .chat-body .chat-body-messages .message-items .message-item.outgoing-message.message-item-media ul a').magnificPopup(magnificPopupGalleryConfig);

});