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
                hoverArrows:false,
                mobileNavigation:false,
                autoSlideInterval: 5000,
                pauseOnHover: true,
                slideEaseFunction:'animate.css',
                slideEaseDuration:800,
                heightEaseDuration:800,
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
            return true;
            var api = jQuery.data( jQuery('#sticky_slider')[0], 'liquidSlider');
            api.setNextPanel(n);
            api.updateClass(e);
            jQuery(".slide_nav li").removeClass("active");
            e.parent().addClass('active');
        },
        SlideNext: function(){
            var o = $("#sticky_slider-nav-ul").find(".current").next();
            if (!o || o.length == 0) o = $("#sticky_slider-nav-ul").find("li:first");
            $(o).click();
        },
        SlidePrev: function(){
            var o = $("#sticky_slider-nav-ul").find(".current").prev();
            if (!o || o.length == 0) o = $("#sticky_slider-nav-ul").find("li:last");
            $(o).click();
        },
        effect:{
            show: function(ele){
                ele.addClass('slideInUp');
                ele.one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
                    ele.show().removeClass('slideInUp');
                    
                });
            },
            hide: function(ele){
                ele.addClass('slideOutUp');
                ele.one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
                    ele.hide().removeClass('slideOutUp');
                });
            }
        }
    },
    TestimonialSlider: {
        Init: function(){
            jQuery('#testimonials').liquidSlider({
                autoSlide: true,
                autoHeight:false,
                responsive: true,

                hoverArrows: false,
                hideSideArrows: true,
                dynamicArrows: false,

                autoSlideInterval: 6000,
                continuous: true,
                pauseOnHover: false,
                slideEaseFunction:'animate.css',
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
            ele1.hide();
            ele2.show();
            
            return false;
        },
        Go: function(callback){
            var formData = jQuery( "#download_form" ).serialize();

            jQuery(".loading").show();
            jQuery.ajax({
                type: "POST",
                url: ajax_url,
                data: formData,
                dataType: "json",
                success: function(data){
                    if(data.status == "OK"){
                        callback(true);
                    }
                    else{
                        callback(false);
                    }
                }
            }).done(function(){
                jQuery(".loading").hide();
            });
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
            var cms_type = jQuery("#cms_type").val();

            if(!site_url || !App.Validate.siteUrl(site_url) ){
                jQuery("#s_url_error").html("Invalid Site URL");
                App.Animate.error.show( jQuery("#s_url_error") );
                return false;
            }
            if(!cms_type){
                return false;

                jQuery("#s_url_error").html("Select CMS Type");
                App.Animate.error.show( jQuery("#s_url_error") );
                return false;
            }

            App.SignUp.hideEffect(jQuery(".step1"), function(){
                App.SignUp.showEffect(jQuery(".step2"));
            });
            return false;
        },
        goStep3: function(){
            var s_email = jQuery("#s_email").val();
            var s_password = jQuery("#s_password").val();

            if(!s_email || !App.Validate.email(s_email)){
                App.Animate.error.show( jQuery("#s_email_error") );
                return false;
            }

            if(!s_password){
                App.Animate.error.show( jQuery("#s_password_error") );
                return false;
            }
            if(jQuery(".btn_send").hasClass('disabled')){
                return false;
            }

            jQuery(".btn_send").addClass("disabled");
            setTimeout(function(){
                jQuery(".btn_send").removeClass("disabled");
            }, 5000);

            App.SignUp.hideEffect(jQuery(".step2"), function(){
                App.SignUp.showEffect(jQuery(".step3"));
            });
            return false;
        },
        select_cms: function(cms_type){

            var p_type = jQuery(this).attr("rel");
            var imgUrl = theme_url + '/images/icon_' + cms_type + '.png';
            jQuery('.selected_cat img').attr("src", imgUrl);

            jQuery('#cms_type').val( cms_type );
            jQuery('.select_category').hide();

            jQuery('.select_category ul li').removeClass('hide');
            jQuery('.'+cms_type).addClass('hide');
        }
    },
    Animate: {
        globalHide: function(ele){
            jQuery(ele).each(function(){
                jQuery(this).hide();
            });
            return;
            ele.addClass('fadeOutUp');
            ele.one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
                ele.hide().removeClass('fadeOutUp');
            });
        },
        error: {
            show: function(ele){
                if( !ele.hasClass('hide') ){
                    return;
                }
                ele.removeClass('hide').addClass("bounceIn");
                ele.one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
                    ele.removeClass('bounceIn');
                });
            },
            hide: function(ele){
                if( ele.hasClass('hide') ){
                    return;
                }

                $( ele ).each(function() {
                    $( this ).addClass( "hide" );
                });
                //ele.addClass('hide');
                return;
                ele.addClass('fadeOutUp');
                ele.one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
                    ele.addClass('hide').removeClass('fadeOutUp');
                });
            }
        }
    },
    Validate: {
        siteUrl: function(url){
            var pattern = new RegExp('^(https?:\\/\\/)?'+ // protocol
                              '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|'+ // domain name
                              '((\\d{1,3}\\.){3}\\d{1,3}))'+ // OR ip (v4) address
                              '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+ // port and path
                              '(\\?[;&a-z\\d%_.~+=-]*)?'+ // query string
                              '(\\#[-a-z\\d_]*)?$','i'); // fragment locator
            return pattern.test(url);
        },
        email: function(email){
            var pattern = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return pattern.test(email);
        }
    }
}

