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
							<div class="video">
								<img src="<?php echo get_stylesheet_directory_uri();?>/images/mac_screen_img.jpg" alt="laptop_screen">
								<?php //echo of_get_option('op_video_url', ''); ?>
								<a class="play_btn" href="#"></a>
							</div><!-- /mac_video -->
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
							<img class="img-responsive" src="<?php echo get_stylesheet_directory_uri();?>/images/google_chrome_flat_browser.png" alt="google_chrome_flat_browser">
							
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
							<img class="img-responsive" src="<?php echo get_stylesheet_directory_uri();?>/images/white_pad.png" alt="white_pad">

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
							<img class="img-responsive" src="<?php echo get_stylesheet_directory_uri();?>/images/safari_flat_browser.png" alt="safari_flat_browser">

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
							<h1><?php echo of_get_option('op_team_management_title', ''); ?></h1>
							<p><?php echo of_get_option('op_version_control_content', ''); ?></p>
						</div><!-- /content_title -->

						<div class="section_content">
							<img class="img-responsive" src="<?php echo get_stylesheet_directory_uri();?>/images/vc_phone_img.png" alt="vc_phone_img">

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
							<img class="img-responsive" src="<?php echo get_stylesheet_directory_uri();?>/images/team_managment.png" alt="team_managment">

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

						<div class="section_content">
							<div class="carousel slide" data-interval="5000" data-ride="carousel">
					            <div class="carousel-inner">
					                <div class="item active">
					                    <div class="owner_pic">
					                    	<img src="<?php echo get_stylesheet_directory_uri();?>/images/chairman_pic.png" alt="owner_pic">
					                    </div><!-- /owner_pic -->

					                    <div class="rating">
				                    		<span class="star"></span>
				                    	</div><!-- /rating -->

					                    <div class="testimonial_content">
					                    	<p>Praesent eu interdum lorem. Nunc quis tellus hendrerit arcu aliquam tristique non ac libero. Donec varius arcu non tellus elementum. Donec sit amet erat placerat, faucibus erat nec, vulputate augue. Proin eleifend erat lacus, ut venenatis ipsum eleifend eget.</p>
					                    </div><!-- /testimonial_content -->

					                    <div class="name">
					                    	<h2>JOHN DOE, <span>Chairman</span></h2>
					                    </div><!-- /name -->
					                </div><!-- /slider_item -->

					                <div class="item">
					                    <div class="owner_pic">
					                    	<img src="<?php echo get_stylesheet_directory_uri();?>/images/chairman_pic.png" alt="owner_pic">
					                    </div><!-- /owner_pic -->

					                    <div class="rating">
				                    		<span class="star"></span>
				                    	</div><!-- /rating -->

					                    <div class="testimonial_content">
					                    	<p>Praesent eu interdum lorem. Nunc quis tellus hendrerit arcu aliquam tristique non ac libero. Donec varius arcu non tellus elementum. Donec sit amet erat placerat, faucibus erat nec, vulputate augue. Proin eleifend erat lacus, ut venenatis ipsum eleifend eget.</p>
					                    </div><!-- /testimonial_content -->

					                    <div class="name">
					                    	<h2>JOHN DOE, <span>Chairman</span></h2>
					                    </div><!-- /name -->
					                </div><!-- /slider_item -->

					            </div><!--//carousel-inner-end-->
					        </div><!--//carousel-end-->
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