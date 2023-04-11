'use strict';
$(document).ready(function () {

    var data = [
            { y: '2014', a: 50, b: 90},
            { y: '2015', a: 65,  b: 75},
            { y: '2016', a: 50,  b: 50},
            { y: '2017', a: 75,  b: 60},
            { y: '2018', a: 80,  b: 65},
            { y: '2019', a: 90,  b: 70},
            { y: '2020', a: 100, b: 75},
            { y: '2021', a: 115, b: 75},
            { y: '2022', a: 120, b: 85},
            { y: '2023', a: 145, b: 85},
            { y: '2024', a: 160, b: 95}
        ],
        config = {
            data: data,
            xkey: 'y',
            ykeys: ['a', 'b'],
            labels: ['مجموع درآمد', 'مجموع مخارج'],
            fillOpacity: 0.6,
            hideHover: 'auto',
            behaveLikeLine: true,
            resize: true,
            pointFillColors:['#ffffff'],
            pointStrokeColors: ['black'],
            lineColors:['gray','red'],
			gridTextFamily: 'inherit'
        };
    config.element = 'area-chart';
    Morris.Area(config);
    config.element = 'line-chart';
    Morris.Line(config);
    config.element = 'bar-chart';
    Morris.Bar(config);
    config.element = 'stacked';
    config.stacked = true;
    Morris.Bar(config);
    Morris.Donut({
        element: 'pie-chart',
        data: [
            {label: "دوستان", value: 30},
            {label: "متحدان", value: 15},
            {label: "دشمنان", value: 45},
            {label: "بی طرف", value: 10}
        ],
		resize: true
    });

});