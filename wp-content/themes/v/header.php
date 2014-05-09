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

							<div class="register">
								<h1><?php echo of_get_option('op_banner_text', ''); ?></h1>
								<ul>
									<li class="normal">
										<form role="search">
											<div class="form-group">
												<input type="text" class="form-control" placeholder="Your Site URL">
											</div>
											<button class="btn-default">TRY V FREE</button>
										</form>
									</li>
								</ul>
							</div><!-- /register -->

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
