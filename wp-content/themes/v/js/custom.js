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
                autoSlide: true,
                autoHeight:false,
                responsive: true,
                mobileNavigation:false,
                // hoverArrows: false,
                // hideSideArrows: true,
                dynamicArrows: false,
                
                autoSlideInterval: 5000,
                pauseOnHover: true,
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
            jQuery(".error").addClass("hide");

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
    },
    SignUp: {
        hideEffect: function(ele, callback){
            ele.addClass('fadeOutLeft');
            ele.one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
                ele.addClass('hide').removeClass('fadeOutLeft');
                callback(true);
            });
        },
        showEffect: function(ele){
            ele.removeClass("hide").addClass('fadeInRight');
            ele.one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
                ele.removeClass('fadeInRight');
            });
        },
        goStep1: function(){
            App.SignUp.hideEffect(jQuery(".signUp_v ul li"), function(){
                App.SignUp.showEffect(jQuery(".step1"));
            });
            return false;
        },
        goStep2: function(){
            var site_url = jQuery("#s_url").val();
            if(!site_url){
                App.Animate.error.show( jQuery(".es_url") );
                return false;
            }

            App.SignUp.hideEffect(jQuery(".step1"), function(){
                App.SignUp.showEffect(jQuery(".step2"));
            });
            return false;
        },
        goStep3: function(){
            var s_email = jQuery("#s_email").val();
            if(!s_email){
                App.Animate.error.show( jQuery(".s_email") );
                return false;
            }

            App.SignUp.hideEffect(jQuery(".step2"), function(){
                App.SignUp.showEffect(jQuery(".step3"));
            });
            return false;
        },
        goStep4: function(){
            App.SignUp.hideEffect(jQuery(".step3"), function(){
                App.SignUp.showEffect(jQuery(".step4"));
            });
            return false;
        },
        goStep5: function(){
            var username = jQuery("#username").val();
            var s_password = jQuery("#s_password").val();
            if(!username || !s_password){
                App.Animate.error.show( jQuery(".up_error") );
                return false;
            }

            App.SignUp.hideEffect(jQuery(".step4"), function(){
                App.SignUp.showEffect(jQuery(".step5"));
            });
            return false;
        }
    },
    Animate: {
        globalHide: function(ele){
            ele.addClass('fadeOutUp');
            ele.one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
                ele.css("display", "none").removeClass('fadeOutUp');
            });
        },
        error: {
            show: function(ele){
                ele.removeClass('hide').addClass("bounceIn");
                ele.one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
                    ele.removeClass('bounceIn');
                });
            },
            hide: function(ele){
                ele.addClass('fadeOutUp');
                ele.one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
                    ele.addClass('hide').removeClass('fadeOutUp');
                });
            }
        }
    }
}
jQuery(document).ready(function($) {
    /*INIT*/
    App.Init.ScrollUp();
    App.BlogStickySlider.Init();
    App.TestimonialSlider.Init();

    //Infinit scroll manual trigger setting
    jQuery(window).unbind('.infscr');

    //Hide global element on click document.
    jQuery(document).on("click", "body", function(){
        App.Animate.globalHide( jQuery(".shy") );
    });

    //Prevent global hide on input focus
    jQuery(document).on("click", "input", function(event){
        event.stopPropagation();
        return;
    });

    jQuery('input[type="text"]').on("focus", function(){
        App.Animate.error.hide( jQuery('.error') );
    });

    jQuery('input[type="password"]').on("focus", function(){
        App.Animate.error.hide( jQuery('.error') );
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
    jQuery('.selection').click(function(event){
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

    jQuery("#download_form").submit(function(){
        var email = jQuery("#email").val();
        var password = jQuery("#password").val();
        var site_url = jQuery("#site_url").val();
        if(!email){
            App.Animate.error.show( jQuery(".e_email") );
            return false;
        }

        if(!password){
            App.Animate.error.show( jQuery(".e_password") );
            return false;
        }

        if(!site_url){
            App.Animate.error.show( jQuery(".e_site_url") );
            return false;
        }
        return false;
    });
    
    jQuery("#email").on("focus", function(){
        App.Animate.error.hide( jQuery(".e_email") );
    });
    jQuery("#password").on("focus", function(){
        App.Animate.error.hide( jQuery(".e_password") );
    });
    jQuery("#site_url").on("focus", function(){
        App.Animate.error.hide( jQuery(".e_site_url") );
    });

    jQuery(".select_cms").on("click", function(event){
        event.stopPropagation();

        var p_type = jQuery(this).attr("rel");

        var imgUrl = theme_url + '/images/icon_' + p_type + '.png';
        
        jQuery('.selected_cat img').attr("src", imgUrl);
        jQuery('#cms_type').val( p_type );
        return false;
    });


}); //END document load

