jQuery(document).ready(function ($) {
"use strict";

/////////////////////////////////////////////////////////////////////////
//        Side Menu Pop Up Option
////////////////////////////////////////////////////////////////////////// 

var sidemenuoption = $('.sidemenuoption');
    var menuoption_open = $('.sidemenuoption-open');
    var menuoption_close = $('.menuoption-close');
    var overlay = $('.body-overlay');
    var is_closed = true;
    menuoption_open.on('click', function(e) {
        e.preventDefault();
        if (is_closed == true) {
            is_closed = false;
            sidemenuoption.removeClass('themelazer-close'); 
            sidemenuoption.addClass('themelazer-open');
            overlay.addClass('overlay-show');
        } else {
            is_closed = true;
            sidemenuoption.removeClass('themelazer-open');
            sidemenuoption.addClass('themelazer-close');
            overlay.removeClass('overlay-show');
        }
    }); 
    menuoption_close.add(overlay).on('click', function(e) {
        e.preventDefault();
        sidemenuoption.removeClass('themelazer-open');
        sidemenuoption.addClass('themelazer-close');
        overlay.removeClass('overlay-show');
        is_closed = true;
    });
    
    if (typeof($.fn.slicknav) == 'function') {
        $('.themelazer-navigation').slicknav({
            prependTo: '.themelazer_mobile_menu',
            closedSymbol: '<i class="fa fa-chevron-right"></i>',
            openedSymbol: '<i class="fa fa-chevron-down"></i>',
            label: '',
            allowParentLinks: true
    });
}

/////////////////////////////////////////////////////////////////////////
//        Search Header 
////////////////////////////////////////////////////////////////////////// 

$('a[href="#search_popup"]').on('click keyup', function(event) {
  event.preventDefault();
  var target = $("#search_popup");

  $('#themelazer_search_wrapper').addClass('open');
  target.find('input').focus();
  $('#themelazer_search_wrapper > form > input[type="text"]').focus();
   
});

$('#themelazer_search_wrapper, #themelazer_search_wrapper i').on('click ', function(event) {
  if (event.target == this || event.target.className == 'ti-close' || event.keyCode == 27) {
    $(this).removeClass('open');
  }
});


 
/////////////////////////////////////////////////////////////////////////
//       Sticky Header
////////////////////////////////////////////////////////////////////////// 

$(".themelazer_middle_header").sticky({ topSpacing: 0 } );

///////////////// ///////////////// 
                   // video
///////////////// ///////////////// 
fluidvids.init({
    selector: 'iframe',
    players: ['www.youtube.com', 'player.vimeo.com']
}); 

//////////////////////////////////////////////////////////////////////////
//        Grid images
//////////////////////////////////////////////////////////////////////////  

$(".justified-gallery-post").justifiedGallery({
    rowHeight: 200,
    captions: false,
    margins : 1,
    lastRow : 'justify',
    fixedHeight : false
});

//////////////////////////////////////////////////////////////////////////
//        Image
//////////////////////////////////////////////////////////////////////////  
$('.justified-gallery-post').magnificPopup({
  type:'image', 
  delegate: 'a',
  closeOnContentClick: false,
  closeBtnInside: false,
  mainClass: 'mfp-with-zoom mfp-img-mobile',
  image: {
            verticalFit: true,
            titleSrc: function(item) {
              return item.el.attr('title');
            }
  },
  gallery: {
      enabled: true,
      navigateByImgClick: true,
      preload: [0,1]
    },
  zoom: {
            enabled: true,
            duration: 300,
            opener: function(element) {
              return element.find('img');
  }}
});
//////////////////////////////////////////////////////////////////////////
//        Share Post Via Copy Linked 
////////////////////////////////////////////////////////////////////////// 
  var shareLinkButton = $(".themelazer_share_link_button");
  var shareLinkText = $(".themelazer_share_link_text");
  var popupCopyLink = $('.themelazer_popup_copy_link');

  shareLinkButton.on('click', function () {
    shareLinkText.select();
    document.execCommand('copy');
    popupCopyLink.addClass('show');

    setTimeout(function () {
      popupCopyLink.removeClass('show');
    }, 2000);
  });

//////////////////////////////////////////////////////////////////////////
//        Sticky Sidebar
////////////////////////////////////////////////////////////////////////// 
if (jQuery('.themelazer_sticky').length) {
  jQuery('body').addClass('sticky-sidebar_init');
  jQuery('.themelazer_sticky').each(function(){

    if(jQuery(this).hasClass('elementor-element')){
      jQuery(this).find('.elementor-widget-wrap').theiaStickySidebar({
        containerSelector: jQuery(this).parent(),
        additionalMarginTop: 30,
        additionalMarginBottom: 30
      });
    }else{
      jQuery(this).theiaStickySidebar({
        additionalMarginTop: 30,
        additionalMarginBottom: 30
      });
    }
    
  });
}
//////////////////////////////////////////////////////////////////////////
//        Scroll To Top
//////////////////////////////////////////////////////////////////////////  

// Define variables outside the scroll function to avoid repeated calculations
var $window = $(window);
var $document = $(document);
var $target = $(".themelazer-blog-body, .themelazer_single_post_content_wrapper ");
var $goToTop = $('.themelazer_go_to_top');
var $nextPrevPostWrapper = $('.themelazer_next_prev_post_wrapper');
var $progressBarActive = $("#progress_bar_active");
var scrollTimeout;

$window.on('scroll', function() {
    // Use requestAnimationFrame for smoother scroll animation
    if (scrollTimeout) {
        window.cancelAnimationFrame(scrollTimeout);
    }
    scrollTimeout = window.requestAnimationFrame(scrollFunction);
});

function scrollFunction() {
    var targetLength = $target.length;
    if (targetLength > 0) {
        var contentHeight = $target.outerHeight();
        var documentScrollTop = $document.scrollTop();
        var targetScrollTop = $target.offset().top;
        var scrolled = documentScrollTop - targetScrollTop;
        if (0 <= scrolled) {
            var scrolledPercentage = (scrolled / contentHeight) * 100;
            var color = (scrolledPercentage >= 82) ? "#FFFFFF" : "#000000";
            $(".themelazer_go_to_top_body, .themelazer_single_post_content_wrapper, .themelazer_go_to_text").css("color", color);
            if (scrolledPercentage >= 0 && scrolledPercentage <= 100) {
                scrolledPercentage = (scrolledPercentage >= 90) ? 100 : scrolledPercentage;
                $progressBarActive.css("width", scrolledPercentage + "%");
            }
        } else {
            $progressBarActive.css("width", "0%");
        }
    }
    ThemelazerGoTop();
}

function ThemelazerGoTop() {
    if ($window.scrollTop() > 500) {
        $goToTop.fadeIn();
        $nextPrevPostWrapper.addClass('display');
    } else {
        $goToTop.fadeOut();
        $nextPrevPostWrapper.removeClass('display');
    }
}

//bottom to top scroll click to go
$goToTop.on('click', function() {
    $('html, body').animate({ scrollTop: 0 }, 1000);
    return false;
});
       
});

