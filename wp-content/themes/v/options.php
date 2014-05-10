<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 *
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);

	// echo $themename;
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 */

function optionsframework_options() {

	$prefix = 'op_';

	// Home Posts Post Types
	$post_types = array(
		'post' 			=> __('Posts', 'vtheme'),
		'testimonial' 	=> __('Testimonials', 'vtheme'),
		'page' 			=> __('Pages', 'vtheme'),
	);
	

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}

	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// Pull all the slides into an array
	$options_testimonials = array();
	$options_testimonials_obj = get_posts(array( 'posts_per_page' => -1, 'post_type'=> 'testimonial' ));
	foreach ($options_testimonials_obj as $testimonial) {
		$options_testimonials[$testimonial->ID] = $testimonial->post_title;
	}
	
	$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 3,
		'tinymce' => array( 'plugins' => 'wordpress' )
	);

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();

	$options[] = array(
		'name' => __('Front Page', 'vtheme'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Banner Text', 'vtheme'),
		'desc' => sprintf( __( '', 'vtheme' ) ),
		'id' => $prefix . 'banner_text',
		'type' => 'editor',
		'settings' => $wp_editor_settings );
	
	/* New Section */
	$options[] = array(
		'name' => __('VIDEO SECTION', 'vtheme'),
		'type' => 'info');

	$options[] = array(
		'name' => __('Youtube Video URL', 'vtheme'),
		'desc' => sprintf( __( '', 'vtheme' ) ),
		'id' => $prefix . 'video_url',
		'type' => 'text' );

	$options[] = array(
		'name' => __('Video Title', 'vtheme'),
		'desc' => sprintf( __( 'Video Post Title', 'vtheme' ) ),
		'id' => $prefix . 'video_title',
		'type' => 'text' );

	$options[] = array(
		'name' => __('Content', 'vtheme'),
		'desc' => sprintf( __( '', 'vtheme' ) ),
		'id' => $prefix . 'video_content',
		'type' => 'editor',
		'settings' => $wp_editor_settings );

	/* New Section */
	$options[] = array(
		'name' => __('SIMPLE TEXT EDITING', 'vtheme'),
		'type' => 'info');

	$options[] = array(
		'name' => __('Title', 'vtheme'),
		'desc' => sprintf( __( '', 'vtheme' ) ),
		'id' => $prefix . 'simple_text_editing_title',
		'type' => 'text' );

	$options[] = array(
		'name' => __('Content', 'vtheme'),
		'desc' => sprintf( __( '', 'vtheme' ) ),
		'id' => $prefix . 'simple_text_editing_content',
		'type' => 'editor',
		'settings' => $wp_editor_settings );

	$options[] = array(
		'name' => __('Screenshot', 'vtheme'),
		'desc' => __('This image will display inside browser mockup', 'vtheme'),
		'id' => $prefix . 'simple_text_editing_image',
		'type' => 'upload');

	/* New Section */
	$options[] = array(
		'name' => __('MEDIA DRAG AND DROP', 'vtheme'),
		'type' => 'info');

	$options[] = array(
		'name' => __('Title', 'vtheme'),
		'desc' => sprintf( __( '', 'vtheme' ) ),
		'id' => $prefix . 'media_drag_and_drop_title',
		'type' => 'text' );

	$options[] = array(
		'name' => __('Content', 'vtheme'),
		'desc' => sprintf( __( '', 'vtheme' ) ),
		'id' => $prefix . 'media_drag_and_drop_content',
		'type' => 'editor',
		'settings' => $wp_editor_settings );

	$options[] = array(
		'name' => __('Screenshot', 'vtheme'),
		'desc' => __('This image will display inside browser mockup', 'vtheme'),
		'id' => $prefix . 'media_drag_and_drop_image',
		'type' => 'upload');
	
	/* New Section */
	$options[] = array(
		'name' => __('CONSISTENT CUSTOMIZED STYLING', 'vtheme'),
		'type' => 'info');

	$options[] = array(
		'name' => __('Title', 'vtheme'),
		'desc' => sprintf( __( '', 'vtheme' ) ),
		'id' => $prefix . 'consistent_customized_styling_title',
		'type' => 'text' );

	$options[] = array(
		'name' => __('Content', 'vtheme'),
		'desc' => sprintf( __( '', 'vtheme' ) ),
		'id' => $prefix . 'consistent_customized_styling_content',
		'type' => 'editor',
		'settings' => $wp_editor_settings );

	$options[] = array(
		'name' => __('Screenshot', 'vtheme'),
		'desc' => __('This image will display inside browser mockup', 'vtheme'),
		'id' => $prefix . 'consistent_customized_styling_image',
		'type' => 'upload');

	/* New Section */
	$options[] = array(
		'name' => __('VERSION CONTROL', 'vtheme'),
		'type' => 'info');

	$options[] = array(
		'name' => __('Title', 'vtheme'),
		'desc' => sprintf( __( '', 'vtheme' ) ),
		'id' => $prefix . 'version_control_title',
		'type' => 'text' );

	$options[] = array(
		'name' => __('Content', 'vtheme'),
		'desc' => sprintf( __( '', 'vtheme' ) ),
		'id' => $prefix . 'version_control_content',
		'type' => 'editor',
		'settings' => $wp_editor_settings );

	$options[] = array(
		'name' => __('Screenshot', 'vtheme'),
		'desc' => __('This image will display inside browser mockup', 'vtheme'),
		'id' => $prefix . 'version_control_image',
		'type' => 'upload');

	/* New Section */
	$options[] = array(
		'name' => __('TEAM MANAGEMENT', 'vtheme'),
		'type' => 'info');

	$options[] = array(
		'name' => __('Title', 'vtheme'),
		'desc' => sprintf( __( '', 'vtheme' ) ),
		'id' => $prefix . 'team_management_title',
		'type' => 'text' );

	$options[] = array(
		'name' => __('Content', 'vtheme'),
		'desc' => sprintf( __( '', 'vtheme' ) ),
		'id' => $prefix . 'team_management_content',
		'type' => 'editor',
		'settings' => $wp_editor_settings );

	$options[] = array(
		'name' => __('Screenshot', 'vtheme'),
		'desc' => __('This image will display inside browser mockup', 'vtheme'),
		'id' => $prefix . 'team_management_image',
		'type' => 'upload');
	
	/* New Section */
	$options[] = array(
		'name' => __('TESTIMONIALS', 'vtheme'),
		'type' => 'info');

	$options[] = array(
		'name' => __('Title', 'vtheme'),
		'desc' => sprintf( __( '', 'vtheme' ) ),
		'id' => $prefix . 'testimonial_title',
		'type' => 'text' );

	$options[] = array(
		'name' => __('Content', 'vtheme'),
		'desc' => sprintf( __( '', 'vtheme' ) ),
		'id' => $prefix . 'testimonial_content',
		'type' => 'editor',
		'settings' => $wp_editor_settings );

	/*
	$options[] = array(
		'name' => __('Testimonial Post Type', 'vtheme'),
		'desc' => __('Choose a post type for testimonial.', 'vtheme'),
		'id' => $prefix . 'testimonial_posttype',
		'std' => 'post',
		'type' => 'select',
		'options' => $post_types );

	
		if(!empty($options_categories)) {
			$options[] = array(
				'name' => __('Select Post Categories', 'vtheme'),
				'desc' => __('', 'vtheme'),
				'id' => $prefix . 'testimonial_postcategories',
				'std' => '',
				'class' => 'hidden',
				'type' => 'multicheck',
				'options' => $options_categories
			);
		}

		if(!empty($options_pages)) {
			$options[] = array(
				'name' => __('Select Pages', 'vtheme'),
				'desc' => __('', 'vtheme'),
				'id' => $prefix . 'testimonial_pages',
				'std' => '',
				'class' => 'hidden',
				'type' => 'multicheck',
				'options' => $options_pages
			);
		}

		if(!empty($options_testimonials)){
			$options[] = array(
				'name' => __('Select Testimonial', 'vtheme'),
				'desc' => __('', 'vtheme'),
				'id' => $prefix . 'testimonial_type_posts',
				'std' => '',
				'class' => 'hidden',
				'type' => 'multicheck',
				'options' => $options_testimonials
			);
		}

	*/

	/* New Section */
	$options[] = array(
		'name' => __('CLIENTS', 'vtheme'),
		'type' => 'info');

	$options[] = array(
		'name' => __('Title', 'vtheme'),
		'desc' => sprintf( __( '', 'vtheme' ) ),
		'id' => $prefix . 'clients_title',
		'type' => 'text' );

	$options[] = array(
		'name' => __('Content', 'vtheme'),
		'desc' => sprintf( __( '', 'vtheme' ) ),
		'id' => $prefix . 'clients_content',
		'type' => 'editor',
		'settings' => $wp_editor_settings );

	$options[] = array(
		'name' => __('Clients Logo', 'vtheme'),
		'desc' => sprintf( __( '', 'vtheme' ) ),
		'id' => $prefix . 'clients_logo',
		'type' => 'editor',
		'settings' => $wp_editor_settings );


	$options[] = array(
		'name' => __('Footer', 'vtheme'),
		'type' => 'heading' );


	$options[] = array(
		'name' => __('Additional Text Editor', 'vtheme'),
		'desc' => sprintf( __( 'This editor includes media button.', 'vtheme' ), 'http://codex.wordpress.org/Function_Reference/wp_editor' ),
		'id' => 'example_editor_media',
		'type' => 'editor',
		'settings' => $wp_editor_settings );

	return $options;
}