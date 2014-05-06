<?php get_header();?>
	<section id="content" class="clearfix">
		<div class="featured clearfix">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<h1>WHAT’S NEW TODAY</h1>
						<div class="slider"></div>
					</div><!-- /slide -->
				</div>
			</div><!-- /container -->
		</div><!-- /slider -->

		<div class="blog_content" class="clearfix">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-md-8 col-sm-8">
						<div class="blog_container">
							<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

								<div class="blog_post">
									<div class="post_image">
										<img src="<?php echo get_stylesheet_directory_uri();?>/images/post_img2.jpg" alt="post_img">
									</div><!-- /post_image -->

									<div class="post_title">
										<h2><?php the_title();?></h2>
										<span>blog categories / April, 26th 2014</span>
									</div><!-- /post_title -->

									<div class="post_content">
										<?php the_content();?>
										<div class="text-right">
											<a class="btn read_more btn-default" href="#">Read more</a>
										</div>
									</div><!-- /post_content -->
									<div class="post_meta">
										<span class="post_coments">113</span><!-- /post_coments -->
										<span class="post_share">256</span><!-- /post_share -->
									</div><!-- /post_meta -->
								</div><!-- /blog_post -->
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