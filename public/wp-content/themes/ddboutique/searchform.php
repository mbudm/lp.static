<form method="get" id="searchform" action="<?php echo home_url(); ?>/">
	<p>
		<input type="text" value="<?php echo esc_html($s); ?>" name="s" id="s" size="15" />
		<input type="submit" id="searchsubmit" value="<?php _e('Search',TEMPLATE_DOMAIN); ?>" />
	</p>
</form>
