<?php

// This theme uses wp_nav_menu() in two locations.
register_nav_menus( array(
	'primary_menu'   => __( 'Primary', 'vtheme' ),
	'footer_menu' => __( 'Product Menu (footer)', 'vtheme' ),
	'product_menu' => __( 'Product Menu (footer)', 'vtheme' ),
	'users_menu' => __( 'User Menu (footer)', 'vtheme' ),
	'company_menu' => __( 'Company Menu (footer)', 'vtheme' ),
) );


register_sidebar( array(
    'name'         => __( 'Sidebar' ),
    'id'           => 'sidebar',
    'description'  => __( 'Main sidebar' ),
    'before_widget'=> '<div id="%1$s" class="widget %2$s">',
    'after_widget'=> '</div>',
    'before_title' => '<h2>',
    'after_title'  => '</h2>',
) );