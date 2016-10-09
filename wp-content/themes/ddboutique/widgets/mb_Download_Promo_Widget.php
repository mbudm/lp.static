<?php
/**
 * Download Promo Widget class.
 * @Parameters
 *  - CTA title
 *  - Product title 
 *  - Link title (tooltip) 
 *  - Description
 */
class mb_Download_Promo_Widget extends WP_Widget {
	 var $defaults;
	 
	/**
	 * Widget setup.
	 */
	function mb_Download_Promo_Widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'widget_download_promo', 'description' => esc_html__("A Promo box for the downloads page.", TEMPLATE_DOMAIN ) );

		/* Widget control settings. */
		$control_ops = array( 'width' => 150, 'height' => 350, 'id_base' => 'mb-download-promo-widget' );

		/* Create the widget. */
		$this->WP_Widget( 'mb-download-promo-widget', esc_html__('MBU: Download Promo', TEMPLATE_DOMAIN ), $widget_ops, $control_ops );
		
		$this->defaults = array( 
			'title' => __('', TEMPLATE_DOMAIN), 
			'link_title' => __('Check out our free Downloads', TEMPLATE_DOMAIN),
			'preamble' => __('Try before you buy. Download one of our', TEMPLATE_DOMAIN),
			'cta_title' => __('Free samples', TEMPLATE_DOMAIN),
			'desc' => __('We give out free samples because we know our products rock and we want you to experience them.', TEMPLATE_DOMAIN)
		);
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$link_title = $instance['link_title'];
		$cta_title = $instance['cta_title'];
		$preamble = $instance['preamble'];
		$desc = $instance['desc'];
		
		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes).*/
		if ( $title )
		    echo $before_title . $title . $after_title;

		echo '<a class="big-promo" href="' . DOWNLOAD_PAGE . '" title="' . $link_title . '" ><p>'.$preamble.'</p><h3>'.$cta_title . '</h3><p>'. $desc .'</p></a>';
	
		/* After widget (defined by themes). */
		echo $after_widget;
	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for for text inputs only . */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['link_title'] = strip_tags( $new_instance['link_title'] );
		$instance['cta_title'] = strip_tags( $new_instance['cta_title'] );
		$instance['preamble'] = strip_tags( $new_instance['preamble'] );
		$instance['desc'] = strip_tags( $new_instance['desc'] );

		return $instance;
	}

	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	function form( $instance ) {

		
		$instance = wp_parse_args( (array) $instance, $this->defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title', TEMPLATE_DOMAIN); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" type="text" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" />
			<small><?php _e('For this widget the title appears above the promo in lighter smaller text - useful if you want to flag promotional elements to your users', TEMPLATE_DOMAIN) ?></small>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'preamble' ); ?>"><?php _e('Preamble', TEMPLATE_DOMAIN); ?></label>
			<input id="<?php echo $this->get_field_id( 'preamble' ); ?>" type="text" name="<?php echo $this->get_field_name( 'preamble' ); ?>" value="<?php echo $instance['preamble']; ?>" class="widefat" />
			<small><?php _e('The preamble, the introductory dark title text', TEMPLATE_DOMAIN) ?></small>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'cta_title' ); ?>"><?php _e('Call to action', TEMPLATE_DOMAIN); ?></label>
			<input id="<?php echo $this->get_field_id( 'cta_title' ); ?>" type="text" name="<?php echo $this->get_field_name( 'cta_title' ); ?>" value="<?php echo $instance['cta_title']; ?>" class="widefat" />
			<small><?php _e('The light title text is the download call to action', TEMPLATE_DOMAIN) ?></small>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'link_title' ); ?>"><?php _e('Tooltip', TEMPLATE_DOMAIN); ?></label>
			<input id="<?php echo $this->get_field_id( 'link_title' ); ?>" type="text" name="<?php echo $this->get_field_name( 'link_title' ); ?>" value="<?php echo $instance['link_title']; ?>" class="widefat" />
			<small><?php _e('This is the text that appears when a user rolls over the Download Promo', TEMPLATE_DOMAIN) ?></small>
		</p>
			<p>
			<label for="<?php echo $this->get_field_id( 'desc' ); ?>"><?php esc_html_e('Description', TEMPLATE_DOMAIN); ?></label><textarea id="<?php echo $this->get_field_id( 'desc' ); ?>" type="text" name="<?php echo $this->get_field_name( 'desc' ); ?>" class="widefat" rows="4"><?php echo $instance['desc']; ?></textarea>
			</p>
		</p>
		
<?php
	}
}
?>
