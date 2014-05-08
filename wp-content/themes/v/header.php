<!DOCTYPE html>
<html lang="en">
  <head>
	<meta charset="utf-8">
	<title>V</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<!-- Fevicon -->
	<link rel="icon" href="<?php echo get_stylesheet_directory_uri();?>/images/favicon.png" type="png" />
		  
	<!-- fonts -->
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri();?>/css/fonts.css">
	
	<!-- bootstrap -->
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri();?>/css/bootstrap.css">
	
	<!-- custom -->
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri();?>/css/custom.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri();?>/css/responsive.css">


	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="<?php echo get_stylesheet_directory_uri();?>/js/html5shiv.min.js"></script>
	  <script src="<?php echo get_stylesheet_directory_uri();?>/js/respond.js"></script>
	<![endif]-->

	<!-- js -->
	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri();?>/js/jquery-1.11.1.js"></script>
	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri();?>/js/bootstrap.js"></script>
	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri();?>/js/jquery.sticky.js"></script>
	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri();?>/js/custom.js"></script>

  </head>

<body <?php body_class($class); ?>>

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
