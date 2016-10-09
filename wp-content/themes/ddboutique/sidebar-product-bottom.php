<?php
if(  is_active_sidebar( __('Product Detail Bottom', TEMPLATE_DOMAIN) )  ) {
		echo '<hr />';
}
?>
<ul id="sidebar-product-bottom" >
	
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(__('Product Detail Bottom', TEMPLATE_DOMAIN)) ) : ?>
	<?php mbudm_widget_blank_msg('Product Detail Bottom'); ?>

	<?php endif; ?>
	
</ul>
					
