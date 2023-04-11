'use strict';
$(document).ready(function () {

	// ------

	$('input[name="date-picker-shamsi"]').datepicker({
		dateFormat: "yy/mm/dd",
		showOtherMonths: true,
		selectOtherMonths: false
	});

	$('input[name="date-picker-shamsi-list"]').datepicker({
		dateFormat: "yy/mm/dd",
		showOtherMonths: true,
		selectOtherMonths: true,
		changeMonth: true,
		changeYear: true,
		showButtonPanel: true
	});

	$('input[name="date-picker-shamsi-limited"]').datepicker({
		dateFormat: "yy/mm/dd",
		showOtherMonths: true,
		selectOtherMonths: true,
		minDate: 0,
		maxDate: "+14D"
	});
	
	// ------

    $('input[name="single-date-picker"]').daterangepicker({
        opens: 'left',
        singleDatePicker: true,
		showDropdowns: true,
		"locale": {
			"format": "YYYY/MM/DD",
			"separator": " - ",
			"applyLabel": "اعمال",
			"cancelLabel": "انصراف",
			"fromLabel": "از",
			"toLabel": "تا",
			"customRangeLabel": "سفارشی",
			"weekLabel": "هف",
			"daysOfWeek": [
				"ی",
				"د",
				"س",
				"چ",
				"پ",
				"ج",
				"ش"
			],
			"monthNames": [
				"ژانویه",
				"فوریه",
				"مارس",
				"آوریل",
				"می",
				"ژوئن",
				"جولای",
				"آگوست",
				"سپتامبر",
				"اکتبر",
				"نوامبر",
				"دسامبر"
			],
			"firstDay": 6
		}
    });

    $('input[name="simple-date-range-picker"]').daterangepicker({
		opens: 'left',
		"locale": {
			"format": "YYYY/MM/DD",
			"separator": " - ",
			"applyLabel": "اعمال",
			"cancelLabel": "انصراف",
			"fromLabel": "از",
			"toLabel": "تا",
			"customRangeLabel": "سفارشی",
			"weekLabel": "هف",
			"daysOfWeek": [
				"ی",
				"د",
				"س",
				"چ",
				"پ",
				"ج",
				"ش"
			],
			"monthNames": [
				"ژانویه",
				"فوریه",
				"مارس",
				"آوریل",
				"می",
				"ژوئن",
				"جولای",
				"آگوست",
				"سپتامبر",
				"اکتبر",
				"نوامبر",
				"دسامبر"
			],
			"firstDay": 6
		}
	});

    $('input[name="simple-date-range-picker-callback"]').daterangepicker({
        "locale": {
			"format": "YYYY/MM/DD",
			"separator": " - ",
			"applyLabel": "اعمال",
			"cancelLabel": "انصراف",
			"fromLabel": "از",
			"toLabel": "تا",
			"customRangeLabel": "سفارشی",
			"weekLabel": "هف",
			"daysOfWeek": [
				"ی",
				"د",
				"س",
				"چ",
				"پ",
				"ج",
				"ش"
			],
			"monthNames": [
				"ژانویه",
				"فوریه",
				"مارس",
				"آوریل",
				"می",
				"ژوئن",
				"جولای",
				"آگوست",
				"سپتامبر",
				"اکتبر",
				"نوامبر",
				"دسامبر"
			],
			"firstDay": 6
		}
	},
	function (start, end, label) {
        swal("یک تاریخ جدید انتخاب شد", start.format('YYYY/MM/DD') + ' تا ' + end.format('YYYY/MM/DD'), "success", {button:'باشه'});
	});

    $('input[name="datetimes"]').daterangepicker({
        opens: 'left',
        timePicker: true,
        startDate: moment().startOf('hour'),
		endDate: moment().startOf('hour').add(32, 'hour'),
		"locale": {
			format: 'M/DD hh:mm A',
			"separator": " - ",
			"applyLabel": "اعمال",
			"cancelLabel": "انصراف",
			"fromLabel": "از",
			"toLabel": "تا",
			"customRangeLabel": "سفارشی",
			"weekLabel": "هف",
			"daysOfWeek": [
				"ی",
				"د",
				"س",
				"چ",
				"پ",
				"ج",
				"ش"
			],
			"monthNames": [
				"ژانویه",
				"فوریه",
				"مارس",
				"آوریل",
				"می",
				"ژوئن",
				"جولای",
				"آگوست",
				"سپتامبر",
				"اکتبر",
				"نوامبر",
				"دسامبر"
			],
			"firstDay": 6
		}
    });

    /**
     * datefilter
     */
    var datefilter = $('input[name="datefilter"]');
    datefilter.daterangepicker({
        opens: 'left',
        autoUpdateInput: false,
		"locale": {
			"format": "YYYY/MM/DD",
			"separator": " - ",
			"applyLabel": "اعمال",
			"cancelLabel": "پاک کردن",
			"fromLabel": "از",
			"toLabel": "تا",
			"customRangeLabel": "سفارشی",
			"weekLabel": "هف",
			"daysOfWeek": [
				"ی",
				"د",
				"س",
				"چ",
				"پ",
				"ج",
				"ش"
			],
			"monthNames": [
				"ژانویه",
				"فوریه",
				"مارس",
				"آوریل",
				"می",
				"ژوئن",
				"جولای",
				"آگوست",
				"سپتامبر",
				"اکتبر",
				"نوامبر",
				"دسامبر"
			],
			"firstDay": 6
		}
    });

    datefilter.on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('YYYY/MM/DD') + ' - ' + picker.endDate.format('YYYY/MM/DD'));
	});

    $('input.create-event-datepicker').daterangepicker({
        opens: 'left',
        singleDatePicker: true,
        showDropdowns: true,
		autoUpdateInput: false,
		"locale": {
			"format": "YYYY/MM/DD",
			"separator": " - ",
			"applyLabel": "اعمال",
			"cancelLabel": "انصراف",
			"fromLabel": "از",
			"toLabel": "تا",
			"customRangeLabel": "سفارشی",
			"weekLabel": "هف",
			"daysOfWeek": [
				"ی",
				"د",
				"س",
				"چ",
				"پ",
				"ج",
				"ش"
			],
			"monthNames": [
				"ژانویه",
				"فوریه",
				"مارس",
				"آوریل",
				"می",
				"ژوئن",
				"جولای",
				"آگوست",
				"سپتامبر",
				"اکتبر",
				"نوامبر",
				"دسامبر"
			],
			"firstDay": 6
		}
	})
	.on('apply.daterangepicker', function(ev, picker) {
		$(this).val(picker.startDate.format('YYYY/MM/DD'));
    });

});