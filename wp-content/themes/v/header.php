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
								
								<form action="" method="" name="signup" role="search">
									<div class="signUp_v">
										<ul>
											<li class="step1 animated">
													<div class="form-group">
														<input type="text" class="form-control" placeholder="Your Site URL">
													</div>
													<button class="btn-default go_step2">TRY V FREE</button>
											</li><!-- /step1 -->

											<li class="step2 animated" style="display:none;">
													<div class="form-group">
														<input type="text" class="form-control" placeholder="Your Site URL">
													</div>
													<button class="btn-default go_step3">TRY V FREE</button>
											</li><!-- /step2 -->

											<li class="step3 animated" style="display:none;">
												<div class="form-group">
													<input type="text" class="form-control" placeholder="Your Site URL">
													<a class="select_btn" href="#"></a>
													<span class="selected_cat"><img src="<?php echo get_stylesheet_directory_uri();?>/images/icon_wordpress.png"></span>
													<div class="select_category shy animated collapsed">
														<ul>
															<li><a href="#" class="select_cms"><img src="<?php echo get_stylesheet_directory_uri();?>/images/icon_wordpress.png"></a></li>
															<li><a href="#" class="select_cms"><img src="<?php echo get_stylesheet_directory_uri();?>/images/icon_joomla.png"></a></li>
															<li><a href="#" class="select_cms"><img src="<?php echo get_stylesheet_directory_uri();?>/images/icon_drupal.png"></a></li>
															<li><a href="#" class="select_cms"><img src="<?php echo get_stylesheet_directory_uri();?>/images/icon_magento.png"></a></li>
														</ul>
													</div>
												</div>
												<button class="btn-default go_step4">TRY V FREE</button>
											</li><!-- /step3 -->

											<li class="step4 animated" style="display:none;">
													<div class="form-group">
														<input type="text" class="form-control" placeholder="Username">
														<input type="text" class="form-control" placeholder="Password">
													</div>
													<button class="btn-default go_step5">Send</button>
											</li><!-- /step4 -->

											<li class="step5 animated" style="display:none;">
												<h1>Congratulations</h1> <a href="#">Your Download link has been sent to your email</a>
											</li><!-- /step5 -->
											
										</ul>
										<div class="progress_bar"><span></span></div>
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

									<div id="V_downLoad" class="animated dropdown_box shy">
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
									<div id="v_signUp_form" class="animated shy dropdown_box">
										<div class="v_signUp">
											<h4>WHERE SHOULD WE SEND THE LINK?</h4>
											<form role="search" method="get" id="searchform" class="searchform" action="">
												<div class="form-group">
													<input type="text" value="" placeholder="email@domain.com" name="email" id="email">
													<input type="password" value="" placeholder="Password" name="password" id="password">
													<input type="text" value="" placeholder="Your Site URL" name="site_url" id="site_url">
													<input type="submit" value="Send">
												</div>
											</form>
										</div><!-- /v_signUp -->
									</div>
								</div><!-- /.navbar-collapse -->

							</nav>
						</div><!-- /menuber -->
					</div><!-- /head -->
				</div>
			</div><!-- /row -->
		</div><!-- /container -->
	</header><!-- /header -->
