<?php
if(  is_active_sidebar( __('Download Detail Bottom', TEMPLATE_DOMAIN) )  ) {
		echo '<hr />';
}
?>
<ul id="sidebar-download-bottom" >
	
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(__('Download Detail Bottom', TEMPLATE_DOMAIN)) ) : ?>
	
	<?php mbudm_widget_blank_msg('Download Detail Bottom'); ?>

	<?php endif; ?>
	
</ul>
					
