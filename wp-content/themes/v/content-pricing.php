<div class="pricing clearfix">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="content_title icon_comp_chart">
					<?php $page_59 = get_post(59); ?>
					<h1><?php echo $page_59->post_title;?></h1>
					<p><?php echo $page_59->post_content;?></p>
				</div><!-- /content_title -->
			</div>
		</div><!-- /row -->

		<div class="row comparison_chart">
			<div class="col-lg-4 col-md-4 col-sm-4">
				<?php $page_33 = get_post(33); ?>
				<div class="chart_item">
					<div class="chart_title">
						<h1><?php echo $page_33->post_title; ?></h1>
						<span><?php echo the_field('chart_price', 33); ?></span>
					</div>
					<div class="chart_list"><?php echo $page_33->post_content; ?></div>
				</div><!-- /chart_item -->
			</div>

			<div class="col-lg-4 col-md-4 col-sm-4">
				<?php $page_35 = get_post(35);?>
				<div class="chart_item">
					<div class="chart_title">
						<h1><?php echo $page_35->post_title; ?></h1>
						<span><?php echo the_field('chart_price', 35); ?></span>
					</div>
					<div class="chart_list"><?php echo $page_35->post_content; ?></div>
				</div><!-- /chart_item -->
			</div>

			<div class="col-lg-4 col-md-4 col-sm-4">
				<?php $page_37 = get_post(37);?>
				<div class="chart_item">
					<div class="chart_title">
						<h1><?php echo $page_37->post_title; ?></h1>
						<span><?php echo the_field('chart_price', 37); ?></span>
					</div>
					<div class="chart_list"><?php echo $page_37->post_content; ?></div>
				</div><!-- /chart_item -->
			</div>
		</div><!-- /row -->

	</div><!-- /container -->
</div><!-- /pricing -->