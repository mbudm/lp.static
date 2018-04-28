<?php
/**
 * Products List Widget class.
 * @Parameters
 *  - title
 *  - display_mode
 */
class mb_Products_List_Widget extends WP_Widget {
	 var $defaults;
	 
	/**
	 * Widget setup.
	 */
	function mb_Products_List_Widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'mb_widget_products_list', 'description' => esc_html__("Shows the products as a simple list. Can show all, featured or unfeatured products.", TEMPLATE_DOMAIN) );

		/* Widget control settings. */
		$control_ops = array( 'width' => 150, 'height' => 350, 'id_base' => 'mb-products-list-widget' );

		/* Create the widget. */
		$this->WP_Widget( 'mb-products-list-widget', esc_html__('MBU: Products List', TEMPLATE_DOMAIN), $widget_ops, $control_ops );
		
		$this->display_modes = array( 
			'all' => __('All products', TEMPLATE_DOMAIN), 
			'featured' => __('Featured (sticky) products', TEMPLATE_DOMAIN),
			'unfeatured' => __('Unfeatured (not sticky) products', TEMPLATE_DOMAIN)
		);
		
		$this->defaults = array( 
			'title' => __('', TEMPLATE_DOMAIN), 
			'display_mode' => $this->display_modes['all']
		);
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = apply_filters('widget_title', $instance['title'] );
		$display_mode = $instance['display_mode'] ? $instance['display_mode'] : 'all' ;
		
		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes).*/
		if ( $title )
		    echo $before_title . $title . $after_title;
		
		mbudm_get_products_list($display_mode);
		
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
		$instance['display_mode'] = strip_tags( $new_instance['display_mode'] );
		
		return $instance;
	}

	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	function form( $instance ) {

		$instance = wp_parse_args( (array) $instance, $this->defaults ); ?>

		<!-- Widget Title: MBU Products List-->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title', TEMPLATE_DOMAIN); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" type="text" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" />
			
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'display_mode' ); ?>">Display mode:</label>
			<select id="<?php echo $this->get_field_id( 'display_mode' ); ?>" name="<?php echo $this->get_field_name( 'display_mode' ); ?>" class="widefat">
			<?php 
			foreach($this->display_modes as $k => $v){ ?>
				<option value="<?php echo $k ?>" <?php if ( $k == $instance['display_mode'] ) echo 'selected="selected"'; ?>><?php echo $v ?></option>
				<?php } ?>
			</select>
		</p>
<?php
	}
}
?>
