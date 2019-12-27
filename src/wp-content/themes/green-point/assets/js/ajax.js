jQuery(document).ready(function($) {
    // var flag = true;
    // $(window).scroll(function() {
    //     if($(window).scrollTop() + $(window).height() + 0.3 >= $(document).outerHeight()) {
    //         if (flag == true) {
    //             let postInNot = '';
    //             $('.section-post-detail .main-content-post').each(function() {
    //                 postInNot += '|' + $(this).data('blog-post');
    //             });
    //             console.log(postInNot);
    //             $.ajax({
    //                 type : "post",
    //                 dataType : "json",
    //                 url : ajax_var.url,
    //                 data : {
    //                     action: "loadNewPost",
    //                     postInNot : postInNot
    //                 },
    //                 context: this,
    //                 beforeSend: function(){
    //                     $('.animate-loader').css('visibility', "visible");
    //                 },
    //                 success: function(response) {
    //                     if(response.success) {
    //                         $('.animate-loader').css('visibility', "hidden");
    //                         if(response.data) {
    //                             $('main#postPage').append(response.data);
    //                             $('div:not(.select)>select').each(function() {
    //                                 var $this = jQuery(this);
    //                                 numberOfOptions = jQuery(this).children('option').length;
    //                                 var val = $(this).val();
    //                                 $this.addClass('select-hidden');
    //                                 $this.wrap('<div class="select"></div>');
    //                                 $this.after('<div class="select-styled"></div>');
    //                                 var $styledSelect = $this.next('div.select-styled');
    //                                 var $list = jQuery('<ul />', {
    //                                     'class': 'select-options'
    //                                 }).insertAfter($styledSelect);
    //                                 for (var i = 0; i < numberOfOptions; i++) {
    //                                     var html = $this.children('option').eq(i).text();
    //                                     if (val == $this.children('option').eq(i).val()) {
    //                                         $styledSelect.text($this.children('option').eq(i).text());
    //                                     }
    //                                     jQuery('<li />', {
    //                                         html: html,
    //                                         rel: $this.children('option').eq(i).val(),
    //                                         class: (val == $this.children('option').eq(i).val()) ? 'active' : '',
    //                                     }).appendTo($list);
    //                                 }
    //                                 var $listItems = $list.children('li');
    //                                 $styledSelect.click(function(e) {
    //                                     e.stopPropagation();
    //                                     jQuery('div.select-styled.active').not(this).each(function() {
    //                                         jQuery(this).removeClass('active').next('ul.select-options').hide();
    //                                     });
    //                                     jQuery(this).toggleClass('active').next('ul.select-options').toggle();
    //                                 });
    //                                 $listItems.click(function(e) {
    //                                     e.stopPropagation();
    //                                     $styledSelect.text($(this).text()).removeClass('active');
    //                                     if ((val != $(this).attr('rel') || $(this).attr('rel') == '') && !$(this).hasClass('active')) {
    //                                         $list.children('li').removeClass('active');
    //                                         $(this).addClass('active');
    //                                         $this.val($(this).attr('rel'));
    //                                         $this.trigger('change');
    //                                     }
    //                                     $list.hide();
    //                                 });
    //                                 jQuery(document).click(function() {
    //                                     $styledSelect.removeClass('active');
    //                                     $list.hide();
    //                                 });
    //                             });
    //                             var elSticky = $('#postPage > section').length - 1;
    //                             var idPostSticky = $('#postPage > section:nth-child('+elSticky+') .main-content-post').data('blog-post');
    //                             var sticky = new Sticky('.social-share-sticky-'+idPostSticky);
    //                         } else {
    //                             flag = false;                   
    //                             $('.single-post #site-footer').css('display', "block");
    //                         }
    //                     }
    //                     else {
    //                         console.log('Error');
    //                     }
    //                 },
    //                 error: function( _jqXHR, textStatus, errorThrown ){
    //                     console.log( 'The following error occured: ' + textStatus, errorThrown );
    //                 }
    //             });
    //         }
    //     }
    // });

    //click button sort work
    $('.sec-work-post .cat-button').click(cat_button_ajax);
    //click button sort news
    $('nav.nav-post-page #post-pre').click(new_pre_ajax);
    $('nav.nav-post-page .page-button').click(new_button_ajax);
    $('nav.nav-post-page #post-next').click(new_next_ajax);

    //loadmore news
    $('.load-more-mobile').click(load_more_mobile_ajax);
    //sort ajax onload work
    sort_ajax();
   

});

var mobileCP = 1;
function load_more_mobile_ajax(){
    
    let max = Number($('#max-page').val());
    let data = mobileCP+1;
    mobileCP++;
    if(data <= max){
        $.ajax({
            type : "post",
            url : ajaxUrl,
            data : {
                action: "display_post_by_page",
                page:data,
            },
            beforeSend: function(){
                // Có thể thực hiện công việc load hình ảnh quay quay trước khi đổ dữ liệu ra
        },
        success: function(response) {
                //Làm gì đó khi dữ liệu đã được xử lý
                $('.post-container').append(response);
        },
        error: function( jqXHR, textStatus, errorThrown ){
                //Làm gì đó khi có lỗi xảy ra
                console.log( 'The following error occured: ' + textStatus, errorThrown );
        }
        });
    }
    if(data == max){
        $('.load-more-mobile').css('display','none');
    }
}

function new_button_ajax(){
     let data = Number($(this).text()); 
     new_post_ajax(data); 
}

function new_pre_ajax(){
    let currentPage = Number($('#current-page').val());
    if(currentPage > 1)
        new_post_ajax(currentPage - 1);
}

function new_next_ajax(){
    let currentPage = Number($('#current-page').val());
    let maxPage = Number($('#max-page').val());
    if(currentPage < maxPage)
        new_post_ajax(currentPage + 1);
}

//function ajax news's posts
function new_post_ajax(numPage){
    let data;
    if(numPage)
        data = numPage;
    else
        data = Number($(this).text());
    let id = "#page-" + data;
    $.ajax({
        type : "post",
        url : ajaxUrl,
        data : {
            action: "display_post_by_page",
            page:data,
        },
        beforeSend: function(){
            // Có thể thực hiện công việc load hình ảnh quay quay trước khi đổ dữ liệu ra
       },
       success: function(response) {
            //Làm gì đó khi dữ liệu đã được xử lý
            $('.page-button').removeClass('active');
            $(id).addClass('active');
            $('.post-container').html(response);
            $('html, body').animate({
                scrollTop: $(".sec-post").offset().top
            }, 500);
       },
       error: function( jqXHR, textStatus, errorThrown ){
            //Làm gì đó khi có lỗi xảy ra
            console.log( 'The following error occured: ' + textStatus, errorThrown );
       }
    });
}

function sort_ajax(){
    if($('.data-sort').length > 0){
        let key = $('.data-sort').val();
        let id = '#' + key;
        $(id).trigger( "click" );
    }
}

function cat_button_ajax(){
    $('.cat-button').removeClass('active');
    $(this).addClass('active');
    var cat = $(this).attr('name');
    $.ajax({
        type : "post",
        url : ajaxUrl,
        data : {
            action: "fill_by_cat",
            cat:cat,
        },
        beforeSend: function(){
            // Có thể thực hiện công việc load hình ảnh quay quay trước khi đổ dữ liệu ra
       },
       success: function(response) {
            //Làm gì đó khi dữ liệu đã được xử lý
            
            $('.post-gr').html(response);
       },
       error: function( jqXHR, textStatus, errorThrown ){
            //Làm gì đó khi có lỗi xảy ra
            console.log( 'The following error occured: ' + textStatus, errorThrown );
       }
    });
}