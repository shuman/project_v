
jQuery(document).ready(function($) {

    $(window).load(function(){
      $("#header").sticky({ topSpacing: 0 });
    });
    
    // scrollTop
	$(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    }); 

    $('.scrollup').click(function(){
        $("html, body").animate({ scrollTop: 0 }, 600);
        return false;
    });

});

