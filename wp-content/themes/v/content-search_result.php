<?php
/**
 * The template used for displaying page content
 */
?>
<div class="blog_post">

	<div class="post_title">
		<h2><?php the_title();?></h2>
	</div><!-- /post_title -->

	<div class="post_content">
		<?php the_content();?>
		<div class="text-right">
			<a class="btn read_more btn-default" href="<?php the_permalink();?>">Read more</a>
		</div>
	</div><!-- /post_content -->
</div><!-- /blog_post -->