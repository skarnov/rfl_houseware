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
        // $(window).on("scroll",function() {
        //     var scroll = $(window).scrollTop();

        //     if (scroll >= 100) {
        //         $(".axsis-main-menu-area").addClass("fixed-menu animate slideInDown");
        //     } else {
        //         $(".axsis-main-menu-area").removeClass("fixed-menu  animate slideInDown");
        //     }
        // });


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

        $(document).ready(function(){
            $('#ex1').zoom();
            $('#ex2').zoom();
            $('#ex3').zoom();
        });


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
            
            $('.mobile-menu>ul>li>a,.mobile-menu ul.mobile-submenu>li>a').on('click', function(e) {
                var element = $(this).parent('li');
                // event.preventDefault()
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
              
            $("#division_list").on("change", function(c) {
                console.log('target');
                $.get("/districts?division_id=" + c.target.value, function(c) {
                    $("#district_list option:not(:first)").remove();
                    $.each(c, function(c, f) {
                        $("#district_list").append('<option value="' +
                            f.id + '">' + f.name + "</option>")
                    })
                })
            });

            $("#district_list").on("change", function(c) {
                $.get("/upazilas?district_id=" + c.target.value, function(c) {
                    $("#upazila_list option:not(:first)").remove();
                    $.each(c, function(c, f) {
                        $("#upazila_list").append('<option value="' + f.id + '">' + f.name + "</option>")
                    })
                })
            });

            $("#upazila_list").on("change", function(c) {
                $.get("/outlets_bestbuy?upazila_id=" + c.target.value, function(c) {
                    $('.default').remove();
                    var f = [];
                    $.each(c, function(c, k) {
                            $('#showrooms').append(`
                            <a href="javascript:void(0)" onclick="getMap(this)" id="direction"  data-latitude="${k.latitude}" data-longitude="${k.longitude}"  class="nearest-shop-item default">
                                <div class="map-icon">
                                    <i class="fas fa-map-marked-alt"></i>
                                </div>
                                <div class="nearest-shop-content">
                                    <h5>`+ k.name +`</h5>
                                    <p>`+ k.address +`</p>
                                    <p>`+ k.phone +`</p>
                                    <span class="map-control-btn-span mt-1">Get Direction </span>
                                </div>
                            </a>`);
                            $('#locatmap').html(`<div class="lock"><iframe  id="fmap" width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=`+ k.latitude +`,`+ k.longitude +`&amp;hl=es;z=14&amp;output=embed" style="border:0" allowfullscreen=""></iframe></div>`);
                    });
                  
                })
            });

            if ($('#showrooms').is(':empty')){
                $.get("/outlets_list_default?upazila_id=2", function(c) {
                    var f = [];
                    $.each(c, function(c, k) {
                        $('#showrooms').append(`
                        <a href="javascript:void(0)" onclick="getMap(this)" id="direction"  data-latitude="${k.latitude}" data-longitude="${k.longitude}"  class="nearest-shop-item default">
                            <div class="map-icon">
                                <i class="fas fa-map-marked-alt"></i>
                            </div>
                            <div class="nearest-shop-content">
                                <h5>`+ k.name +`</h5>
                                <p>`+ k.address +`</p>
                                <p>`+ k.phone +`</p>
                                <span class="map-control-btn-span mt-1">Get Direction </span>
                            </div>
                        </a>`);
                      
                    
    
                        $('#locatmap').html(`<div class="lock default"><iframe id="fmap" width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=`+ k.latitude +`,`+ k.longitude +`&amp;hl=es;z=14&amp;output=embed" style="border:0" allowfullscreen=""></iframe></div>`);
                    });
                });
            }


            $("#division_list2").on("change", function(c) {
                console.log('target');
                $.get("/districts?division_id=" + c.target.value, function(c) {
                    $("#district_list2 option:not(:first)").remove();
                    $.each(c, function(c, f) {
                        $("#district_list2").append('<option value="' +
                            f.id + '">' + f.name + "</option>")
                    })
                })
            });

            $("#district_list2").on("change", function(c) {
                $.get("/upazilas?district_id=" + c.target.value, function(c) {
                    $("#upazila_list2 option:not(:first)").remove();
                    $.each(c, function(c, f) {
                        $("#upazila_list2").append('<option value="' + f.id + '">' + f.name + "</option>")
                    })
                })
            });

            $("#upazila_list2").on("change", function(c) {
                $.get("/outlets_exclusive?upazila_id=" + c.target.value, function(c) {
                    $('.default').remove();
                    var f = [];
                    $.each(c, function(c, k) {
                            $('#showrooms2').append(`
                            <a href="javascript:void(0)" onclick="getMap(this)" id="direction"  data-latitude="${k.latitude}" data-longitude="${k.longitude}"  class="nearest-shop-item default">
                                <div class="map-icon">
                                    <i class="fas fa-map-marked-alt"></i>
                                </div>
                                <div class="nearest-shop-content">
                                    <h5>`+ k.name +`</h5>
                                    <p>`+ k.address +`</p>
                                    <p>`+ k.phone +`</p>
                                    <span class="map-control-btn-span mt-1">Get Direction </span>
                                </div>
                            </a>`);
                            $('#locatmap2').html(`<div class="lock"><iframe  id="fmap" width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=`+ k.latitude +`,`+ k.longitude +`&amp;hl=es;z=14&amp;output=embed" style="border:0" allowfullscreen=""></iframe></div>`);
                    });
                  
                })
            });

            if ($('#showrooms2').is(':empty')){
                $.get("/outlets_exclusive_default?upazila_id=2", function(c) {
                    var f = [];
                    $.each(c, function(c, k) {
                        $('#showrooms2').append(`
                        <a href="javascript:void(0)" onclick="getMap(this)" id="direction"  data-latitude="${k.latitude}" data-longitude="${k.longitude}"  class="nearest-shop-item default">
                            <div class="map-icon">
                                <i class="fas fa-map-marked-alt"></i>
                            </div>
                            <div class="nearest-shop-content">
                                <h5>`+ k.name +`</h5>
                                <p>`+ k.address +`</p>
                                <p>`+ k.phone +`</p>
                                <span class="map-control-btn-span mt-1">Get Direction </span>
                            </div>
                        </a>`);
                      
                    
    
                        $('#locatmap2').html(`<div class="lock default"><iframe id="fmap" width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=`+ k.latitude +`,`+ k.longitude +`&amp;hl=es;z=14&amp;output=embed" style="border:0" allowfullscreen=""></iframe></div>`);
                    });
                });
            }

            $("#division_list3").on("change", function(c) {
                console.log('target');
                $.get("/districts?division_id=" + c.target.value, function(c) {
                    $("#district_list3 option:not(:first)").remove();
                    $.each(c, function(c, f) {
                        $("#district_list3").append('<option value="' +
                            f.id + '">' + f.name + "</option>")
                    })
                })
            });

            $("#district_list3").on("change", function(c) {
                $.get("/upazilas?district_id=" + c.target.value, function(c) {
                    $("#upazila_list3 option:not(:first)").remove();
                    $.each(c, function(c, f) {
                        $("#upazila_list3").append('<option value="' + f.id + '">' + f.name + "</option>")
                    })
                })
            });

            $("#upazila_list3").on("change", function(c) {
                $.get("/outlets_carniva?upazila_id=" + c.target.value, function(c) {
                    $('.default').remove();
                    var f = [];
                    $.each(c, function(c, k) {
                            $('#showrooms3').append(`
                            <a href="javascript:void(0)" onclick="getMap(this)" id="direction"  data-latitude="${k.latitude}" data-longitude="${k.longitude}"  class="nearest-shop-item default">
                                <div class="map-icon">
                                    <i class="fas fa-map-marked-alt"></i>
                                </div>
                                <div class="nearest-shop-content">
                                    <h5>`+ k.name +`</h5>
                                    <p>`+ k.address +`</p>
                                    <p>`+ k.phone +`</p>
                                    <span class="map-control-btn-span mt-1">Get Direction </span>
                                </div>
                            </a>`);
                            $('#locatmap3').html(`<div class="lock"><iframe  id="fmap" width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=`+ k.latitude +`,`+ k.longitude +`&amp;hl=es;z=14&amp;output=embed" style="border:0" allowfullscreen=""></iframe></div>`);
                    });
                  
                })
            });

            if ($('#showrooms3').is(':empty')){
                $.get("/outlets_carniva_default?upazila_id=2", function(c) {
                    var f = [];
                    $.each(c, function(c, k) {
                        $('#showrooms3').append(`
                        <a href="javascript:void(0)" onclick="getMap(this)" id="direction"  data-latitude="${k.latitude}" data-longitude="${k.longitude}"  class="nearest-shop-item default">
                            <div class="map-icon">
                                <i class="fas fa-map-marked-alt"></i>
                            </div>
                            <div class="nearest-shop-content">
                                <h5>`+ k.name +`</h5>
                                <p>`+ k.address +`</p>
                                <p>`+ k.phone +`</p>
                                <span class="map-control-btn-span mt-1">Get Direction </span>
                            </div>
                        </a>`);
                      
                    
    
                        $('#locatmap3').html(`<div class="lock default"><iframe id="fmap" width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=`+ k.latitude +`,`+ k.longitude +`&amp;hl=es;z=14&amp;output=embed" style="border:0" allowfullscreen=""></iframe></div>`);
                    });
                });
            }



             //popup
            $('.popup-close,.popup-overlay').on("click", function(){
                $('#popup').hide();
            });
            $(document).ready(function()  {
                $("#popup").delay(2000).fadeIn();
            });

 

    });
})(jQuery);

function getMap(e){
    var latitude = e.getAttribute('data-latitude');
    var longitude = e.getAttribute('data-longitude');
    var element = document.getElementById("fmap");
    element.setAttribute("src", `https://maps.google.com/maps?q=`+ latitude +`,`+ longitude +`&hl=es;z=14&output=embed`);
    console.log(element);

}

