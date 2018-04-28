<?php
		global $wp_widget_factory;
 		//widgets
 		
 		$widget_name_lookup = array(
 				'mb-buy-promo-widget' => 'mb_Buy_Promo_Widget' ,
				'mb-download-promo-widget' => 'mb_Download_Promo_Widget',
				'mb-featured-products-widget' => 'mb_Featured_Products_Widget',
				'mb-download-nav-widget' => 'mb_Download_Nav_Widget' ,
				'mb-text-widget' =>  'mb_Text_Widget' ,
				'mb-mailing-list-widget' => 'mb_Mailing_List_Widget' ,
				'mb-product-nav-widget' => 'mb_Product_Nav_Widget' ,
				'mb-products-list-widget' => 'mb_Products_List_Widget',
				'mb-recent-comments-widget' => 'mb_Recent_Comments_Widget' ,
				'mb-recent-posts-widget' => 'mb_Recent_Posts_Widget' 
 		);
 		/*
 			'mb_buy-promo-widget' => array(),
				'mb_download-promo-widget' => array(),
				'mb-featured-products-widget' => array(),
				'mb-download-nav-widget' => array(),
				'mb-text-widget' => array(),
				'mb-mailing-list-widget' => array(),
				'mb-product-nav-widget' => array(),
				'mb-products-list-widget' => array(),
				'mb-recent-comments-widget' => array(),
				'mb-recent-posts-widget' => array()
				*/
 		$demo_sidebars = array(
 			'home-top'=>array(
 			),
 			'home-right'=>array(
 				array('mb-text-widget' => array('freetext'=>'Digital Documents Boutique e-Store is a <a href="http://linguaposta.com" title="This theme is used by me in my  eStore - Linguaposta.com">tried and tested</a>, real world theme that is ideal for selling ebooks, posters, template documents - anything that customers can simply download and use right away.')),
 				array('mb-buy-promo-widget' => array()),
				array('mb-download-promo-widget' => array()),
				array('mb-recent-comments-widget' => array('title'=>'Recent Comments'))
			),
			'home-left'=>array(
			array('mb-featured-products-widget' => array('display_mode'=>'simple_cycle' )),
 				array('mb-text-widget' => array('freetext'=>'Easy to set up and customise, fully integrated with PayPal and advanced Google Analytics. This theme is a one stop shop for easily selling digital documents online.','invert_color'=>'1','display_mode'=>'edged-shaded')),
				array('mb-recent-posts-widget' => array())
			),
			'home-bottom'=>array(),
			'products-top'=>array(
 				array('mb-featured-products-widget' => array('display_mode'=>'expanded_full')),
 				array('mb-products-list-widget' => array('title'=>'All our products'))
 			),
			'products-bottom'=>array(
				array('mb-text-widget' => array('invert_color'=>1,'display_mode'=>'edged-shaded','freetext'=>'This is the products bottom sidebar. It\'s a two column layout that balances the full width sidebar above. This is the very useful <strong>MBU Text widget</strong> which accepts any text, shortcodes or html markup and has a selection of style modes.')),
				array('mb-download-promo-widget' => array())
			),
			'downloads-bottom'=>array(
				array('mb-text-widget' => array('freetext'=>'This is the downloads bottom sidebar. It\'s a two column layout that balances the three column download items above. This is another example usage of the <strong>MBU Text widget</strong>.','display_mode'=>'edged')),
				array('mb-buy-promo-widget' => array())
			),
			'product-category-left'=>array(
				array('mb-product-nav-widget' => array())
			),
			'product-category-bottom'=>array(
				array('mb-text-widget' => array('freetext'=>'This is the product category bottom sidebar. It\'s a two column layout that balances the complex layout above. This is another example usage of the <strong>MBU Text widget</strong>.')),
				array('mb-mailing-list-widget' => array())
			),
			'product-detail-left'=>array(
				array('mb-product-nav-widget' => array())
			),
			'product-detail-bottom'=>array(
				array('mb-text-widget' => array('freetext'=>'This is the product detail bottom sidebar. It\'s a two column layout that balances the product detail content above. This is another example usage of the <strong>MBU Text widget</strong>.','display_mode'=>'shaded')),
				array('mb-download-promo-widget' => array())
			),
			'download-detail-left'=>array(
				array('mb-download-nav-widget' => array())
			),
			'download-detail-bottom'=>array(
				array('mb-text-widget' => array('freetext'=>'This is the download detail bottom sidebar. It is a two column layout that balances the product detail content above. This is another example usage of the <strong>MBU Text widget</strong>.')),
				array('mb-mailing-list-widget' => array())
			),
			'generic-page-left'=>array(
				array('mb-recent-posts-widget' => array())
			),
			'transactions-bottom'=>array(
				array('mb-text-widget' => array('freetext'=>'This is the transactions page  bottom sidebar. It\'s a two column layout that balances the user transaction details (if logged in) or the sign in box (if logged out) that displays above. This is another example usage of the <strong>MBU Text widget</strong>.','display_mode'=>'edged-shaded')),
				array('mb-buy-promo-widget' => array())
			)
 		);
		$widget_content_arr = array();
		$active_widgets = get_option( 'sidebars_widgets' );
		
		
 		$widget_counters = array(); // key = widget name value = counter
	    foreach($demo_sidebars as $demo_sidebar=>$ds_widgets){
	    	//empty the sidebar
	    	$active_widgets[ $demo_sidebar ] = array();
	    	foreach($ds_widgets as $ds_w_arr){
	    		//widget name is first key
	    		$ds_w = key($ds_w_arr);
	    		// widget params
	    		$ds_w_params = $ds_w_arr[$ds_w];
	    		// get count or widget
	    		if(isset($widget_counters[$ds_w])){
	    			$widget_counters[$ds_w]++;
	    		}else{
	    			$widget_counters[$ds_w] = 2;
	    		}
	    		//when widgets data are added as an option the prefix 'widget_' is used for the key
	    		$widget_content = get_option('widget_'.$ds_w, array() );
	    		
	    		//merge params with defaults
	    		$widget_name = $widget_name_lookup[$ds_w];
	    		if(is_array($wp_widget_factory->widgets[$widget_name]->defaults) ){
					$combined_atts = array_merge($wp_widget_factory->widgets[$widget_name]->defaults,$ds_w_params);
				}else{
					$combined_atts = $ds_w_params;
				}
	    		$widget_content[$widget_counters[$ds_w]] = $combined_atts;
	    		//when widgets data are added as an option the prefix 'widget_' is used for the key
	    		update_option('widget_'.$ds_w,$widget_content);
	    		
	    		//put this in the sidebar
	    		$ds_w_instance = $ds_w . '-' . $widget_counters[$ds_w];
	    		$active_widgets[ $demo_sidebar ][] = $ds_w_instance;
	    		
	    		$widget_content_arr[$ds_w_instance] = $widget_content;
	    	}
	    }
 		update_option( 'sidebars_widgets', $active_widgets );
 		/*
 		echo('<pre>');
		//print_r($active_widgets);
		print_r($widget_content_arr);
		echo('</pre>');
		*/
	
?>
