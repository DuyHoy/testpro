jQuery(document).ready(function(){

  jQuery('[data-toggle="tooltip"]').tooltip();
  
  /* Cookie */
  if (jQuery.cookie('site_notice') == null) {
      jQuery('#header-bar').addClass('show');
      jQuery('body').addClass('header-bar-show');
  }

  jQuery( '#header-bar .btn' ).click(function() {
      jQuery.cookie('site_notice', 'yes', { expires: 1, path: '/' });
      jQuery('#header-bar').removeClass('show');
      jQuery('body').removeClass('header-bar-show');
  });

  /** Owl Carousel Init */
  if (jQuery('#visual-carousel').length > 0) {
      jQuery('#visual-carousel').on('initialized.owl.carousel changed.owl.carousel', function(e) {
          if (!e.namespace)  {
              return;
          }
          var carousel = e.relatedTarget;
          jQuery('.owl-slider-counter .current').text(carousel.relative(carousel.current()) + 1);
          jQuery('.owl-slider-counter .total').text(carousel.items().length);
      }).owlCarousel({
          nav: true,
          navText: [
              '<i class="arrow-animation left"></i>',
              '<i class="arrow-animation right"></i>'
          ],
          navContainer: '.owl-custom-nav',
          dots: true,
          margin: 0,
          items: 1,
          loop: true,
          responsiveClass: true,
          autoplay:true,
          autoplayTimeout: 5000,
          autoplayHoverPause: false,
      });
  }

  jQuery('#news-carousel').owlCarousel({
      loop: false,
      nav: false,
      dots: true,
      margin: 30,
      responsiveClass: true,
      responsive: {
          0:{
              items:1,
              nav:false
          },
          576:{
              items:2,
              nav:false
          },
          992:{
              items:3,
              nav:false
          },
          1200:{
              items:3,
              nav:false
          }
      }
  });

  jQuery('.carouselblock-carousel').owlCarousel({
      loop: true,
      nav: true,
      dots: true,
      margin: 30,
      autoplay:true,
      autoplayTimeout: 5000,
      autoplayHoverPause: true,
      dotsEach: true,
      responsiveClass: true,
      responsive: {
          0:{
              items:2,
              nav:false
          },
          576:{
              items:2,
              nav:false
          },
          768:{
              items:3,
              nav:false
          },
          992:{
              items:4,
              nav:false
          },
          1200:{
              items:5,
              nav:false
          }
      }
  });

  /** Light Gallery */
  if (jQuery('[data-toggle="light-gallery"]').length > 0) {
      jQuery('[data-toggle="light-gallery"]').lightGallery({
          selector: 'this'
      });
  }

  /** Counterup */
  jQuery('.counter-up').counterUp({
      delay: 10,
      time: 3000
  });

});

/** Header Fix on scroll */

siteHeader = jQuery('#header').height();
jQuery(window).scroll(function(){
  if (jQuery(window).scrollTop() > siteHeader*3) {
      jQuery('#header').addClass('sticky-header');
  } else {
      jQuery('#header').removeClass('sticky-header');
  }
});



/** Scrolltop */

if (jQuery('#back-to-top').length) {
  var scrollTrigger = 200,
      backToTop = function () {
          var scrollTop = jQuery(window).scrollTop();
          if (scrollTop > scrollTrigger) {
              jQuery('#back-to-top').addClass('show');
          } else {
              jQuery('#back-to-top').removeClass('show');
          }
      };
  backToTop();
  jQuery(window).on('scroll', function () {
      backToTop();
  });
  jQuery('#back-to-top').on('click', function (e) {
      e.preventDefault();
      jQuery('html,body').animate({
          scrollTop: 0
      }, 700);
  });
}