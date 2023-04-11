'use strict';
$(document).ready(function () {

	$("#demo_1").ionRangeSlider({
        min: 100,
        max: 1000,
        from: 550,
		skin: "round",
		prettify: function(num){
			return '<span class="ltr-text">'+ num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") +'</span>';
		}
    });

    $("#demo_2").ionRangeSlider({
        type: "double",
        grid: true,
        min: 0,
        max: 1000,
        from: 200,
        to: 800,
        postfix: " تومان",
		skin: "round",
		prettify: function(num){
			return '<span class="ltr-text">'+ num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") +'</span>';
		}
    });

    $("#demo_3").ionRangeSlider({
        type: "double",
        grid: true,
        min: -1000,
        max: 1000,
        from: -500,
        to: 500,
        step: 250,
		skin: "round",
		prettify: function(num){
			return '<span class="ltr-text">'+ num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") +'</span>';
		}
    });

    $("#demo_4").ionRangeSlider({
        type: "double",
        grid: true,
        min: -12.8,
        max: 12.8,
        from: -3.2,
        to: 3.2,
        step: 0.1,
		skin: "round",
		prettify: function(num){
			return '<span class="ltr-text">'+ num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") +'</span>';
		}
    });

    $("#demo_5").ionRangeSlider({
        grid: true,
        from: 3,
        values: [
			"فروردین", "اردی", "خرداد", "تیر", "مرداد", "شهریور",
			"مهر", "آبان", "آذر", "دی", "بهمن", "اسفند"
        ],
        skin: "round"
    });

    $("#demo_6").ionRangeSlider({
        min: 0,
        max: 10000,
        from: 777,
        step: 1,            // default 1 (set step)
        grid: true,         // default false (enable grid)
        grid_num: 4,        // default 4 (set number of grid cells)
        grid_snap: false,    // default false (snap grid to step)
		skin: "round",
		prettify: function(num){
			return '<span class="ltr-text">'+ num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") +'</span>';
		}
    });

});