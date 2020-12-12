
(function ($){
    'use strict';
    jQuery(document).ready(function () {


       // interface-slider swiper slider init
       var pscLeft = new Swiper('.psc-left', {
            slidesPerView: 1,
            spaceBetween: 50,
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                type: 'fraction',
            },
            navigation: {
                nextEl: '.psc-button-next',
                prevEl: '.psc-button-prev',
            },
	    });

       // interface-slider swiper slider init
       var pscRight = new Swiper('.psc-right', {
            slidesPerView: 1,
            spaceBetween: 50,
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                type: 'fraction',
            },
            navigation: {
                nextEl: '.psc-button-next',
                prevEl: '.psc-button-prev',
            },
        });



       // filterProductContainer swiper slider init
       var filterProductContainer = new Swiper('.filter-product-container', {
            slidesPerView: 4,
            spaceBetween: 30,
            // loop: true,
            pagination: {
            el: '.swiper-pagination',
            clickable: true,
            },
            breakpoints: {
                990: {
                    slidesPerView: 3,
                    spaceBetween: 30
                },
                758: {
                    slidesPerView: 2,
                    spaceBetween: 30
                },
                400: {
                    slidesPerView: 1,
                    spaceBetween: 20
                }
            }
        });


       // client logo swiper slider init
       var clientLogoContainer = new Swiper('.client-logo-container', {
            slidesPerView: 4,
            spaceBetween: 30,
            // loop: true,
            pagination: {
            el: '.swiper-pagination',
            clickable: true,
            },
            breakpoints: {
                990: {
                    slidesPerView: 3,
                    spaceBetween: 30
                },
                758: {
                    slidesPerView: 2,
                    spaceBetween: 30
                },
                400: {
                    slidesPerView: 1,
                    spaceBetween: 20
                }
            }
        });



       // to top js
        $(window).on("scroll",function() {
            var scroll = $(window).scrollTop();

            if (scroll >= 500) {
                $(".to-top").addClass("fixed-totop");
            } else {
                $(".to-top").removeClass("fixed-totop");
            }
        });


         // fixed menu
        $(window).on("scroll",function() {
            var scroll = $(window).scrollTop();

            if (scroll >= 100) {
                $(".axsis-main-menu-area").addClass("fixed-menu animate slideInDown");
            } else {
                $(".axsis-main-menu-area").removeClass("fixed-menu  animate slideInDown");
            }
        });


        //mobile menu
        $('.menu-bar').on("click", function(){
            $('body').addClass('mobile-menu-open');
          })

        $('.close-btn').on("click", function(){
            $('body').removeClass('mobile-menu-open');
          })


        // lightcase init
        $('a[data-rel^=lightcase]').lightcase();


        $(window).load(function() {
            $("#loading").delay(2000).fadeOut(500);
        })


            $(".dropdown").click(function(){
                $(".submenu").slideToggle("slow");
              });


            $(".rfl-outlet-title").click(function(){
                $(".outlet-area").toggleClass("open");
              });


            // search
            $('.search-option').on("click", function(){
                $('.axsis-main-menu-area').addClass('search-open');
            })
            $('.search-close').on("click", function(){
                $('.axsis-main-menu-area').removeClass('search-open');
            });


             // mobile menu javascript
            $('.catagory-menu>li>a,.mobile-menu>ul>li>a,.mobile-menu ul.mobile-submenu>li>a,.catagory-menu ul.catagory-submenu>li>a').on('click', function(e) {
                var element = $(this).parent('li');
                event.preventDefault()
                if (element.hasClass('open')) {
                    element.removeClass('open');
                    element.find('li').removeClass('open');
                    element.find('ul').slideUp(1500,"swing");
                }
                else {
                    element.addClass('open');
                    element.children('ul').slideDown(1500,"swing");
                    element.siblings('li').children('ul').slideUp(1500,"swing");
                    element.siblings('li').removeClass('open');
                    element.siblings('li').find('li').removeClass('open');
                    element.siblings('li').find('ul').slideUp(1500,"swing");
                }
            });

            // sidebar toggle
            $('.drawer').on("click", function(){
                $('.page-content').toggleClass('open-sidebar');
              })


    });
})(jQuery);


