'use strict';
$(document).ready(function () {
    $('.sweet-basic').on('click', function () {
        swal('سلام دنیا!', {
			button: "باشه"
		});
    });
    $('.sweet-success').on('click', function () {
        swal("آفرین!", "شما روی دکمه کلیک کردید!", "success", {
			button: "باشه"
		});
    });
    $('.sweet-warning').on('click', function () {
        swal("آفرین!", "شما روی دکمه کلیک کردید!", "warning", {
			button: "باشه"
		});
    });
    $('.sweet-error').on('click', function () {
		swal("آفرین!", "شما روی دکمه کلیک کردید!", "error", {
			button: "باشه"
		});
    });
    $('.sweet-info').on('click', function () {
        swal("آفرین!", "شما روی دکمه کلیک کردید!", "info", {
			button: "باشه"
		});
    });

    $('.sweet-multiple').on('click', function () {
        swal({
			title: "آیا اطمینان دارید؟",
			text: "پس از حذف قادر به بازیابی این فایل خیالی نخواهید بود!",
			icon: "warning",
			buttons: {
				confirm : 'بله',
				cancel : 'خیر'
			},
			dangerMode: true
        })
		.then(function(willDelete) {
			if (willDelete) {
				swal("پوف! فایل خیالی شما حذف شد!", {
					icon: "success",
					button: "باشه"
				});
			}
			else {
				swal("فایل خیالی شما در امان است!", {
					icon: "error",
					button: "باشه"
				});
			}
		});
	});
	
    $('.sweet-prompt').on('click', function() {
        swal("یک چیزی اینجا تایپ کنید:", {
			content: "input",
			button: "باشه"
		})
		.then(function(value) {
			swal('شما نوشتید: ' + value, {
				button: "باشه"
			});
		});
	});
	
    $('.sweet-ajax').on('click', function () {
        swal({
			text: 'یک فیلم جستجو کنید. مانند "La La Land".',
			content: "input",
			button: {
				text: "جستجو!",
				closeModal: false
			}
		})
		.then(function(name) {
			if (!name) throw null;
			return fetch('https://itunes.apple.com/search?term='+ name +'&entity=movie');
		})
		.then(function(results) {
			return results.json();
		})
		.then(function(json) {
			var movie = json.results[0];
			if (!movie) {
				return swal("فیلمی یافت نشد!", {
					button: "باشه"
				});
			}
			var name = movie.trackName;
			var imageURL = movie.artworkUrl100;
			swal({
				title: "نتایج:",
				text: name,
				icon: imageURL,
				button: "باشه"
			});
		})
		.catch(function(err) {
			if (err) {
				swal("وای نه!", "درخواست AJAX شکست خورد!", "error", {
					button: "باشه"
				});
			}
			else {
				swal.stopLoading();
				swal.close();
			}
		});
    });
});