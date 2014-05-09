<div class="pricing_faq">
	<div class="container">

		<div class="row">
			<div class="col-lg-12">
				<div class="content_title icon_pricing_faq">
					<?php $page_50 = get_post(50); ?>
					<h1><?php echo $page_50->post_title;?></h1>
					<p><?php echo $page_50->post_content;?></p>
				</div><!-- /content_title -->
			</div>
		</div><!-- /row -->

		<div class="row">
			<div class="col-lg-12">
				<div class="faq">
					<div class="faq_left">
						<?php
						$args = array( 'post_type' => 'faq', 'posts_per_page' => 500 );
						$faqs = new WP_Query( $args );
						$total_faq = count($faqs->posts);
						$col_sep = ceil($total_faq / 2);
						$counter = 0;
						while ( $faqs->have_posts() ) : $faqs->the_post();
							if($col_sep == $counter){
								echo '</div><div class="faq_right">';
							}
							?>
							<div class="faq_item">
								<h2><?php echo get_the_title();?></h2>
								<p><?php echo get_the_content();?></p>
							</div><!-- /faq_item -->
							<?php
							$counter++;
						endwhile;
						?>
					</div>
				</div><!-- /faq -->

				<div class="question">
					<p>Still have questions?</p>
					<a class="btn-default" href="<?php echo site_url('/contact-us/');?>">CONTACT US</a>
				</div>
			</div>
		</div><!-- /row -->
	</div><!-- /container -->
</div><!-- /pricing_faq -->
