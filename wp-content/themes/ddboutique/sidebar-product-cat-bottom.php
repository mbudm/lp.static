<?php
if(  is_active_sidebar( __('Product Category Bottom', TEMPLATE_DOMAIN) )  ) {
		echo '<hr />';
}
?><ul id="sidebar-product-cat-bottom" >
	
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(__('Product Category Bottom', TEMPLATE_DOMAIN)) ) : ?>
	<?php mbudm_widget_blank_msg('Product Category Bottom'); ?>

	<?php endif; ?>
	
</ul>
					
