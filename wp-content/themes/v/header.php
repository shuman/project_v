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
								
								<div class="signUp_v">
									<ul>
										<li class="step3">
											<form role="search">
												<div class="form-group">
													<input type="text" class="form-control" placeholder="Your Site URL">
													<a class="select_btn" href="#"></a>
													<span class="selected_cat"><img src="<?php echo get_stylesheet_directory_uri();?>/images/icon_wordpress.png"></span>
													<div class="select_category animated collapsed">
														<ul>
															<li><a href="#"><img src="<?php echo get_stylesheet_directory_uri();?>/images/icon_wordpress.png"></a></li>
															<li><a href="#"><img src="<?php echo get_stylesheet_directory_uri();?>/images/icon_wordpress.png"></a></li>
															<li><a href="#"><img src="<?php echo get_stylesheet_directory_uri();?>/images/icon_wordpress.png"></a></li>
															<li><a href="#"><img src="<?php echo get_stylesheet_directory_uri();?>/images/icon_wordpress.png"></a></li>
														</ul>
													</div>
												</div>
												<button class="btn-default">TRY V FREE</button>
											</form>
										</li><!-- /step3 -->

										<li class="step1">
											<form role="search">
												<div class="form-group">
													<input type="text" class="form-control" placeholder="Your Site URL">
												</div>
												<button class="btn-default">TRY V FREE</button>
											</form>
										</li><!-- /step1 -->

										<li class="step2">
											<form role="search">
												<div class="form-group">
													<input type="text" class="form-control" placeholder="Your Site URL">
												</div>
												<button class="btn-default">TRY V FREE</button>
											</form>
										</li><!-- /step2 -->

										<li class="step4">
											<form role="search">
												<div class="form-group">
													<input type="text" class="form-control" placeholder="Username">
													<input type="text" class="form-control" placeholder="Password">
												</div>
												<button class="btn-default">Send</button>
											</form>
										</li><!-- /step4 -->

										<li class="step5">
											<h1>Congratulations</h1> <a href="#">Your Download link has been sent to your email</a>
										</li><!-- /step5 -->
										
									</ul>
									<div class="progress_bar"><span></span></div>
								</div>
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
								</div><!-- /.navbar-collapse -->

							</nav>
						</div><!-- /menuber -->
					</div><!-- /head -->
				</div>
			</div><!-- /row -->
		</div><!-- /container -->
	</header><!-- /header -->
