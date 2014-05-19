<div class="sidebar">
	<form action="<?php site_url();?>" class="searchform" id="searchform" method="get" role="search">
		<div class="form-group">
			<input type="text" id="s" name="s" class="form-control" placeholder="Search" value="<?php echo (isset($_GET['s']) ? $_GET['s'] : '');?>">
			<input type="submit" id="searchsubmit" class="icon_search" value="">
		</div>
	</form>
	<?php dynamic_sidebar('sidebar'); ?>
	
</div><!-- /sidebar -->