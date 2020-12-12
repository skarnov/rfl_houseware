// JavaScript Document
$(document).ready(function() {
   
   
	$(window).scroll(function() {
		if ($(window).scrollTop() > 34) {
			$('header').addClass('smallBx');
			$('.loginBg').addClass('loginSm');
		} else {
			$('header').removeClass('smallBx');
			$('.loginBg').removeClass('loginSm');
		}
	});


//
    $('.signAcc h4').click(function() {
        if ($(this).hasClass('active')) {
            $(this).removeClass('active');
            $(this).next('.signCon').slideUp();
        } else {
            $('.signAcc h4').removeClass('active');
            $('.signAcc .signCon').slideUp();
            $(this).addClass('active');
            $(this).next('.signCon').slideDown();
        }
        return false;
    });
//
	$('.goodSlider').bxSlider({
			slideWidth:280,
			pager:false
	});
//
	
	$('.catBox').click(function() {
		if ($(this).hasClass('zindex')){
			 $('.catBox').find('.catTool').hide();
			 $('.catBox').removeClass('zindex');
		} else{	
			$('.catBox').find('.catTool').hide();
			 $(this).find('.catTool').show();
			 $('.catBox').removeClass('zindex');
			 $(this).addClass('zindex');
			 return false;
		}
    });	
	$('.toolClose').click(function() {
		 $('.catBox').find('.catTool').hide();
		 $('.catBox').removeClass('zindex');
		 return false;
	});
 		
//
	var $animation_elements = $('.animateThis');
    var $window = $(window);

    function check_if_in_view() {
        var window_height = $window.height();
        var window_top_position = $window.scrollTop();
        var window_bottom_position = (window_top_position + window_height);
        $.each($animation_elements, function() {
            var $element = $(this);
            var element_height = $element.outerHeight();
            var element_top_position = $element.offset().top;
            var element_bottom_position = (element_top_position + element_height);
            if ((element_bottom_position >= window_top_position) && (element_top_position <= window_bottom_position)) {
                var timeforgo = setTimeout(function() {
                    $element.addClass('go')
                }, 200)
            } else {
                clearTimeout(timeforgo);
                $element.removeClass('go')
            }
        })
    }
	check_if_in_view()		
    $(window).on("scroll", function() {
        check_if_in_view()
    });		
	

//
$('.menuBox').click(function() {
		$('.mobMenu').animate({'right': '0'}, 500);
	 	$('.menuBox').hide();
		$('.closeBt, .overLay').show();
		return false;
	});
	
	$('.closeBt, .overLay, .mobMenu .container > ul > li > a').click(function() {
		$('.mobMenu').animate({'right': '-100%'}, 500);
		 $('.menuBox').show();
		 $('.closeBt, .overLay').hide();
		return false;
	});		
	
	
	
	$('nav a, .mobMenu li a').click(function(){
	var scrolltop = $(document).find($(this).attr('href')).offset().top - 100;
		$('html, body').animate({scrollTop: scrolltop}, 400);
		$('nav a, .mobMenu li a').removeClass('selcted');
		$('nav a, .mobMenu li a').removeClass('active');
		$(this).addClass('selcted');
		$(this).addClass('active');
	});	
		
	 
});





  		







 