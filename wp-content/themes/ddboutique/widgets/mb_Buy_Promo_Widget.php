<?php
/**
 * Buy Promo Widget class.
 * @Parameters
 *  - CTA title
 *  - Product title 
 *  - Link title (tooltip) 
 *  - Price (currency symbol, price whole, separator, decimal, clause)
 *  - Description
 */
class mb_Buy_Promo_Widget extends WP_Widget {
	 var $defaults;
	 
	/**
	 * Widget setup.
	 */
	function mb_Buy_Promo_Widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'widget_buy_promo', 'description' => esc_html__("A Promo box for the products page.", TEMPLATE_DOMAIN) );

		/* Widget control settings. */
		$control_ops = array( 'width' => 150, 'height' => 350, 'id_base' => 'mb-buy-promo-widget' );

		/* Create the widget. */
		$this->WP_Widget( 'mb-buy-promo-widget', esc_html__('MBU: Buy Promo', TEMPLATE_DOMAIN), $widget_ops, $control_ops );
		
		$this->defaults = array( 
			'title' => __('', TEMPLATE_DOMAIN), 
			'link_title' => __('Check out our great Products', TEMPLATE_DOMAIN),
			'cta_title' => __('Buy Now', TEMPLATE_DOMAIN),
			'product_title' => __('Prices start at a low', TEMPLATE_DOMAIN),
			'cur_show_after' => false,
			'cur_symbol' => '$',
			'price_whole' => '7',
			'price_separator' => '.',
			'price_fraction' => '99',
			'currency' => __('USD', TEMPLATE_DOMAIN),
			'clause' => __('Includes taxes', TEMPLATE_DOMAIN),
			'desc' => __('Get instant satisfaction. Buy and download straight away', TEMPLATE_DOMAIN)
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
		$product_title = $instance['product_title'];
		$cur_symbol_before = $instance['cur_show_after'] ? '' : '<span class="curr-symbol">' . $instance['cur_symbol'] .'</span>' ;
		$cur_symbol_after = $instance['cur_show_after'] ?  '<span class="curr-symbol cs-after">'. $instance['cur_symbol'] .'</span>' : '' ;
		$price_whole = $instance['price_whole'];
		$price_fraction = $instance['price_separator'] . $instance['price_fraction'];
		$currency = $instance['currency'] ? '<span class="currency">'.  $instance['currency']  .'</span>' : '';
		$clause = $instance['clause'];
		$desc = $instance['desc'];
		
		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes).*/
		if ( $title )
		    echo $before_title . $title . $after_title;

		echo '<a class="big-promo cfix" href="' . PRODUCT_PAGE . '" title="' . $link_title . '" ><span class="price">'. $cur_symbol_before .'<span class="price-whole">'.$price_whole .'</span><span class="price-fraction">'.$price_fraction . '</span>' . $cur_symbol_after .  $currency . '</span><span class="clause">'.$clause .'</span><h3>'.$cta_title . ' <strong>'.$product_title .'</strong>
