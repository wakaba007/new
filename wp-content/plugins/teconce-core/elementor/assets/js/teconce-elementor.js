/* ==============================================
TECONCE CAROUSEL
============================================== */
(function ($) {
    'use strict';

    /*----- ELEMENTOR LOAD FUNCTION CALL ---*/

    $(window).on('elementor/frontend/init', function () {

        var dataBackground = function (){
            //1. Data Background Set
            $("[data-background]").each(function () {
                $(this).css("background-image", "url(" + $(this).attr("data-background") + ")");
            });
        };

        var teconceBrandLogo = function () {
            var swiper = new Swiper(".sw__brand-logo-items", {
                slidesPerView: 1,
                spaceBetween: 30,
                loop: true,
                centeredSlides: true,
                autoplay: {
                    delay: 2500,
                    disableOnInteraction: false,
                },
                breakpoints: {
                    640: {
                        slidesPerView: 2,
                        spaceBetween: 20,
                    },
                    768: {
                        slidesPerView: 4,
                        spaceBetween: 40,
                    },
                    1024: {
                        slidesPerView: 5,
                        spaceBetween: 50,
                    },
                },

            });
        };

        function teconceTestimonial(){
            var swiper = new Swiper(".sw__testimonial-swiper-init", {
                scrollbar: {
                    el: ".swiper-scrollbar",
                    dragSize : 33,
                },
                autoplay: {
                    delay: 10000,
                    disableOnInteraction: false,
                },
                loop: true,
            });
        }

        function teconceTestimonialV2(){
            var swiper = new Swiper(".sw_testimonial_slide", {
                slidesPerView: 1,
                loop: true,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                centeredSlides: true,
                autoplay: {
                    delay: 2500,
                    disableOnInteraction: false,
                },
            });
        }

        function teconceDayCount(){
            $.fn.downCount = function (options, callback) {
                var settings = $.extend(
                    {
                        date: null,
                        offset: null,
                    },
                    options
                );

                // Throw error if date is not set
                if (!settings.date) {
                    $.error("Date is not defined.");
                }

                // Throw error if date is set incorectly
                if (!Date.parse(settings.date)) {
                    $.error(
                        "Incorrect date format, it should look like this, 12/24/2012 12:00:00."
                    );
                }

                // Save container
                var container = this;

                /**
                 * Change client's local date to match offset timezone
                 * @return {Object} Fixed Date object.
                 */
                var currentDate = function () {
                    // get client's current date
                    var date = new Date();

                    // turn date to utc
                    var utc = date.getTime() + date.getTimezoneOffset() * 60000;

                    // set new Date object
                    var new_date = new Date(utc + 3600000 * settings.offset);

                    return new_date;
                };

                /**
                 * Main downCount function that calculates everything
                 */
                function countdown() {
                    var target_date = new Date(settings.date), // set target date
                        current_date = currentDate(); // get fixed current date

                    // difference of dates
                    var difference = target_date - current_date;

                    // if difference is negative than it's pass the target date
                    if (difference < 0) {
                        // stop timer
                        clearInterval(interval);

                        if (callback && typeof callback === "function") callback();

                        return;
                    }

                    // basic math variables
                    var _second = 1000,
                        _minute = _second * 60,
                        _hour = _minute * 60,
                        _day = _hour * 24;

                    // calculate dates
                    var days = Math.floor(difference / _day),
                        hours = Math.floor((difference % _day) / _hour),
                        minutes = Math.floor((difference % _hour) / _minute),
                        seconds = Math.floor((difference % _minute) / _second);

                    // fix dates so that it will show two digets
                    days = String(days).length >= 2 ? days : "0" + days;
                    hours = String(hours).length >= 2 ? hours : "0" + hours;
                    minutes = String(minutes).length >= 2 ? minutes : "0" + minutes;
                    seconds = String(seconds).length >= 2 ? seconds : "0" + seconds;

                    // based on the date change the refrence wording
                    var ref_days = days === 1 ? "day" : "days",
                        ref_hours = hours === 1 ? "hour" : "hours",
                        ref_minutes = minutes === 1 ? "minute" : "minutes",
                        ref_seconds = seconds === 1 ? "second" : "seconds";

                    // set to DOM
                    container.find(".days").text(days);
                    container.find(".hours").text(hours);
                    container.find(".minutes").text(minutes);
                    container.find(".seconds").text(seconds);

                    container.find(".days_ref").text(ref_days);
                    container.find(".hours_ref").text(ref_hours);
                    container.find(".minutes_ref").text(ref_minutes);
                    container.find(".seconds_ref").text(ref_seconds);
                }

                // start
                var interval = setInterval(countdown, 1000);
            };

            // Countdown home 3
            var elementor_day_count_widget = $('.countdown .days');
            var day = elementor_day_count_widget.data('day');
            var month = elementor_day_count_widget.data('month');
            var year = elementor_day_count_widget.data('year');

            $(".countdown").downCount(
                {
                    date: month + '/' + day + '/' + year + ' 12:00:00',
                    offset: +6,
                },
                function () {
                    console.log("Countdown done!");
                }
            );
        }





        elementorFrontend.hooks.addAction('frontend/element_ready/global', function ($scope, $) { dataBackground(); });
        elementorFrontend.hooks.addAction('frontend/element_ready/teconce_brand_logo.default', function ($scope, $) { teconceBrandLogo(); });
        elementorFrontend.hooks.addAction('frontend/element_ready/teconce_testimonial.default', function ($scope, $) { teconceTestimonial(); });
        elementorFrontend.hooks.addAction('frontend/element_ready/teconce_testimonial_v2.default', function ($scope, $) { teconceTestimonialV2(); });
        elementorFrontend.hooks.addAction('frontend/element_ready/teconce_testimonial_v3.default', function ($scope, $) { teconceTestimonialV2(); });
        elementorFrontend.hooks.addAction('frontend/element_ready/teconce_day_count.default', function ($scope, $) { teconceDayCount(); });


    });

})(jQuery);
/* ==============================================
TECONCE STICKY
============================================== */

