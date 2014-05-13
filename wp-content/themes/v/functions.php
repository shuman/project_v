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


function theme_scripts() {
	/* Scripts */
	wp_enqueue_script('easing', get_stylesheet_directory_uri() . '/js/jquery.easing.1.3.js');
	wp_enqueue_script('touchSwipe', 'http://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.4/jquery.touchSwipe.min.js');
	wp_enqueue_script('liquid-slider', get_stylesheet_directory_uri() . '/js/jquery.liquid-slider.min.js');
	wp_enqueue_script('bootstrap', get_stylesheet_directory_uri() . '/js/bootstrap.js');
	wp_enqueue_script('jquery.sticky', get_stylesheet_directory_uri() . '/js/jquery.sticky.js', array( 'jquery' ));
	wp_enqueue_script('custom', get_stylesheet_directory_uri() . '/js/custom.js', array( 'jquery' ), '1.0');

	/* Styles */
	wp_register_style('animate', get_stylesheet_directory_uri() . '/css/animate.css');
  	wp_enqueue_style( 'animate' );
  	wp_register_style('fonts', get_stylesheet_directory_uri() . '/css/fonts.css');
  	wp_enqueue_style( 'fonts' );
	wp_register_style('bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.css');
  	wp_enqueue_style( 'bootstrap' );
  	wp_register_style('liquid-slider', get_stylesheet_directory_uri() . '/css/liquid-slider.css');
  	wp_enqueue_style( 'liquid-slider' );
	wp_register_style('custom', get_stylesheet_directory_uri() . '/css/custom.css');
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


add_action( 'init', 'create_testimonial_post_type' );
function create_testimonial_post_type() {
	register_post_type( 'testimonial',
		array(
			'labels' => array(
				'name' => __( 'Testimonials' ),
				'singular_name' => __( 'Testimonial' )
			),
		'public' => true,
		'has_archive' => true,
		'supports' => array( 'title', 'editor', 'thumbnail' ),
		)
	);
}



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


class Comment_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		parent::__construct(
			'comment_widget', // Base ID
			__('Commented', 'vtheme'), // Name
			array( 'description' => __( 'Commented Widget for Sidebar', 'vtheme' ), ) // Args
		);
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 3;
		if ( ! $number )
			$number = 3;

		echo $args['before_widget'];
		if ( ! empty( $title ) ){
			echo $args['before_title'] . $title . $args['after_title'];
		}

		$comments = get_comments( apply_filters( 'widget_comments_args', array(
			'number'      => $number,
			'status'      => 'approve',
			'post_status' => 'publish'
		) ) );

		//echo '<pre>';
		//print_r($comments);
		//echo '</pre>';
		if($comments):
			foreach ($comments as $comment) {
				$default_avatar = get_stylesheet_directory_uri() . '/images/author_avatar.png';
				?>
				<div class="comment_box">
					<div class="cmt_pics"><?php echo get_avatar( $comment->comment_author_email, 65, $default_avatar, $comment->comment_author ); ?></div>
					<a href="<?php echo get_permalink($comment->ID);?>"><h3><?php echo $comment->post_title;?></h3></a>
					<div class="post_meta">
						<span class="post_comments"><?php echo get_comments_number($comment->ID);?></span><!-- /post_comments -->
						<span class="post_share">0</span><!-- /post_share -->
					</div><!-- /meta -->
				</div>
				<?php
			}
		endif;
		echo $args['after_widget'];
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
			$title = isset( $instance[ 'title' ] ) ? $instance[ 'title' ] : 'COMMENTED';
			$limit = isset( $instance[ 'limit' ] ) ? $instance[ 'limit' ] : 3;
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'limit' ); ?>"><?php _e( 'Limit:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'limit' ); ?>" name="<?php echo $this->get_field_name( 'limit' ); ?>" type="text" value="<?php echo esc_attr( $limit ); ?>">
		</p>
		<?php 
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['limit'] = ( ! empty( $new_instance['limit'] ) ) ? strip_tags( $new_instance['limit'] ) : 3;

		return $instance;
	}
}
/*
add_action( 'widgets_init', function(){
     register_widget( 'Comment_Widget' );
});*/
add_action('widgets_init',
     create_function('', 'return register_widget("Comment_Widget");')
);