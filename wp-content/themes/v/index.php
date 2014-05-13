<?php get_header();?>
	<section id="content" class="clearfix">
		<div class="featured clearfix">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<h1>WHAT’S NEW TODAY</h1>
						<div id="featured_v" class="slide">
				            <div id="sticky_slider" class="liquid-slider">
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
										$thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' );
										$img_url = $image[0];
										$thumb_url = $thumb[0];
									}
									else{
										$img_url = get_stylesheet_directory_uri() ."/images/post_img2.jpg";
										$thumb_url = get_stylesheet_directory_uri() ."/images/post_img2.jpg";
									}
									?>
					                <div id="slide-<?php echo $i;?>" class="item <?php echo ($i == 1) ? 'active' : '';?>" style="background-image: url(<?php echo $img_url;?>);">
					                	<h2 class="title"><i class="icon-signout"><img style="width:50px;height:50px;" src="<?php echo $thumb_url;?>"></i><span>Sign Out</span></h2>
					                	<a class="mask" href="#">
						                    <div class="featured_content">
						                    	<div class="content_title icon_slider_blog_title">
													<h1><?php the_title();?></h1>
													<span><?php echo strip_tags(get_the_category_list(', ')); ?> / <?php echo get_the_date(); ?></span>
												</div><!-- /content_title -->

												<div class="post_meta">
													<span class="post_comments"><?php comments_number( '0', '1', '%' ); ?></span><!-- /post_comments -->
													<span class="post_share">0</span><!-- /post_share -->
												</div>
						                    </div>
					                    </a>
					                </div><!-- /slider_item -->

				                <?php endwhile; endif; ?>
				                <?php wp_reset_postdata(); ?>
				            </div><!--//carousel-inner-end-->

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
						</div><!-- /blog_container -->
						<div class="post_navs"><?php posts_nav_link('', 'Prev', '<span class="btn btn-default load_more">LOAD MORE POSTS</span>'); ?></div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4">
						<?php get_sidebar();?>
					</div>
				</div><!-- /row -->
			</div><!-- /container -->
		</div><!-- /blog_content -->

	</section><!-- /content -->
<?php get_footer();?>