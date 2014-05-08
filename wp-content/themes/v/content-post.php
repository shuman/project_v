<?php
/**
 * The template used for displaying page content
 */
?>
<div class="blog_post">
	<div class="post_image">
		<img src="<?php echo get_stylesheet_directory_uri();?>/images/post_img2.jpg" alt="post_img">
	</div><!-- /post_image -->

	<div class="post_title">
		<h2><?php the_title();?></h2>
		<span>blog categories / April, 26th 2014</span>
	</div><!-- /post_title -->

	<div class="post_content">
		<?php the_content();?>
	</div><!-- /post_content -->
	<div class="post_meta">
		<span class="post_coments">113</span><!-- /post_coments -->
		<span class="post_share">256</span><!-- /post_share -->
	</div><!-- /post_meta -->
</div><!-- /blog_post -->