/*
  [JS Index]
  
  ---
  
  Template Name: Drex - Photography WordPress Theme
  Author:  webRedox
  Version: 1.0
*/


/*
  1. preloader
  2. show elements
    2.1. page loaded
    2.2. page ready
  3. slick slider
  4. to top arrow animation
    4.1. to top arrow scroll to top
  5. forms
    5.1. newsletter form
    5.2. contact form
  6. navigation page scroll
  7. modals
    7.1. sign up modal
      7.1.1. sign up modal additional CLOSER
  8. YouTube player
  9. swiper slider
    9.1. swiper thumbnail slider horizontal thumbs
  10. typed text
  11. navigation
    11.1. navigation active state
  12. owl slider
    12.1. owl news carousel slideshow
*/


jQuery(function() {
    "use strict";
	
	
    jQuery(window).on("load", function() {
        // 1. preloader
        jQuery("#preloader").fadeOut(600);
        jQuery(".preloader-bg").delay(400).fadeOut(600);
		
        // 2. show elements
        // 2.1. page loaded
        setTimeout(function() {
            jQuery("body").addClass("page-loaded");
        }, 400);
        // 2.2. page ready
        jQuery("body").addClass("page-ready");
		
        // 3. slick slider
        jQuery(".slider").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            asNavFor: ".home-img-container",
            pauseOnHover: true,
            speed: 800,
            variableWidth: true,
            infinite: false,
            autoplay: true,
            autoplaySpeed: 8000,
        });
        jQuery(".home-img-container").slick({
            arrows: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            asNavFor: ".slider",
            dots: false,
            pauseOnHover: true,
            speed: 600,
            variableWidth: true,
            infinite: false,
            autoplay: true,
            autoplaySpeed: 8000,
        });
    });
	
    jQuery(window).on("scroll", function() {
        // 4. to top arrow animation
        if (jQuery(this).scrollTop() > 500) {
            jQuery(".to-top-arrow").addClass("show");
        } else {
            jQuery(".to-top-arrow").removeClass("show");
        }
    });
	
    // 4.1. to top arrow scroll to top
    jQuery(".scrollToTop").on("click", function() {
        jQuery("html, body").animate({
            scrollTop: 0
        }, 800);
        return false;
    });
	
    // 5. forms
    // 5.1. newsletter form
    jQuery("form#subscribe").on("submit", function() {
        jQuery("form#subscribe .subscribe-error").remove();
        jQuery.post("subscribe.php");
        var s = !1;
        if (jQuery(".subscribe-requiredField").each(function() {
                if ("" === jQuery.trim(jQuery(this).val())) jQuery(this).prev("label").text(), jQuery(this).parent().append('<span class="subscribe-error">Please enter your Email</span>'),
                    jQuery(this).addClass("inputError"), s = !0;
                else if (jQuery(this).hasClass("subscribe-email")) {
                    var r = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?jQuery/;
                    r.test(jQuery.trim(jQuery(this).val())) || (jQuery(this).prev("label").text(), jQuery(this).parent().append('<span class="subscribe-error">Please enter a valid Email</span>'),
                        jQuery(this).addClass("inputError"), s = !0);
                }
            }), !s) {
            jQuery("form#subscribe input.submit").fadeOut("normal", function() {
                jQuery(this).parent().append("");
            });
            var r = jQuery(this).serialize();
            jQuery.post(jQuery(this).attr("action"), r, function() {
                jQuery("form#subscribe").slideUp("fast", function() {
                    jQuery(this).before('<div class="subscribe-success">Thank you for subscribing.</div>');
                });
            });
        }
        return !1;
    });
    // 5.2. contact form
    jQuery("form#form").on("submit", function() {
        jQuery("form#form .error").remove();
        var s = !1;
        if (jQuery(".requiredField").each(function() {
                if ("" === jQuery.trim(jQuery(this).val())) jQuery(this).prev("label").text(), jQuery(this).parent().append('<span class="error">This field is required</span>'), jQuery(this).addClass(
                    "inputError"), s = !0;
                else if (jQuery(this).hasClass("email")) {
                    var r = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?jQuery/;
                    r.test(jQuery.trim(jQuery(this).val())) || (jQuery(this).prev("label").text(), jQuery(this).parent().append('<span class="error">Invalid email address</span>'), jQuery(this).addClass(
                        "inputError"), s = !0);
                }
            }), !s) {
            jQuery("form#form input.submit").fadeOut("normal", function() {
                jQuery(this).parent().append("");
            });
            var r = jQuery(this).serialize();
            jQuery.post(jQuery(this).attr("action"), r, function() {
                jQuery("form#form").slideUp("fast", function() {
                    jQuery(this).before('<div class="success">Your email was sent successfully.</div>');
                });
            });
        }
        return !1;
    });
	
    // 6. navigation page scroll
    jQuery(".page-scroll").on("click", function(e) {
        var jQueryanchor = jQuery(this);
        jQuery("html, body").stop().animate({
            scrollTop: jQuery(jQueryanchor.attr("href")).offset().top - 0
        }, 1500, 'easeInOutExpo');
        e.preventDefault();
    });
	
    // 7. modals
    // 7.1. sign up modal
    jQuery(".sign-up-modal-launcher, .sign-up-modal-closer").on("click", function() {
        if (jQuery(".sign-up-modal").hasClass("open")) {
            jQuery(".sign-up-modal").removeClass("open");
        } else {
            jQuery(".sign-up-modal").addClass("open");
        }
    });
    // 7.1.1. sign up modal additional CLOSER
    jQuery(".hamburger").on("click", function() {
        jQuery(".sign-up-modal").removeClass("open");
    });
	
    // 8. YouTube player
    jQuery("#bgndVideo").YTPlayer();
	
    // 9. swiper slider
    // 9.1. swiper thumbnail slider horizontal thumbs
    var swipersliderTop = new Swiper(".swiper-slider-top", {
        direction: "horizontal",
        nextButton: ".swiper-button-next",
        prevButton: ".swiper-button-prev",
        autoplay: 4000,
        speed: 1600,
        spaceBetween: 0,
        centeredSlides: true,
        slidesPerView: "auto",
        touchRatio: 1,
        loop: true,
        slideToClickedSlide: true,
        mousewheelControl: false,
        keyboardControl: false
    });
    var swipersliderBottom = new Swiper(".swiper-slider-bottom", {
        direction: "horizontal",
        spaceBetween: 10,
        centeredSlides: true,
        slidesPerView: "auto",
        touchRatio: 1,
        loop: true,
        slideToClickedSlide: true,
        mousewheelControl: false,
        keyboardControl: false
    });
    swipersliderTop.params.control = swipersliderBottom;
    swipersliderBottom.params.control = swipersliderTop;
	
   
	
	// HOME TYPED JS
    if (jQuery('.typed-title').length) {
        jQuery('.typed-title').each(function () {
            jQuery(this).typed({
                strings: [jQuery(this).data('text1'), jQuery(this).data('text2'), jQuery(this).data('text3'), jQuery(this).data('text4') ],
                loop: jQuery(this).data('loop') ? jQuery(this).data('loop') : false ,
                typeSpeed: 35,
				backDelay: 4500,
            });
        });
    }
	
    // 11. navigation
    // 11.1. navigation active state
    jQuery("a.menu-state").on("click", function() {
        jQuery("a.menu-state").removeClass("active");
        jQuery(this).addClass("active");
    });
	
	// 12. owl slider
    // 12.1. owl news carousel slideshow
    jQuery("#news-carousel").owlCarousel({
        loop: true,
        center: true,
        items: 3,
        margin: 40,
        autoplay: jQuery('#news-carousel').data('autoplay'),
        autoplaySpeed: 1000,
        autoplayTimeout: 5000,
        smartSpeed: 450,
        nav: true,
        navText: ["<i class='owl-custom ion-chevron-left'></i>", "<i class='owl-custom ion-chevron-right'></i>"],
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 1
            },
            1024: {
                items: 1
            },
			1920: {
                items: 3
            }
        }
    });
	jQuery("[data-bg]").each(function() {
				var bg = jQuery(this).data("bg");
				jQuery(this).css({
					"background-image": 'url(' + bg + ')',
				});
		});
	jQuery("nav li").on("mouseenter", function() {
	   jQuery(this).find("ul").stop().slideDown();
	});
	jQuery("nav li").on("mouseleave", function() {
	   jQuery(this).find("ul").stop().slideUp();
	});
	
	var shs = eval(jQuery(".share-container").attr("data-share"));
    jQuery(".share-container").share({
        networks: shs
    });
	
	// ===============================================
	// OWL Carousel
	// Source: http://www.owlcarousel.owlgraphic.com
	// ===============================================

	jQuery(window).on('load', function() { // fixes Owl Carousel "autoWidth: true" issue (https://github.com/OwlCarousel2/OwlCarousel2/issues/1139).

		jQuery('.owl-carousel').each(function(){
			var jQuerycarousel = jQuery(this);
			jQuerycarousel.owlCarousel({

				items: jQuerycarousel.data("items"),
				loop: jQuerycarousel.data("loop"),
				margin: jQuerycarousel.data("margin"),
				center: jQuerycarousel.data("center"),
				startPosition: jQuerycarousel.data("start-position"),
				animateIn: jQuerycarousel.data("animate-in"),
				animateOut: jQuerycarousel.data("animate-out"),
				autoWidth: jQuerycarousel.data("autowidth"),
				autoHeight: jQuerycarousel.data("autoheight"),
				autoplay: jQuerycarousel.data("autoplay"),
				autoplayTimeout: jQuerycarousel.data("autoplay-timeout"),
				autoplayHoverPause: jQuerycarousel.data("autoplay-hover-pause"),
				autoplaySpeed: jQuerycarousel.data("autoplay-speed"),
				nav: jQuerycarousel.data("nav"),
				navText: ['', ''],
				navSpeed: jQuerycarousel.data("nav-speed"),
				dots: jQuerycarousel.data("dots"),
				dotsSpeed: jQuerycarousel.data("dots-speed"),
				mouseDrag: jQuerycarousel.data("mouse-drag"),
				touchDrag: jQuerycarousel.data("touch-drag"),
				dragEndSpeed: jQuerycarousel.data("drag-end-speed"),
				lazyLoad: jQuerycarousel.data("lazy-load"),
				video: true,
				responsive: {
					0: {
						items: jQuerycarousel.data("mobile-portrait"),
						center: false,
					},
					480: {
						items: jQuerycarousel.data("mobile-landscape"),
						center: false,
					},
					768: {
						items: jQuerycarousel.data("tablet-portrait"),
						center: false,
					},
					992: {
						items: jQuerycarousel.data("tablet-landscape"),
					},
					1200: {
						items: jQuerycarousel.data("items"),
					}
				}

			});
			
			// =====================================================
	// lightGallery (lightbox plugin)
	// Source: http://sachinchoolur.github.io/lightGallery
	// =====================================================

	jQuery(".lightgallery").lightGallery({

		// Please read about gallery options here: http://sachinchoolur.github.io/lightGallery/docs/api.html

		// lightgallery core 
		selector: '.lg-trigger',
		mode: 'lg-fade', // Type of transition between images ('lg-fade' or 'lg-slide').
		height: '100%', // Height of the gallery (ex: '100%' or '300px').
		width: '100%', // Width of the gallery (ex: '100%' or '300px').
		iframeMaxWidth: '100%', // Set maximum width for iframe.
		loop: true, // If false, will disable the ability to loop back to the beginning of the gallery when on the last element.
		speed: 600, // Transition duration (in ms).
		closable: true, // Allows clicks on dimmer to close gallery.
		escKey: true, // Whether the LightGallery could be closed by pressing the "Esc" key.
		keyPress: true, // Enable keyboard navigation.
		hideBarsDelay: 5000, // Delay for hiding gallery controls (in ms).
		controls: true, // If false, prev/next buttons will not be displayed.
		mousewheel: true, // Chane slide on mousewheel.
		download: false, // Enable download button. By default download url will be taken from data-src/href attribute but it supports only for modern browsers. If you want you can provide another url for download via data-download-url.
		counter: true, // Whether to show total number of images and index number of currently displayed image.
		swipeThreshold: 50, // By setting the swipeThreshold (in px) you can set how far the user must swipe for the next/prev image.
		enableDrag: true, // Enables desktop mouse drag support.
		enableTouch: true, // Enables touch support.

		// thumbnial plugin
		thumbnail: true, // Enable thumbnails for the gallery.
		showThumbByDefault: false, // Show/hide thumbnails by default.
		thumbMargin: 5, // Spacing between each thumbnails.
		toogleThumb: true, // Whether to display thumbnail toggle button.
		enableThumbSwipe: true, // Enables thumbnail touch/swipe support for touch devices.
		exThumbImage: 'data-exthumbnail', // If you want to use external image for thumbnail, add the path of that image inside "data-" attribute and set value of this option to the name of your custom attribute.

		// autoplay plugin
		autoplay: false, // Enable gallery autoplay.
		autoplayControls: true, // Show/hide autoplay controls.
		pause: 6000, // The time (in ms) between each auto transition.
		progressBar: true, // Enable autoplay progress bar.
		fourceAutoplay: false, // If false autoplay will be stopped after first user action

		// fullScreen plugin
		fullScreen: true, // Enable/Disable fullscreen mode.

		// zoom plugin
		zoom: true, // Enable/Disable zoom option.
		scale: 0.5, // Value of zoom should be incremented/decremented.
		enableZoomAfter: 50, // Some css styles will be added to the images if zoom is enabled. So it might conflict if you add some custom styles to the images such as the initial transition while opening the gallery. So you can delay adding zoom related styles to the images by changing the value of enableZoomAfter.

		// video options
		videoMaxWidth: '1000px', // Set limit for video maximal width.

		// Youtube video options
		loadYoutubeThumbnail: true, // You can automatically load thumbnails for youtube videos from youtube by setting loadYoutubeThumbnail true.
		youtubeThumbSize: 'default', // You can specify the thumbnail size by setting respective number: 0, 1, 2, 3, 'hqdefault', 'mqdefault', 'default', 'sddefault', 'maxresdefault'.
		youtubePlayerParams: { // Change youtube player parameters: https://developers.google.com/youtube/player_parameters
		modestbranding: 0,
		showinfo: 1,
		controls: 1
		},

		// Vimeo video options
		loadVimeoThumbnail: true, // You can automatically load thumbnails for vimeo videos from vimeo by setting loadYoutubeThumbnail true.
		vimeoThumbSize: 'thumbnail_medium', // Thumbnail size for vimeo videos: 'thumbnail_large' or 'thumbnail_medium' or 'thumbnail_small'.
		vimeoPlayerParams: { // Change vimeo player parameters: https://developer.vimeo.com/player/embedding#universal-parameters 
		byline : 1,
		portrait : 1,
		title: 1,
		color : 'CCCCCC',
		autopause: 1
		}

	});

			// Mousewheel plugin
			var owl = jQuery('.owl-mousewheel');
			owl.on('mousewheel', '.owl-stage', function (e) {
				if (e.deltaY > 0) {
					owl.trigger('prev.owl');
				} else {
					owl.trigger('next.owl');
				}
				e.preventDefault();
			});

		});

	});
});