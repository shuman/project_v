
	<footer id="footer" class="clearfix">
		<div class="container">
			<div class="row">
				<div class="col-lg-2 col-md-2 col-sm-2">
					<div class="footer_item">
						<h3>PRODUCT</h3>
						<?php wp_nav_menu( array( 'theme_location' => 'product_menu' ) ); ?>
					</div>
				</div><!-- /footer_item -->
				<div class="col-lg-2 col-md-2 col-sm-2">
					<div class="footer_item">
						<h3>USERS</h3>
						<?php wp_nav_menu( array( 'theme_location' => 'users_menu' ) ); ?>
					</div>
				</div><!-- /footer_item -->
				<div class="col-lg-2 col-md-2 col-sm-2">
					<div class="footer_item">
						<h3>COMPANY</h3>
						<?php wp_nav_menu( array( 'theme_location' => 'company_menu' ) ); ?>
					</div>
				</div><!-- /footer_item -->
				<div class="col-lg-2 col-md-2 col-sm-2">
					<div class="footer_item">
						<h3>FOLLOW</h3>
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
						<h3>BUILT WITH LOVE</h3>
						<p><?php echo of_get_option('op_built_with_love');?></p>
						<ul class="footer_logo">
							<li><a href="<?php echo site_url();?>"><img src="<?php echo get_stylesheet_directory_uri();?>/images/footer_logo.png" alt="footer_logo"></a></li>
							<li><a id="btn_donwload_bot" class="btn btn-default download" href="javascript:void(0)">DOWNLOAD</a></li>
						</ul>
						<div id="download_bot"></div>
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
	<script id="download_html" type="text/xml">
		<div id="V_downLoad" class="animated dropdown_box shy" style="display:none;">
			<ul class="select_download">
				<li class="v_wordpress">
					<a href="javascript:void(0)" onclick="App.Download.showForm(event, 'wordpress');">
						<h4>V FOR WORDPRESS</h4>
						<span>Lorem Ipsum Dolor Sit Amet</span>
					</a>
				</li>
				<li class="v_drupal">
					<a href="javascript:void(0)" onclick="App.Download.showForm(event, 'drupal');">
						<h4>V FOR DRUPAL</h4>
						<span>Lorem Ipsum Dolor Sit Amet</span>
					</a>
				</li>
				<li class="v_joomla">
					<a href="javascript:void(0)" onclick="App.Download.showForm(event, 'joomla');">
						<h4>V FOR JOOMLA</h4>
						<span>Lorem Ipsum Dolor Sit Amet</span>
					</a>
				</li>
				<li class="v_magento">
					<a href="javascript:void(0)" onclick="App.Download.showForm(event, 'magento');">
						<h4>V FOR MAGENTO</h4>
						<span>Lorem Ipsum Dolor Sit Amet</span>
					</a>
				</li>
			</ul><!-- /select_download -->
		</div>
		<div id="v_signUp_form" class="animated shy dropdown_box" style="display:none;">
			<div id="signup_form" class="v_signUp">
				<h4>WHERE SHOULD WE SEND THE LINK?</h4>
				<form method="post" id="download_form" action="">
					<input type="hidden" name="action" value="get_download">
					<div class="form-group">
						<input type="text" name="email" id="email" class="input" placeholder="email@domain.com">
						<span class="animated error hide d_email">Invalid Email</span>
					</div><!-- /form-group -->
					<div class="form-group">
						<input type="password" name="password" id="password" class="input" placeholder="Password">
						<span class="animated error hide d_password">Invalid Password</span>
					</div><!-- /form-group -->
					<div class="form-group">
						<input type="text" name="site_url" id="site_url" placeholder="Your Site URL">
						<span class="animated error hide d_site_url">Invalid Site URL</span>
					</div><!-- /form-group -->
					<img class="loading" src="<?php echo get_stylesheet_directory_uri();?>/images/loading_dot.gif" alt="" style="display:none;">
					<input type="submit" name="submit" value="Send">
				</form>
			</div><!-- v_signUp -->
			<div id="signup_thanks" class="v_signUp" style="display:none;">
				<img src="<?php echo get_stylesheet_directory_uri();?>/images/logo.png" alt="logo">
				<h2>Congratulations</h2>
				<p>Your download link was sent to your email. Don’t forget to check spam!</p>
			</div>
		</div>
	</script>
	
	<a class="scrollup" id="linkTop" href="#"></a>
	<?php wp_footer();?>
</body>
</html>