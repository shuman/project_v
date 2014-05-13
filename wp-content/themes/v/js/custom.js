var $ = jQuery;
var App = {
    Init: {
        ScrollUp: function(){
            // scrollTop
            jQuery(window).scroll(function(){
                if (jQuery(this).scrollTop() > 200) {
                    jQuery('.scrollup').fadeIn();
                } else {
                    jQuery('.scrollup').fadeOut();
                }
            }); 

            jQuery('.scrollup').click(function(){
                jQuery("html, body").animate({ scrollTop: 0 }, 600);
                return false;
            });
        }
    },
    BlogStickySlider: {
        Init: function(){
        
            jQuery('#sticky_slider').liquidSlider({
                //autoSlide: true,
                autoHeight:false,
                responsive: true,
                hoverArrows: false,
                mobileNavigation:false,
                //hashLinking: true,
                //hashTitleSelector: ".title",
                // hideSideArrows: true,
                // dynamicArrows: false,
                //autoSlideInterval: 6000,
                //continuous: true,
                //pauseOnHover: false,
                slideEaseFunction:'animate.css',
                slideEaseDuration:1000,
                heightEaseDuration:1000,
                animateIn: "fadeInLeft",
                animateOut: "fadeOutLeft",
                callback: function() {
                    var self = this;
                    jQuery('.item').each(function() {
                      jQuery(this).removeClass('animated ' + self.options.animateIn);
                    });
                  }
            });
        },
        Slide: function(e, n){
            var api = jQuery.data( jQuery('#sticky_slider')[0], 'liquidSlider');
            api.setNextPanel(n);
            api.updateClass(e);
            jQuery(".slide_nav li").removeClass("active");
            e.parent().addClass('active');
            //alert(e);
            return false;
        }
    },
    TestimonialSlider: {
        Init: function(){
            jQuery('#testimonials').liquidSlider({
                autoSlide: true,
                autoHeight:false,
                responsive: true,
                // hoverArrows: false,
                // hideSideArrows: true,
                //dynamicArrows: false,
                autoSlideInterval: 6000,
                continuous: true,
                pauseOnHover: false,
                slideEaseFunction:'animate.css',
                slideEaseDuration:1000,
                heightEaseDuration:1000,
                animateIn: "fadeInLeft",
                animateOut: "fadeOutLeft",
                callback: function() {
                    var self = this;
                    jQuery('.item').each(function() {
                      jQuery(this).removeClass('animated ' + self.options.animateIn);
                    });
                  }
            });
        }
    },
    Download: {
        showForm: function(event, type){
            event.stopPropagation();

            //Clear input:
            jQuery("#email").val('');
            jQuery("#password").val('');
            jQuery("#site_url").val('');

            var ele1 = jQuery('#V_downLoad');
            var ele2 = jQuery('#v_signUp_form');

            ele1.addClass('fadeOutUp');
            ele1.one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
                //Download List
                ele1.css("display", "none").removeClass('fadeOutUp');

                //Download Form
                ele2.css("display", "block").addClass('fadeInDown');
                ele2.one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
                    ele2.removeClass('fadeInDown');
                });
            });
            
            return false;
        }
    },
    PlayVideo: function(){

        var embedcode = jQuery("#embedcode").html();
        jQuery(".video").html(embedcode);

        return false;
    }
}
jQuery(document).ready(function($) {
    /*INIT*/
    App.Init.ScrollUp();
    App.BlogStickySlider.Init();
    App.TestimonialSlider.Init();

    jQuery(window).unbind('.infscr');

    //var api2 = jQuery.data( jQuery('#sticky_slider')[0], 'liquidSlider');

    jQuery(document).on("click", "body", function(){
        var ele = jQuery(".shy");
        ele.addClass('fadeOutUp');
        ele.one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
            ele.css("display", "none").removeClass('fadeOutUp');
        });
    });

    jQuery(document).on("click", "input", function(event){
        event.stopPropagation();
        return;
    });

    /* HEADER MENU STICKY */
    jQuery("#header").sticky({ topSpacing: 0 });


    /* Bog top slider hover effect */
    jQuery("#featured_v").on("mouseenter", function(){
        jQuery(".mask").addClass('hover');
    });

    jQuery("#featured_v").on("mouseleave", function(){
        jQuery(".mask").removeClass('hover');
    }); //END
    

    /* PRODUCT DROPDOWN */
    jQuery('.select_btn').click(function(event){
        event.stopPropagation();

        var ele = jQuery('.select_category');

        if(ele.css('display') == 'block'){
            ele.css("display", "none");
            return false;
        }

        ele.css("display", "block").addClass('fadeInDown');
        ele.one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
            ele.removeClass('fadeInDown');
        });
        return false;
    });

    jQuery('.download').click(function(){
        var ele = jQuery('#V_downLoad');

        if(ele.css('display') == 'block'){
            ele.css("display", "none");
            return false;
        }

        ele.css("display", "block").addClass('fadeInDown');
        ele.one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
            ele.removeClass('fadeInDown');
        });
        return false;
    });

    jQuery(".select_cms").on("click", "img", function(event){
        event.stopPropagation();

        var imgUrl = jQuery(this).attr("src");
        
        jQuery('.selected_cat img').attr("src", imgUrl);
        return false;
    }); //END


    jQuery(".go_step2").click(function(){
        jQuery('.step1').addClass('slideOutLeft');
        jQuery('.step1').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
            jQuery('.step1').hide();
            jQuery('.step1').removeClass('slideOutLeft');
            jQuery('.step2').show().addClass('slideInRight');
        });
        return false;
    });

    /*jQuery('.select_btn').click(function(){
        //jQuery('.select_category').toggle('slow');
        var el = jQuery('.select_category');
        if( jQuery('.select_category').hasClass('collapsed') ){

            jQuery('.select_category').removeClass('collapsed');
            jQuery('.select_category').show().addClass('slideInDown');
            jQuery('.select_category').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
                jQuery('.select_category').removeClass('slideInDown');
            });
        }
        else{
            jQuery('.select_category').addClass('collapsed');
            jQuery('.select_category').addClass('fadeOutUp');
            jQuery('.select_category').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
                jQuery('.select_category').hide();
                jQuery('.select_category').removeClass('fadeOutUp');
            });
        }
        
        return false;
    });*/

}); //END document load

