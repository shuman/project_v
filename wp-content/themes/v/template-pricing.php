<?php

/**
 * Template Name: Pricing Page
 */

get_header();?>
<section id="content" class="clearfix">
    <section class="chart_banner clearfix">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="featured_caption">
                        <?php $page_22 = get_post(22); ?>
                        <?php echo $page_22->post_content;?>
                    </div><!-- /featured_caption -->
                </div>
            </div>
        </div><!-- /container -->
    </section><!-- /chart_banner -->

    <?php get_template_part( 'content', 'pricing' ); ?>

    <?php get_template_part( 'content', 'faq' ); ?>

</section><!-- /content -->

<?php get_footer();?>