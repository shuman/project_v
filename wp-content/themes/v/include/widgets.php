<?php

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
						<span class="post_comments"><?php echo get_parent_comment_count($comment->ID); ?></span><!-- /post_comments -->
						<span class="post_share"><?php echo get_child_comment_count($comment->ID); ?></span><!-- /post_share -->
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

/* INIT WIDGET */
add_action('widgets_init',
     create_function('', 'return register_widget("Comment_Widget");')
);
