<?php
/**
 * The template used for displaying page content
 */
?>
<div class="blog_post">
	<?php
	$post_thumbnail_id = get_post_thumbnail_id( $post_id );
	if (has_post_thumbnail( $post->ID ) ){
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
		?>
		<div class="post_image">
			<img src="<?php echo $image[0];?>" alt="post_img">
		</div><!-- /post_image -->
		<?php
	}
	?>

	<div class="post_title">
		<h2><?php the_title();?></h2>
	</div><!-- /post_title -->
	<div class="page_content">
		<?php the_content();?>
	</div><!-- /post_content -->
</div><!-- /blog_post -->