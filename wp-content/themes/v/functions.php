<?php

show_admin_bar(false);
add_theme_support( 'post-thumbnails' ); 
update_option('image_default_link_type','none');

function register_session(){
    if( !session_id()){
        session_start();
    }
}
add_action('init','register_session', 1);


/**
 * Include files
 */
include dirname(__FILE__) . '/include/widgets.php';
include dirname(__FILE__) . '/include/custom_posts.php';


function theme_scripts() {
	/* Scripts */
	wp_enqueue_script('easing', get_stylesheet_directory_uri() . '/js/jquery.easing.1.3.js');
	wp_enqueue_script('touchSwipe', 'http://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.4/jquery.touchSwipe.min.js');
	wp_enqueue_script('liquid-slider', get_stylesheet_directory_uri() . '/js/jquery.liquid-slider.min.js');
	wp_enqueue_script('bootstrap', get_stylesheet_directory_uri() . '/js/bootstrap.js');
	wp_enqueue_script('jquery.sticky', get_stylesheet_directory_uri() . '/js/jquery.sticky.js', array( 'jquery' ));
	wp_enqueue_script('jquery.timeago', get_stylesheet_directory_uri() . '/js/jquery.timeago.js', array( 'jquery' ));
	wp_enqueue_script('custom', get_stylesheet_directory_uri() . '/js/custom.js?'.time(), array( 'jquery' ), '1.0');

	/* Styles */
	wp_register_style('animate', get_stylesheet_directory_uri() . '/css/animate.css');
  	wp_enqueue_style( 'animate' );
  	wp_register_style('fonts', get_stylesheet_directory_uri() . '/css/fonts.css');
  	wp_enqueue_style( 'fonts' );
	wp_register_style('bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.css');
  	wp_enqueue_style( 'bootstrap' );
  	wp_register_style('liquid-slider', get_stylesheet_directory_uri() . '/css/liquid-slider.css');
  	wp_enqueue_style( 'liquid-slider' );
	wp_register_style('custom', get_stylesheet_directory_uri() . '/css/custom.css?'.time() );
  	wp_enqueue_style( 'custom' );
	wp_register_style('responsive', get_stylesheet_directory_uri() . '/css/responsive.css');
  	wp_enqueue_style( 'responsive' );
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	
}
add_action('wp_enqueue_scripts', 'theme_scripts');


/*
 * Helper function to return the theme option value. If no value has been saved, it returns $default.
 * Needed because options are saved as serialized strings.
 *
 */

if ( !function_exists( 'of_get_option' ) ) {
function of_get_option($name, $default = false) {

	$optionsframework_settings = get_option('optionsframework');

	// Gets the unique option id
	$option_name = $optionsframework_settings['id'];

	if ( get_option($option_name) ) {
		$options = get_option($option_name);
	}

	if ( isset($options[$name]) ) {
		return $options[$name];
	} else {
		return $default;
	}
}
}

/*
 * This is an example of how to add custom scripts to the options panel.
 * This one shows/hides the an option when a checkbox is clicked.
 */

add_action('optionsframework_custom_scripts', 'optionsframework_custom_scripts');

