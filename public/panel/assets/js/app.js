'use strict';

(function ($) {

	var wind_ = $(window),
		body_ = $('body');

	/*------------- create/remove overlay -------------*/
	$.createOverlay = function () {
		if ($('.overlay').length < 1) {
			body_.addClass('no-scroll').append('<div class="overlay"></div>');
			$('.overlay').addClass('show');
		}
	};

	$.removeOverlay = function () {
		body_.removeClass('no-scroll');
		$('.overlay').remove();
	};
	/*------------- create/remove overlay -------------*/

	$('[data-backround-image]').each(function (e) {
		$(this).css("background", 'url(' + $(this).data('backround-image') + ')');
	});

	/*------------- page loader -------------*/
	wind_.on('load', function () {
		$('.page-loader').fadeOut(700, function () {
			setTimeout(function () {
				toastr.options = {
					timeOut: 3000,
					progressBar: true,
					showMethod: "slideDown",
					hideMethod: "slideUp",
					showDuration: 200,
					hideDuration: 200
				};
				toastr.success('خوش آمدید! جان اسنو.');
			}, 1000);
		});

	});
	/*------------- page loader -------------*/

	/*------------- side menu (sub menü arrow) -------------*/
	wind_.on('load', function () {
		setTimeout(function () {
			$('.navigation .navigation-menu-body ul li a').each(function () {
				var $this = $(this);
				if ($this.next('ul').length) {
					$this.append('<i class="sub-menu-arrow ti-plus"></i>');
				}
			});
			$('.navigation .navigation-menu-body ul li.open>a>.sub-menu-arrow').removeClass('ti-plus').addClass('ti-minus').addClass('rotate-in');
		}, 200);
	});

	$(document).on('click', '.navigation .navigation-icon-menu ul li a', function (e) {
		if (!$(this).hasClass('go-to-page')) {
			e.preventDefault();
			$(this).parent().tooltip('hide');
			var target = $(this).attr('href');
			$(this).closest('ul').find('li').removeClass('active');
			$(this).parent('li').addClass('active');
			$('.navigation .navigation-menu-body ul.navigation-active').removeClass('navigation-active');
			$('.navigation .navigation-menu-body ul' + target).addClass('navigation-active');
			return false;
		}
	});
	/*------------- side menu (sub menü arrow) -------------*/

	$.fn.modal.Constructor.prototype.enforceFocus = function () {
		modal_this = this
		$(document).on('focusin.modal', function (e) {
			if (modal_this.$element[0] !== e.target && !modal_this.$element.has(e.target).length
				// add whatever conditions you need here:
				&&
				!$(e.target.parentNode).hasClass('cke_dialog_ui_input_select') && !$(e.target.parentNode).hasClass('cke_dialog_ui_input_text')) {
				modal_this.$element.focus()
			}
		})
	};

	$(document).on('click', '.navbar-toggler', function () {
		$('.header .header-body ul.navbar-nav').toggleClass('open');
		return false;
	});

	$(document).on('click', '.navigation-toggler', function () {
		$('.navigation').toggleClass('open');
		$.createOverlay();
		return false;
	});

	$(document).on('click', '*', function (e) {
		if (!$(e.target).is('.header .header-body ul.navbar-nav, .header .header-body ul.navbar-nav *, .navbar-toggler, .navbar-toggler *')) {
			$('.header .header-body ul.navbar-nav').removeClass('open');
		}
	});

	/*------------- sidebar show/hide -------------*/
	$(document).on('click', '[data-sidebar-open]', function () {
		$('[data-toggle="dropdown"]').dropdown('hide');
		$(this).tooltip('hide');
		var sidebar_id = $(this).data('sidebar-open');
		$('.sidebar').removeClass('show');
		$(sidebar_id).addClass('show');
		$.createOverlay();
		return false;
	});

	$(document).on('click', '.overlay', function () {
		$('.sidebar').removeClass('show');
		$('.navigation').removeClass('open');
		$.removeOverlay();
	});

	/*------------- mobile or hidden side menu open -------------*/
	$(document).on('click', '.side-menu-open', function () {
		$('[data-toggle="dropdown"]').dropdown('hide');
		$('.navigation').addClass('show');
		$.createOverlay();
		return false;
	});
	/*------------- mobile or hidden side menu open -------------*/

	/*------------- form validation -------------*/
	window.addEventListener('load', function () {
		// Fetch all the forms we want to apply custom Bootstrap validation styles to
		var forms = document.getElementsByClassName('needs-validation');
		// Loop over them and prevent submission
		Array.prototype.filter.call(forms, function (form) {
			form.addEventListener('submit', function (event) {
				if (form.checkValidity() === false) {
					event.preventDefault();
					event.stopPropagation();
				}
				form.classList.add('was-validated');
			}, false);
		});
	}, false);
	/*------------- form validation -------------*/

	/*------------- responsive html table -------------*/
	var table_responsive_stack = $(".table-responsive-stack");
	table_responsive_stack
		.find("th")
		.each(function (i) {
			$(".table-responsive-stack td:nth-child(" + (i + 1) + ")").prepend(
				'<span class="table-responsive-stack-thead">' +
				$(this).text() +
				":</span> "
			);
			$(".table-responsive-stack-thead").hide();
		});

	table_responsive_stack.each(function () {
		var thCount = $(this).find("th").length,
			rowGrow = 100 / thCount + "%";
		$(this).find("th, td").css("flex-basis", rowGrow);
	});

	function flexTable() {
		if (wind_.width() < 768) {
			$(".table-responsive-stack").each(function (i) {
				$(this)
					.find(".table-responsive-stack-thead")
					.show();
				$(this)
					.find("thead")
					.hide();
			});

			// window is less than 768px
		} else {
			$(".table-responsive-stack").each(function (i) {
				$(this)
					.find(".table-responsive-stack-thead")
					.hide();
				$(this)
					.find("thead")
					.show();
			});
		}
	}

	flexTable();
	initCustomScrollbar();

	window.onresize = function (event) {
		flexTable();
		initCustomScrollbar('resize');
	};
	/*------------- responsive html table -------------*/

	/*------------- custom accordion -------------*/
	$(document).on('click', '.accordion.custom-accordion .accordion-row a.accordion-header', function () {
		var $this = $(this);
		$this.closest('.accordion.custom-accordion').find('.accordion-row').not($this.parent()).removeClass('open');
		$this.parent('.accordion-row').toggleClass('open');
		return false;
	});
	/*------------- custom accordion -------------*/

	/*------------- responsive table dropdown -------------*/
	var dropdownMenu,
		table_responsive = $('.table-responsive');

	table_responsive.on('show.bs.dropdown', function (e) {
		dropdownMenu = $(e.target).find('.dropdown-menu');
		body_.append(dropdownMenu.detach());
		var eOffset = $(e.target).offset();
		dropdownMenu.css({
			'display': 'block',
			'top': eOffset.top + $(e.target).outerHeight(),
			'left': eOffset.left,
			'width': '184px',
			'font-size': '14px'
		});
		dropdownMenu.addClass("mobPosDropdown");
	});

	table_responsive.on('hide.bs.dropdown', function (e) {
		$(e.target).append(dropdownMenu.detach());
		dropdownMenu.hide();
	});
	/*------------- responsive table dropdown -------------*/

	/*------------- chat -------------*/
	$(document).on('click', '.chat-app-wrapper .btn-chat-sidebar-open', function () {
		$('.chat-app-wrapper .chat-sidebar').addClass('chat-sidebar-opened');
		return false;
	});

	$(document).on('click', '*', function (e) {
		if (!$(e.target).is('.chat-app-wrapper .chat-sidebar, .chat-app-wrapper .chat-sidebar *, .chat-app-wrapper .btn-chat-sidebar-open, .chat-app-wrapper .btn-chat-sidebar-open *')) {
			$('.chat-app-wrapper .chat-sidebar').removeClass('chat-sidebar-opened');
		}
	});
	/*------------- chat -------------*/

	/*------------- aside menu toggle -------------*/
	$(document).on('click', '.navigation ul li a', function () {
		var $this = $(this);
		if ($this.next('ul').length) {
			var sub_menu_arrow = $this.find('.sub-menu-arrow');
			sub_menu_arrow.toggleClass('rotate-in');
			$this.next('ul').toggle(200);
			$this.parent('li').siblings().find('ul').not($this.parent('li').find('ul')).slideUp(200);
			$this.next('ul').find('li ul').slideUp(200);
			$this.next('ul').find('li>a').find('.sub-menu-arrow').removeClass('ti-minus').addClass('ti-plus');
			$this.next('ul').find('li>a').find('.sub-menu-arrow').removeClass('rotate-in');
			$this.parent('li').siblings().not($this.parent('li').find('ul')).find('>a').find('.sub-menu-arrow').removeClass('ti-minus').addClass('ti-plus');
			$this.parent('li').siblings().not($this.parent('li').find('ul')).find('>a').find('.sub-menu-arrow').removeClass('rotate-in');
			if (sub_menu_arrow.hasClass('rotate-in')) {
				setTimeout(function () {
					sub_menu_arrow.removeClass('ti-plus').addClass('ti-minus');
				}, 200);
			} else {
				sub_menu_arrow.removeClass('ti-minus').addClass('ti-plus');
			}
			if (wind_.width() >= 768) {
				setTimeout(function (e) {
					$('.navigation>.navigation-menu-body>ul').getNiceScroll().resize();
				}, 300);
			}
			return false;
		}
	});

	/*------------- other -------------*/
	$(document).on('click', '.dropdown-menu', function (e) {
		e.stopPropagation();
	});

	$('#exampleModal').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget),
			recipient = button.data('whatever'),
			modal = $(this);

		modal.find('.modal-title').text('پیام جدید به ' + recipient);
		modal.find('.modal-body input').val(recipient);
	});

	$('[data-toggle="tooltip"]').tooltip();

	$('[data-toggle="popover"]').popover();

	$('.carousel').carousel();

	function initCustomScrollbar(type) {

		type = type ? type : '';

		if (type == 'resize') {
			if (wind_.width() >= 768) {
				$('.card-scroll').getNiceScroll().resize();
			}

			if (wind_.width() >= 992) {
				$('.navigation>.navigation-menu-body>ul').getNiceScroll().resize();
			}

			$('.card').each(function () {
				if (wind_.width() >= 768) {
					var $this = $(this),
						scroll_div = $this.find('.card-scroll');
					if (scroll_div.length) {
						scroll_div.getNiceScroll().resize();
					}
				}
			});

			$('.sidebar').each(function () {
				if (wind_.width() >= 768) {
					var $this = $(this);
					$this.getNiceScroll().resize();
				}
			});

			$('.dropdown-menu').each(function () {
				if (typeof $('.dropdown-menu-body', this)[0] != 'undefined' && wind_.width() >= 768) {
					$('.dropdown-menu-body', this).getNiceScroll().resize();
				}
			});

			if (wind_.width() >= 768) {
				$('.chat-app .chat-sidebar .chat-sidebar-messages')[0] ? $('.chat-app .chat-sidebar .chat-sidebar-messages').getNiceScroll().resize() : '';

				$('.chat-app .chat-body .chat-body-messages')[0] ? $('.chat-app .chat-body .chat-body-messages').getNiceScroll().resize() : '';
			}

		} else {
			if (wind_.width() >= 768) {
				$('.card-scroll').niceScroll({railalign: 'left'});
				$('.table-responsive').niceScroll({railalign: 'left'});
			}

			if (wind_.width() >= 992) {
				wind_.on('load', function () {
					$('.navigation>.navigation-menu-body>ul').niceScroll({railalign: 'left'});
				});
			}

			$('.card').each(function () {
				if (wind_.width() >= 768) {
					var $this = $(this),
						scroll_div = $this.find('.card-scroll');
					if (scroll_div.length) {
						scroll_div.niceScroll({railalign: 'left'});
					}
				}
			});

			$('.sidebar').each(function () {
				if (wind_.width() >= 768) {
					var $this = $(this);
					$this.niceScroll({railalign: 'left'});
				}
			});

			$('.dropdown-menu').each(function () {
				if (typeof $('.dropdown-menu-body', this)[0] != 'undefined' && wind_.width() >= 768) {
					$('.dropdown-menu-body', this).niceScroll({railalign: 'left'});
				}
			});

			if (wind_.width() >= 768) {
				$('.chat-app .chat-sidebar .chat-sidebar-messages')[0] ? $('.chat-app .chat-sidebar .chat-sidebar-messages').scrollTop($('.chat-app .chat-sidebar .chat-sidebar-messages').get(0).scrollHeight, -1).niceScroll({railalign: 'left'}) : '';

				$('.chat-app .chat-body .chat-body-messages')[0] ? $('.chat-app .chat-body .chat-body-messages').scrollTop($('.chat-app .chat-body .chat-body-messages').get(0).scrollHeight, -1).niceScroll({railalign: 'left'}) : '';
			}
		}
	}

	if (typeof CKEDITOR == 'object' && $('body').hasClass('dark')) {
		var backgroundColor = $('.card').css("background-color"),
			fontColor = $('body').css("color");
		CKEDITOR.on('instanceReady', function (e) {
			var iframe = $('iframe.cke_wysiwyg_frame');
			iframe.each(function (e) {
				var ifrm = $(this)[0];
				var iframeDocument = ifrm.contentDocument || ifrm.contentWindow.document;
				iframeDocument.body.style.backgroundColor = backgroundColor;
				iframeDocument.body.style.color = fontColor;
			});
		});
	}

	$('.table-email-list .custom-checkbox').click(function (e) {
		e.stopPropagation();
	});

})(jQuery);