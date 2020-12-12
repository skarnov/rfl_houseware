 (function ($){
    'use strict';
    jQuery(document).ready(function () {

        var viewThumb = $('#view_thumb');
        var imasThumb = $('.imgs_thumb');
        var imgLarge = viewThumb.find('.img_large img');
        var imgThumb = viewThumb.find('.imgs_thumb a');
        var imasThumbImg = imasThumb.find('img');
        var current = 0;
        var thumbTimer;

        //set src
        var arraySrc = [];
        imasThumbImg.each(function(){
            var $this = $(this);
            var thissrc = $this.attr('src');
            if(thissrc != ''){
                arraySrc.push(thissrc);
            }else{
                $this.parent().empty();
            }
        });

        function startTimer(){
            thumbTimer = setInterval(function(){
                var currSrc = imasThumbImg.eq(current).attr('src');
                imgLarge.attr('src',currSrc);
                current +=1;
                if (current >= arraySrc.length)current = 0;
            },2000);    
        }
        imgThumb.on('click',function(){
            return false;
        });

        if (arraySrc.length > 1){
            startTimer();
            imgThumb.on('mouseenter',function(){
                var thisIndex = $(this).index(); 
                if (thisIndex < arraySrc.length){
                    clearInterval(thumbTimer);
                    current = thisIndex;
                    var thumbSrc = $(this).find('img').attr('src');
                    imgLarge.attr('src',thumbSrc);
                }
            });
            
            imgThumb.on('mouseleave',function(){
                var thisIndex = $(this).index(); 
                if (thisIndex < arraySrc.length){
                    startTimer();
                }
            });
        }


    });
})(jQuery);