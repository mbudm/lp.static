<ul id="sidebar-generic-page" >
	
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(__('Generic Page Left', TEMPLATE_DOMAIN)) ) : ?>
			<?php mbudm_widget_blank_msg('Generic Page Left'); ?>

	<?php endif; ?>
	
</ul>
