var $ = jQuery;
function call_slick() {

    $('.banner-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        dots: true,
        prevArrow: $('.sec-banner button.pre'),
        nextArrow: $('.sec-banner button.next'),
        appendDots: $('.sec-banner .slider-dots')
    });

    $('.tt-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        dots: true,
        prevArrow: $('.sec-tt button.pre'),
        nextArrow: $('.sec-tt button.next'),
        appendDots: $('.sec-tt .slider-dots')
    });
    //single work
    $('.single---work .slider-container').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        dots: true,
        prevArrow: $('.single---work button.pre'),
        nextArrow: $('.single---work button.next'),
        appendDots: $('.single---work .slider-dots')
    });

    //home responsive
    if($(window).width() < 768){
        $('.sec-www .row').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            dots: false,
            responsive: [
                {
                    breakpoint: 576,
                    settings: {
                    infinite: false,
                    slidesToShow: 1.1,
                    }
                }
            ]
        });
    }else{
        $('.sec-www .row.slick-slider').slick('unslick');
    }
    $(window).resize(function () { 
        if($(window).width() < 768 ){
            $('.sec-www .row').not('.slick-slider').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                dots: false,
                responsive: [
                    {
                        breakpoint: 576,
                        settings: {
                        infinite: false,
                        slidesToShow: 1.1,
                        }
                    }
                ]
            });
        }else{
            $('.sec-www .row.slick-slider').slick('unslick');
        }
    });

    //single work responsive
    if($(window).width() < 576){
        $('.sec-content2 .two-image').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            dots: true,
        });
    }else{
        $('.sec-content2 .two-image.slick-slider').slick('unslick');
    }
    $(window).resize(function () { 
        if($(window).width() < 576){
            $('.sec-content2 .two-image').not('.slick-slider').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                dots: true,
            });
        }else{
            $('.sec-content2 .two-image.slick-slider').slick('unslick');
        }
    });

    //services responsive
    if($(window).width() < 576){
        $('.services--page .content-row').slick({
            slidesToShow: 1.1,
            slidesToScroll: 1,
            infinite: false,
            arrows: false,
            dots: true,
        });
    }else{
        $('.services--page .content-row.slick-slider').slick('unslick');
    }
    $(window).resize(function () { 
        if($(window).width() < 576){
            $('.services--page .content-row').not('.slick-slider').slick({
                slidesToShow: 1.1,
                slidesToScroll: 1,
                infinite: false,
                arrows: false,
                dots: true,
            });
        }else{
            $('.services--page .content-row.slick-slider').slick('unslick');
        }
    });

    //instagram responsive
    setTimeout(function(){ 
        if($(window).width() < 576){
            $('#sbi_images').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                dots: true,
                appendDots: $('.sec-instagram .slider-dots'),
            });
        }else{
            $('#sbi_images.slick-slider').slick('unslick');
        }
        $(window).resize(function () { 
            if($(window).width() < 576){
                $('#sbi_images').not('.slick-slider').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                    dots: true,
                    appendDots: $('.sec-instagram .slider-dots'),
                });
            }else{
                $('#sbi_images.slick-slider').slick('unslick');
            }
        });
    }, 1000);


    custom_slick();    //always placing it on the bottom
    custom_slick_mobile();//always placing it on the bottom
}
function custom_slick_mobile(){
    
    if($(window).width() < 769){
        $('.tt-slider').on('afterChange', function(event, slick, currentSlide, nextSlide){
            let text2 = $('.tt-slider').parent().find('.c-dots').text();
            let text1 = $('.tt-slider').parent().find('.slider-dots .slick-active button').text();
            let results = text1 + ' ' + text2;
            $('.tt-slider').parent().find('.slider-dots-mobile').text(results);
        });  
    }
}

function custom_slick(){
    $('.slider-dots button').each(function (index, element) {
        let number = $(element).text();
        let fixNumber = '0'+ number;
        $(element).text(fixNumber);
    });
    $('.slider-dots').each(function (index, element) {
        let number = $(element).find('li:last-child button').text();
        let numberFix = ' / ' + number;
        $(element).find('.c-dots').text(numberFix);
    }); 
}
