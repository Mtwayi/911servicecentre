/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {
        // JavaScript to be fired on all pages
      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
        $('.section.galleries .gallery-columns-3 .gallery-item .gallery-icon a').append('<div class="-musk"></div><div class="-icon"></div>');



        // var $container = $('.portfolioContainer');
        // $container.isotope({
        //     filter: '*',
        //     animationOptions: {
        //         duration: 750,
        //         easing: 'linear',
        //         queue: false
        //     }
        // });
     
        // $('.portfolioFilter a').click(function(){
        //     $('.portfolioFilter .current').removeClass('current');
        //     $(this).addClass('current');
     
        //     var selector = $(this).attr('data-filter');
        //     $container.isotope({
        //         filter: selector,
        //         animationOptions: {
        //             duration: 750,
        //             easing: 'linear',
        //             queue: false
        //         }
        //      });
        //      return false;
        // });




        $("header.navbar .navbar-toggleable-xs .menu-primary-navigation-container ul.nav li.dropdown a").each(function() {
            if ($(this).hasClass("dropdown-toggle")) {             
                $(this).prepend("<i class='fa fa-angle-down' aria-hidden='true'></i>");
            }
        }); 

        $("header.navbar .navbar-toggleable-xs .menu-primary-navigation-container ul.nav li.dropdown").hover(function(){
            $(this).addClass("open");
            }, function(){
            $(this).removeClass("open");
        });

        var equalheight;
        equalheight = function(container){
          var currentTallest = 0,
            currentRowStart = 0,
            topPosition = 0,
            currentDiv = 0,
            rowDivs = [],
            $el;
          $(container).each(function() {

            $el = $(this);
            $($el).height('auto');
            topPosition = $el.position().top;

            if (currentRowStart !== topPosition) {
              for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
                rowDivs[currentDiv].height(currentTallest);
              }
              rowDivs.length = 0; // empty the array
              currentRowStart = topPosition;
              currentTallest = $el.height();
              rowDivs.push($el);
            } else {
              rowDivs.push($el);
              currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
            }
            for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
              rowDivs[currentDiv].height(currentTallest);
            }
          });
        };

        $(window).load(function() {
          equalheight('');
        });

        $(window).resize(function(){
          //waitForFinalEvent(function() {
            equalheight('');
          //}, 300)  ;
        });

        if ($('.slider-nav').length) {
          console.log("Test");
          var gadgetCarousel = $(".owl-carousel");
          gadgetCarousel.each(function() {
            if ($(this).is(".slider-for")) {
              $(this).slick({
                navigation : false,
                pagination : false,
                arrows: false,
                autoplay: true,
                autoplaySpeed: 6000,
                dots: false,
                infinite: true,
                speed: 3000,
                fade: true,
                cssEase: 'linear'
              });
            } else if ($(this).is(".slider-nav")) {
              $(this).slick({
                navigation : false,
                pagination : false,
                arrows: true,
                autoplay: true,
                autoplaySpeed: 3000,
                dots: false,
                infinite: true,
                speed: 1000,
                fade: true,
                cssEase: 'linear'
              });
            } else {
              $(this).slick();
            }
          });
        }

        /* https://www.gravityhelp.com/forums/topic/is-it-possible-to-ad-a-form-for-voting-with-stars#post-244156 */
        if ($( ".write-review" ).length > 0) { // check that the form is on the page
          $( ".gfield_radio li i.fa-star-o" ).click(function() {
            $(this).data("sticky", true);
            var num = $(this).attr('id');
            // fill in the stars
            for (var j=0;j<=num;j++) {
              $( ".gfield_radio li:nth-child("+j+") label i").removeClass('fa-star-o').addClass('fa-star').delay( 800 );
            }
            // empty stars above the one clicked
            for (var k=5;k>num;k--) {
              $( ".gfield_radio li:nth-child("+k+") label i").removeClass('fa-star').addClass('fa-star-o').delay( 800 );
            }
          });
          
          // $( ".gfield_radio li i" )
          // .mouseover(function() {
          //   var num = $(this).attr('id');
          //   for (var j=0;j<=num;j++) {
          //     $( ".gfield_radio li:nth-child("+j+") label i").removeClass('fa-star-o').addClass('fa-star');
          //   }
          // })
          // .mouseout(function() {
          //   if (! $(this).data("sticky")) {
          //     var num = $(this).attr('id');
          //     for (var j=0;j<=num;j++) {
          //       $( ".gfield_radio li:nth-child("+j+") label i").removeClass('fa-star').addClass('fa-star-o');
          //     }
          //   }
          // });
        }

      }
    },
    // Home page
    'home': {
      init: function() {
        // JavaScript to be fired on the home page
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS

        // $('.slider-for').slick({
        //   navigation : false,
        //   pagination : false,
        //   arrows: false,
        //   autoplay: true,
        //   autoplaySpeed: 6000,
        //   dots: false,
        //   infinite: true,
        //   speed: 3000,
        //   fade: true,
        //   cssEase: 'linear'
        // });
        // $('.slider-nav').slick({
        //   slidesToShow: 1,
        //   slidesToScroll: 1,
        //   navigation : false,
        //   pagination : false,
        //   arrows: false,
        //   rtl: true,
        //   autoplay: true,
        //   autoplaySpeed: 6000,
        //   dots: false,
        //   infinite: true,
        //   speed: 3000,
        //   fade: true,
        //   cssEase: 'linear'
        // });



        // var gadgetCarousel = $(".owl-carousel");
        // gadgetCarousel.each(function() {
        //   if ($(this).is(".slider-for")) {
        //     $(this).slick({
        //       navigation : false,
        //       pagination : false,
        //       arrows: false,
        //       autoplay: true,
        //       autoplaySpeed: 6000,
        //       dots: false,
        //       infinite: true,
        //       speed: 3000,
        //       fade: true,
        //       cssEase: 'linear'
        //     });
        //   } else if ($(this).is(".slider-nav")) {
        //     $(this).slick({
        //       navigation : false,
        //       pagination : false,
        //       arrows: true,
        //       autoplay: true,
        //       autoplaySpeed: 3000,
        //       dots: false,
        //       infinite: true,
        //       speed: 1000,
        //       fade: true,
        //       cssEase: 'linear'
        //     });
        //   } else {
        //     $(this).slick();
        //   }
        // });


      }
    },
    // About us page, note the change from about-us to about_us.
    'about_us': {
      init: function() {
        // JavaScript to be fired on the about us page
      }
    },

    // Porsche page
    'porsche': {
      init: function() {
        // JavaScript to be fired on the home page
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
