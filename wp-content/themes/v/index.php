<?php get_header();?>
	<section id="content" class="clearfix">
		<div class="featured clearfix">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<h1>WHAT’S NEW TODAY</h1>
						<div id="featured_v" class="carousel slide" data-interval="5000" data-ride="carousel">
				            <div class="carousel-inner">
				            	<?php
								/* Get all Sticky Posts */
								$sticky = get_option( 'sticky_posts' );

								/* Sort Sticky Posts, newest at the top */
								rsort( $sticky );

								/* Get top 5 Sticky Posts */
								$sticky = array_slice( $sticky, 0, 5 );

								/* Query Sticky Posts */
								$query = new WP_Query( array( 'post__in' => $sticky, 'ignore_sticky_posts' => 1 ) );
								$i = 0;
								if ( $query->have_posts() ) :  while ( $query->have_posts() ) : $query->the_post(); 
					                $i++;

									$post_thumbnail_id = get_post_thumbnail_id( $post_id );
									
									if (has_post_thumbnail( $post->ID ) ){
										$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
										$img_url = $image[0];
									}
									else{
										$img_url = get_stylesheet_directory_uri() ."/images/post_img2.jpg";
									}
									?>
					                <div class="item <?php echo ($i == 1) ? 'active' : '';?>" style="background-image: url(<?php echo $img_url;?>);">
					                	<a class="mask" href="#">
						                    <div class="featured_content">
						                    	<div class="content_title icon_slider_blog_title animated fadeInLeftBig">
													<h1><?php the_title();?></h1>
													<span><?php echo strip_tags(get_the_category_list(', ')); ?> / <?php echo get_the_date(); ?></span>
												</div><!-- /content_title -->

												<div class="post_meta animated fadeInRightBig">
													<span class="post_comments"><?php comments_number( '0', '1', '%' ); ?></span><!-- /post_comments -->
													<span class="post_share">0</span><!-- /post_share -->
												</div>
						                    </div>
					                    </a>
					                </div><!-- /slider_item -->

				                <?php endwhile; endif; ?>
				                <?php wp_reset_postdata(); ?>
				            </div><!--//carousel-inner-end-->

				             <!-- Indicators -->
							<ol class="carousel-indicators">
								<?php 
								$i = 0;
								if ( $query->have_posts() ) :  while ( $query->have_posts() ) : $query->the_post(); 
									$i++;
									$post_thumbnail_id = get_post_thumbnail_id( $post_id );
									
									if (has_post_thumbnail( $post->ID ) ){
										$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' );
										$img_url = $image[0];
									}
									else{
										$img_url = get_stylesheet_directory_uri() ."/images/post_img2.jpg";
									}
									?>
									<li data-target="#featured_v" data-slide-to="<?php echo $i;?>" class="<?php echo ($i == 1) ? 'active' : '';?>"><img src="<?php echo $img_url;?>"></li>
								<?php endwhile; endif; ?>
							</ol>

							<!-- Controls -->
							<div class="slider_controls">
								<a class="slider_nav_left" href="#featured_v" data-slide="prev"></a>
								<a class="slider_nav_right" href="#featured_v" data-slide="next"></a>
							</div>

				        </div><!--//carousel-end-->
					</div><!-- /slide -->
				</div>
			</div><!-- /container -->
		</div><!-- /slider -->

		<div class="blog_content clearfix">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-md-8 col-sm-8">
						<div class="blog_container">
							<?php $query = new WP_Query( array( 'post__not_in' => get_option( 'sticky_posts' ) ) ); ?>
							<?php if ( $query->have_posts() ) :  while ( $query->have_posts() ) : $query->the_post(); ?>
								<?php get_template_part( 'content', get_post_format() ); ?>
							<?php endwhile; endif; ?>
							<?php wp_reset_postdata(); ?>

							<a class="btn btn-default load_more" href="#">LOAD MORE POST <?php echo get_post_format();?></a>
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