<?php
if(  is_active_sidebar( __('Home bottom', TEMPLATE_DOMAIN) )  ) {
		echo '<hr />';
}
?>

<div id="sidebar-home-bottom" class="cfix">
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(__('Home bottom', TEMPLATE_DOMAIN)) ) : ?>
							
							<?php mbudm_widget_blank_msg('Home Bottom'); ?>

						<?php endif; ?>
					</div>
