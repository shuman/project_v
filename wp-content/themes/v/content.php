<?php
/**
 * The template used for displaying page content
 */
?>
<div class="blog_post">
	<div class="post_image">
		<?php
		$post_thumbnail_id = get_post_thumbnail_id( $post_id );
		
		if (has_post_thumbnail( $post->ID ) ){
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
			$img_url = $image[0];
		}
		else{
			$img_url = get_stylesheet_directory_uri() ."/images/post_img2.jpg";
		}
		?>
		<img src="<?php echo $img_url;?>" alt="post_img">

	</div><!-- /post_image -->

	<div class="post_title">
		<h2><?php the_title();?></h2>
		<span><?php echo get_the_category_list(', '); ?> / <?php echo get_the_date(); ?></span>
	</div><!-- /post_title -->

	<div class="post_content">
		<?php the_excerpt();?>
		<div class="text-right">
			<a class="btn read_more btn-default" href="<?php the_permalink();?>">Read more</a>
		</div>
	</div><!-- /post_content -->
	<div class="post_meta">
		<span class="post_comments"><?php comments_number( '0', '1', '%' ); ?></span><!-- /post_comments -->
		<span class="post_share">0</span><!-- /post_share -->
	</div><!-- /post_meta -->
</div><!-- /blog_post -->