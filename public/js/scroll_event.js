var tFlag = false;
let out = 0;
let lastel = ".hero";

$.fn.isInViewport = function() {
	var elementTop = $(this).offset().top;
	var elementBottom = elementTop + $(this).outerHeight();

	var viewportTop = $(window).scrollTop();
	var viewportBottom = viewportTop + $(window).height();

	// console.log($(this), viewportTop / elementTop);
	var res = viewportTop / elementTop > 0.55 && viewportTop / elementTop < 1.4;

	return res;
};


function scrollListener(event) {
	let items = [".main-section", ".announcements-section", ".products-section", ".contacts-section"];

	if (tFlag) {
		return
	}

	if (($(window).scrollTop() + $(window).height()) / document.body.offsetHeight >= 0.9) {
		$(".navigation-button").removeClass("navigation_active");
		// $(".header__burger-link").removeClass("header__burger-link_active");

		$($(".navigation-button")[3]).addClass("navigation_active");
		// $($(".header__burger-link")[3]).addClass("header__burger-link_active");
		return
	}
	if ($(window).scrollTop() <= 100) {
		$(".navigation-button").removeClass("navigation_active");
		// $(".header__burger-link").removeClass("header__burger-link_active");

		$($(".navigation-button")[0]).addClass("navigation_active");
		// $($(".header__burger-link")[0]).addClass("header__burger-link_active");
		return
	}

	items.forEach(item => {
		let el = $(item);
		if (items.indexOf(item) == 3) {
			return
		}

		if (el.isInViewport()) {
	    lastel = item;
			$(".navigation-button").removeClass("navigation_active");
			// $(".header__burger-link").removeClass("header__burger-link_active");

			$($(".navigation-button")[items.indexOf(item)]).addClass("navigation_active");
			// $($(".header__burger-link")[items.indexOf(item)]).addClass("header__burger-link_active");
		} else {
			$(".navigation-button").removeClass("navigation_active");
			// $(".header__burger-link").removeClass("header__burger-link_active");

			$($(".navigation-button")[items.indexOf(lastel)]).addClass("navigation_active");
			// $($(".header__burger-link")[items.indexOf(lastel)]).addClass("header__burger-link_active");
		}
	})

	if ($(".navigation_active").length == 0) {
		$($(".navigation-button")[items.indexOf(lastel)]).addClass("navigation_active");
		$($(".header__burger-link")[items.indexOf(lastel)]).addClass("header__burger-link_active");
	}


}
$(window).on("scroll", scrollListener);