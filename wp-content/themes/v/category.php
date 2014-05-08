<?php get_header();?>
	<section id="content" class="clearfix">

		<div class="blog_content clearfix">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-md-8 col-sm-8">
						<div class="blog_container">
							<?php if ( have_posts() ) : ?>

								<header class="archive-header">
									<h1 class="archive-title">Category Archives: <?php echo single_cat_title( '', false ); ?></h1>

									<?php
										// Show an optional term description.
										$term_description = term_description();
										if ( ! empty( $term_description ) ) :
											echo $term_description;
										endif;
									?>
								</header><!-- .archive-header -->

								<?php
									// Start the Loop.
									while ( have_posts() ) : the_post();

									/*
									 * Include the post format-specific template for the content. If you want to
									 * use this in a child theme, then include a file called called content-___.php
									 * (where ___ is the post format) and that will be used instead.
									 */
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