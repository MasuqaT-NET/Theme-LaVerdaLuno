<form role="search" method="get" id="searchform" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<div class="form-group">
		<input type="search" class="form-control" placeholder="<?php _e('Search for:','bonestheme'); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="">
	</div>
	<div class="form-submit">
		<button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
	</div>
</form>