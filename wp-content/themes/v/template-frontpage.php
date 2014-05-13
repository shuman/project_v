<?php 
/**
 * Template Name: Front Page
 */

get_header();?>

	<section id="content" class="clearfix">
		
		<div class="macbook_pro">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-md-8">
						<div class="mac_laptop">
							<div id="video_container" class="video">
								<img src="<?php echo get_stylesheet_directory_uri();?>/images/mac_screen_img.jpg" alt="laptop_screen">

								<?php //echo of_get_option('op_video_url', ''); ?>
								<a class="play_btn" href="javascript:void(0)" onclick="App.PlayVideo();"></a>
							</div><!-- /mac_video -->
							<script type="text/xml" id="embedcode">
								<iframe width="510" height="314" src="//www.youtube.com/embed/0vrdgDdPApQ?autoplay=1&showinfo=0&controls=0&autohide=1&rel=0" frameborder="0" allowfullscreen></iframe>
							</script>
						</div><!-- /mac_laptop -->
					</div>
					<div class="col-lg-4 col-md-4">
						<div class="video_details">
							<h2><?php echo of_get_option('op_video_title', ''); ?></h2>
							<p><?php echo of_get_option('op_video_content', ''); ?></p>
						</div>
					</div>
				</div><!-- /row -->
			</div><!-- /container -->
		</div><!-- /macbook_pro -->

		<div class="text_editing">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="content_title icon_simple_text_editing">
							<h1><?php echo of_get_option('op_simple_text_editing_title', ''); ?></h1>
							<p><?php echo of_get_option('op_simple_text_editing_content', ''); ?></p>
						</div><!-- /content_title -->

						<div class="section_content">
							<div class="screenshot chrome">
								<img class="img-responsive" src="<?php echo of_get_option('op_simple_text_editing_image');?>" alt="<?php echo of_get_option('op_simple_text_editing_title', ''); ?>">
							</div>
							
							<div class="instraction">
								<span class="ste_right_arrow">
									<p>Save any changes instantly</p>
								</span>
								<span class="ste_left_arrow">
									<p>Edit text on the fly</p>
								</span>
							</div><!-- /instraction -->
						</div><!-- /section_content -->
					</div>
				</div><!-- /row -->
			</div><!-- /container -->
		</div><!-- /text_editing -->

		<div class="media_dd">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="content_title white icon_media_dd">
							<h1><?php echo of_get_option('op_media_drag_and_drop_title', ''); ?></h1>
							<p><?php echo of_get_option('op_media_drag_and_drop_content', ''); ?></p>
						</div><!-- /content_title -->

						<div class="section_content">
							<div class="screenshot ipad">								
								<img class="img-responsive" src="<?php echo of_get_option('op_media_drag_and_drop_image');?>" alt="<?php echo of_get_option('op_media_drag_and_drop_title', ''); ?>">
							</div>
							
							<div class="instraction">
								<span class="mdd_right_arrow">
									<p>Simply drag to resize to any wanted size</p>
								</span>
								<span class="mdd_left_arrow">
									<p>Drag and drop media from any window</p>
								</span>
							</div><!-- /instraction -->

						</div><!-- /section_content -->
					</div>
				</div><!-- /row -->
			</div><!-- /container -->
		</div><!-- /media_dd -->

		<div class="cc_style">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="content_title cc_style_icon">
							<h1><?php echo of_get_option('op_consistent_customized_styling_title', ''); ?></h1>
							<p><?php echo of_get_option('op_consistent_customized_styling_content', ''); ?></p>
						</div><!-- /content_title -->

						<div class="section_content">
							<div class="screenshot firefox">								
								<img class="img-responsive" src="<?php echo of_get_option('op_consistent_customized_styling_image');?>" alt="<?php echo of_get_option('op_consistent_customized_styling_title', ''); ?>">
							</div>

							<div class="instraction">
								<span class="ccs_right_arrow">
									<p>Add any new style and apply it to any text block</p>
								</span>
							</div><!-- /instraction -->

						</div><!-- /section_content -->
					</div>
				</div><!-- /row -->
			</div><!-- /container -->
		</div><!-- /cc_style -->

		<div class="version_control">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="content_title white icon_version_control">
							<h1><?php echo of_get_option('op_version_control_title', ''); ?></h1>
							<p><?php echo of_get_option('op_version_control_content', ''); ?></p>
						</div><!-- /content_title -->

						<div class="section_content">
							<div class="screenshot none">								
								<img class="img-responsive" src="<?php echo of_get_option('op_version_control_image');?>" alt="<?php echo of_get_option('op_version_control_title', ''); ?>">
							</div>

							<div class="instraction">
								<span class="vc_right_arrow">
									<p>Easily move across versions</p>
								</span>
							</div><!-- /instraction -->

						</div><!-- /section_content -->
					</div>
				</div><!-- /row -->
			</div><!-- /container -->
		</div><!-- /version_control -->

		<div class="team_management">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="content_title icon_team_management">
							<h1><?php echo of_get_option('op_team_management_title', ''); ?></h1>
							<p><?php echo of_get_option('op_team_management_content', ''); ?></p>
						</div><!-- /content_title -->

						<div class="section_content">
							<div class="screenshot safari">								
								<img class="img-responsive" src="<?php echo of_get_option('op_team_management_image');?>" alt="<?php echo of_get_option('op_team_management_title', ''); ?>">
							</div>

							<div class="instraction">
								<span class="tm_right_arrow">
									<p>Mark any text or media section to easily assign new tasks to team members</p>
								</span>
								<span class="tm_left_arrow">
									<p>Invite new team members, view their online status</p>
								</span>
								<span class="tm_top_arrow">
									<p>See all assigned tasks, click to travel to task's page or cancel over-dued tasks</p>
								</span>
							</div><!-- /instraction -->

						</div><!-- /section_content -->
					</div>
				</div><!-- /row -->
			</div><!-- /container -->
		</div><!-- /team_management -->
		
		<div class="testimonial">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="content_title icon_testimonial">
							<h1><?php echo of_get_option('op_testimonial_title', ''); ?></h1>
							<p><?php echo of_get_option('op_testimonial_content', ''); ?></p>
						</div><!-- /content_title -->

						<div class="section_content" style="max-width:100%;">
					            <div id="testimonials" class="carousel-inner liquid-slider" style="max-width:100%;">
					            	<?php
									$args = array( 'post_type' => 'testimonial', 'posts_per_page' => 10 );
									$testimonials = new WP_Query( $args );
									$total_testimonial = count($testimonials->posts);
									$col_sep = ceil($total_testimonial / 2);
									$counter = 0;
									while ( $testimonials->have_posts() ) : $testimonials->the_post();


										$post_thumbnail_id = get_post_thumbnail_id( $post->ID );
										if (has_post_thumbnail( $post->ID ) ){
											$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
											$img_url = $image[0];
										}
										else{
											$img_url = get_stylesheet_directory_uri() ."/images/profile-pic.png";
										}
										?>
										<div class="item <?php echo ($counter < 1) ? 'active': '';?>">
						                    <div class="owner_pic">
						                    	<img src="<?php echo $img_url;?>" alt="<?php the_title();?>">
						                    	<div class="frame"></div>
						                    </div><!-- /owner_pic -->

						                    <div class="rating">
					                    		<span class="star" style="width:<?php echo rand(20, 100);?>%;"></span>
					                    	</div><!-- /rating -->

						                    <div class="testimonial_content">
						                    	<p><?php the_content();?></p>
						                    </div><!-- /testimonial_content -->

						                    <div class="name">
						                    	<h2><?php the_title();?>, <span><?php the_field('designation', $post->ID); ?></span></h2>
						                    </div><!-- /name -->
						                </div><!-- /slider_item -->
						                <?php
						                $counter++;
									endwhile;
									?>

					            </div><!--//carousel-inner-end-->
						</div><!-- /section_content -->

					</div>
				</div><!-- /row -->
			</div><!-- /container -->
		</div><!-- /testimonial -->

		<div class="clients">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="content_title icon_clients">
							<h1><?php echo of_get_option('op_clients_title', ''); ?></h1>
							<p><?php echo of_get_option('op_clients_content', ''); ?></p>
						</div><!-- /content_title -->

						<div class="section_content">
							<?php echo of_get_option('op_clients_logo', ''); ?>
						</div><!-- /section_content -->
					</div>
				</div><!-- /row -->
			</div><!-- /container -->
		</div><!-- /version_control -->

	</section><!-- /content -->
<?php get_footer();?>