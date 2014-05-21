<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title><?php
		/*
		 * Print the <title> tag based on what is being viewed.
		 */
		global $page, $paged;
		wp_title( '&lsaquo;', true, 'right' );
		// Add the blog name.
		bloginfo( 'name' );
		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			echo " &lsaquo; $site_description";
		// Add a page number if necessary:
		if ( $paged >= 2 || $page >= 2 ){
			echo ' &lsaquo; ' . sprintf( __( 'Page %s', 'angelocate' ), max( $paged, $page ) );
		}
	?></title>
	<script type="text/javascript">
		var site_url = '<?php echo site_url();?>';
		var theme_url = '<?php echo get_stylesheet_directory_uri();?>';
		var ajax_url = '<?php echo admin_url("admin-ajax.php"); ?>';
	</script>
	<?php wp_head();?>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="<?php echo get_stylesheet_directory_uri();?>/js/html5shiv.min.js"></script>
	  <script src="<?php echo get_stylesheet_directory_uri();?>/js/respond.js"></script>
	<![endif]-->

</head>

<body <?php body_class($class); ?>>
	<?php if(is_front_page()): ?>
		<section id="welcome" class="clearfix">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="intro">
							<div class="logo"><a href="<?php echo site_url();?>"><img src="<?php echo get_stylesheet_directory_uri();?>/images/logo.png" alt="logo"></a></div><!-- /logo -->

							<div class="subscribe">
								<h1><?php echo of_get_option('op_banner_text', ''); ?></h1>
								
								<form action="" method="post" name="signup" role="search">
									<div class="signUp_v">
										<ul>
											<li class="step1 animated">
												<div class="form-group">
													<input type="text" class="form-control input" name="site_url" id="s_url" placeholder="Your Site URL">
													<span id="s_url_error" class="animated error hide">Invalid Site URL</span>
													<input type="hidden" name="cms_type" id="cms_type" value="">
													
													<div class="selection hide">
														<span class="select_btn"></span>
														<span class="selected_cat"><img src="<?php echo get_stylesheet_directory_uri();?>/images/icon_wordpress.png"></span>
													</div>
													<span id="s_cms_error" class="animated error hide">Select CMS Type</span>

													<div class="select_category shy animated collapsed">
														<ul>
															<li class="wordpress"><a href="javascript:void(0)" onclick="App.SignUp.select_cms('wordpress')"><img src="<?php echo get_stylesheet_directory_uri();?>/images/icon_wordpress.png"></a></li>
															<li class="joomla"><a href="javascript:void(0)" onclick="App.SignUp.select_cms('joomla')"><img src="<?php echo get_stylesheet_directory_uri();?>/images/icon_joomla.png"></a></li>
															<li class="drupal"><a href="javascript:void(0)" onclick="App.SignUp.select_cms('drupal')"><img src="<?php echo get_stylesheet_directory_uri();?>/images/icon_drupal.png"></a></li>
															<li class="magento"><a href="javascript:void(0)" onclick="App.SignUp.select_cms('magento')"><img src="<?php echo get_stylesheet_directory_uri();?>/images/icon_magento.png"></a></li>
														</ul>
													</div>
													<div class="progress_bar hide"><span id="progress_percent" style="width:0%;"></span></div>
												</div>
												<button type="button" class="btn-default" onclick="App.SignUp.goStep2()">TRY V FREE</button>
											</li><!-- /step1 -->

											<li class="step2 animated hide">
													<div class="form-group">
														<input type="text" class="form-control input" name="s_email" id="s_email" placeholder="Email">
														<span id="s_email_error" class="animated error hide">Invalid Email</span>
														<input type="password" class="form-control input" name="password" id="s_password" placeholder="Password">
														<span id="s_password_error" class="animated error hide p_error">Invalid Password</span>
													</div>
													<button type="button" class="btn-default btn_send" onclick="App.SignUp.goStep3()">Send</button>
											</li><!-- /step2 -->

											<li class="step3 animated hide">
												<h1>Congratulations</h1> <span class="msg">Your Download link has been sent to your email</span>
											</li><!-- /step3 -->
											
										</ul>
									</div>
								</form>
							</div><!-- /subscribe -->

						</div><!-- /intro -->
					</div>
				</div><!-- /row -->
			</div><!-- /container -->
		</section><!-- /welcome -->
		
	<?php endif;?>

	<header id="header" class="clearfix">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="head">
						<div class="logo"><a href="<?php echo site_url();?>"><img src="<?php echo get_stylesheet_directory_uri();?>/images/logo.png" alt="logo"></a></div>
						<div class="menuber">
							<nav role="navigation" class="navbar navbar-default">

								<div class="navbar-header">
									<button data-target="#responsive_nav" data-toggle="collapse" class="navbar-toggle" type="button">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
								</div><!-- /navbar-header -->

								<div id="responsive_nav" class="collapse navbar-collapse">
									<?php wp_nav_menu( array( 'theme_location' => 'primary_menu', 'menu_class' => 'nav navbar-nav' ) ); ?>
									<div id="download_top"></div>

								</div><!-- /.navbar-collapse -->

							</nav>
						</div><!-- /menuber -->
					</div><!-- /head -->
				</div>
			</div><!-- /row -->
		</div><!-- /container -->
	</header><!-- /header -->