function optionsframework_custom_scripts() { ?>

	<script type="text/javascript">
	jQuery(document).ready(function() {

		jQuery('#op_testimonial_posttype').change(function() {
			var posttype = jQuery(this).val();
			jQuery('#section-op_testimonial_postcategories').fadeOut(400);
			jQuery('#section-op_testimonial_pages').fadeOut(400);
			jQuery('#section-op_testimonial_type_posts').fadeOut(400);
			if(posttype == "post"){
	  			jQuery('#section-op_testimonial_postcategories').fadeIn(400);
			}
			else if(posttype == "page"){
	  			jQuery('#section-op_testimonial_pages').fadeIn(400);
			}
			else if(posttype == "testimonial"){
	  			jQuery('#section-op_testimonial_type_posts').fadeIn(400);
				
			}

		});

		jQuery('#example_showhidden').click(function() {
	  		jQuery('#section-example_text_hidden').fadeToggle(400);
		});

		if (jQuery('#example_showhidden:checked').val() !== undefined) {
			jQuery('#section-example_text_hidden').show();
		}

	});
	</script>
	<style type="text/css">
		#optionsframework h4{
			margin: 0;
			display: inline-block;
		}
		#optionsframework p{
			margin: 0 0 0 20px;
			display: inline-block;
			padding: 0;
		}
		#optionsframework .section-info{
			background: #F1F1F1;
			border-top: 1px solid #DDDDDD;
			border-bottom: 1px solid #DDDDDD;
			padding: 10px 10px;
			margin: 20px 0 10px 0;
		}
		#optionsframework .section-editor h4{
			float: left;
			display: inline-block;
			position: relative;
			top: 20px;
		}
		#section-op_facebook,
		#section-op_twitter,
		#section-op_linkedin,
		#section-op_vimeo,
		#section-op_google_plus{
			width: 45%;
			display: inline-block;
		}
	</style>
	<?php
}



// This theme uses wp_nav_menu() in two locations.
register_nav_menus( array(
	'primary_menu'   => __( 'Primary', 'vtheme' ),
	'footer_menu' => __( 'Footer Menu (footer)', 'vtheme' ),
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




function new_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');


function vtheme_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
	?>
	<<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
		<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
	<div class="comment-author vcard">
		<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
		<div class="comment-autor-name">
			<?php printf( __( '<cite class="fn">%s</cite> <span class="says">wrote:</span>' ), get_comment_author_link() ); ?>
		</div>
		<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
				/* translators: 1: date, 2: time */
				printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)' ), '  ', '' );
			?>
		</div>
	</div>
	<?php if ( $comment->comment_approved == '0' ) : ?>
		<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
		<br />
	<?php endif; ?>
	

	<?php comment_text(); ?>

	<div class="reply">
	<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
	</div>
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php
}

function theme_get_archives_link ( $link_html ) {
    global $wp;
    static $current_url;
    if ( empty( $current_url ) ) {
        $current_url = add_query_arg( $_SERVER['QUERY_STRING'], '', home_url( $wp->request ) );
    }
    if ( stristr( $link_html, $current_url ) !== false ) {
        $link_html = preg_replace( '/(<[^\s>]+)/', '\1 class="current"', $link_html, 1 );
    }
    return $link_html;
}
add_filter('get_archives_link', 'theme_get_archives_link');


function get_parent_comment_count($id){
    global $wpdb;
    $query = "SELECT COUNT(comment_post_id) AS count FROM $wpdb->comments WHERE `comment_approved` = 1 AND `comment_post_ID` = $id AND `comment_parent` = 0";
    $parents = $wpdb->get_row($query);
    return $parents->count;
}

function get_child_comment_count($id){
    global $wpdb;
    $query = "SELECT COUNT(comment_post_id) AS count FROM $wpdb->comments WHERE `comment_approved` = 1 AND `comment_post_ID` = $id AND `comment_parent` != 0";
    $child = $wpdb->get_row($query);
    return $child->count;
}

// ============================================================================================================
//					Ajax Functions
// ============================================================================================================

add_action("wp_ajax_nopriv_getsiteinfo", "getsiteinfo");
add_action("wp_ajax_getsiteinfo", "getsiteinfo");
function getsiteinfo(){
	header('Content-Type: application/json');

	$output = array();

	$output['status'] = 'OK';
	$cms = array('wordpress', 'joomla', 'drupal', 'magento');
	$output['cms'] = $cms[array_rand($cms)];

	echo json_encode($output);
	exit();	
}


add_action("wp_ajax_nopriv_get_download", "get_download");
add_action("wp_ajax_get_download", "get_download");
function get_download(){
	header('Content-Type: application/json');

	$output = array();

	$output['status'] = 'OK';

	echo json_encode($output);
	exit();	
}


