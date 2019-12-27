var $ = jQuery;
jQuery(document).ready(function($) {

    call_event();
    call_slick();
    new WOW().init();
  
    // JS select
    $('select').each(function() {
        var $this = jQuery(this);
        numberOfOptions = jQuery(this).children('option').length;
        var val = $(this).val();
        $this.addClass('select-hidden');
        $this.wrap('<div class="select"></div>');
        $this.after('<div class="select-styled"></div>');
        var $styledSelect = $this.next('div.select-styled');
        var $list = jQuery('<ul />', {
            'class': 'select-options'
        }).insertAfter($styledSelect);
        for (var i = 0; i < numberOfOptions; i++) {
            var html = $this.children('option').eq(i).text();
            if (val == $this.children('option').eq(i).val()) {
                $styledSelect.text($this.children('option').eq(i).text());
            }
            jQuery('<li />', {
                html: html,
                rel: $this.children('option').eq(i).val(),
                class: (val == $this.children('option').eq(i).val()) ? 'active' : '',
            }).appendTo($list);
        }
        var $listItems = $list.children('li');
        $styledSelect.click(function(e) {
            e.stopPropagation();
            jQuery('div.select-styled.active').not(this).each(function() {
                jQuery(this).removeClass('active').next('ul.select-options').hide();
            });
            jQuery(this).toggleClass('active').next('ul.select-options').toggle();
        });
        $listItems.click(function(e) {
            e.stopPropagation();
            $styledSelect.text($(this).text()).removeClass('active');
            if ((val != $(this).attr('rel') || $(this).attr('rel') == '') && !$(this).hasClass('active')) {
                $list.children('li').removeClass('active');
                $(this).addClass('active');
                $this.val($(this).attr('rel'));
                $this.trigger('change');
            }
            $list.hide();
        });
        jQuery(document).click(function() {
            $styledSelect.removeClass('active');
            $list.hide();
        });
    });

    $('.team-culture--page .member .member-post .row').slick({
        infinite: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        arrows: false,
        responsive: [
            {
            breakpoint:430,
            settings: {
                slidesToShow: 1.1,
                infinite: false,
                dots: true
            }
            }
        ]
    });
    // SpacesShaping
    if($(window).width() < 992 ){
        $('.spaceshaping--page .sec-go-into-spaceShaping .row').slick({
            infinite: true,
            slidesToShow: 2,
            slidesToScroll: 1,
            autoplay: false,
            speed:1000,
            autoplaySpeed: 1000,
            dots: true,
            arrows:false,
            responsive: [
                {
                    breakpoint: 430,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });
    }
    $(window).resize(function () {
        if($(window).width() < 992 ){
            $('.spaceshaping--page .sec-go-into-spaceShaping .row').not('.slick-slider').slick({
                infinite: true,
                slidesToShow: 2,
                slidesToScroll: 1,
                autoplay: false,
                speed:1000,
                autoplaySpeed: 1000,
                dots: true,
                arrows:false,
                responsive: [
                    {
                        breakpoint: 575,
                        settings: {
                            slidesToShow: 1
                        }
                    }
                ]
            });
        }
        if($(window).width() > 991 ){
            $('.spaceshaping--page .sec-go-into-spaceShaping .row.slick-slider').slick('unslick');
        }
    });
    /*############*/
});
