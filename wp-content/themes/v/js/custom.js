
jQuery(document).ready(function($) {

    $("#header").sticky({ topSpacing: 0 });
    

    // scrollTop
    $(window).scroll(function(){
        if ($(this).scrollTop() > 200) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    }); 

    $('.scrollup').click(function(){
        $("html, body").animate({ scrollTop: 0 }, 600);
        return false;
    });

    $('.select_btn').click(function(){
        $('.select_category').slideToggle('slow');
        return false;
    });

    /*$('.select_btn').click(function(){
        //$('.select_category').toggle('slow');
        var el = $('.select_category');
        if( $('.select_category').hasClass('collapsed') ){

            $('.select_category').removeClass('collapsed');
            $('.select_category').show().addClass('slideInDown');
            $('.select_category').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
                $('.select_category').removeClass('slideInDown');
            });
        }
        else{
            $('.select_category').addClass('collapsed');
            $('.select_category').addClass('fadeOutUp');
            $('.select_category').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
                $('.select_category').hide();
                $('.select_category').removeClass('fadeOutUp');
            });
        }
        
        return false;
    });*/

    $('.download').click(function(){
        $('#V_downLoad').toggle('slow');
        return false;
    });

});