jQuery(document).ready(function($) {
    /*INIT*/
    var urlCheck;
    App.Init.ScrollUp();
    App.BlogStickySlider.Init();
    App.TestimonialSlider.Init();

    jQuery(".dt").timeago();

    //Infinit scroll manual trigger setting
    jQuery(window).unbind('.infscr');

    /* START: HEADER MENU STICKY */
    jQuery("#header").sticky({ topSpacing: 0 });

    jQuery(window).resize(function(){
        if(jQuery(this).height() < 600 && jQuery(this).width() < 768){
            jQuery("#header").unstick();
        }
        else if(jQuery(this).width() < 321){
            jQuery("#header").unstick();
        }
    }).resize(); //trigger resize on page load
    //END


    //Hide global element on click document.
    jQuery(document).on("click", "body", function(){
        App.Animate.globalHide( jQuery(".shy") );
        jQuery("#download_top").html('');
        jQuery("#download_bot").html('');
    });

    //Prevent default action
    jQuery(".btn_send").click(function(event){
        event.stopPropagation();
    });
    

    /* Bog top slider hover effect */
    if ( jQuery("#sticky_slider-nav-ul").find("li").length > 1 )
        jQuery(".slider_controls").show();

    jQuery("#featured_v").on("mouseenter", function(){
        jQuery(".currentPanel .mask").addClass('hover');
        jQuery(".slider_controls").addClass('hover');
        //App.BlogStickySlider.effect.show( jQuery(".featured_content") );
    });

    jQuery("#featured_v").on("mouseleave", function(){
        jQuery(".mask").removeClass('hover');
        jQuery(".slider_controls").removeClass('hover');
        //App.BlogStickySlider.effect.hide( jQuery(".featured_content") );
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

    jQuery('#menu-main-menu .download').on("click", "a", function(event){
        event.stopPropagation();

        jQuery("#download_bot").html('');
        var dhtml = jQuery("#download_top").html();
        if(dhtml.length > 2){
            jQuery("#download_top").html('');
            return false;
        }
        else{
            jQuery("#download_top").html( jQuery("#download_html").html() );
        }

        var ele1 = jQuery('#V_downLoad');
        var ele2 = jQuery('#v_signUp_form');

        if(ele1.css('display') == 'block' || ele2.css('display') == 'block'){
            ele1.hide();
            ele2.hide();
            return false;
        }

        ele1.show().addClass('fadeInDown');
        ele1.one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
            ele1.removeClass('fadeInDown');
        });
        return false;
    });

    jQuery('#btn_donwload_bot').on("click", function(event){
        event.stopPropagation();

        jQuery("#download_top").html('');
        var dhtml = jQuery("#download_bot").html();
        if(dhtml.length > 2){
            jQuery("#download_bot").html('');
            return false;
        }
        else{
            jQuery("#download_bot").html( jQuery("#download_html").html() );
        }

        var ele1 = jQuery('#V_downLoad');
        var ele2 = jQuery('#v_signUp_form');

        if(ele1.css('display') == 'block' || ele2.css('display') == 'block'){
            ele1.hide();
            ele2.hide();
            return false;
        }

        ele1.show().addClass('fadeInDown');
        ele1.one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
            ele1.removeClass('fadeInDown');
        });
        return false;
    });

    /*
     * Submit download form
     */
    jQuery(document).on("submit", "#download_form", function(event){
        event.stopPropagation();


        var email = jQuery("#email").val();
        var password = jQuery("#password").val();
        var site_url = jQuery("#site_url").val();
        if(!email || !App.Validate.email(email)){
            App.Animate.error.show( jQuery(".d_email") );
            return false;
        }

        if(!password){
            App.Animate.error.show( jQuery(".d_password") );
            return false;
        }

        if(!site_url  || !App.Validate.siteUrl(site_url)){
            App.Animate.error.show( jQuery(".d_site_url") );
            return false;
        }
        App.Download.Go(function(success){
            if(success){
                jQuery("#signup_form").hide();
                jQuery("#signup_thanks").show();
            }
        });
        return false;
    });
    
    /*
    * Show Signup error
    */
    jQuery(document).on("focus", "#s_url", function(){
        App.Animate.error.hide( jQuery("#s_url_error") );
        App.Animate.error.hide( jQuery("#s_cms_error") );
    });

    jQuery(document).on("focus", "#s_email", function(){
        App.Animate.error.hide( jQuery("#s_email_error") );
    });

    jQuery(document).on("focus", "#s_password", function(){
        App.Animate.error.hide( jQuery("#s_password_error") );
    });
    
   /*
    * Show Downlaod error
    */
    jQuery(document).on("focus", "#email", function(){
        App.Animate.error.hide( jQuery(".d_email") );
    });
    jQuery(document).on("focus", "#password", function(){
        App.Animate.error.hide( jQuery(".d_password") );
    });
    jQuery(document).on("focus", "#site_url", function(){
        App.Animate.error.hide( jQuery(".d_site_url") );
    });

    jQuery(document).on("focus", "#s_url", function(event){
        App.Animate.error.hide( jQuery('.es_url') );
    });

    jQuery(document).on("focus", "#s_emails", function(event){
        App.Animate.error.hide( jQuery('.es_url') );
    });

    /**
     * Check site url and set value
     */
    jQuery("#s_url").on("keyup", function(event){
        window.clearTimeout(urlCheck);

        urlCheck = setTimeout(function(){

            var url = jQuery("#s_url").val();

            if( !App.Validate.siteUrl(url) ){
                return;
            }

            jQuery(".progress_bar").removeClass('hide');
            jQuery("#progress_percent").animate({width: '100%'});

            jQuery(".selection").addClass("hide");

            jQuery.ajax({
                type: "POST",
                url: ajax_url,
                data: { action : 'getsiteinfo', site_url: url },
                dataType: "json",
                success: function(data){
                    if(data.status == "OK"){
                        jQuery(".selection").removeClass("hide");
                        App.SignUp.select_cms( data.cms );
                        jQuery(".progress_bar").addClass("hide");
                        jQuery("#progress_percent").css("width", "0%");
                    }
                }
            }).done(function(){
                jQuery(".progress_bar").addClass('hide');
            });
        }, 500);
    });

    //Prevent Default Click
    jQuery("body").on("click", ".shy", function(event){
        event.stopPropagation();
    });

    jQuery(".load_more").on("click", function(){
        jQuery(".load_more").hide();
        setTimeout(function(){
            jQuery(".load_more").show();
        }, 5000);
    });


}); //END document load

