<?php
if(  is_active_sidebar( __('Transactions Bottom', TEMPLATE_DOMAIN) )  ) {
		echo '<hr />';
}
?><ul id="sidebar-transactions-bottom" >
	
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(__('Transactions Bottom', TEMPLATE_DOMAIN)) ) : ?>
		<?php mbudm_widget_blank_msg('Transactions Bottom'); ?>

	<?php endif; ?>
	
</ul>
					
