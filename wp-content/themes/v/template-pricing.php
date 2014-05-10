<?php

/**
 * Template Name: Pricing Page
 */

get_header();?>
<section id="content" class="clearfix">
	<section class="slider clearfix">
        <div class="carousel slide">
            <div class="carousel-inner">
                <div class="item active">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                            	<div class="featured_caption">
                            		<?php $page_22 = get_post(22); ?>
									<?php echo $page_22->post_content;?>
                            	</div><!-- /featured_caption -->
                            </div>
                        </div>
                    </div><!-- /slider_item_container -->
                </div><!-- /slider_item -->
            </div><!--//carousel-inner-end-->
        </div><!--//carousel-end-->
    </section><!-- /slider -->

    <?php get_template_part( 'content', 'pricing' ); ?>

    <?php get_template_part( 'content', 'faq' ); ?>

</section><!-- /content -->

<?php get_footer();?>