( function( $ ) {

    // Cache DOM elements
    var darkModeBtn = document.querySelector('.themelazer_btn_dark_mode');
    var body = document.body;

    // Function to set cookie
    function setCookie(key, value, time, path) {
      var expires = new Date();
      expires.setTime(expires.getTime() + time);
      var pathValue = '';
      if (typeof path !== 'undefined') {
        pathValue = 'path=' + path + ';';
      }
      document.cookie = key + '=' + value + ';' + pathValue + 'expires=' + expires.toUTCString();
    }

    // Function to get cookie
    function getCookie(key) {
      var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
      return keyValue ? keyValue[2] : null;
    }

    // Function to remove cookie
    function removeCookie(key) {
      document.cookie = key + '=; Max-Age=0; path=/';
    }

    // Click event handler for dark mode toggle
    darkModeBtn.addEventListener('click', function () {
      // Toggle dark mode class on body
      body.classList.toggle('themelazer-dark-mode-activate');

      // Update cookie based on toggle state
      if (body.classList.contains('themelazer-dark-mode-activate')) {
        setCookie('ThemelazerNightMode', 'true', 2628000000, '/');
      } else {
        removeCookie('ThemelazerNightMode');
      }

      // Toggle active class on dark mode button  
      darkModeBtn.classList.toggle('active');
    });

    // Check for cookie on page load
    if (getCookie('ThemelazerNightMode')) {
      body.classList.add('themelazer-dark-mode-activate');
      darkModeBtn.classList.add('active');
    }

//////////////////////////////////////////////////////////////////////////
//        Carousel
////////////////////////////////////////////////////////////////////////// 
var themelazer_slider_option = function ($scope, $) {
    var slickOptions = {
        dots: false,
        infinite: true,
        autoplay: $scope.attr("data-play") == "true",
        autoplaySpeed: $scope.attr("data-autospeed") || 6000,
        pauseOnHover: true,
        adaptiveHeight: true,
        centerMode: true,
        centerPadding: '9%',
        prevArrow: '<span class="themelazer-arrow-left"><i class="ti-arrow-left"></i></span>',
        nextArrow: '<span class="themelazer-arrow-right"><i class="ti-arrow-right"></i></span>',
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 0,
                settings: {
                    centerMode: false,
                    slidesToShow: 1,
                }
            },
            {
                breakpoint: 479,
                settings: {
                    centerMode: false,
                    slidesToShow: 1,
                }
            },
            {
                breakpoint: 767,
                settings: {
                    centerMode: false,
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 1199,
                settings: {
                    arrows: true,
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 1799,
                settings: {
                    arrows: true,
                    slidesToShow: 3,
                }
            },
        ]
    };

    $scope.find('.themelazer-carousel, .themelazer-carousel-z, .themelazer-slider-center, .themelazer-slider, .themelazer-feature-slider, .themelazer-feature-slider-style-two').each(function () {
        var $carousel = $(this);
        $carousel.slick(slickOptions);
        if ($carousel.hasClass('themelazer-slider-center')) {
            var $progressBar = $carousel.find('.slider-progress .progress');
            var interval;
            function startProgressbar() {
                resetProgressbar();
                var percentTime = 0;
                var isPause = false;
                interval = setInterval(function () {
                    if (!isPause) {
                        percentTime += 1 / 0.1;
                        $progressBar.css('width', percentTime + "%");
                        if (percentTime >= 100) {
                            $carousel.slick('slickNext');
                            startProgressbar();
                        }
                    }
                }, 30);
            }
            function resetProgressbar() {
                $progressBar.css('width', '0%');
                clearInterval(interval);
            }
            startProgressbar();
            $carousel.find('.themelazer-arrow-left, .themelazer-arrow-right').click(function () {
                startProgressbar();
            });
        }
    });
};

/////////////////////////////////////////////////////////////////////////
//        Masonry Support with Elementor Page Builder
////////////////////////////////////////////////////////////////////////// 
var WidgetMasonryHandler = function ($scope, $) {  
   $('.grid').masonry({
      itemSelector: '.grid-item',
      itemSelector: '.grid-item1',
      itemSelector: '.grid-item2',
    });
}    
$( window ).on( 'elementor/frontend/init', function() {
    elementorFrontend.hooks.addAction( 'frontend/element_ready/sportshub-carousel.default', themelazer_slider_option ); 
    elementorFrontend.hooks.addAction( 'frontend/element_ready/sportshub-carousel-z.default', themelazer_slider_option);
    elementorFrontend.hooks.addAction( 'frontend/element_ready/sportshub-slider.default', themelazer_slider_option );
    elementorFrontend.hooks.addAction( 'frontend/element_ready/sportshub-slider-center.default', themelazer_slider_option );
    elementorFrontend.hooks.addAction( 'frontend/element_ready/sportshub-feature-slider.default', themelazer_slider_option );
    elementorFrontend.hooks.addAction( 'frontend/element_ready/sportshub-feature-slider-style-two.default',themelazer_slider_option);
    elementorFrontend.hooks.addAction( 'frontend/element_ready/sportshub-animation-text-circle.default', themelazer_slider_option );
    elementorFrontend.hooks.addAction( 'frontend/element_ready/sportshub-marsonry-post.default', WidgetMasonryHandler );
  });
})( jQuery );