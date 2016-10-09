<ul id="sidebar-product-left" >
	
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(__('Product Detail Left', TEMPLATE_DOMAIN)) ) : ?>
		<?php mbudm_widget_blank_msg('Product Detail Left'); ?>

	<?php endif; ?>
	
</ul>
					
