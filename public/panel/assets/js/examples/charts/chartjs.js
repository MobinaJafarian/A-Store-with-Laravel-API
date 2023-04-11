'use strict';
$(document).ready(function () {

	Chart.defaults.global.defaultFontFamily = '"primary-font", "segoe ui", "tahoma"';

	var colors = {
		primary: $('.colors .bg-primary').css('background-color'),
		primaryLight: $('.colors .bg-primary-bright').css('background-color'),
		secondary: $('.colors .bg-secondary').css('background-color'),
		secondaryLight: $('.colors .bg-secondary-bright').css('background-color'),
		info: $('.colors .bg-info').css('background-color'),
		infoLight: $('.colors .bg-info-bright').css('background-color'),
		success: $('.colors .bg-success').css('background-color'),
		successLight: $('.colors .bg-success-bright').css('background-color'),
		danger: $('.colors .bg-danger').css('background-color'),
		dangerLight: $('.colors .bg-danger-bright').css('background-color'),
		warning: $('.colors .bg-warning').css('background-color'),
		warningLight: $('.colors .bg-warning-bright').css('background-color'),
	};

	chartjs_one();

	chartjs_two();

	chartjs_three();

	chartjs_four();

	chartjs_five();

	chartjs_six();

	function chartjs_one() {
		var element = document.getElementById("chartjs_one");
		element.height = 200;
		new Chart(element, {
			type: 'bar',
			data: {
				labels: ["آفریقا", "آسیا", "اروپا", "آمریکای لاتین", "آمریکای شمالی"],
				datasets: [{
					label: "جمعیت (میلیون)",
					backgroundColor: [
						colors.primary,
						colors.secondary,
						colors.success,
						colors.warning,
						colors.info
					],
					data: [2478, 3267, 1734, 2084, 3000]
				}]
			},
			options: {
				legend: {
					display: false
				},
				title: {
					display: true,
					text: 'جمعیت پیش بینی شده جهان در سال 2050 (میلیون)'
				}
			}
		});
	}

	function chartjs_two() {
		var element = document.getElementById("chartjs_two");
		element.height = 200;
		new Chart(element, {
			type: 'line',
			data: {
				labels: [1500, 1600, 1700, 1750, 1800, 1850, 1900, 1950, 1999, 2050],
				datasets: [{
					data: [1286, 114, 2106, 3106, 3107, 111, 133, 221, 783, 2478],
					label: "آفریقا",
					borderColor: colors.primary,
					fill: false
				}, {
					data: [282, 350, 411, 2502, 2635, 3809, 2947, 1402, 3700, 5267],
					label: "آسیا",
					borderColor: colors.secondary,
					fill: false
				}, {
					data: [168, 170, 178, 190, 3203, 2276, 408, 547, 675, 734],
					label: "اروپا",
					borderColor: colors.success,
					fill: false
				}, {
					data: [40, 20, 10, 16, 2324, 3238, 1174, 2167, 508, 784],
					label: "آمریکای لاتین",
					borderColor: colors.warning,
					fill: false
				}, {
					data: [6, 3, 2, 2, 7, 3226, 82, 172, 312, 433],
					label: "آمریکای شمالی",
					borderColor: colors.info,
					fill: false
				}]
			},
			options: {
				title: {
					display: true,
					text: 'جمعیت جهان بر اساس منطقه (میلیون)'
				}
			}
		});
	}

	function chartjs_three() {
		var element = document.getElementById("chartjs_three");
		element.height = 200;
		new Chart(element, {
			type: 'pie',
			data: {
				labels: ["آفریقا", "آسیا", "اروپا", "آمریکای لاتین", "آمریکای شمالی"],
				datasets: [{
					label: "جمعیت (میلیون)",
					backgroundColor: [
						colors.primary,
						colors.secondary,
						colors.success,
						colors.warning,
						colors.info
					],
					data: [2478, 3267, 734, 1784, 933]
				}]
			},
			options: {
				title: {
					display: true,
					text: 'جمعیت پیش بینی شده جهان در سال 2050 (میلیون)'
				}
			}
		});
	}

	function chartjs_four() {
		var element = document.getElementById("chartjs_four");
		element.height = 200;
		new Chart(element, {
			type: 'radar',
			data: {
				labels: ["آفریقا", "آسیا", "اروپا", "آمریکای لاتین", "آمریکای شمالی"],
				datasets: [{
					label: "1950",
					fill: true,
					backgroundColor: colors.primaryLight,
					borderColor: colors.primary,
					pointBorderColor: "#fff",
					data: [8.77, 55.61, 21.69, 6.62, 6.82]
				}, {
					label: "2050",
					fill: true,
					backgroundColor: colors.successLight,
					borderColor: colors.success,
					pointBorderColor: "#fff",
					data: [25.48, 54.16, 7.61, 8.06, 4.45]
				}]
			},
			options: {
				title: {
					display: true,
					text: 'مقدار % جمعیت هر قاره از جمعیت جهان'
				}
			}
		});
	}

	function chartjs_five() {
		var element = document.getElementById("chartjs_five");
		element.height = 200;
		new Chart(element, {
			type: 'horizontalBar',
			data: {
				labels: ["آفریقا", "آسیا", "اروپا", "آمریکای لاتین", "آمریکای شمالی"],
				datasets: [{
					label: "جمعیت (میلیون)",
					backgroundColor: [
						colors.primary,
						colors.secondary,
						colors.success,
						colors.warning,
						colors.info
					],
					data: [2478, 5267, 734, 784, 433]
				}]
			},
			options: {
				legend: {
					display: false
				},
				title: {
					display: true,
					text: 'جمعیت پیش بینی شده جهان در سال 2050 (میلیون)'
				}
			}
		});
	}

	function chartjs_six() {
		var element = document.getElementById("chartjs_six");
		element.height = 200;
		new Chart(element, {
			type: 'bar',
			data: {
				labels: ["1900", "1950", "1999", "2050"],
				datasets: [{
					label: "اروپا",
					type: "line",
					borderColor: colors.warning,
					data: [408, 547, 675, 734],
					fill: false
				}, {
					label: "آفریقا",
					type: "line",
					borderColor: colors.success,
					data: [133, 221, 783, 2478],
					fill: false
				}, {
					label: "اروپا",
					type: "bar",
					backgroundColor: colors.secondary,
					data: [408, 547, 675, 734],
				}, {
					label: "آفریقا",
					type: "bar",
					backgroundColor: colors.primary,
					backgroundColorHover: "#3e95cd",
					data: [133, 221, 783, 2478]
				}]
			},
			options: {
				title: {
					display: true,
					text: 'رشد جمعیت (میلیون): اروپا و آفریقا'
				},
				legend: {
					display: false
				}
			}
		});
	}

});