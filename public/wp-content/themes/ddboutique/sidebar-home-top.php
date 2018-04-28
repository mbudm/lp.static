					<div id="sidebar-home-top" >
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(__('Home top', TEMPLATE_DOMAIN)) ) : ?>
							<?php mbudm_widget_blank_msg('Home Top'); ?>

<?php
if(  is_active_sidebar( __('Home top', TEMPLATE_DOMAIN) )  ) {
		echo '<hr />';
}
?>

						<?php endif; ?>
					</div>
					
