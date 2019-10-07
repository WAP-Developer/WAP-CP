$(function () {
	var path = window.location.href;
	$('.nav-link').each(function () {
		if (this.href === path) {
			$(this).addClass('active');
		}
	});
})

$(window).on('scroll', function () {
	var scroll = $(window).scrollTop();
	console.log(scroll);
	if (scroll > 50) {
		$(".navbar").addClass("bg-light");
		$(".nav-link").removeClass("nav-link-white");
		$(".active").addClass("active-1");
		$(".active").removeClass("active");
	} else {
		$(".navbar").removeClass("bg-light");
		$(".nav-link").addClass("nav-link-white");
		$(".active-1").addClass("active");
		$(".active-1").removeClass("active-1");
	}
});
