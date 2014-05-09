
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
        $('.select_category').toggle('slow');
        return false;
    });

});

