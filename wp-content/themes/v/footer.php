
	<footer id="footer" class="clearfix">
		<div class="container">
			<div class="row">
				<div class="col-lg-2 col-md-2 col-sm-2">
					<div class="footer_item">
						<h4>PRODUCT</h4>
						<?php wp_nav_menu( array( 'theme_location' => 'product_menu' ) ); ?>
					</div>
				</div><!-- /footer_item -->
				<div class="col-lg-2 col-md-2 col-sm-2">
					<div class="footer_item">
						<h4>USERS</h4>
						<?php wp_nav_menu( array( 'theme_location' => 'users_menu' ) ); ?>
					</div>
				</div><!-- /footer_item -->
				<div class="col-lg-2 col-md-2 col-sm-2">
					<div class="footer_item">
						<h4>COMPANY</h4>
						<?php wp_nav_menu( array( 'theme_location' => 'company_menu' ) ); ?>
					</div>
				</div><!-- /footer_item -->
				<div class="col-lg-2 col-md-2 col-sm-2">
					<div class="footer_item">
						<h4>FOLLOW</h4>
						<ul>
							<?php
							$facebook = of_get_option('op_facebook');
							if( !empty($facebook) ){
								echo '<li><a href="'.$facebook.'">Facebook</a></li>';
							}
							$twitter = of_get_option('op_twitter');
							if( !empty($twitter) ){
								echo '<li><a href="'.$twitter.'">Twitter</a></li>';
							}

							$linkedin = of_get_option('op_linkedin');
							if( !empty($linkedin) ){
								echo '<li><a href="'.$linkedin.'">LinkedIn</a></li>';
							}

							$vimeo = of_get_option('op_vimeo');
							if( !empty($vimeo) ){
								echo '<li><a href="'.$vimeo.'">Vimeo</a></li>';
							}

							$google_plus = of_get_option('op_google_plus');
							if( !empty($google_plus) ){
								echo '<li><a href="'.$google_plus.'">Google+</a></li>';
							}
							?>
						</ul>
					</div>
				</div><!-- /footer_item -->
				<div class="col-lg-4 col-md-4 col-sm-4">
					<div class="footer_item footer_right">
						<h4>BUILT WITH LOVE</h4>
						<p><?php echo of_get_option('op_built_with_love');?></p>
						<ul class="footer_logo">
							<li><a href="<?php echo site_url();?>"><img src="<?php echo get_stylesheet_directory_uri();?>/images/footer_logo.png" alt="footer_logo"></a></li>
							<li><a class="btn btn-default download" href="javascript:void(0)">DOWNLOAD</a></li>
						</ul>
					</div>
				</div><!-- /footer_item -->
			</div><!-- /row -->
		</div><!-- /container -->
	</footer><!-- /footer -->

	<section class="copyright clearfix">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 f_right">
					<div class="footer_menu">
						<?php wp_nav_menu( array( 'theme_location' => 'footer_menu' ) ); ?>
					</div><!-- /footer_menu -->
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 f_left">
					<p>© Copyright 2014  All rights reserved.</p>
				</div>
				
			</div><!-- /row -->
		</div><!-- /container -->
	</section><!-- /copyright -->
	
	
	<a class="scrollup" id="linkTop" href="#"></a>
	<?php wp_footer();?>
</body>
</html>