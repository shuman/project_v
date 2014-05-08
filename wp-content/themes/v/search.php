<?php get_header();?>
	<section id="content" class="clearfix">
		<header class="page-header">
			<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'twentyfourteen' ), get_search_query() ); ?></h1>
		</header><!-- .page-header -->

		<div class="blog_content clearfix">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-md-8 col-sm-8">
						<div class="blog_container">
							<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
								<?php get_template_part( 'content', get_post_format() ); ?>
							<?php endwhile; endif; ?>

							<a class="btn btn-default load_more" href="#">LOAD MORE POST</a>
						</div><!-- /blog_container -->
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4">
						<?php get_sidebar();?>
					</div>
				</div><!-- /row -->
			</div><!-- /container -->
		</div><!-- /blog_content -->

	</section><!-- /content -->
<?php get_footer();?>