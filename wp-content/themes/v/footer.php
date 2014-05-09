
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
							<li><a href="#">Facebook</a></li>
							<li><a href="#">Twitter</a></li>
							<li><a href="#">LinkedIn</a></li>
							<li><a href="#">Vimeo</a></li>
							<li><a href="#">Google+</a></li>
						</ul>
					</div>
				</div><!-- /footer_item -->
				<div class="col-lg-4 col-md-4 col-sm-4">
					<div class="footer_item footer_right">
						<h4>BUILT WITH LOVE</h4>
						<p>Cras sit amet dignissim dui, vitae interdum libero. </p>
						<ul class="footer_logo">
							<li><a href="#"><img src="<?php echo get_stylesheet_directory_uri();?>/images/footer_logo.png" alt="footer_logo"></a></li>
							<li><a class="btn btn-default" href="#">DOWNLOAD</a></li>
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