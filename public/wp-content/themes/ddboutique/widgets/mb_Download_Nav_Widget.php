<?php
/**
 * Download Nav Widget class.
 * @Parameters
 * - title

 */
class mb_Download_Nav_Widget extends WP_Widget {
 	var $defaults;
	/**
	 * Widget setup.
	 */
	function mb_Download_Nav_Widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'widget_mb_download_nav', 'description' => esc_html__("A widget that displays downloads by category.", TEMPLATE_DOMAIN) );

		/* Widget control settings. */
		$control_ops = array( 'width' => 150, 'height' => 350, 'id_base' => 'mb-download-nav-widget' );

		/* Create the widget. */
		$this->WP_Widget( 'mb-download-nav-widget', esc_html__('MBU: Download Nav', TEMPLATE_DOMAIN), $widget_ops, $control_ops );
		
		$this->defaults = array( 
		'title' => ''
		);
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		//if it's a taxonomy page then the var $term exists
		global $term, $post;
		
		extract( $args );

		/* Our variables from the widget settings. */
		$title = $instance['title'];
		
		/* Before widget (defined by themes). */
		echo $before_widget;
	
		echo '<nav id="side-nav" >';
	
		if(!empty($title)){
			echo '<h2>'. $title .'</h2>';
		}
		
		if(!$term){
			$this_prod_id = $post->ID;
		}else{
		
		}
		$args=array(
		  'taxonomy' => 'mbudm_product_category',
		  'orderby' => 'name',
		  'order' => 'ASC'
		  );

		$categories=get_categories($args);
		$tid = isset($term->term_id) ? $term->term_id : null ;
		foreach($categories as $category) { 
			$catclass = $tid == $category->term_id ? 'class="active"' : '' ;
			echo '<h3 ' . $catclass . '><a href="' . get_term_link( $category ) . '" title="' . sprintf( __( "View all downloads in %s" , TEMPLATE_DOMAIN), $category->name ) . '" ' . '>' . $category->name.'</a></h3>';
		   
			$pnav_args = array('tax_query' => array(
					array(
						'taxonomy' => 'mbudm_product_category',
						'field' => 'id',
						'terms' => $category->cat_ID
					)
				),
				'post_type' => 'mbudm_download',
				'orderby' => 'title',
				'order' => 'ASC'
			);
			// The Query
			$the_pnav_query = new WP_Query( $pnav_args );
	
			if($the_pnav_query->post_count > 0){
					
				$output = '<ul>';
					
				// The Loop
				while ( $the_pnav_query->have_posts() ) : $the_pnav_query->the_post();
					
					$selected = $this_prod_id == $post->ID ? "class='active'" : "" ;
					$output .= '<li ' . $selected . ' ><a href="'. get_permalink() .'" title="" >'. get_the_title($post->ID). '</a></li>'; 
					
				endwhile;
				
				// Reset Post Data
				wp_reset_postdata();
				
				$output .= '</ul>';
			}else{
				$output = '<p>There are no downloads in this category.</p>';
			}
			
			echo($output);
		}
		
		echo '</nav>';
		
		/* After widget (defined by themes). */
		echo $after_widget;
	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for for text inputs only . */
		$instance['title'] = $new_instance['title'];

		return $instance;
	}

	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	function form( $instance ) {

		$instance = wp_parse_args( (array) $instance, $this->defaults ); ?>

		<!-- Widget Title: MBU Download nav -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title', TEMPLATE_DOMAIN); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" type="text" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat"/>
			
		</p>
		
<?php
	}
}
?>
