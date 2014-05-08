<?php

add_theme_support( 'post-thumbnails' ); 
update_option('image_default_link_type','none');


function register_session(){
    if( !session_id()){
        session_start();
    }
}
add_action('init','register_session', 1);

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



/* >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
	START :: CREATE A CUSTOM FAQ POST TYPE 
>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> */
add_action('init', 'faq_custom_post_type_init');
function faq_custom_post_type_init() 
{
  $labels = array(
    'name' => _x('FAQ', 'post type general name'),
    'singular_name' => _x('FAQ', 'post type singular name'),
    'add_new' => _x('Add New Question', 'faq'),
    'add_new_item' => __('Add New Question'),
    'edit_item' => __('Edit Question'),
    'new_item' => __('New Question'),
    'all_items' => __('All Questions'),
    'view_item' => __('View Question'),
    'search_items' => __('Search Questions'),
    'not_found' =>  __('No questions found'),
    'not_found_in_trash' => __('No questions found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'FAQ'

  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => false, 
    'hierarchical' => false,
    'menu_position' => null,
    'supports' => array('title','editor','author')
  ); 
  register_post_type('faq',$args);
}

/* *****************************************************************************
	ADD A TAXONOMY FOR USE WITH FAQ
***************************************************************************** */
add_action('init', 'faq_custom_taxonomy_type_init');
function faq_custom_taxonomy_type_init() {
	$labels = array(
		'name' => _x( 'FAQ Category', 'taxonomy general name' ),
		'singular_name' => _x( 'FAQ Category', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search FAQ Categories' ),
		'popular_items' => __( 'Popular FAQ Categories' ),
		'all_items' => __( 'All FAQ Categories' ),
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => __( 'Edit FAQ Category' ), 
		'update_item' => __( 'Update FAQ Category' ),
		'add_new_item' => __( 'Add New FAQ Category' ),
		'new_item_name' => __( 'New FAQ Category Name' ),
		'separate_items_with_commas' => __( 'Choose an appropriate FAQ Category for this question (one per question)' ),
		'add_or_remove_items' => __( 'Add or remove FAQ Categories' ),
		'choose_from_most_used' => __( 'Choose from the most used FAQ Categories' ),
		'menu_name' => __( 'FAQ Categories' ),
	); 
	
	register_taxonomy('faq_category','faq', array(
		'hierarchical' => false,
		'labels' => $labels,
		'show_ui' => true,
		'show_tagcloud' => false,
        'hierarchical' => true,
	));
}  


/* *****************************************************************************
	ADMIN PAGE DEFAULT TEXT
***************************************************************************** */
// Change title text in editor
function faq_custom_title_text( $title ){
	if (function_exists ('get_current_screen')) {
		$screen = get_current_screen();
		if ( 'faq' == $screen->post_type ) {
			$title = 'Enter question here';
		}
		return $title;
	}
}
add_filter( 'enter_title_here', 'faq_custom_title_text' );

// Add default content text 
function faq_custom_content_text( $content ) {
	if (function_exists ('get_current_screen')) {
		$screen = get_current_screen();
		if ( 'faq' == $screen->post_type ) {
			$content = '';
		}
		return $content;
	}
}
add_filter( 'default_content', 'faq_custom_content_text' );
/* *****************************************************************************
	END CUSTOM FAQ POST TYPE 
***************************************************************************** */

