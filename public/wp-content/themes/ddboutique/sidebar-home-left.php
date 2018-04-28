				<ul id="sidebar-home-left" >
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(__('Home Left', TEMPLATE_DOMAIN)) ) : ?>
								<?php mbudm_widget_blank_msg('Home Left'); ?>

						<?php endif; ?>
				</ul>
				
