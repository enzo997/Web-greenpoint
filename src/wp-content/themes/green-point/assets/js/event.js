var $ = jQuery;
function call_event(){
    $('.menu-button').click(menu_click);

    //fix header
    fix_header();
    
    // animation image 
    image_scroll();
}
function image_scroll(){ 
    if($('.image-scroll').length > 0){
        var top = $(window).scrollTop();
        var bottom = top + $(window).outerHeight();
        var mid = (top + bottom) /2;
        $('.image-scroll').each(function (index, element) {
            let eTop = $(element).offset().top;
            let eBottom = eTop + $(element).outerHeight();
            let center = (eTop + eBottom) /2;
            var percent = '';
            if(center >= top && center<= bottom){
                if(center < mid){
                    percent = '-' + ((mid - center)/(mid - top)*10).toString() + '%';
                }else{
                    percent = ((center - mid)/(bottom - mid)*10).toString() + '%';
                }
                $(element).find('img').css('transform', 'scale(1.25) translateY('+ percent +')');
            }
            if(center < top)
                $(element).find('img').css('transform', 'scale(1.25) translateY(-10%)');
            if(center > bottom)
                $(element).find('img').css('transform', 'scale(1.25) translateY(10%)');
        });
        // when scroll 
        $(window).scroll(function () { 
            var top = $(window).scrollTop();
            var bottom = top + $(window).outerHeight();
            var mid = (top + bottom) /2;
            $('.image-scroll').each(function (index, element) {
                let eTop = $(element).offset().top;
                let eBottom = eTop + $(element).outerHeight();
                let center = (eTop + eBottom) /2;
                var percent = '';
                if(center >= top && center<= bottom){
                    if(center < mid){
                        percent = '-' + ((mid - center)/(mid - top)*10).toString() + '%';
                    }else{
                        percent = ((center - mid)/(bottom - mid)*10).toString() + '%';
                    }
                }
                $(element).find('img').css('transform', 'scale(1.25) translateY('+ percent +')');
            });
        });
    }
}

function fix_header(){
    $(window).scroll(function () { 
        let top = $('#header').offset().top;
        if(top > 100){
            $('#header').addClass('fixed');
            $('#header').addClass('actived');
            $('.s-logo-top').addClass('fixed');
        }
        else{
            $('#header').removeClass('fixed');
            $('.s-logo-top').removeClass('fixed');
        }
    });
}

function menu_click(){
    $(this).addClass('actived');
    $(this).toggleClass('active');
    $('.s-logo-top').toggleClass('active');
    $(this).parent().toggleClass('active');
    $('.menu-full').toggleClass('active');
}
