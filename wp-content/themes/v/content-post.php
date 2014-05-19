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
		<div><span><?php echo get_the_category_list(', '); ?> / </span> <span class="dt" title="<?php echo date( "Y-m-d H:i:s", strtotime(get_the_date().' '.get_the_time()) );?>"><?php the_date();?> <?php the_time(); ?></span></div>
	</div><!-- /post_title -->

	<div class="post_content">
		<?php the_content();?>
	</div><!-- /post_content -->
	<div class="post_meta">
		<span class="post_comments"><?php echo get_parent_comment_count($post->ID); ?></span><!-- /post_comments -->
		<span class="post_share"><?php echo get_child_comment_count($post->ID); ?></span><!-- /post_share -->
	</div><!-- /post_meta -->
	<div class="go_back">
		<a class="btn btn-default" href="<?php echo site_url("/blog/");?>">Back</a>
	</div>
</div><!-- /blog_post -->