var $j = jQuery.noConflict();

$j(document).ready(function () {
    "use strict";
    // Xpcs header
    xpcsHeader();
});


function xpcsHeader() {

    var header = $j('.xpcs-header-yes'),
        container = $j('.xpcs-header-yes .elementor-container'),
        header_elementor = $j('.elementor-edit-mode .xpcs-header-yes'),
        header_logo = $j('.xpcs-header-yes .elementor-widget-theme-site-logo img, .xpcs-header-yes .elementor-widget-image img'),
        data_settings = header.data('settings');

    if (typeof data_settings != 'undefined') {
        var responsive_settings = data_settings["transparent_on"];
        var width = $j(window).width(),
            header_height = header.height(),
            logo_width = header_logo.width(),
            logo_height = header_logo.height();
    }

    // Check responsive is enabled
    if (typeof width != 'undefined' && width) {
        if (width >= 1025) {
            var enabled = "desktop";
        } else if (width > 767 && width < 1025) {
            var enabled = "tablet";
        } else if (width <= 767) {
            var enabled = "mobile";
        }
    }
    

    if ($j.inArray(enabled, responsive_settings) != '-1') {

        var scroll_distance = data_settings["scroll_distance"];
        var transparent_header = data_settings["transparent_header_show"];
        var background = data_settings["background"];
        var bottom_border_color = data_settings["custom_bottom_border_color"],
            bottom_border_view = data_settings["bottom_border"],
            bottom_border_width = data_settings["custom_bottom_border_width"];

        var shrink_header = data_settings["shrink_header"],
            data_height = data_settings["custom_height_header"],
            data_height_tablet = data_settings["custom_height_header_tablet"],
            data_height_mobile = data_settings["custom_height_header_mobile"];

        var shrink_logo = data_settings["shrink_header_logo"],
            data_logo_height = data_settings["custom_height_header_logo"],
            data_logo_height_tablet = data_settings["custom_height_header_logo_tablet"],
            data_logo_height_mobile = data_settings["custom_height_header_logo_mobile"];

        var change_logo_color = data_settings["change_logo_color"];

        var blur_bg = data_settings["blur_bg"];

        var scroll_distance_hide_header = data_settings["scroll_distance_hide_header"];

        // add transparent class
        if (transparent_header == "yes") {
            header.addClass('xpcs-header-transparent-yes');
        }

        // header height shrink
        if (typeof data_height != 'undefined' && data_height) {
            if (width >= 1025) {
                var shrink_height = data_height["size"];
            } else if (width > 767 && width < 1025) {
                var shrink_height = data_height_tablet["size"];
                if (shrink_height == '') {
                    shrink_height = data_height["size"];
                }
            } else if (width <= 767) {
                var shrink_height = data_height_mobile["size"];
                if (shrink_height == '') {
                    shrink_height = data_height["size"];
                }
            }
        }

        // logo height shrink

        if (typeof data_logo_height != 'undefined' && data_logo_height) {
            if (width >= 1025) {

                var shrink_logo_height = data_logo_height["size"];
                if (shrink_logo_height == '') {
                    shrink_logo_height = shrink_height;

                    var percent = parseInt(shrink_logo_height) / parseInt(header_height),
                        width = logo_width * percent,
                        height = logo_height * percent;
                } else {
                    width = logo_width * shrink_logo_height / 100,
                        height = logo_height * shrink_logo_height / 100;
                }

            } else if (width > 767 && width < 1025) {

                var shrink_logo_height = data_logo_height_tablet["size"];
                if (shrink_logo_height == '') {
                    shrink_logo_height = data_logo_height["size"];
                    if (shrink_logo_height == '') {
                        shrink_logo_height = shrink_height;

                        var percent = parseInt(shrink_logo_height) / parseInt(header_height),
                            width = logo_width * percent,
                            height = logo_height * percent;
                    } else {
                        width = logo_width * shrink_logo_height / 100,
                            height = logo_height * shrink_logo_height / 100;

                    }
                }


            } else if (width <= 767) {

                var shrink_logo_height = data_logo_height_mobile["size"];
                if (shrink_logo_height == '') {
                    shrink_logo_height = data_logo_height["size"];
                    if (shrink_logo_height == '') {
                        shrink_logo_height = shrink_height;

                        var percent = parseInt(shrink_logo_height) / parseInt(header_height),
                            width = logo_width * percent,
                            height = logo_height * percent;
                    } else {
                        width = logo_width * shrink_logo_height / 100,
                            height = logo_height * shrink_logo_height / 100;
                    }
                }


            }
        }

        // border bottom
        if (typeof bottom_border_width != 'undefined' && bottom_border_width) {
            var bottom_border = bottom_border_width["size"] + "px solid " + bottom_border_color;
        }


        // hide header on scroll
        if (typeof scroll_distance_hide_header != 'undefined' && scroll_distance_hide_header) {

            var mywindow = $j(window);
            var mypos = mywindow.scrollTop();

            mywindow.scroll(function () {
                if (mypos > scroll_distance_hide_header["size"]) {
                    if (mywindow.scrollTop() > mypos) {
                        header.addClass('headerup');
                    } else {
                        header.removeClass('headerup');
                    }
                }
                mypos = mywindow.scrollTop();
            });
        }

        // scroll function
        $j(window).on("load scroll", function (e) {
            var scroll = $j(window).scrollTop();

            if (header_elementor) {
                header_elementor.css("position", "relative");
            }

            if (scroll >= scroll_distance["size"]) {
                header.removeClass('header').addClass("xpcs-header");
                header.css("background-color", background);
                header.css("border-bottom", bottom_border);
                header.removeClass('xpcs-header-transparent-yes');

                if (shrink_header == "yes") {
                    header.css({"padding-top": "0", "padding-bottom": "0", "margin-top": "0", "margin-bottom": "0"});
                    container.css({"min-height": shrink_height, "transition": "all 0.4s ease-in-out", "-webkit-transition": "all 0.4s ease-in-out", "-moz-transition": "all 0.4s ease-in-out"});

                }

                if (shrink_logo == "yes") {
                    header_logo.css({"width": width, "transition": "all 0.4s ease-in-out", "-webkit-transition": "all 0.4s ease-in-out", "-moz-transition": "all 0.4s ease-in-out"});

                }

                if (change_logo_color == "yes") {
                    header_logo.addClass("change-logo-color");

                }

                if (blur_bg == "yes") {
                    header.css({"backdrop-filter": "saturate(180%) blur(20px)", "-webkit-backdrop-filter": "saturate(180%) blur(20px)"});

                }

            } else {
                header.removeClass("xpcs-header").addClass('header');
                header.css("background-color", "");
                header.css("border-bottom", "");

                if (transparent_header == "yes") {
                    header.addClass('xpcs-header-transparent-yes');
                }
                if (shrink_header == "yes") {
                    header.css({"padding-top": "", "padding-bottom": "", "margin-top": "", "margin-bottom": ""});
                    container.css("min-height", "");
                }
                if (shrink_logo == "yes") {
                    header_logo.css({"height": "", "width": ""});
                }
                if (change_logo_color == "yes") {
                    header_logo.removeClass("change-logo-color");

                }
                if (blur_bg == "yes") {
                    header.css({"backdrop-filter": "", "-webkit-backdrop-filter": ""});
                }
            }


        });
    }

}





