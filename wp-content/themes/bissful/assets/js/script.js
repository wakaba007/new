(function ($) {
    
    "use strict";

    /* Wow Js Init */
    new WOW().init();


    //2. Offcanvus toggle
    $(".offcanvus-toggle").on("click", function () {
        $(".offcanvus-box").addClass("active");
    });

    $(".offcanvus-close").on("click", function () {
        $(".offcanvus-box").removeClass("active");
    });

    $(document).on("mouseup", function (e) {
        var offCanvusMenu = $(".offcanvus-box");

        if (!offCanvusMenu.is(e.target) && offCanvusMenu.has(e.target).length === 0) {
            $(".offcanvus-box").removeClass("active");
        }
    });

    //3. Mobile Menu
    $(".mobile-menu-toggle").on("click", function () {
        $(".mobile-menu").addClass("active");
    });

    $(".mobile-menu .close").on("click", function () {
        $(".mobile-menu").removeClass("active");
    });

    if ($(".mobile-menu ul li.has-submenu").length){
        $(".mobile-menu ul li.has-submenu").append('<i class="isax icon-arrow-down1"></i>');
    }

    $(".mobile-menu ul li.has-submenu i").each(function () {
        $(this).on("click", function () {
            $(this).siblings('ul').slideToggle();
            $(this).toggleClass("icon-rotate");
        });
    });

    $(document).on("mouseup", function (e) {
        var offCanvusMenu = $(".mobile-menu");

        if (!offCanvusMenu.is(e.target) && offCanvusMenu.has(e.target).length === 0) {
            $(".mobile-menu").removeClass("active");
        }
    });

    //3. Counter
    if ($(".odometer").length) {
        $('.odometer').appear();
        $(document.body).on('appear', '.odometer', function (e) {
            var odo = $(".odometer");
            odo.each(function () {
                var countNumber = $(this).attr("data-count");
                $(this).html(countNumber);
            });
            window.xboOptions = {
                format: 'd',
            };
        });
    }


    //2. Brand Logo Slider
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


// PRELOADER
  let settings = {
    progressSize: 320,
    progressColor: '#BC7B77',
    lineWidth: 2,
    lineCap: 'round',
    preloaderAnimationDuration: 800,
    startDegree: -90,
    finalDegree: 270
  }

  function setAttributes(elem, attrs) {

    for (let key in attrs) {
      elem.setAttribute(key, attrs[key]);
    }

  }

  let preloader = document.createElement('div'),
    canvas = document.createElement('canvas'),
    size;

  (function () {

    let width = window.innerWidth,
      height = window.innerHeight;

    if (width > height) {

      size = Math.min(settings.progressSize, height / 2);

    } else {

      size = Math.min(settings.progressSize, width - 50);

    }

  })();

  setAttributes(preloader, {
    class: "preloader",
    id: 'preloader',
    style: 'transition: opacity ' + settings.preloaderAnimationDuration / 1000 + 's'
  });
  setAttributes(canvas, {
    class: 'progress-bar',
    id: 'progress-bar',
    width: settings.progressSize,
    height: settings.progressSize
  });


  preloader = document.getElementById('preloader');

  let progressBar = document.getElementById('progress-bar'),
    images = document.images,
    imagesAmount = images.length,
    imagesLoaded = 0,
    barCtx = progressBar.getContext('2d'),
    circleCenterX = progressBar.width / 2,
    circleCenterY = progressBar.height / 2,
    circleRadius = circleCenterX - settings.lineWidth,
    degreesPerPercent = 3.6,
    currentProgress = 0,
    showedProgress = 0,
    progressStep = 0,
    progressDelta = 0,
    startTime = null,
    running;

  (function () {

    return requestAnimationFrame
      || mozRequestAnimationFrame
      || webkitRequestAnimationFrame
      || oRequestAnimationFrame
      || msRequestAnimationFrame
      || function (callback) {
        setTimeout(callback, 1000 / 60);
      };

  })();

  Math.radians = function (degrees) {
    return degrees * Math.PI / 180;
  };


  progressBar.style.opacity = settings.progressOpacity;
  barCtx.strokeStyle = settings.progressColor;
  barCtx.lineWidth = settings.lineWidth;
  barCtx.lineCap = settings.lineCap;
  let angleMultiplier = (Math.abs(settings.startDegree) + Math.abs(settings.finalDegree)) / 360;
  let startAngle = Math.radians(settings.startDegree);
  document.body.style.overflowY = 'hidden';
  preloader.style.backgroundColor = settings.preloaderBackground;


  for (let i = 0; i < imagesAmount; i++) {

    let imageClone = new Image();
    imageClone.onload = onImageLoad;
    imageClone.onerror = onImageLoad;
    imageClone.src = images[i].src;

  }

  function onImageLoad() {

    if (running === true) running = false;

    imagesLoaded++;

    if (imagesLoaded >= imagesAmount) hidePreloader();

    progressStep = showedProgress;
    currentProgress = ((100 / imagesAmount) * imagesLoaded) << 0;
    progressDelta = currentProgress - showedProgress;

    setTimeout(function () {

      if (startTime === null) startTime = performance.now();
      running = true;
      animate();

    }, 10);

  }

  function animate() {

    if (running === false) {
      startTime = null;
      return;
    }

    let timeDelta = Math.min(1, (performance.now() - startTime) / settings.preloaderAnimationDuration);
    showedProgress = progressStep + (progressDelta * timeDelta);

    if (timeDelta <= 1) {


      barCtx.clearRect(0, 0, progressBar.width, progressBar.height);
      barCtx.beginPath();
      barCtx.arc(circleCenterX, circleCenterY, circleRadius, startAngle, (Math.radians(showedProgress * degreesPerPercent) * angleMultiplier) + startAngle);
      barCtx.stroke();
      requestAnimationFrame(animate);

    } else {
      startTime = null;
    }

  }

  function hidePreloader() {
    setTimeout(function () {
      $("body").addClass("page-loaded");
      document.body.style.overflowY = '';
    }, settings.preloaderAnimationDuration + 100);
  }
  var resizeTimer;






})(jQuery);

