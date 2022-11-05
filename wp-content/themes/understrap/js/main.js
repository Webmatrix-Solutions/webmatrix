(function ($) {
  "use strict";

  /*====  Document Ready Function =====*/
  jQuery(document).ready(function($){
    // MOBILE MENU STARTS
    $("#main-menu").slicknav({
      allowParentLinks: true,
      prependTo: '#mobile-menu-wrap',
      label: '',
    });

    $(".mobile-menu-trigger").on("click", function(e) {
    $(".mobile-menu-container").addClass("menu-open");
    e.stopPropagation();
    });

    $(".mobile-menu-close").on("click", function(e) {
    $(".mobile-menu-container").removeClass("menu-open");
    e.stopPropagation();
    });
    // MOBILE MENU ENDS

    // Enable inline Background image
    $("[data-background]").each(function () {
      $(this).css("background-image", "url( " + $(this).attr("data-background") + "  )");
    });


    // BANNER SLID STARTS 
    function HomeSlider() {
      var SliderActive = $('.banner-slide');

      SliderActive.slick({
          slidesToShow: 1,
          autoplay: true,
          autoplaySpeed: 5000,
          speed: 1000, // slide speed
          dots: true,
          fade: true,
          draggable: true,
          pauseOnHover: false,
          arrows: false,
          prevArrow: '<i class="banner-left-arrow flaticon-left-arrow"></i>',
          nextArrow: '<i class="banner-right-arrow flaticon-right-arrow"></i>',
      });


      function doAnimations(elements) {
          var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
          elements.each(function () {
              var $this = $(this);
              var $animationDelay = $this.data('delay');
              var $animationType = 'animated ' + $this.data('animation');
              $this.css({
                  'animation-delay': $animationDelay,
                  '-webkit-animation-delay': $animationDelay
              });
              $this.addClass($animationType).one(animationEndEvents, function () {
                  $this.removeClass($animationType);
              });
          });
      }

      SliderActive.on('init', function (e, slick) {
          var $firstAnimatingElements = $('.banner-content:first-child').find('[data-animation]');
          doAnimations($firstAnimatingElements);
      });

      SliderActive.on('beforeChange', function (e, slick, currentSlide, nextSlide) {
          var $animatingElements = $('.banner-content[data-slick-index="' + nextSlide + '"]').find('[data-animation]');
          doAnimations($animatingElements);
      });

    }
    HomeSlider();
    // BANNER SLID ENDS

    // SERVICE STARTS 
    $('.service-slider').slick({
      dots: true,
      infinite: true,
      speed: 1500,
      slidesToShow: 3,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
      arrows: false,
      prevArrow: '<i class="testimonial-arrow-lef flaticon-left-arrow"></i>',
      nextArrow: '<i class="testimonil-arrow-right flaticon-right-arrow"></i>',
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 3,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        },
      ]
    });
    // SERVICE ENDS

    // VIDEO POPUP
    $('.test-popup-link').magnificPopup({
      type: 'iframe'
    });
    // VIDEO POPUP ENDS

    // POPULAR STARTS 
    $('#popular-slider').cascadingDivs();
    // POPULAR ENDS 


    // SKILL CIRCLE TEXT
    if ($(".textc").length){
    const textc = document.querySelector('.textc p');
    textc.innerHTML = textc.innerText.split("").map(
    (char, i) =>
    `<span style="transform:rotate(${i * 9}deg)">${char}</span>`

    ).join("")

    }
    // SKILL CIRCLE TEXT

    // SKILL CIRCLE BAR
    $(function(){
      $('.circlechart').circlechart();
    });
    // SKILL CIRCLE BAR

    // COUNTER STARTS 
    $('.counter').counterUp({
      delay: 10,
      time: 2000
    });
    // COUNTER ENDS

    // BRAND STARTS
    $('.brand-contant').slick({
      // dots: true,
      infinite: true,
      speed: 1000,
      slidesToShow: 6,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 3000,
      responsive: [
        {
          breakpoint: 1366,
          settings: {
            slidesToShow: 5,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 1280,
          settings: {
            slidesToShow: 4,
            slidesToScroll: 1,
          }
        },
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: true,
            dots: false
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
    });
    // BRAND ENDS

    // TESTIMONIAL STARTS
    $('.testimonial-slider').slick({
      dots: true,
      infinite: true,
      speed: 1000,
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 3000,
    });
    // TESTIMONIAL ENDS

   
    // BAR FILLAR
    if ($(".progress-bar").length){

      const skillsSection = document.getElementById('skills-section','skills-section-one','skills-section-two');
      
      const progressBars = document.querySelectorAll('.progress-bar');
      
      function showProgress(){
        progressBars.forEach(progressBar=>{
          const value = progressBar.dataset.progress;
          progressBar.style.opacity = 1;
          progressBar.style.width = `${value}%`;
        
        });
      }
      
      function hideProgress(){
        progressBars.forEach(p => {
          p.style.opacity = 0;
          p.style.width = 0;
        });
      }
      
      window.addEventListener('scroll',() => {
        const sectionPos = skillsSection.getBoundingClientRect().top;
        const screenPos = window.innerHeight;
      
        if(sectionPos < screenPos){
          showProgress();
        }else{
          hideProgress();
        }
      });

    }
    // BAR FILLAR

    // HOME TEAM MEMBER 
    $('.home-team-member').slick({
    dots: true,
    infinite: true,
    speed: 1000,
    slidesToShow: 5,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    arrows: false,
    prevArrow: '<i class="testimonial-arrow-lef flaticon-left-arrow"></i>',
    nextArrow: '<i class="testimonil-arrow-right flaticon-right-arrow"></i>',
    responsive: [
      {
        breakpoint: 1366,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 1280,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
        }
      },
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      },
    ]
    });
    // HOME TEAM MEMBER

    // HOME TESTIMONIAL STARTS
    $('.home-testimonial-slider').slick({
      dots: true,
      infinite: true,
      speed: 1000,
      slidesToShow: 3,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
      arrows: false,
      prevArrow: '<i class="testimonial-arrow-lef flaticon-left-arrow"></i>',
      nextArrow: '<i class="testimonil-arrow-right flaticon-right-arrow"></i>',
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 3,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        },
      ]
    });
    // HOME TESTIMONIAL ENDS

    // HOME THREE STUDIES STARTS
    $('.home-three-studies-container').slick({
    dots: false,
    infinite: true,
    speed: 1000,
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    arrows: true,
    prevArrow: '<i class="testimonial-arrow-lef flaticon-left-arrow"></i>',
    nextArrow: '<i class="testimonil-arrow-right flaticon-right-arrow"></i>',
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 3,
          infinite: true,
          dots: false
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      },
    ]
    });
    // HOME THREE STUDIES ENDS

    // HOME THREE TEAM STARTS
    $('.home-three-team-slider').slick({
      dots: true,
      infinite: true,
      speed: 1000,
      slidesToShow: 3,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
      arrows: false,
      prevArrow: '<i class="testimonial-arrow-lef flaticon-left-arrow"></i>',
      nextArrow: '<i class="testimonil-arrow-right flaticon-right-arrow"></i>',
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 3,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        },
      ]
    });
    // HOME THREE TEAM ENDS

    // HOME THREE TESTIMONIAL STARTS
    $('.home-three-testimonial-slider').slick({
      dots: true,
      infinite: true,
      speed: 1000,
      slidesToShow: 2,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
      arrows: false,
      prevArrow: '<i class="testimonial-arrow-lef flaticon-left-arrow"></i>',
      nextArrow: '<i class="testimonil-arrow-right flaticon-right-arrow"></i>',
      responsive: [
        {
          breakpoint: 1280,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
          }
        },
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        },
      ]
    });
    // HOME THREE TESTIMONIAL ENDS

    // ISOTOP STARTS 
    var $grid  = $('.work-row').isotope({
      itemSelector: '.grid-item',
      percentPosition: true,
      masonry: {
        // use outer width of grid-sizer for columnWidth
        columnWidth: 1
      }
    })

    // filter items on button click
    $('.filter-button-group').on( 'click', 'button', function() {
        var filterValue = $(this).attr('data-filter');
        $grid.isotope({ filter: filterValue });
    }); 

    // menu active class (it can use any menu active with class active and css color !!!!!)
    $('.filter-button-group button').on('click', function (event){
      $(this).siblings('.active').removeClass('active');
      $(this).addClass('active');
      event.preventDefault();
    });
    // ISOTOP ENDS 


    // SHOP NAV
    $('.nav-list').on( 'click', function() {
      $(".list").addClass("list-viwe");
    });
    
    $('.nav-grid').on( 'click', function() {
      $(".list").removeClass("list-viwe");
    });
    // SHOP NAV

    // BLOG DETAILS STARTS 
    $('.blog-details-slider').slick({
      dots: true,
      infinite: true,
      speed: 1500,
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
      arrows: false,
      prevArrow: '<i class="testimonial-arrow-lef flaticon-left-arrow"></i>',
      nextArrow: '<i class="testimonil-arrow-right flaticon-right-arrow"></i>',
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        },
      ]
    });
    // BLOGDETAILS ENDS

    // Scroll To Top start
    $(".scroll-to-top").on("click", function() {

      $("html, body").animate({ scrollTop: 0 }, "slow");
      return true;

    });

    $(window).on("scroll",function(){

    var pagescroll = $(window).scrollTop();
    if(pagescroll > 100){
      $(".scroll-to-top").addClass("scroll-to-top-visible");

    }else{
      $(".scroll-to-top").removeClass("scroll-to-top-visible");
    }

    });
    // Scroll To Top ends

  });

  /*====  Window Load Function =====*/
  jQuery(window).on('load', function() {
    //Preloader
    $('.preloader-wrapper').delay(1000).fadeOut('slow');
    setTimeout(function() {
        $('.site').addClass('loaded');
    }, 500);
  });


  

}(jQuery));