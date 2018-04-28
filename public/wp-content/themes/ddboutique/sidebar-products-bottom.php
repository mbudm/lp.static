<ul id="sidebar-products-bottom" >
	
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(__('Products Bottom', TEMPLATE_DOMAIN)) ) : ?>
		<?php mbudm_widget_blank_msg('Products Bottom'); ?>

	<?php endif; ?>
	
</ul>
					