</h3><p>'. $desc .'</p></a>';
	
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
		$instance['product_title'] = strip_tags( $new_instance['product_title'] );
		$instance['cur_show_after'] = $new_instance['cur_show_after'];
		$instance['cur_symbol'] = strip_tags( $new_instance['cur_symbol'] );
		$instance['price_whole'] = strip_tags( $new_instance['price_whole'] );
		$instance['price_separator'] = strip_tags( $new_instance['price_separator'] );
		$instance['price_fraction'] = strip_tags( $new_instance['price_fraction'] );
		$instance['currency'] = strip_tags( $new_instance['currency'] );
		$instance['clause'] = strip_tags( $new_instance['clause'] );
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
			<label for="<?php echo $this->get_field_id( 'cta_title' ); ?>"><?php _e('Call to action', TEMPLATE_DOMAIN); ?></label>
			<input id="<?php echo $this->get_field_id( 'cta_title' ); ?>" type="text" name="<?php echo $this->get_field_name( 'cta_title' ); ?>" value="<?php echo $instance['cta_title']; ?>" class="widefat" />
			<small><?php _e('The light title text that is the Call to Action', TEMPLATE_DOMAIN) ?></small>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'product_title' ); ?>"><?php _e('Product title', TEMPLATE_DOMAIN); ?></label>
			<input id="<?php echo $this->get_field_id( 'product_title' ); ?>" type="text" name="<?php echo $this->get_field_name( 'product_title' ); ?>" value="<?php echo $instance['product_title']; ?>" class="widefat" />
			<small><?php _e('The dark title text that relates to the price', TEMPLATE_DOMAIN) ?></small>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'link_title' ); ?>"><?php _e('Tooltip', TEMPLATE_DOMAIN); ?></label>
			<input id="<?php echo $this->get_field_id( 'link_title' ); ?>" type="text" name="<?php echo $this->get_field_name( 'link_title' ); ?>" value="<?php echo $instance['link_title']; ?>" class="widefat" />
			<small><?php _e('This is the text that appears when a user rolls over the Buy Promo', TEMPLATE_DOMAIN) ?></small>
		</p>
		<!-- Price -->
		<style>
			#buynow_price {border-collapse: collapse;}
			#buynow_price th{font-weight:normal; font-size:0.9em;
		</style>
			<table id="buynow_price">
			<caption style="text-align:left;">
			<?php _e('Price', TEMPLATE_DOMAIN); ?>
			</caption>
				<thead>
					<th><label for="<?php echo $this->get_field_id( 'cur_symbol' ); ?>"><?php esc_html_e('Symbol', TEMPLATE_DOMAIN); ?></label></th>
					<th><label for="<?php echo $this->get_field_id( 'price_whole' ); ?>"><?php esc_html_e('Price', TEMPLATE_DOMAIN); ?></label></th>
					<th><label for="<?php echo $this->get_field_id( 'cur_symbol' ); ?>"><?php esc_html_e('Separator', TEMPLATE_DOMAIN); ?></label></th>
					<th><label for="<?php echo $this->get_field_id( 'cur_symbol' ); ?>"><?php esc_html_e('Fraction', TEMPLATE_DOMAIN); ?></label></th>
				</thead>
				<tbody>
					<td><input id="<?php echo $this->get_field_id( 'cur_symbol' ); ?>" type="text" name="<?php echo $this->get_field_name( 'cur_symbol' ); ?>" value="<?php echo $instance['cur_symbol']; ?>" size="1" maxlength="1" /></td>
					<td><input id="<?php echo $this->get_field_id( 'price_whole' ); ?>" type="text" name="<?php echo $this->get_field_name( 'price_whole' ); ?>" value="<?php echo $instance['price_whole']; ?>" size="4" /></td>
					<td><input id="<?php echo $this->get_field_id( 'price_separator' ); ?>" type="text" name="<?php echo $this->get_field_name( 'price_separator' ); ?>" value="<?php echo $instance['price_separator']; ?>" size="1" maxlength="1" /></td>
					<td><input id="<?php echo $this->get_field_id( 'price_fraction' ); ?>" type="text" name="<?php echo $this->get_field_name( 'price_fraction' ); ?>" value="<?php echo $instance['price_fraction']; ?>" size="2" maxlength="2" /></td>
				</tbody>
			</table>
			<p><!-- Show currency symbol position checkbox -->
			<label for="<?php echo $this->get_field_id( 'cur_show_after' ); ?>">
			    <input class="checkbox" type="checkbox" <?php checked( $instance['cur_show_after'], true ); ?> id="<?php echo $this->get_field_id( 'cur_show_after' ); ?>" name="<?php echo $this->get_field_name( 'cur_show_after' ); ?>" value="1" <?php checked('1', $instance['cur_show_after']); ?> />
			    <?php _e('Position symbol after price', TEMPLATE_DOMAIN); ?>
			</label>
			</p>
			<p>
			<label for="<?php echo $this->get_field_id( 'currency' ); ?>"><?php esc_html_e('Currency Label', TEMPLATE_DOMAIN); ?></label><input id="<?php echo $this->get_field_id( 'currency' ); ?>" type="text" name="<?php echo $this->get_field_name( 'currency' ); ?>" value="<?php echo $instance['currency']; ?>" class="widefat" />
			</p>
			<p>
			<label for="<?php echo $this->get_field_id( 'clause' ); ?>"><?php esc_html_e('Clause', TEMPLATE_DOMAIN); ?></label><input id="<?php echo $this->get_field_id( 'clause' ); ?>" type="text" name="<?php echo $this->get_field_name( 'clause' ); ?>" value="<?php echo $instance['clause']; ?>" class="widefat" />
			</p>
			<p>
			<label for="<?php echo $this->get_field_id( 'desc' ); ?>"><?php esc_html_e('Description', TEMPLATE_DOMAIN); ?></label><textarea id="<?php echo $this->get_field_id( 'desc' ); ?>" type="text" name="<?php echo $this->get_field_name( 'desc' ); ?>" class="widefat" rows="4"><?php echo $instance['desc']; ?></textarea>
			</p>
		</p>
		
<?php
	}
}
?>
