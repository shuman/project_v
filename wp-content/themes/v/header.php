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
														<input type="text" class="form-control" name="site_url" id="s_url" placeholder="Your Site URL">
														<span class="animated error hide es_url">Invalid Site URL</span>
														<!--div class="progress_bar"><span style="width:25%;"></span></div-->
													</div>
													<button type="button" class="btn-default" onclick="App.SignUp.goStep2()">TRY V FREE</button>
											</li><!-- /step1 -->

											<li class="step2 animated hide">
													<div class="form-group">
														<input type="text" class="form-control" name="email" id="s_email" placeholder="Your Email Address">
														<span class="animated error hide s_email">Invalid Email</span>
														<div class="progress_bar"><span onclick="App.SignUp.goStep1()" style="width:25%;"></span></div>
													</div>
													<button type="button" class="btn-default" onclick="App.SignUp.goStep3()">NEXT</button>
											</li><!-- /step2 -->

											<li class="step3 animated hide">
												<div class="form-group">
													<input type="text" class="form-control" name="cms_type" id="cms_type" value="wordpress" placeholder="Select Type" readonly="">
													<div class="selection">
														<span class="select_btn"></span>
														<span class="selected_cat"><img src="<?php echo get_stylesheet_directory_uri();?>/images/icon_wordpress.png"></span>
													</div>
													<div class="select_category shy animated collapsed">
														<ul>
															<li><a href="#" class="select_cms" rel="wordpress"><img src="<?php echo get_stylesheet_directory_uri();?>/images/icon_wordpress.png"></a></li>
															<li><a href="#" class="select_cms" rel="joomla"><img src="<?php echo get_stylesheet_directory_uri();?>/images/icon_joomla.png"></a></li>
															<li><a href="#" class="select_cms" rel="drupal"><img src="<?php echo get_stylesheet_directory_uri();?>/images/icon_drupal.png"></a></li>
															<li><a href="#" class="select_cms" rel="magento"><img src="<?php echo get_stylesheet_directory_uri();?>/images/icon_magento.png"></a></li>
														</ul>
													</div>
													<div class="progress_bar"><span onclick="App.SignUp.goStep2()" style="width:50%;"></span></div>
												</div>
												<button type="button" class="btn-default" onclick="App.SignUp.goStep4()">NEXT</button>
											</li><!-- /step3 -->

											<li class="step4 animated hide">
													<div class="form-group">
														<input type="text" class="form-control" name="username" id="username" placeholder="Username">
														<input type="password" class="form-control" name="password" id="s_password" placeholder="Password">
														<span class="animated error hide up_error">Invalid Username or Password</span>
														<div class="progress_bar"><span onclick="App.SignUp.goStep3()" style="width:75%;"></span></div>
													</div>
													<button type="button" class="btn-default" onclick="App.SignUp.goStep5()">Send</button>
											</li><!-- /step4 -->

											<li class="step5 animated hide">
												<h1>Congratulations</h1> <span class="msg">Your Download link has been sent to your email</span>
											</li><!-- /step5 -->
											
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
											<form method="post" id="download_form" action="">
												<div class="form-group">
													<input type="text" name="email" id="email" placeholder="email@domain.com">
													<span class="animated error hide e_email">Invalid Email</span>
												</div><!-- /form-group -->
												<div class="form-group">
													<input type="password" name="password" id="password" placeholder="Password">
													<span class="animated error hide e_password">Invalid Password</span>
												</div><!-- /form-group -->
												<div class="form-group">
													<input type="text" name="site_url" id="site_url" placeholder="Your Site URL">
													<span class="animated error hide e_site_url">Invalid Site URL</span>
												</div><!-- /form-group -->
												<input type="submit" name="submit" value="Send">
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
