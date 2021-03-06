<?php get_header();?>
	<section id="content" class="clearfix">

		<div class="blog_content clearfix">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-md-8 col-sm-8">
						<div class="blog_container">
							<?php if ( have_posts() ) : ?>

								<header class="page-header">
									<h1 class="page-title">
										<?php
											if ( is_day() ) :
												echo get_the_date();

											elseif ( is_month() ) :
												echo "Monthly Archives: " . get_the_date('F Y');

											elseif ( is_year() ) :
												echo "Yearly Archives: ".get_the_date('Y');

											else :
												echo "Archives";
											endif;
										?>
									</h1>
								</header><!-- .page-header -->

								<?php
									// Start the Loop.
									while ( have_posts() ) : the_post();

										get_template_part( 'content', get_post_format() );

									endwhile;

								else :
									// If no content, include the "No posts found" template.
									get_template_part( 'content', 'none' );

								endif;
							?>
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
			