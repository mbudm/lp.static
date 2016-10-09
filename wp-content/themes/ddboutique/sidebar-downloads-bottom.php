<ul id="sidebar-downloads-bottom" >
	
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(__('Downloads Bottom', TEMPLATE_DOMAIN)) ) : ?>
	
	<?php mbudm_widget_blank_msg('Downloads Bottom'); ?>

	<?php endif; ?>
	
</ul>
					
