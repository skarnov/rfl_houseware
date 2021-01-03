// JavaScript Document
$(document).ready(function() {	
    if($(window).width() > 990) {
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
}
    

    /* ===================================
                Mouse parallax
    ====================================== */

            if($(window).width() > 990) {
                $('.section-part1,.section-part4').mousemove(function (e) {
                    $('[data-depth]').each(function () {
                        var depth = $(this).data('depth');
                        var amountMovedX = (e.pageX * -depth / 24);
                        var amountMovedY = (e.pageY * -depth / 24);

                        $(this).css({
                            'transform': 'translate3d(' + amountMovedX + 'px,' + amountMovedY + 'px, 0)',
                            'transition': '0.3s ease',
                        });
                    });
                });
            }


            $('.js-tilt').tilt({
                scale: 1.1
            })


		
	 
});





  		







 