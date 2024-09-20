(function ($) {

	// Scroll Top
	function scrollTop(){
		//Make sure the user has scrolled at least double the height of the browser
		var toggleHeight = $(window).outerHeight() * 0.5;
		$(window).scroll(function() {

			if ($(window).scrollTop() > toggleHeight) {
				//Adds active class to make button visible
				$(".m-backtotop").addClass("active");
			} else {
				//Removes active class to make button visible
				$(".m-backtotop").removeClass("active");
			}
		});

		//Scrolls the user to the top of the page again
		$(".m-backtotop").click(function() {
			$("html, body").animate({ scrollTop: 0 }, "slow");
			return false;
		});
	}

	scrollTop();


	/*------------------------------------------
    = sticky header
    -------------------------------------------*/
	function stickyHeader() {
		var scrollDirection = "";
		var lastScrollPosition = 0;

		// Clone and make header sticky if the element with class 'sw-header' exists
		if ($('.sw__main-header').length) {
			$('.sw__main-header').addClass('original').clone(true).insertAfter('.sw__main-header').addClass('sw-header-area-sticky sw-sticky-stt').removeClass('original');
		}

		// Handle scroll events
		$(window).on("scroll", function () {
			var currentScrollPosition = $(window).scrollTop();

			// Determine scroll direction
			scrollDirection = currentScrollPosition < lastScrollPosition ? "up" : "down";
			lastScrollPosition = currentScrollPosition;

			// Check if element with ID 'sw-header-area' has class 'is-sticky'
			if ($("#sw-header-area").hasClass("is-sticky")) {
				// Add or remove classes based on scroll position for sticky header and mobile header
				if (lastScrollPosition > 100) {
					$(".sw-header-area-sticky.sw-sticky-stb").addClass("sw-header-fixed");
				} else {
					$(".sw-header-area-sticky.sw-sticky-stb").removeClass("sw-header-fixed");
				}

				// Add or remove classes for sticky header based on scroll direction
				if (scrollDirection === "up" && lastScrollPosition > 100) {
					$(".sw-header-area-sticky.sw-sticky-stt").addClass("sw-header-fixed");
				} else {
					$(".sw-header-area-sticky.sw-sticky-stt").removeClass("sw-header-fixed");
				}
			}
		});
	}

	stickyHeader();


})(jQuery);

