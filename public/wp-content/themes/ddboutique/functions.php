<?php
//
//  Theme Functions for mb_eboutiqe
//
/*
Theme setup
 - this is the first thing to run. called from 'after_setup_theme'
 - define constants that are able to be defined at this point 
 - register sidebars
 - add post thumbnail support
 - define image sizes
 - create purchasing tables in db 
 - create uploads directory (file delivery folder)
 - add custom post types to the rss feed
 */

add_action( 'after_setup_theme', 'mbudm_theme_setup' ); 
function mbudm_theme_setup(){
	// show admin bar only for admins
	if (!current_user_can('manage_options')) {
		add_filter('show_admin_bar', '__return_false');
	}
		
/* Disable the Admin Bar. */
//remove_action( 'init', 'wp_admin_bar_init' );
	define('THEMENAME','Digital Documents Boutique'); //friendly punctuated version
	define('THEMESHORTNAME','DDBoutique'); //short name
	define('THEMEPREFIX','mb'); //short prefix
	$td  = end(explode("/", get_template_directory()));
	define('TEMPLATE_DOMAIN', $td); // theme dir name  - unfriendly lowercase stub type version 
	define('MBUDM_PT_PRODUCTS', "mbudm_product"); // products post type
	define('MBUDM_PT_DOWNLOADS', "mbudm_download"); // downloads post type
	
	load_theme_textdomain(TEMPLATE_DOMAIN);
	
	if(function_exists('register_sidebar')){ 
		register_sidebar(array(
			'name'=> __('Home top', TEMPLATE_DOMAIN),
			'id'=>'home-top',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2>',
			'after_title' => '</h2>',
		));
		
		register_sidebar(array(
			'name'=> __('Home right', TEMPLATE_DOMAIN),
			'id'=>'home-right',
			'before_widget' => '<li id="%1$s" class="widget %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		));
		
		register_sidebar(array(
			'name'=> __('Home Left', TEMPLATE_DOMAIN),
			'id'=>'home-left',
			'before_widget' => '<li id="%1$s" class="widget %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		));
		
		switch(mbudm_get_option(THEMEPREFIX."_home_bottom_columns")){
			case "3":
				$shb_cols = 'columnise-three ';
			break;
			case "2":
				$shb_cols = 'columnise-three ';
			break;
			default:
				$shb_cols = '';
			break;
		}
		register_sidebar(array(
			'name'=> __('Home Bottom', TEMPLATE_DOMAIN),
			'id'=>'home-bottom',
			'before_widget' => '<div id="%1$s" class="'.$shb_cols .'widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4>',
			'after_title' => '</h4>',
		));
		
		register_sidebar(array(
			'name'=> __('Products Top', TEMPLATE_DOMAIN),
			'id'=>'products-top',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section><hr />',
			'before_title' => '<h2>',
			'after_title' => '</h2>',
		));
		
		register_sidebar(array(
			'name'=> __('Products Bottom', TEMPLATE_DOMAIN),
			'id'=>'products-bottom',
			'before_widget' => '<li id="%1$s" class="columnise-two widget %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		));
		
		register_sidebar(array(
			'name'=> __('Downloads Bottom', TEMPLATE_DOMAIN),
			'id'=>'downloads-bottom',
			'before_widget' => '<li id="%1$s" class="columnise-two widget %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		));
		
		register_sidebar(array(
			'name'=> __('Product Category Left', TEMPLATE_DOMAIN),
			'id'=>'product-category-left',
			'before_widget' => '<li id="%1$s" class="widget %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		));
		
		register_sidebar(array(
			'name'=> __('Product Category Bottom', TEMPLATE_DOMAIN),
			'id'=>'product-category-bottom',
			'before_widget' => '<li id="%1$s" class="columnise-two widget %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		));
		
		register_sidebar(array(
			'name'=> __('Product Detail Left', TEMPLATE_DOMAIN),
			'id'=>'product-detail-left',
			'before_widget' => '<li id="%1$s" class="widget %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		));
		
		register_sidebar(array(
			'name'=> __('Product Detail Bottom', TEMPLATE_DOMAIN),
			'id'=>'product-detail-bottom',
			'before_widget' => '<li id="%1$s" class="columnise-two widget %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		));
		
		register_sidebar(array(
			'name'=> __('Download Detail Left', TEMPLATE_DOMAIN),
			'id'=>'download-detail-left',
			'before_widget' => '<li id="%1$s" class="widget %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		));
		
		register_sidebar(array(
			'name'=> __('Download Detail Bottom', TEMPLATE_DOMAIN),
			'id'=>'download-detail-bottom',
			'before_widget' => '<li id="%1$s" class="columnise-two widget %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		));
		register_sidebar(array(
			'name'=> __('Generic Page Left', TEMPLATE_DOMAIN),
			'id'=>'generic-page-left',
			'before_widget' => '<li id="%1$s" class="widget %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		));
		
		register_sidebar(array(
			'name'=> __('Transactions Bottom', TEMPLATE_DOMAIN),
			'id'=>'transactions-bottom',
			'before_widget' => '<li id="%1$s" class="columnise-two widget %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		));

	 } 

	add_theme_support( 'post-thumbnails', array( 'post', MBUDM_PT_PRODUCTS, MBUDM_PT_DOWNLOADS ) );
	

	/* 
	
	Compass vars:
	$gridIndent:50px;
	$gridCol:30px;
	$gridGutter: 6px;
	$gridColFull: $gridCol + $gridGutter;
	$numGridCols: 25;
	$gridHalf: 12;
	$gridThird: 7;
	$gridTwoThirds: 16;
	$gridQuarter: 5;
	$gridThreeQuarters: 19;
	
	*/
	
	define('MBUDM_IMAGESIZE_X_LARGE','product-x-large');
	define('MBUDM_IMAGESIZE_BANNER','product-banner');
	define('MBUDM_IMAGESIZE_LARGE','product-large');
	define('MBUDM_IMAGESIZE_MEDIUM','product-medium');
	define('MBUDM_IMAGESIZE_SMALL','product-small');
	define('MBUDM_IMAGESIZE_TINY','product-tiny');
	/* $gridThreeQuarters - 2 x gutter */
	add_image_size( MBUDM_IMAGESIZE_X_LARGE, 672, 672 ); 
	/* $gridFull */
	add_image_size( MBUDM_IMAGESIZE_BANNER, 880, 300,true); 
	/* $gridHalf - 2 x gutter */
	add_image_size( MBUDM_IMAGESIZE_LARGE, 420, 420 );
	/* $gridThird - 2 x gutter */
	add_image_size( MBUDM_IMAGESIZE_MEDIUM, 240, 240 );
	/* $gridQuarter - 2 x gutter */
	add_image_size( MBUDM_IMAGESIZE_SMALL, 165, 165 );
	/* $gridCol */
	add_image_size( MBUDM_IMAGESIZE_TINY, 55, 55, true );
	
	
	// products tables
	
	if (!get_option('mbudm_create_products_tables')) {
        mbudm_create_products_tables();
        //set site option.
        add_option('mbudm_create_products_tables',true);
    }
    
    // uploads dir
    if (!get_option('mbudm_uploads_directory')) {
    	$upload_dir = wp_upload_dir(); 
    	$theme_upload_dir = $upload_dir['basedir'] . '/' . TEMPLATE_DOMAIN;
    	$theme_upload_dir_url = $upload_dir['baseurl'] . '/' . TEMPLATE_DOMAIN;
    	if(wp_mkdir_p($theme_upload_dir)){
		   // mkdir($theme_upload_dir);
			// successfully created
        }else{
        	//just use the uploads
        	$theme_upload_dir = $upload_dir['basedir'];
    	    $theme_upload_dir_url = $upload_dir['baseurl'];
        }
        //set site option.
		add_option('mbudm_uploads_directory',$theme_upload_dir);
		add_option('mbudm_uploads_directory_url',$theme_upload_dir_url);
    }

    
    // ADD CUSTOM POST TYPES TO RSS FEED //
	add_filter( 'request', 'add_cpts_to_rss_feed' );
	
}


/*
Add Custom Post Types to RSS feed
- adds mbudm_downloads and mbudm_products to RSS feed
- called from mbudm_theme_setup();
*/
function add_cpts_to_rss_feed( $args ) {
  if ( isset( $args['feed'] ) && !isset( $args['post_type'] ) )
    $args['post_type'] = array('post', MBUDM_PT_DOWNLOADS, MBUDM_PT_PRODUCTS);
  return $args;
}

/*
Create Products tables
- create the three tables that store all user transaction details and comms
- called from mbudm_theme_setup(); only if the option is not set (so it only happens once)
*/
function mbudm_create_products_tables(){

	global $wpdb;
	$sql = "CREATE TABLE `mbudm_transaction_products` (`ID` BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY, `user_transaction_id` INT NOT NULL, `product_id` INT NOT NULL, `createdDate` TIMESTAMP NOT NULL) ENGINE = MyISAM;";
	$wpdb->query($sql); 

	$sql2 = "CREATE TABLE `mbudm_user_transactions` (`ID` BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY, `invoice_id` VARCHAR(30) NOT NULL DEFAULT '', `gateway_transaction_id` VARCHAR(30) NOT NULL DEFAULT '',  `user_id` INT NOT NULL, `amount` DECIMAL(6,2) NOT NULL, `status` TINYINT NOT NULL DEFAULT '0',`gateway` TINYINT NOT NULL DEFAULT '0', `createdDate` TIMESTAMP NOT NULL) ENGINE = MyISAM;";
	$wpdb->query($sql2); 

	$sql3 = "CREATE TABLE `mbudm_user_transaction_comms` (`ID` BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY, `user_transaction_id` INT NOT NULL, `comm_type` TINYINT NOT NULL DEFAULT '0', `comm_data` TEXT NOT NULL, `createdDate` TIMESTAMP NOT NULL) ENGINE = MyISAM;";
	$wpdb->query($sql3); 

}

/*
mbudm_init()
- all tasks that need to be triggered by the init hook
- create mbudm_product & mbudm_downloads post types and mbudm_product_category taxonomy
- define constants that were not able to be set up in mbudm_theme_setup();
- setup the default theme options array 
- define constants used by payment (requires theme options defaults to be set up)
- update the shopping cart (reads the session variable)
- set up the 4 wp menus in this theme
*/
add_action( 'init', 'mbudm_init' );
function mbudm_init(){

	create_post_types();
	
	create_product_taxonomies();
	
	mbudm_define_constants();

	setup_mbudm_theme_options();
	
	setup_Payment_Constants();
	
	mbudm_update_cart();
	
	setupMenus();
}

/* Theme activated 
- there is no hook for when a user activates the theme so this function relies on the 'admin_notices' hook and the $_GET['activated'] parameter
- adds a custom success message and links to install demo content/options
*/
function theme_activated() {
	/* for testing - clear old session var */
	mbudm_clearCart();
 ?>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$('#message2').css('display', 'none');
	});
</script>
<div class="updated">
	<h3><?php printf(__('You\'re ready to roll! %s is activated.',TEMPLATE_DOMAIN),THEMENAME); ?></h3>
	<p><?php _e('For brand new users of this theme we suggest you install our demo content package. This sets up all the content as per our demo site at Themeforest.net including; sample posts, products, downloads, product categories, menus and widgets.',TEMPLATE_DOMAIN); ?></p>
	<p><?php _e('Or if you prefer doing things yourself, you may want to begin by exploring our theme options.',TEMPLATE_DOMAIN); ?></p> 
	<p><a href="themes.php?page=functions.php&mb_action=install-demo" class="button-primary" title="<?php _e('Install demo content for this theme',TEMPLATE_DOMAIN); ?>">Install demo content</a> 
	<a href="themes.php?page=functions.php" class="button" title="<?php _e('Browse theme options for this theme',TEMPLATE_DOMAIN); ?>"><?php printf(__('%s Theme Options',TEMPLATE_DOMAIN),THEMENAME); ?></a></p>
 </div>';
<?php
}
global $pagenow;
if ( is_admin() && isset($_GET['activated']) && $pagenow == "themes.php" ) {
	 /* Show theme activation message, and setup them option defaults. */
	add_action( 'admin_notices', 'theme_activated' );
}


/* define constants 
- called from mbudm_init()
- these are constants that either could not be set up in theme_setup() - because the info, objects weren't ready or the constants are not needed before init.
*/
function mbudm_define_constants(){

	global $wpdb;
	$site_url = get_option('siteurl');
	$is_production  = strpos($site_url, 'localhost') === false ? true : false ;
	define('IS_PRODUCTION',$is_production  ); //friendly punctuated version

	define('MBUDM_MK_RELATED_PRODUCT', "_mbudm_related_product"); // downloads meta key
	define('MBUDM_MK_FILE', "_mbudm_post_file"); // downloads/products meta key
	define('MBUDM_MK_PREVIEW_FILE', "_mbudm_post_preview_file"); // downloads/products meta key
	
	define('MBUDM_UMK_MAILING_LIST', "_mbudm_mailing_list"); // user meta key for mailing list
	define('MBUDM_MAILING_LIST_UNSUBSCRIBED', 0); // user meta value for unsubscribed
	define('MBUDM_MAILING_LIST_PENDING', 1); // user meta value for pending subscription
	define('MBUDM_MAILING_LIST_SUBSCRIBED', 2); // user meta value for subscribed subscription
	
	$cpid = $wpdb->get_var( $wpdb->prepare( "SELECT post_id
	FROM $wpdb->postmeta
	WHERE meta_key = '_wp_page_template'
	AND meta_value = 'mb_checkout.php'" ) );
	define('CHECKOUT_PAGE_ID',$cpid);
	define('CHECKOUT_PAGE',get_permalink( $cpid ) );
	
	$tpid = $wpdb->get_var( $wpdb->prepare( "SELECT post_id
	FROM $wpdb->postmeta
	WHERE meta_key = '_wp_page_template'
	AND meta_value = 'mb_transactions.php'" ) );
	define('TRANSACTION_PAGE_ID',$tpid);
	define('TRANSACTION_PAGE',get_permalink( $tpid ) );
	
	$ppid = $wpdb->get_var( $wpdb->prepare( "SELECT post_id
	FROM $wpdb->postmeta
	WHERE meta_key = '_wp_page_template'
	AND meta_value = 'mb_products.php'" ) );
	define('PRODUCT_PAGE_ID',$ppid);
	define('PRODUCT_PAGE',get_permalink( $ppid ) );
	
	$dpid = $wpdb->get_var( $wpdb->prepare( "SELECT post_id
	FROM $wpdb->postmeta
	WHERE meta_key = '_wp_page_template'
	AND meta_value = 'mb_downloads.php'" ) );
	define('DOWNLOAD_PAGE_ID',$dpid);
	define('DOWNLOAD_PAGE',get_permalink( $dpid ) );
	
	$hpid = $wpdb->get_var( $wpdb->prepare( "SELECT post_id
	FROM $wpdb->postmeta
	WHERE meta_key = '_wp_page_template'
	AND meta_value = 'mb_home.php'" ) );
	define('HOME_PAGE_ID',$hpid);
	
	//the string is the name of the session var that holds the user id of the last transaction and the summary of that transaction
	define('SESSION_LAST_TRANSACTION_USER_ID','mbudm_tu');
	define('SESSION_LAST_TRANSACTION_SUMMARY','mbudm_ts');
	
	/* In the custom tables these are ints with defined vars in code that represent what they mean.*/
	//-	status
	define('MBUDM_TRANS_INITIATED',1);
	define('MBUDM_TRANS_CANCELLED',2);
	define('MBUDM_TRANS_PENDING',10);
	define('MBUDM_TRANS_COMPLETED',20);//high number in case others are needed
	
	//-	comm_type
	define('MBUDM_TRANS_COMM_INITIATED',1);//
	define('MBUDM_TRANS_COMM_INFO',2);// response to a request for more info
	define('MBUDM_TRANS_COMM_IPN',3);//payment notification sent by server
	
	//-	gateway
	define('MBUDM_TRANS_GATEWAY_UNKNOWN',1);//
	define('MBUDM_TRANS_GATEWAY_PAYPAL',2);// 
	
	//paypal specific 
	define('MBUDM_GATEWAY_IPN_PAYPAL', site_url('/mb/pp'));
	define('MBUDM_TRANS_CANCELLED_PP',_x('Cancelled','PayPal transaction status label',TEMPLATE_DOMAIN) );
	define('MBUDM_TRANS_PENDING_PP',_x('Pending','PayPal transaction status label',TEMPLATE_DOMAIN));
	define('MBUDM_TRANS_COMPLETED_PP',_x('Completed','PayPal transaction status label',TEMPLATE_DOMAIN));
}

/*
Set custom image sizes for this theme to appear in the media interface
*/
function mbudm_image_sizes_choose($sizes) {
	$myimgsizes = array(
			MBUDM_IMAGESIZE_X_LARGE => __( "MBU extra large",TEMPLATE_DOMAIN ),
			MBUDM_IMAGESIZE_BANNER => __( "MBU banner" ,TEMPLATE_DOMAIN),
			MBUDM_IMAGESIZE_LARGE => __( "MBU large",TEMPLATE_DOMAIN ),
			MBUDM_IMAGESIZE_MEDIUM => __( "MBU medium",TEMPLATE_DOMAIN ),
			MBUDM_IMAGESIZE_SMALL => __( "MBU small" ,TEMPLATE_DOMAIN),
			MBUDM_IMAGESIZE_TINY => __( "MBU tiny" ,TEMPLATE_DOMAIN)
			);
	$newimgsizes = array_merge($sizes, $myimgsizes);
	return $newimgsizes;
}
add_filter('image_size_names_choose', 'mbudm_image_sizes_choose');


/* Custom widgets
- all widgets are in /widgets
*/
add_action( 'widgets_init', 'mbudm_widgets_init' );
function mbudm_widgets_init(){

	include ('widgets/mb_Buy_Promo_Widget.php');
	include ('widgets/mb_Download_Promo_Widget.php');
	include ('widgets/mb_Text_Widget.php');
	include ('widgets/mb_Recent_Posts_Widget.php');
	include ('widgets/mb_Mailing_List_Widget.php');
	include ('widgets/mb_Product_Nav_Widget.php');
	include ('widgets/mb_Download_Nav_Widget.php');
	include ('widgets/mb_Recent_Comments_Widget.php');
	include ('widgets/mb_Featured_Products_Widget.php');
	include ('widgets/mb_Products_List_Widget.php');
	register_widget( 'mb_Buy_Promo_Widget' );
	register_widget( 'mb_Download_Promo_Widget' );
	register_widget( 'mb_Text_Widget' );
	register_widget( 'mb_Recent_Posts_Widget' );
	register_widget( 'mb_Mailing_List_Widget' );
	register_widget( 'mb_Product_Nav_Widget' );
	register_widget( 'mb_Download_Nav_Widget' );
	register_widget( 'mb_Recent_Comments_Widget' );
	register_widget( 'mb_Featured_Products_Widget' );
	register_widget( 'mb_Products_List_Widget' );
}
/*
	Columnise widgets
	apply column class names to widgets that are in sidebars that request it.
	
	The widget will contain one of these classes if it needs a column class:
	- columnise-two (add .col1 or .col2)
	- columnise-three (add .col3 or .col4 or .col5);
	
	*/
add_filter('dynamic_sidebar_params','columnise_widgets');
function columnise_widgets($params) {
	/*
	Find the point in the before_widget string where we'll append class names, just before the closing " of the class attribute
	*/
	$classStartNeedle = 'class="';
	$classStrStart = strpos($params[0]['before_widget'],$classStartNeedle);
	if($classStrStart !== false ){
		$classStrEnd = strpos($params[0]['before_widget'],'"', ($classStrStart + strlen($classStartNeedle) )  );
	
		// check for the columnise flags
		$columnise2 = strstr($params[0]['before_widget'],'columnise-two');
		$columnise3 = strstr($params[0]['before_widget'],'columnise-three');
	
		if($columnise2 || $columnise3){
			global $my_widget_num;
			$my_widget_num++;
			
			$oddeven = ($my_widget_num % 2) ? "itemOdd" : "itemEven" ; // itemOdd or itemEven
			if($columnise2){
				$cnum = $oddeven == "itemOdd" ? "1" : "2" ; // returns 1 or 2
			}else{
				$cnum = 2 + ($my_widget_num % 3); //returns 3, 4 or 2
				$cnum = $cnum == 2 ? 5 : $cnum ; // returns 3, 4 or 5
				
			}
			$class = ' col'.$cnum .' widget_index_'.$my_widget_num . ' ' . $oddeven; // widget_index class and oddEven are also handy for styling specific widgets with old browsers just using css1
			$params[0]['before_widget'] = substr_replace($params[0]['before_widget'], $class, 			$classStrEnd,0);
		}
	}
	return $params;
}
/*
This resets the $my_widget_num variable every time a new sidebar is requested,
if this isn't done then the widget numbering will continue from any previous widgets on the same page
*/
add_filter('get_sidebar','columnise_widgets_counter_reset', 99);
function columnise_widgets_counter_reset($text) {
   global $my_widget_num;
   $my_widget_num = 0;
   return $text;
}

/*
Widget Blank Message
- called from sidebar-{name}.php
- shown in sidebars that are empty
- only shown to admins
- can be switched off in theme options
*/
function mbudm_widget_blank_msg($sidebar_name){
	if (current_user_can( 'switch_themes' ) && !mbudm_get_option(THEMEPREFIX.'_hide_widget_blank_message') ) {
	?>
	<div class="widget-blank-msg">
		<h3><?php _e('Add Widgets', TEMPLATE_DOMAIN); ?></h3>
		<p><?php printf(_x('This is the "%1$s" widget area. Add %2$swidgets%3$s here if you like.','Variable 1 is the sidebar name and 2 and 3 tag a link to the admin widgets page', TEMPLATE_DOMAIN),$sidebar_name,'<a href="/wp-admin/widgets.php">','</a>'); ?></p><small><?php _e('Only administrators are shown this message, and it can be switched off in Theme Options. Regular users will not see anything if this sidebar contains no widgets.', TEMPLATE_DOMAIN); ?></small>
		</div>
	<?php
	}
}

/*
Parse custom $_GET vars.
- handle Instant Payment Notification messages from PayPal (these are stored in the database
*/
function mbudm_parse_request($wp){
	// only process requests with "mb_ipn=pp"
    if (array_key_exists('mb_ipn', $wp->query_vars) 
            && $wp->query_vars['mb_ipn'] == 'pp') {
        mbudm_process_paypal_ipn($wp);
    }
}
add_action( 'parse_request', 'mbudm_parse_request' );
/* Add rewrite rules for $_GET vars */
function mbudm_rewrite_rules( $wp_rewrite ) {
  $new_rules = array('mb/pp' => 'index.php?mb_ipn=pp');
  $wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
}
add_action('generate_rewrite_rules', 'mbudm_rewrite_rules');
/* Register custom $_GET vars */
function mbudm_query_vars($vars) {
	// add all get vars to the valid list of variables
	$vars[] = 'mb_ipn';
	$vars[] = 'mb_trans';
	$vars[] = 'mb_ic'; // flags that the paypal return page is incontext
	//PayPal vars
	$vars[] = 'PayerID';
	$vars[] = 'token';
    return $vars;
}
add_filter('query_vars', 'mbudm_query_vars');

/* PRODUCTS */
function create_post_types() {
	register_post_type( MBUDM_PT_PRODUCTS,
		array(
			'labels' => array(
				'name' => __( 'Products' , TEMPLATE_DOMAIN ),
				'singular_name' => __( 'Product', TEMPLATE_DOMAIN ),
				'add_new_item' => __('Add New Product', TEMPLATE_DOMAIN ),
				'edit_item' => __('Edit Product', TEMPLATE_DOMAIN ),
				'new_item' => __('New Product', TEMPLATE_DOMAIN ),
				'view_item' => __('View Product', TEMPLATE_DOMAIN ),
				'search_items' => __('Search Products', TEMPLATE_DOMAIN ),
				'not_found' => __('No Products found', TEMPLATE_DOMAIN ),
				'not_found_in_trash' => __('No Products found in Trash', TEMPLATE_DOMAIN )
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'products'),
			'supports' => array('title','editor','excerpt','thumbnail','custom-fields','comments'),
			'taxonomies' => array('mbudm_product_category'),
			'register_meta_box_cb' => 'add_products_metaboxes'
		)
	);
	
	register_post_type( MBUDM_PT_DOWNLOADS,
		array(
			'labels' => array(
				'name' => __( 'Downloads', TEMPLATE_DOMAIN ),
				'singular_name' => __( 'Download', TEMPLATE_DOMAIN ),
				'add_new_item' => __( 'Add New Download', TEMPLATE_DOMAIN ),
				'edit_item' => __( 'Edit Download', TEMPLATE_DOMAIN ),
				'new_item' => __( 'New Download', TEMPLATE_DOMAIN ),
				'view_item' => __( 'View Download', TEMPLATE_DOMAIN ),
				'search_items' => __( 'Search Downloads', TEMPLATE_DOMAIN ),
				'not_found' => __( 'No Downloads found', TEMPLATE_DOMAIN ),
				'not_found_in_trash' => __( 'No Downloads found in Trash', TEMPLATE_DOMAIN )
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'downloads'),
			'supports' => array('title','editor','excerpt','thumbnail','custom-fields','comments'),
			'taxonomies' => array('mbudm_product_category'),
			'register_meta_box_cb' => 'add_downloads_metaboxes'
		)
	);
	
}

/*
Custom Post Types - PRODUCTS and DOWNLOADS
*/
/* 
add custom meta boxes to the admin interface for CPTs 
*/
function add_products_metaboxes(){
	add_meta_box('mbudm_sticky_meta', __('Featured',TEMPLATE_DOMAIN), 'mbudm_sticky_meta', MBUDM_PT_PRODUCTS,'side');
	add_meta_box('mbudm_product_price', __('Price',TEMPLATE_DOMAIN), 'mbudm_product_price', MBUDM_PT_PRODUCTS, 'side', 'default');
	add_meta_box('mbudm_product_buy_button', __('Buy Button Wrapper',TEMPLATE_DOMAIN), 'mbudm_product_buy_button', MBUDM_PT_PRODUCTS, 'side', 'default');
	add_meta_box('mbudm_item_file', __('Product file',TEMPLATE_DOMAIN), 'mbudm_item_file', MBUDM_PT_PRODUCTS, 'side', 'default');
	add_meta_box('mbudm_item_preview_file', __('Product Preview file',TEMPLATE_DOMAIN), 'mbudm_item_preview_file', MBUDM_PT_PRODUCTS, 'side', 'default');
}
function add_downloads_metaboxes(){
	add_meta_box('mbudm_sticky_meta', __('Featured',TEMPLATE_DOMAIN), 'mbudm_sticky_meta', MBUDM_PT_DOWNLOADS, 'side', 'high');
	add_meta_box('mbudm_item_file', __('Download file',TEMPLATE_DOMAIN), 'mbudm_item_file', MBUDM_PT_DOWNLOADS, 'side', 'default');
	add_meta_box('mbudm_item_preview_file', __('Download Preview file',TEMPLATE_DOMAIN), 'mbudm_item_preview_file', MBUDM_PT_DOWNLOADS, 'side', 'default');
	add_meta_box( 'mbudm_downloads_meta_box',__( 'Related Product', TEMPLATE_DOMAIN),'mbudm_downloads_related_product_meta_box',MBUDM_PT_DOWNLOADS,'normal','high' );
}
/* 
Featured item meta box for Products and Downloads
*/
function mbudm_sticky_meta() { 
	global $post; ?>
	<input id="mbudm-sticky" name="sticky" type="checkbox" value="sticky" <?php checked(is_sticky($post->ID)); ?> /> <label for="mbudm-sticky" class="selectit"><?php _e('Make this a featured item', TEMPLATE_DOMAIN) ?></label>
	<?php
}
/* 
Product Price meta box for Products 
*/
function mbudm_product_price(){
    global $post;
 
    // Noncename needed to verify where the data originated
    echo '<input type="hidden" name="productmeta_noncename" id="productmeta_noncename" value="' .
    wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
 
    // Get the price data if its already been entered
    $price = get_post_meta($post->ID, '_mbudm_price', true);
 	_e('The product price must be entered in plain decimal format - so enter 2.00 if your product price is $2.00 or €2,00. The formatting of prices is handled in Theme Options -> PayPal and Currency',TEMPLATE_DOMAIN);
    // Echo out the field
    echo '<input type="text" name="_mbudm_price" value="' . $price  . '" class="widefat" />';
 
}
/* Product buy button */
function mbudm_product_buy_button(){
    global $post;
 
    // Noncename needed to verify where the data originated
    echo '<input type="hidden" name="productmeta_noncename" id="productmeta_noncename" value="' .
    wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
 
    // Get the buy_before data if its already been entered
    $name_id = '_'.THEMEPREFIX.'_buy_before';
    $buy_before = get_post_meta($post->ID,$name_id, true);
   
 	?>
 	<label for="<?php echo $name_id ?>" ><?php _e('Insert some content or code before the Buy Button',TEMPLATE_DOMAIN); ?></label>
    <?php
    echo '<textarea id="'. $name_id .'" name="'. $name_id .'"  class="widefat" >' . $buy_before  . '</textarea>';
    
    // Get the buy_after data if its already been entered
    $name_id = '_'.THEMEPREFIX.'_buy_after';
    $buy_after = get_post_meta($post->ID,$name_id, true);
    ?>
 	<label for="<?php echo $name_id ?>" ><?php _e('Insert some content or code after the Buy Button',TEMPLATE_DOMAIN); ?></label>
    <?php
    // Echo out the field
    echo '<textarea id="'. $name_id .'" name="'. $name_id .'" class="widefat" rows="5">' . $buy_after  . '</textarea>';
 
}

/* 
File meta box for Products and Downloads
- if the storage folder is set the this prints a <select> element containing <options> for all files in that folder
- otherwise a straight text field is shown.
*/
function mbudm_item_file(){
	global $post;
    // Noncename needed to verify where the data originated
    echo '<input type="hidden" name="productmeta_noncename" id="productmeta_noncename" value="' .
    wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
 
    // Get the data if its already been entered
    $stored = get_post_meta( $post->ID,MBUDM_MK_FILE,true );
    
    $storage_folder = mbudm_get_option(THEMEPREFIX."_file_storage");
 
 	//get file list
 	$folder_list = $storage_folder ? scandir($storage_folder) : array() ;
 	
 	if(count($folder_list) <= 2){
 		switch($post->post_type){
			case MBUDM_PT_PRODUCTS:
				$output = '<p>'.sprintf(__('The product file is the digital file that is made accessible to paying customers. Add in the full url of the file here. You can make this easier by specifying a File Storage Folder in %s Options and adding files to that folder.',TEMPLATE_DOMAIN),THEMENAME ) . '</p>';
			break;
			case MBUDM_PT_DOWNLOADS:
				$output = '<p>'.sprintf(__('The download file is the digital file that is made accessible to users once they have navigated through the optional mailing list signup form. Add in the full url of the file here. You can make this easier by specifying a File Storage Folder in %s Options and adding files to that folder.',TEMPLATE_DOMAIN),THEMENAME ) . '</p>';
			break;
		}
		$output.= '<input type="text" name="'. MBUDM_MK_FILE. '" value="' . $stored  . '" class="widefat" />';
 	}else{
 		//select list
 		switch($post->post_type){
			case MBUDM_PT_PRODUCTS:
				$output = '<p>'.sprintf(__('The product file is the digital file that is made accessible to paying customers. Select a file from the File Storage Folder you specified in %s Options',TEMPLATE_DOMAIN),THEMENAME ) . '</p>';
			break;
			case MBUDM_PT_DOWNLOADS:
				$output = '<p>'.sprintf(__('The download file is the digital file that is made accessible to users once they have submitted a request for a download.  Select a file from the File Storage Folder you specified in %s Options',TEMPLATE_DOMAIN),THEMENAME ) . '</p>';
			break;
		}
 		//check against stored filename - use basename()
 		$stored_base = basename( $stored );
 		$output.= '<select name="'. MBUDM_MK_FILE. '"><option value="">'.__('Select a file',TEMPLATE_DOMAIN).'</option>';
 		foreach($folder_list as $filename){
 			$ext = pathinfo($filename, PATHINFO_EXTENSION);
 			if($ext){
 				$selected = $stored_base == $filename ? 'selected="selected"' : '' ;
 				$output.= '<option '.$selected.' value="'. $filename .'">'. $filename .'</option>';
 			}
 		}
 		$output.= '</select>';
	}
 	echo $output;
}
/* 
Preview File meta box for Products and Downloads
- if there are suitable files in the media library this prints a <select> element containing <options> for all files in that folder
- otherwise a link to the media popup is shown.
*/
function mbudm_item_preview_file(){
    global $post;
 
    // Noncename needed to verify where the data originated
    echo '<input type="hidden" name="productmeta_noncename" id="productmeta_noncename" value="' .
    wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
 
    $query_file_args = array(
     	'post_type' => 'attachment',
		'post_mime_type' =>'application',
		'post_status' => 'inherit',
		'posts_per_page' => -1,
	   );
    $query_files = new WP_Query( $query_file_args );

	switch($post->post_type){
		case MBUDM_PT_PRODUCTS:
			$output = '<p>'.__('The product preview file is displayed to users in a lightbox (modal) window when they click on the product image. Do not select a full version of your product for the preview file - as this is publicly accessible.</p><p>If no preview file is set then the featured image is shown instead',TEMPLATE_DOMAIN).'</p>';
		break;
    	case MBUDM_PT_DOWNLOADS:
			$output = '<p>'.__('The download preview file is displayed to users in a lightbox (modal) window when they click on the download image. Do not select a full version of your download for the preview file - as this is publicly accessible and can be linked to by other websites.',TEMPLATE_DOMAIN).'</p><p>'.__('If no preview file is set then the featured image is shown instead',TEMPLATE_DOMAIN).'</p>';
		break;
 	}
 	if($query_files->post_count > 0){
		  
		$output .= '
		<select id="'. MBUDM_MK_PREVIEW_FILE .'" name="'. MBUDM_MK_PREVIEW_FILE .'" ><option value="">'.__('Select a file',TEMPLATE_DOMAIN).'</option>';
		
		
		$stored_val = get_post_meta( $post->ID,MBUDM_MK_PREVIEW_FILE,true );
		
		foreach($query_files->posts as $file){
			$is_selected_item = $stored_val == $file->ID ? 'selected="selected"' : '' ;
			$output .= '<option value="'. $file->ID .'" '.$is_selected_item.' >' . $file->post_title. '</option>'; 
		}
		$output .= '</select>';
	}else{
		$url_title = __('Add Media',TEMPLATE_DOMAIN);
		$url_open = '<a href="' . admin_url( 'media-upload.php?TB_iframe=1&width=640&height=850') . '" class="thickbox add_media" id="item-file-add_media" title="'. $url_title .'" onclick="return false;">';
		$url_close = '</a>';
		$msg = sprintf(_x('There are no files in the Media Library. Preview files must be in pdf format. Add your PDF files to the %1$sMedia Library%2$s','Var 1 and 2 create a link to the media uploader',TEMPLATE_DOMAIN),$url_open,$url_close);
		$output = '<p>'. $msg . '</p>';
	}
	echo $output; 
   
}
/* 
Download  Related Product meta box
*/
function mbudm_downloads_related_product_meta_box() {
	global $post, $wpdb, $closed_postboxes;

	$p_cats = wp_get_object_terms($post->ID, 'mbudm_product_category');

	$product_category_ids = array( );
	foreach ( $p_cats as $p_cat ) {
		$product_category_ids[] = $p_cat->term_id;
	}
	$p_cats_commasep = implode(",", $product_category_ids);
	
	//echo("product cats to use:" .$p_cats_commasep.'<br>');
	
	// Noncename needed to verify where the data originated
    echo '<input type="hidden" name="productmeta_noncename" id="productmeta_noncename" value="' .
    wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

	$plist_args = array('tax_query' => array(
			array(
				'taxonomy' => 'mbudm_product_category',
				'field' => 'id',
				'terms' => $product_category_ids
			)
		),
		'orderby' => 'title',
		'order' => 'ASC',
		'post__not_in' => array($post->ID),
		'post_type' => MBUDM_PT_PRODUCTS
	);
	
	$this_prod_id = $post->ID;
	
	// The Query
	$the_plist_query = new WP_Query( $plist_args );
	
	
	if($the_plist_query->post_count > 0){
		$plist_metaval = get_post_meta( $post->ID,MBUDM_MK_RELATED_PRODUCT,true );

		$output = '
		<select id="'. MBUDM_MK_RELATED_PRODUCT .'" name="'. MBUDM_MK_RELATED_PRODUCT .'" ><option value="" >Select a product</option>';
		
		
		$stored_val = get_post_meta( $post->ID,MBUDM_MK_RELATED_PRODUCT,true );
		
		// get posts #
		// if stored_val is null then select first
		
		// The Loop
		while ( $the_plist_query->have_posts() ) : $the_plist_query->next_post();
			
			if($this_prod_id != $the_plist_query->post->ID){
				$is_selected_item = $stored_val == $the_plist_query->post->ID ? 'selected="selected"' : '' ;
				$output .= '<option value="'. $the_plist_query->post->ID .'" '.$is_selected_item.' >' . get_the_title($the_plist_query->post->ID). '</option>'; 
				
			}
			
		endwhile;
		
		// Reset Post Data
		wp_reset_postdata();
		
		$output .= '</select>';
		
		$stored_val_title = get_post_meta( $post->ID,'_mb_related_product_title',true );
		$output .='<p><label for="_mb_related_product_title">Upgrade title</label><input id="_mb_related_product_title" class="widefat" type="text" name="_mb_related_product_title" value="'.$stored_val_title.'" /></p>';
		$stored_val_text = get_post_meta( $post->ID,'_mb_related_product_text',true );
		$output .='<p><label for="_mb_related_product_text">Upgrade text</label><textarea id="_mb_related_product_text" type="text" name="_mb_related_product_text" class="widefat" rows="4">'.$stored_val_text.'</textarea></p>';
	}else{
		$output = '<p>There are no products in the same category as this download</p>';
	}
	
	echo $output; 
	
	//echo "stored val:".$stored_val;
}					

/* 
Save the Metabox Data for Products and Downloads
- handles all custom meta boxes for mbudm_product and mbudm_download custom post type
 */
function mbudm_save_item_meta($post_id, $post) {
 
    // verify this came from the our screen and with proper authorization,
    // because save_post can be triggered at other times
    if(!isset($_POST['productmeta_noncename'])){
    	return $post->ID;
    }
    if (!wp_verify_nonce( $_POST['productmeta_noncename'], plugin_basename(__FILE__) )) {
    	return $post->ID;
    }
 
    // Is the user allowed to edit the post or page?
    if ( !current_user_can( 'edit_post', $post->ID ))
        return $post->ID;
 
    // OK, we're authenticated: we need to find and save the data
    // We'll put it into an array to make it easier to loop though.
 
   //both products and download have these
    $products_meta[MBUDM_MK_FILE] = $_POST[MBUDM_MK_FILE];
    $products_meta[MBUDM_MK_PREVIEW_FILE] = $_POST[MBUDM_MK_PREVIEW_FILE];
 
    //add post type specific meta data
    switch($_POST['post_type']) 
    {
        case MBUDM_PT_DOWNLOADS:
            $products_meta[MBUDM_MK_RELATED_PRODUCT] = $_POST[MBUDM_MK_RELATED_PRODUCT];
            $products_meta['_mb_related_product_text'] = $_POST['_mb_related_product_text'];
            $products_meta['_mb_related_product_title'] = $_POST['_mb_related_product_title'];
        break;
        case MBUDM_PT_PRODUCTS:
         	$products_meta['_mbudm_price'] = $_POST['_mbudm_price'];
         	$products_meta['_'.THEMEPREFIX.'_buy_before'] = $_POST['_'.THEMEPREFIX.'_buy_before'];
         	$products_meta['_'.THEMEPREFIX.'_buy_after'] = $_POST['_'.THEMEPREFIX.'_buy_after'];
        break;
    }
    
    // Add values of $products_meta as custom fields
    foreach ($products_meta as $key => $value) { // Cycle through the $products_meta array!
        if( $post->post_type == 'revision' ) return; // Don't store custom data twice
        $value = implode(',', (array)$value); // If $value is an array, make it a CSV (unlikely)
        if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
            update_post_meta($post->ID, $key, $value);
        } else { // If the custom field doesn't have a value
            add_post_meta($post->ID, $key, $value);
        }
        if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
    }
}
add_action('save_post', 'mbudm_save_item_meta', 1, 2); // save custom fields for both custom post types

/*
 Add the product _category and the featured image to the products admin screen table
*/
add_filter('manage_edit-mbudm_product_columns', 'add_new_mbudm_product_columns');
function add_new_mbudm_product_columns($product_columns) {
		$new_columns['cb'] = '<input type="checkbox" />';
 		$new_columns['mbudm_product_category'] = _x('Categories', 'column name', TEMPLATE_DOMAIN);
		$new_columns['title'] = _x('Product Name', 'column name', TEMPLATE_DOMAIN);
		$new_columns['images'] = __('Image', TEMPLATE_DOMAIN);
		$new_columns['tags'] = __('Tags', TEMPLATE_DOMAIN);
		$new_columns['date'] = _x('Date', 'column name', TEMPLATE_DOMAIN);
 
		return $new_columns;
}
add_action('manage_mbudm_product_posts_custom_column', 'manage_mbudm_product_columns', 10, 2);
function manage_mbudm_product_columns($column_name, $id) {
	global $wpdb;
	switch ($column_name) {
	case 'images':
		   $attached_images = (array)get_posts(array(
	          'post_type' => 'attachment',
	          'numberposts' => 1,
	          'post_status' => null,
	          'post_parent' => $id,
	          'orderby' => 'menu_order',
	          'order' => 'ASC'
		    ));
		 	 if(isset($id) && has_post_thumbnail($id)){
				echo get_the_post_thumbnail($id,'product-small');
		     }elseif(!empty($attached_images)){
			    $attached_image = $attached_images[0];

				$src =wp_get_attachment_url($attached_image->ID);
		     	echo $src; 
		     }else{
				?>
					No image
				<?php

		      }
		break;
	case 'mbudm_product_category':
			$taxonomy = $column_name;
			$post_type = get_post_type($id);
			$terms = get_the_terms($id, $taxonomy);
		 
			if ( !empty($terms) ) {
				foreach ( $terms as $term )
					$post_terms[] = "<a href='edit.php?post_type={$post_type}&{$taxonomy}={$term->slug}'> " . esc_html(sanitize_term_field('name', $term->name, $term->term_id, $taxonomy, 'edit')) . "</a>";
				echo join( ', ', $post_terms );
			}
			else echo '<i>No terms.</i>';
		break;
	default:
		break;
	} // end switch
}

/* 
Exclude Products and Downloads from default query on posts page
*/
add_action( 'pre_get_posts', 'mbudm_modify_query_exclude_products' );
function mbudm_modify_query_exclude_products( $query ) {
    if ( $query->is_posts_page){
        $query->set( 'post_type', array('post') );
    }
    return $query;
}			



/* 
Custom taxonomy - mbudm_products_categories 
*/
function create_product_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name' => _x( 'Product Categories', 'taxonomy general name' , TEMPLATE_DOMAIN),
		'singular_name' => _x( 'Product Category', 'taxonomy singular name', TEMPLATE_DOMAIN ),
		'search_items' =>  __( 'Search Product Categories', TEMPLATE_DOMAIN ),
		'all_items' => __( 'All Product Categories' , TEMPLATE_DOMAIN),
		'parent_item' => __( 'Parent Product Category' , TEMPLATE_DOMAIN),
		'parent_item_colon' => __( 'Parent Product Category:' , TEMPLATE_DOMAIN),
		'edit_item' => __( 'Edit Product Category' , TEMPLATE_DOMAIN),
		'update_item' => __( 'Update Product Category' , TEMPLATE_DOMAIN),
		'add_new_item' => __( 'Add New Product Category' , TEMPLATE_DOMAIN),
		'new_item_name' => __( 'New Product Category Name' , TEMPLATE_DOMAIN)
	); 	
	register_taxonomy( 'mbudm_product_category', array( MBUDM_PT_PRODUCTS,MBUDM_PT_DOWNLOADS ), array(
		'hierarchical' => true,
		'labels' => $labels, /* NOTICE: Here is where the $labels variable is used */
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'product-category' )
	));
}

/* 
metadata for mbudm_product_category
- color
- archive page headings
*/
function mbudm_product_category_add_new_meta_field() {
	// this will add the custom meta field to the add new term page
	?>
	<div class="form-field">
		<label for="term_meta[category_color]"><?php _e( 'Category color', TEMPLATE_DOMAIN ); ?></label>
		<input type="text" name="term_meta[category_color]" id="category_color" class="color-picker"  value="">
		<p class="description"><?php _e( 'In hexadecimal format (eg #FF0000). The  color is used to flag some items as belonging to this category',TEMPLATE_DOMAIN ); ?></p>
	</div>
	<div class="form-field">
		<label for="term_meta[cat_archive_page_head]"><?php _e(  'Category archive page heading', TEMPLATE_DOMAIN ); ?></label>
		<input type="text" name="term_meta[cat_archive_page_head]" id="term_meta[cat_archive_page_head]" value="%s Products">
		<p class="description"><?php _e( 'This is the heading for the Product Category archive page. Use %s to insert the product category name.',TEMPLATE_DOMAIN ); ?></p>
	</div>
	<div class="form-field">
		<label for="term_meta[cat_archive_downloads_head]"><?php _e(  'Category archive downloads heading', TEMPLATE_DOMAIN ); ?></label>
		<input type="text" name="term_meta[cat_archive_downloads_head]" id="term_meta[cat_archive_downloads_head]" value="Free %s Downloads">
		<p class="description"><?php _e( 'This is the heading for the downloads section on the Product Category archive page. Use %s to insert the product category name.',TEMPLATE_DOMAIN ); ?></p>
	</div>
<?php
}
add_action( 'mbudm_product_category_add_form_fields', 'mbudm_product_category_add_new_meta_field', 10, 2 );
function mbudm_product_category_edit_meta_field($term) {
	// put the term ID into a variable
	$t_id = $term->term_id;
 
	// retrieve the existing value(s) for this meta field. This returns an array
	$term_meta = get_option( "taxonomy_$t_id" ); ?>
	<tr class="form-field">
	<th scope="row" valign="top"><label for="term_meta[category_color]"><?php _e( 'Category color', TEMPLATE_DOMAIN ); ?></label></th>
		<td>
			<input type="text" name="term_meta[category_color]" id="category_color" class="color-picker" value="<?php echo esc_attr( $term_meta['category_color'] ) ? esc_attr( $term_meta['category_color'] ) : ''; ?>">
			<p class="description"><?php _e( 'In hexadecimal format (eg #FF0000). The  color is used to flag some items as belonging to this category',TEMPLATE_DOMAIN ); ?></p>
		</td>
	</tr>
	<tr class="form-field">
	<th scope="row" valign="top"><label for="term_meta[cat_archive_page_head]"><?php _e(  'Category archive page heading', TEMPLATE_DOMAIN ); ?></label></th>
		<td>
			<input type="text" name="term_meta[cat_archive_page_head]" id="term_meta[cat_archive_page_head]" value="<?php echo esc_attr( $term_meta['cat_archive_page_head'] ) ? esc_attr( $term_meta['cat_archive_page_head'] ) : ''; ?>">
		<p class="description"><?php _e( 'This is the heading for the Product Category archive page. Use %s to insert the product category name.',TEMPLATE_DOMAIN ); ?></p>
		</td>
	</tr>
	<tr class="form-field">
	<th scope="row" valign="top"><label for="term_meta[cat_archive_downloads_head]"><?php _e(  'Category archive downloads heading', TEMPLATE_DOMAIN ); ?></label></th>
		<td>
			<input type="text" name="term_meta[cat_archive_downloads_head]" id="term_meta[cat_archive_downloads_head]" value="<?php echo esc_attr( $term_meta['cat_archive_downloads_head'] ) ? esc_attr( $term_meta['cat_archive_downloads_head'] ) : ''; ?>">
		<p class="description"><?php _e( 'This is the heading for the downloads section on the Product Category archive page. Use %s to insert the product category name.',TEMPLATE_DOMAIN ); ?></p>
		</td>
	</tr>
<?php
}
add_action( 'mbudm_product_category_edit_form_fields', 'mbudm_product_category_edit_meta_field', 10, 2 );
/* Save extra taxonomy fields callback function. */
function save_mbudm_product_category_custom_meta( $term_id ) {
	if ( isset( $_POST['term_meta'] ) ) {
		$t_id = $term_id;
		$term_meta = get_option( "taxonomy_$t_id" );
		$cat_keys = array_keys( $_POST['term_meta'] );
		foreach ( $cat_keys as $key ) {
			if ( isset ( $_POST['term_meta'][$key] ) ) {
				$term_meta[$key] = $_POST['term_meta'][$key];
			}
		}
		// Save the option array.
		update_option( "taxonomy_$t_id", $term_meta );
	}
}  
add_action( 'edited_mbudm_product_category', 'save_mbudm_product_category_custom_meta', 10, 2 );  
add_action( 'create_mbudm_product_category', 'save_mbudm_product_category_custom_meta', 10, 2 );

/*
Return the product category tags for a product.
- ashtml=true creates the items as links to the product category page 
- plain text delivers a comma separated string
*/
function mbudm_get_product_cat_tags($id, $ashtml = true) {
	switch(get_post_type($id)){
    	case MBUDM_PT_DOWNLOADS:
        case MBUDM_PT_PRODUCTS:
        	$post_categories = wp_get_object_terms($id, 'mbudm_product_category');
			$cat_class_prefix = "mb_cat_";
			$cats = '';
				
			foreach($post_categories as $c){
				$cat = get_category( $c );
				if($ashtml){
					$cats.= '<a href="' . get_term_link( $cat ) . '"  class="' . $cat_class_prefix . $cat->slug .'" title="' . sprintf( __( "View all products in %s" , TEMPLATE_DOMAIN), $cat->name ) . '" ' . '>' . $cat->name.'</a>';
				}else{
					$seperator = strlen($cats) == 0 ? ' ' : ', ';
					$cats.=  $seperator.$cat->name ;
				}
			}
        	if($ashtml){
        		$cats =  '<span class="mb_product_cats">' . $cats. '</span>' ;
        	}
        break;
    }
    return $cats;
}

/*
Menus
- four menus in this theme
*/
function setupMenus(){
	//Add support for nav menus
	add_theme_support( 'nav-menus' );
	
	//Register the menu location
	if(function_exists('register_nav_menu')):	
		register_nav_menu( 'primary_nav',  _x('Main','Nav Menu',TEMPLATE_DOMAIN)  );
		register_nav_menu( 'header_nav_logged_out',  _x('Header (logged out)','Nav Menu',TEMPLATE_DOMAIN) );
		register_nav_menu( 'header_nav_logged_in',  _x('Header (logged in)','Nav Menu',TEMPLATE_DOMAIN) );
		register_nav_menu( 'footer_nav',  _x('Footer','Nav Menu',TEMPLATE_DOMAIN) );
	endif;
	add_filter('nav_menu_css_class', 'mbudm_add_page_type_to_menu', 10, 2 );
	add_filter('wp_nav_menu_items','menu_logout_function', 10, 2);
}
/*
Walker Class for Main menu
- adds cart detail to checkout item
*/
class MBU_Walker extends Walker_Nav_Menu
{
	function start_el(&$output, $item, $depth, $args) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		$class_names = $value = '';
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		//filtered
		$classes = apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item );
		$class_names = join(' ',$classes);
		$class_names = ' class="' . esc_attr( $class_names ) . '"';
		$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		//$item_output .= '<br /><span class="sub">' . $item->description . '</span>';
		
		//check if it's the checkout menu item - class name of mb_checkout. if it is we add the checkout code.
		if (in_array("mb_checkout", $classes)) {
			$cart_prod_ids = mbudm_getCartAsIDs();
			 
			$count_display_class = count($cart_prod_ids) ? ' class="mm_on" ' :' class="mm_off" ';
			$item_output .= '<div '.$count_display_class.'><span class="menu_meta"><span class="accessibility">Number of items in your cart: </span>'. count($cart_prod_ids) .'</span></div>';
		}
		$item_output .= '</a>';
		
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}
/*
Return the navigation for the right context
*/
function mbudm_get_navigation($menu_pos = "header"){
	if($menu_pos == "header"){
		if(function_exists('wp_nav_menu')){
			if(has_nav_menu('primary_nav')){
				$walker = new MBU_Walker;
				wp_nav_menu( 
					array( 
					'theme_location' =>'primary_nav', 
					'container'=>'nav', 
					'container_id'=>'access', 
					'depth' => 2,
					'menu_id' => 'nav-main',
					'walker' => $walker) 
				);
			}
			if ( is_user_logged_in() ) {
				if(has_nav_menu('header_nav_logged_in')){
					wp_nav_menu( 
						array( 
						'theme_location' =>'header_nav_logged_in', 
						'depth' => 1,
						'menu_id' => 'nav-top' ) 
					);
				}
			}else{
				if(has_nav_menu('header_nav_logged_out')){
					wp_nav_menu( 
						array( 
						'theme_location' =>'header_nav_logged_out', 
						'depth' => 1,
						'menu_id' => 'nav-top' ) 
					);
				}
			}			
		}else{
		?>
		<nav id="access" role="navigation">
			<ul id="nav-main">
				<?php wp_list_pages('title_li=&depth=1'); ?>
			</ul>
		</nav>
		<?php
		}
	}else if($menu_pos == "footer"){
		if(function_exists('wp_nav_menu')){
			wp_nav_menu( 
				array( 
				'theme_location' =>'footer_nav', 
				'container'=>'nav', 
				'container_id'=>'utility', 
				'depth' => 1,
				'menu_id' => 'nav-footer' ) 
			);
		}
	}
}
/*
Append a logout link to the header menu (looged in)
*/
function menu_logout_function( $nav, $args ) {
    if( $args->theme_location == 'header_nav_logged_in' ){
        $nav.='<li class="menu-header-logout"><a href="'. wp_logout_url( get_permalink() ). '" title="Logout">Logout</a></li>';
    }
    return $nav;
}
/*
Add page class to menu item)
- If a menu item is a page then add the template name to it as a css class
- used to correctly identify a selected menu item
*/
function mbudm_add_page_type_to_menu($classes, $item) {
	if($item->object == 'page'){
		$template_name = get_post_meta( $item->object_id, '_wp_page_template', true );
		$new_class =str_replace(".php","",$template_name);
		array_push($classes, $new_class);
		
	}
	return $classes;
}

/*
 customised login form
- modified from wp_login_form() */
function mbudm_login_form( $args = array() ) {
		$defaults = array( 'echo' => true,
						'redirect' => ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'], 
						// Default redirect is back to the current page. 
	 					'form_id' => 'loginform',
						'label_username' => __( 'Username' , TEMPLATE_DOMAIN ),
						'label_password' => __( 'Password' , TEMPLATE_DOMAIN ),
						'label_remember' => __( 'Remember Me' , TEMPLATE_DOMAIN ),
						'label_log_in' => __( 'Log In' , TEMPLATE_DOMAIN ),
						'id_username' => 'loginform_user_login',
						'id_password' => 'loginform_user_pass',
						'id_remember' => 'loginform_rememberme',
						'id_submit' => 'loginform_submit',
						'remember' => true,
						'value_username' => '',
						'value_remember' => false, // Set this to true to default the "Remember me" checkbox to checked
					);
	$args = wp_parse_args( $args, apply_filters( 'login_form_defaults', $defaults ) );
	$form = '
		<form name="' . $args['form_id'] . '" id="' . $args['form_id'] . '" action="' . esc_url( site_url( 'wp-login.php', 'login_post' ) ) . '" method="post"><ul>
			' . apply_filters( 'login_form_top', '', $args ) . '
			<li class="login-username">
				<label for="' . esc_attr( $args['id_username'] ) . '">' . esc_html( $args['label_username'] ) . '</label>
				<input type="text" name="log" id="' . esc_attr( $args['id_username'] ) . '" class="input" value="' . esc_attr( $args['value_username'] ) . '" size="20" tabindex="10" />
			</li>
			<li class="login-password">
				<label for="' . esc_attr( $args['id_password'] ) . '">' . esc_html( $args['label_password'] ) . '</label>
				<input type="password" name="pwd" id="' . esc_attr( $args['id_password'] ) . '" class="input" value="" size="20" tabindex="20" />
			</li>
			' . apply_filters( 'login_form_middle', '', $args ) . '
			' . ( $args['remember'] ? '<li class="login-remember cb"><label><input name="rememberme" type="checkbox" id="' . esc_attr( $args['id_remember'] ) . '" value="forever" tabindex="90"' . ( $args['value_remember'] ? ' checked="checked"' : '' ) . ' /> ' . esc_html( $args['label_remember'] ) . '</label></li>' : '' ) . '
			<li class="login-submit">
				<input type="submit" class="submit-btn" name="wp-submit" id="' . esc_attr( $args['id_submit'] ) . '" value="' . esc_attr( $args['label_log_in'] ) . '" tabindex="100" />
				<input type="hidden" name="redirect_to" value="' . esc_url( $args['redirect'] ) . '" />
			</li>
			' . apply_filters( 'login_form_bottom', '', $args ) . '
		</ul></form>';
		$form .= '<form name="lostpasswordform" id="lostpasswordform" class="minimisable" action="'. esc_url( $args['redirect'] ) .'" method="post"><h4>'.__('Lost Password',TEMPLATE_DOMAIN).'</h4>
	<ul><li>
		<label for="lostpasswordform_user_login" >'.__('Username or E-mail:',TEMPLATE_DOMAIN) .'</label>
		<input type="text" name="user_login" id="lostpasswordform_user_login" class="input" value="'.esc_attr( $args['value_username'] ).'" size="20" tabindex="10" />
	</li>
	<li>
	<input type="hidden" name="redirect_to" value="'. esc_url( $args['redirect'] ) .'" />
	<input type="hidden" name="reset_pass" value="reset" />
	<input type="submit" name="wp-submit" id="lostpasswordform_submit" class="info-btn" value="'. __('Get New Password',TEMPLATE_DOMAIN). '" tabindex="100" /></li></ul>
</form>';

	if ( $args['echo'] ){
		mbudm_lost_password( $args['echo']);
		echo $form;
	}else{
		$errors = mbudm_lost_password( $args['echo']);
		return $errors . $form;
	}
}

function mbudm_lost_password($echo=true){
	if (isset($_POST['reset_pass'])){
		global $wpdb;
		$username = trim($_POST['user_login']);
		$user_exists = false;
		if ( username_exists( $username ) ){
			$user_exists = true;
			$user = get_userdatabylogin($username);
		}else if ( email_exists($username) ){
				$user_exists = true;
				$user = get_user_by_email($username);
		}else{
			$error[] = '<p>'.__('Username or Email was not found, try again!',TEMPLATE_DOMAIN).'</p>';
		}
		if ($user_exists){
			$user_login = $user->user_login;
			$user_email = $user->user_email;
			// Generate something random for a password... md5'ing current time with a rand salt
			$key = substr( md5( uniqid( microtime() ) ), 1, 9);
			// Now insert the new pass md5'd into the db
			$wpdb->query("UPDATE $wpdb->users SET user_activation_key = '$key' WHERE user_login = '$user_login'");
			//create email message
			$message = __('Someone has asked to reset the password for the following site and username.',TEMPLATE_DOMAIN) . "\r\n\r\n";
			$message .= get_option('siteurl') . "\r\n\r\n";
			$message .= sprintf(__('Username: %s',TEMPLATE_DOMAIN), $user_login) . "\r\n\r\n";
			$message .= __('To reset your password visit the following address, otherwise just ignore this email and nothing will happen.',TEMPLATE_DOMAIN) . "\r\n\r\n";
			$message .= get_option('siteurl') . "/wp-login.php?action=rp&key=$key&login=".rawurlencode($user_login)."\r\n";
			//send email meassage
			$h_from = mbudm_get_option(THEMEPREFIX."_mail_name");
			$h_from_address = mbudm_get_option(THEMEPREFIX."_mail_address");
			$headers = 'From: '. $h_from .' <'. $h_from_address .'>' . "\r\n";
			$subject = sprintf( __('[%s] Password Reset',TEMPLATE_DOMAIN), get_option('blogname') );
    		if (FALSE == wp_mail($user_email, $subject, $message, $headers) )
				$error[] = '<p>' . __('The e-mail could not be sent. Please contact the site owner.',TEMPLATE_DOMAIN) . '</p>';
		}
		$error_str = '';
		if (count($error) > 0 ){
			$error_str.= '<div class="errors">';
			foreach($error as $e){
				$error_str.= $e ;
			}
			$error_str.= '</div>';
		}else{
			$error_str.= '<p class="alerts" >'.__('A message will be sent to your email address.',TEMPLATE_DOMAIN).'</p>'; 
		}
		if($echo){
			echo $error_str;
		}else{
			return $error_str;
		}
	}
}

/*
enqueue scripts and CSS
- adds js and css files to the header/footer
*/
function mbudm_enqueue(){			  
	global $post;
	
	wp_deregister_script('jquery');
	/*wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js', false, '1.7.1',true);
	 for working offline
	*/
	wp_register_script('jquery', get_template_directory_uri() . '/js/libs/jquery-1.7.1.min.js', false, '1.7.1',true);
	
	wp_enqueue_script('jquery');
	
	if( !is_admin()){
		$webfonts = 'http://fonts.googleapis.com/css?family=';
		$mb_heading_text_webfont = mbudm_get_option("mb_heading_text_webfont");
		$mb_body_text_webfont = mbudm_get_option("mb_body_text_webfont");
		if($mb_heading_text_webfont){
			$webfonts .= mbudm_get_option("mb_heading_text") .':300,b,i';
		}
		if($mb_body_text_webfont){
			$body_font = mbudm_get_option("mb_body_text");
			if($mb_heading_text_webfont){
				$webfonts .= '|';
			}
			$webfonts .= mbudm_get_option("mb_body_text") .':300,b,i';
		}
		if($mb_heading_text_webfont || $mb_body_text_webfont){
			wp_register_style('mb_fonts', $webfonts);
         	wp_enqueue_style('mb_fonts');
		}
		
		$style_mode = mbudm_get_option(THEMEPREFIX."_color_styles");
		if($style_mode == THEMEPREFIX."_default_styles"){
			$style_file = '/style.css';
		}else{
			$style_file = '/style.php';
		}
		
		wp_register_style('mb_styles', get_template_directory_uri() .$style_file  );
        wp_enqueue_style('mb_styles');
        /*
        Used for testing that new layouts follow the grid
        wp_register_style('mb_styles_grid', get_template_directory_uri() .'/grid.css' );
        wp_enqueue_style('mb_styles_grid');
		*/
	
		wp_register_script('respond',get_template_directory_uri() . '/js/libs/respond.min.js',false,'1');
		wp_enqueue_script('respond');
		wp_register_script('modernizr',get_template_directory_uri() . '/js/libs/modernizr-2.0.6.min.js',false,'2.0.6');
		wp_enqueue_script('modernizr');
		wp_register_script('selectivizr',get_template_directory_uri() . '/js/libs/selectivizr-min.js',false,'1');
		wp_enqueue_script('selectivizr');
		wp_register_script('jquery-cycle', get_template_directory_uri() . '/js/libs/jquery.cycle.lite.1.0.min.js',array('jquery'),'1.0',true);
		wp_enqueue_script('jquery-cycle');
		wp_register_script('jquery_simplemodal', get_template_directory_uri() . '/js/libs/jquery.simplemodal.1.4.1.min.js',array('jquery'),false,true);
		wp_enqueue_script('jquery_simplemodal');
		wp_register_script('jquery_qtip', get_template_directory_uri() . '/js/libs/jquery.qtip-1.0.0-rc3.js',array('jquery'),false,true);
		wp_enqueue_script('jquery_qtip');
		wp_register_script('jquery_minimiser', get_template_directory_uri() . '/js/libs/jquery.minimiser.js',array('jquery'),false,true);
		wp_enqueue_script('jquery_minimiser');
		wp_register_script('jqueryScrollTo', get_template_directory_uri() . '/js/libs/jquery.scrollTo-1.4.2-min.js',array('jquery'),false,true);
		wp_enqueue_script('jqueryScrollTo');
		wp_register_script('mb_common',
				get_template_directory_uri() . '/js/common.js',
					   array('jquery','jquery_simplemodal','jquery_minimiser','jquery_qtip','jqueryScrollTo'),
					   '1' ,true);
		wp_enqueue_script('mb_common');
		$mb_common_translation_array = array( 'close_label' => __( 'Close',TEMPLATE_DOMAIN ));
		wp_localize_script( 'mb_common', 'mbl10n', $mb_common_translation_array );
		
		// regarding return_url, unlike the version sent to paypal the version used here is url encoded
		$mb_checkout_localize_array = array( 'checkout_success_head' => __( 'Thanks for purchasing!',TEMPLATE_DOMAIN ), 'checkout_success_body' => __( 'In a second, you will be taken to your account page, but if it this does not happen then you can access your account from here.',TEMPLATE_DOMAIN ),'checkout_account_link' => __( 'Click here to view your account.',TEMPLATE_DOMAIN ), 'checkout_cancel' => __( 'Looks like you cancelled this transaction - let us know if we can help.',TEMPLATE_DOMAIN ),'success_redirect' => MBUDM_PAYMENT_COMPLETE_URL_ENCODED);
		
		$mb_checkout_localize_array['prevcartsummary'] = mbudm_get_last_transaction_summary();

		switch($post->ID){
			case CHECKOUT_PAGE_ID:
				wp_register_script('jquery_mbselect', get_template_directory_uri() . '/js/libs/jquery.mbselect.js',array('jquery'),'1',true);
		wp_enqueue_script('jquery_mbselect');
				wp_register_script('mb_checkout',
			get_template_directory_uri() . '/js/mb_checkout.js',array('jquery','mb_common','jquery_mbselect'),'1',true);
				wp_enqueue_script('mb_checkout');
				wp_localize_script( 'mb_checkout', 'mbl10n', $mb_checkout_localize_array );
			break;
			case TRANSACTION_PAGE_ID:		
				// also has the checkout js as TP is the return url 
				// so if the user doesn't have js or using non incontext mode they get redirected to TP
				/*
				wp_register_script('mb_checkout', get_template_directory_uri() . '/js/mb_checkout.js',array('jquery','mb_common'),false,true);
				wp_enqueue_script('mb_checkout');
				wp_localize_script( 'mb_checkout', 'mbl10n', $mb_checkout_localize_array );
				*/
				wp_register_script('mb_transactions', get_template_directory_uri() . '/js/mb_transactions.js',array('jquery','mb_common'),false,true);
				wp_enqueue_script('mb_transactions');
			break;		
		}
		
		if ( is_singular() && comments_open() && get_option('thread_comments') )
  			wp_enqueue_script( 'comment-reply' );
	}
}
add_action('wp_enqueue_scripts', 'mbudm_enqueue');

/* 
Admin enqueue 
- scripts and css used only in admin screens
*/
function mbudm_admin_enqueue(){			  
	if( is_admin()){
		// admin
		wp_register_script('mb_jquery_ui',
				get_template_directory_uri() . '/js/libs/jquery-ui-1.8.21.custom.min.js',
					   array('jquery'),
					   '1' ,true);
		wp_enqueue_script('mb_jquery_ui');
		
		wp_enqueue_script('farbtastic');
		wp_enqueue_style('farbtastic');	
		
		wp_register_script('mb_admin',
				get_template_directory_uri() . '/js/admin.js',
					   array('jquery','mb_jquery_ui'),
					   '1' ,true);
		wp_enqueue_script('mb_admin');
		
		 wp_register_style('mb_adminStyles', get_template_directory_uri() .'/includes/admin-style.php' );
         wp_enqueue_style('mb_adminStyles');
	}
}
add_action('admin_enqueue_scripts', 'mbudm_admin_enqueue');

/*
Called from widget MBU Product list 
- historically was embedded in the theme, it may return so kept out of widget for now
*/
function mbudm_get_products_list($display_mode){
		$sticky_array = get_option( 'sticky_posts' );
		// get products as list
		switch($display_mode){
			case 'unfeatured':
				$args = array(
						'numberposts' => -1,
						'post__not_in' => $sticky_array,
						'post_type' => MBUDM_PT_PRODUCTS,
						'orderby' => 'title',
						'order' => 'ASC'
				);
			break;
			case 'featured':
				$args = array(
						'numberposts' => -1,
						'post__in' => $sticky_array,
						'post_type' => MBUDM_PT_PRODUCTS,
						'orderby' => 'title',
						'order' => 'ASC'
				);
			break;
			case 'all':
			default:
				$args = array(
						'numberposts' => -1,
						'post_type' => MBUDM_PT_PRODUCTS,
						'orderby' => 'title',
						'order' => 'ASC'
				);
			break;
		}
		$query = get_posts( $args );
		if ( count( $query ) > 0 ) {
			$filepath = mbudm_get_template_file_path( 'products_list.php' );
			ob_start();
			include_once($filepath);
			$is_single = false;
			$output = ob_get_contents();
			ob_end_clean();
			echo $output;
		}
}
/*
Called from widget MBU Featured Products
- historically was embedded in the theme, it may return so kept out of widget for now
*/
function mbudm_get_featured_products($dmode){
	switch($dmode){
		case 'expanded_full':
			$image_size = MBUDM_IMAGESIZE_MEDIUM;
			$expanded = true;
		break;
		case 'simple_cycle' :
		default:
			$image_size = MBUDM_IMAGESIZE_LARGE;
			$expanded = false;
		break;
	}
	$featured_product_theme_path = mbudm_get_template_file_path( 'featured_products.php' );
	ob_start();
	include_once($featured_product_theme_path);
	$is_single = false;
	$output = ob_get_contents();
	ob_end_clean();
	echo $output;
}

/* 
Shopping Cart, checkout and transaction functions
*/
/*
Update Cart
- handle any query vars to do with transactions or checkout
*/
function mbudm_update_cart(){
	//setup cart for this session if not done yet
	if(!isset($_SESSION)) 
	{
		session_start();
	}
	if(!isset($_SESSION["mbudm_shopping_cart"]) ){
		mbudm_clearCart();
	}
	
	if(isset($_POST['mbudm_checkout'])){
		mbudm_checkout();
	}
	
	if(isset($_GET["mb_trans"]) ){
		//isset($_REQUEST["token"]) && isset($_REQUEST["PayerID"]) ){	
		switch($_GET["mb_trans"]){
			case '1':
				mbudm_payment_received();
			break;
			case '2':
				mbudm_payment_cancelled();
			break;
			case '3':
				mbudm_payment_notification();
			break;
			case '4';
				mbudm_purchase_completed();
			break;
		}
	}
	
	//check for mbudm addp/removep/clearp in GET
	if(isset($_GET['mb_addp'])) {
		$pid = $_GET['mb_addp'];
		if(mbudm_is_product($pid )){
			mbudm_addToCart($pid);
		}else{
			//not a product
		}
	}
	if(isset($_GET['mb_removep'])) {
		$pid = $_GET['mb_removep'];
		if(mbudm_is_product($pid )){
			mbudm_removeFromCart($pid);
		}else{
			//not a product
		}
	}
	if(isset($_GET['mb_clearp'])) {
		mbudm_clearCart();
	}
	
	//check for mbudm addp/mbudm_checkout in POST
	if(isset($_POST['mb_addp'])) {
		$pid = $_POST['mb_addp'];
		if(mbudm_is_product($pid )){
			mbudm_addToCart($pid);
		}else{
			//not a product
		}
	}
}
/* Add product to cart */
function mbudm_addToCart($product_id){
	//echo("adding to cart: " . $product_id );
	$products = $_SESSION["mbudm_shopping_cart"];
	if (in_array($product_id, $products)) {
	    // already added
	}else{
		array_push($products, $product_id);
		$_SESSION["mbudm_shopping_cart"] = $products;
	}
}
/* Remove product from cart */
function mbudm_removeFromCart($product_id){
	$products = $_SESSION["mbudm_shopping_cart"];
	if (in_array($product_id, $products)) {
		//unset($products[$product_id]);
		$products = array_diff( $products, array($product_id) );
		$_SESSION["mbudm_shopping_cart"] = $products;
	}else{
		// not in cart
	}
}
/* Get details and metadata for all products in cart */
function mbudm_getCartAsPosts(){
	$products = $_SESSION["mbudm_shopping_cart"];
	//echo("products in cart... " . print_r($products) );
	if(empty($products)){
		$products_query = null;
	}else{
		$args = array(
					'numberposts' => -1,
					'post__in' => $products,
					'post_type' => MBUDM_PT_PRODUCTS,
					'orderby' => 'ASC'
			);
		$products_query = get_posts( $args );
	}
	return $products_query;
}
/* Calculate the total price for all products in cart */
function mbudm_getCartTotal($unformatted = false,$with_currency = false){
	
	$products = $_SESSION["mbudm_shopping_cart"];
	$total = 0;
	foreach($products as $product){
		$total+=get_post_meta( $product, '_mbudm_price', true );
	}
	$_SESSION["Payment_Amount"] = $total;
	
	$val = $unformatted ? $_SESSION["Payment_Amount"] : mbudm_format_value($_SESSION["Payment_Amount"] ,$with_currency) ;
	return $val;
}
/* Just the product IDs - for when detail and meta is not needed */
function mbudm_getCartAsIDs(){
	$products = $_SESSION["mbudm_shopping_cart"];
	if(empty($products)){
		$products = array();
	}
	return $products;
}
/* Reset the cart */
function mbudm_clearCart(){
	$_SESSION["mbudm_shopping_cart"] = array();
	//echo("Cart Cleared! ");
}

// Add a body class for when the page is incontext
add_filter('body_class','mbudm_incontext');
function mbudm_incontext($classes) {
	global $wp_query;
	if(isset($wp_query->query_vars['mb_ic']) && '1' == $wp_query->query_vars['mb_ic']){
	 	//don't render the page as this parameter is appended to the return url from the payment gateway and so this page will render inside the popup
	 	// add 'class-name' to the $classes array
		$classes[] = 'mbudm_incontext';
		// return the $classes array
	}
	/**/
	return $classes;
}

/* initiate checkout process 
- this is triggered when the checkout for id submitted
*/
function mbudm_checkout(){
	//Check the cart has items
	$cart_ids = mbudm_getCartAsIDs();
	if(count($cart_ids) > 0){
		
		//clear the last transaction summary, this is populated if the transaction is completed
		mbudm_set_last_transaction_summary('');
		
		// the paypal utility class
		require_once(mbudm_get_template_file_path("paypal_dg.php"));
		
		// Put together the data we're going to send to PayPal.
		// get the nvps data
		$nvps = mbudm_get_nvps_data(1);
		
		// Send the API call to PayPal.
		$response = RunAPICall($nvps);
		
		// Did we get an error back from PayPal?  Did PayPal
		// not give us a token?  If so, fail now.
		$response['MB_NOTE'] = "Checkout";
		if(($response["ACK"] != "Success" && $response["ACK"] != "SuccessWithWarning") || !strlen($response["TOKEN"]))
			PaymentError($response);

		// Otherwise, grab our token and redirect the buyer to PayPal.
		// if its mobile (ie iPad) DG express checkout (using the modal) doesn't work so use regular express checkout
		if(MBUDM_PP_NOT_INCONTEXT_MODE){
			$pp_url_str = "Location: ". MBUDM_BASE_API_URL ."/cgi-bin/webscr?cmd=_express-checkout-mobile&useraction=commit&token=" . $response["TOKEN"];
		}else{
			$pp_url_str = "Location: ". MBUDM_BASE_API_URL ."/incontext?token=" . $response["TOKEN"];
		}
		header($pp_url_str);
		
		exit();
	}else{
		//no items so do nothing - let the checkout page reload
	}
}
/*
Called because paypal triggered the return url (mb_trans=1)
- adapted from this demo: https://www.x.com/node/2748/
*/
function mbudm_payment_received(){
	global $wpdb;
	
	// the paypal utility class
	require_once(mbudm_get_template_file_path("paypal_dg.php"));

	// If, for some reason, we don't have the token and
	// payer ID, bounce out an error now.
	if(!strlen($_REQUEST["token"]) || !strlen($_REQUEST["PayerID"])) PaymentError("No token or PayerID");
	
	// Try to process the payment.  We'll need to copy a lot
	// of the same values that we used for our
	// SetExpressCheckout call.
	$nvps = mbudm_get_nvps_data(2);
	$response_DoExpressCheckoutPayment= RunAPICall($nvps);
	
	// If the API call failed for some reason,
	// bounce out an error now.
	$response_DoExpressCheckoutPayment['MB_NOTE'] = "DoExpressCheckoutPayment";
	if($response_DoExpressCheckoutPayment["ACK"] != "Success" && $response_DoExpressCheckoutPayment["ACK"] != "SuccessWithWarning") PaymentError($response_DoExpressCheckoutPayment);
	
	
	// At this point, we know the payment succeeded -- or is at least pending
	// deliver the content to the buyer.
	
	if(WP_DEBUG){
		$error_log = 'Payment Received Log';
	}
	
	// get buyer email?
	$nvps["VERSION"] = "65.1";
	$nvps["METHOD"] = "GetTransactionDetails";
	$nvps["TRANSACTIONID"] = $response_DoExpressCheckoutPayment['PAYMENTINFO_0_TRANSACTIONID'];
	
	$response_GetTransactionDetails = RunAPICall($nvps);
	
	// If the API call failed for some reason,
	// bounce out an error now.
	$response_GetTransactionDetails['MB_NOTE'] = "GetTransactionDetails";
	if($response_GetTransactionDetails["ACK"] != "Success" && $response_GetTransactionDetails["ACK"] != "SuccessWithWarning") PaymentError($response_GetTransactionDetails);
	
	
	//check if this PP email is a user:
	$transaction_user_id = email_exists($response_GetTransactionDetails['EMAIL']);
	
	// can return a wp error object so ensure it is numeric or null
	$transaction_user_id = is_numeric($transaction_user_id) ? $transaction_user_id : null ;
	
	$message = "";

	if ( is_user_logged_in() ){ 
		global $current_user;
		get_currentuserinfo();
		// is it the logged in user? if so add meta to current user
		if($transaction_user_id == $current_user->ID){
			//$message .="User signed up then purchased.\r\n";
			if(WP_DEBUG){
				$error_log .= "INFO: User is logged in and Gateway email matches account email. User id:".$transaction_user_id."\r\n";
			}
		}elseif ($transaction_user_id){
			//$message .="User is signed in with one account and bought with different email.\r\n";
			if(WP_DEBUG){
				$error_log .= "INFO: User is logged in but Gateway email matches the email in another account. User id:".$transaction_user_id."\r\n";
			}
		}else{
			//create account - they are prompted to change accounts
			$random_password = wp_generate_password( 12, false );
			$transaction_user_id = wp_create_user( $response_GetTransactionDetails['EMAIL'], $random_password, $response_GetTransactionDetails['EMAIL'] );
			
			$message .=__("Here are your login details for your recent purchase:",TEMPLATE_DOMAIN) . "\r\n" . __("User name:",TEMPLATE_DOMAIN) ." ". $response_GetTransactionDetails['EMAIL'] ."\r\n" .__("Password:",TEMPLATE_DOMAIN) ." ". $random_password ."\r\n";
			if(WP_DEBUG){
				$error_log .= "INFO: User is logged in but Gateway email doesn\'t match any existing account. A new account is created with the gateway email. User id:".$transaction_user_id ."\r\n";
				if ( is_wp_error($transaction_user_id) ){
				   $error_log .= $transaction_user_id->get_error_message();
				}
			}
		}
	}else{
		// user is not logged in - prompt to log in with the email address from paypal	(handled in mb_checkout.js)
		if ($transaction_user_id){
			$message .=sprintf(_x("Welcome back to %s. Thanks for returning.","Var is site name",TEMPLATE_DOMAIN),get_bloginfo('name') ). "\r\n";

			// Note: Rev 79 in svn 
			if(WP_DEBUG){
				$error_log .= "INFO: User not logged in but is an existing user. User id is:".$transaction_user_id."\r\n";
			}
		}else{
			//create account and log them in
			$random_password = wp_generate_password( 12, false );
			$transaction_user_id = wp_create_user( $response_GetTransactionDetails['EMAIL'], $random_password, $response_GetTransactionDetails['EMAIL'] );
			
			$creds = array();
			$creds['user_login'] = $response_GetTransactionDetails['EMAIL'];
			$creds['user_password'] = $random_password ;
			$creds['remember'] = true;
			$transaction_user = wp_signon( $creds, false );
			if ( is_wp_error($transaction_user) ){
				if(WP_DEBUG){
					$error_log .= $transaction_user->get_error_message()."\r\n";
				}
			}
			
			$message .=sprintf(_x("Welcome to %s. Here are your login details:","Var is site name",TEMPLATE_DOMAIN),get_bloginfo('name') ). "\r\n" . __("User name:",TEMPLATE_DOMAIN) ." ". $response_GetTransactionDetails['EMAIL'] ."\r\n" .__("Password:",TEMPLATE_DOMAIN) ." ". $random_password ."\r\n";
			
			if(WP_DEBUG){
				$error_log .= "INFO: User not logged in and is not an existing user. User account created with id:".$transaction_user_id ."\r\n";
			}
		}
	}
	
	// add record for transaction - these serialise the array
	// use MBUDM_TRANSACTION_PENDING or MBUDM_TRANSACTION_COMPLETED
	switch($response_GetTransactionDetails['PAYMENTSTATUS']){
		case 'Pending':
			$meta_key = MBUDM_TRANS_PENDING;
			$subject = __("Your transaction is pending",TEMPLATE_DOMAIN);
			$message .= __("PayPal has notified us that your transaction is pending, as soon as this is completed we'll send you another email notifying that your purchases are ready.",TEMPLATE_DOMAIN);
		break;
		case 'Completed':
			$meta_key = MBUDM_TRANS_COMPLETED;
			$subject = __("Your transaction is completed",TEMPLATE_DOMAIN);
			$message .= sprintf(_x("PayPal has notified us that your transaction is completed. Thanks for your purchase!\nLog in to %s and pick up your files.","Var is transactions page url", TEMPLATE_DOMAIN), MBUDM_PAYMENT_COMPLETE_URL );
		break;
	}

	$status = 0;
	switch($response_GetTransactionDetails['PAYMENTSTATUS']){
		case MBUDM_TRANS_PENDING_PP:
			$status = MBUDM_TRANS_PENDING;
		break;
		case MBUDM_TRANS_COMPLETED_PP:
			$status = MBUDM_TRANS_COMPLETED;
		break;
		case MBUDM_TRANS_CANCELLED_PP:
			$status = MBUDM_TRANS_CANCELLED;
		break;
		default:
			$status = MBUDM_TRANS_INITIATED;
		break;
	}
	
	//add the transaction 
	$wpdb->insert( 
		'mbudm_user_transactions', 
		array( 
			'invoice_id' => $response_GetTransactionDetails['INVNUM'], 
			'gateway_transaction_id' => $response_GetTransactionDetails['TRANSACTIONID'],
			'user_id' => $transaction_user_id,
			'amount' => $response_GetTransactionDetails['AMT'], // should take out fee? 
			'status' => $status,
			'gateway' => MBUDM_TRANS_GATEWAY_PAYPAL
		), 
		array(  
			'%s',
			'%s',
			'%d',
			'%f',
			'%d',
			'%d'
		) 
	);
	$user_transaction_id = $wpdb->insert_id;
	
	
	if(!$user_transaction_id){
		// the insert failed the user transaction record was already created by the receipt of the ipn. Therefore look up the id by invoice number and transaction id.
		
		$transaction_row = $wpdb->get_row("SELECT * FROM mbudm_user_transactions WHERE invoice_id = '". $response_GetTransactionDetails['INVNUM'] ."' AND gateway_transaction_id = '". $response_GetTransactionDetails['TRANSACTIONID'] ."'");
		$user_transaction_id = $transaction_row->ID;
		
	}
	//using the newly added transaction primary key
	//add the two comms, 
	
	$wpdb->insert( 
		'mbudm_user_transaction_comms', 
		array( 
			'user_transaction_id' => $user_transaction_id, 
			'comm_type' => MBUDM_TRANS_COMM_INFO,
			'comm_data' => maybe_serialize($response_GetTransactionDetails)
		), 
		array(  
			'%d',
			'%d',
			'%s'
		) 
	);
	
	$wpdb->insert( 
		'mbudm_user_transaction_comms', 
		array( 
			'user_transaction_id' => $user_transaction_id, 
			'comm_type' => MBUDM_TRANS_COMM_INITIATED,
			'comm_data' => maybe_serialize($response_DoExpressCheckoutPayment)
		), 
		array(  
			'%d',
			'%d',
			'%s'
		) 
	);
	
	//add the products for this transaction
	$product_ids = mbudm_getCartAsIDs();
	foreach ($product_ids as $pid) {
		$wpdb->insert( 
			'mbudm_transaction_products', 
			array( 
				'user_transaction_id' => $user_transaction_id, 
				'product_id' => $pid
			), 
			array(  
				'%d',
				'%d'
			) 
		);
	}
	
	//Store a purchase summary (comma delimited titles)
	// use the nvps data - $nvps["L_PAYMENTREQUEST_0_NAME". $l_index]
	$purchase_summary = '';
	foreach ($nvps as $nvpsK => $nvpsV)
	{
	  sscanf($nvpsK,"L_PAYMENTREQUEST_0_NAME%d", $pindex);  // scan into a formatted string and return values passed by reference
	  if ($pindex !== false)
		 $purchase_summary.= strlen($purchase_summary) > 0 ? ', ' . $nvpsV : $nvpsV ;
	}
	mbudm_set_last_transaction_summary($purchase_summary);
	
	// send the buyer a confirmation email
$h_from = mbudm_get_option(THEMEPREFIX."_mail_name");
	$h_from_address = mbudm_get_option(THEMEPREFIX."_mail_address");
	$headers = 'From: '. $h_from .' <'. $h_from_address .'>' . "\r\n";
    wp_mail($response_GetTransactionDetails['EMAIL'], $subject, $message, $headers);
    
    
    // store the user id as a session var so we know this user 
    // checked out
	mbudm_set_last_transaction_user_id($transaction_user_id);
    
    // set transaction detail as a javascript object - this is sent to Google Analytics from mb_checkout.js
	$invoice_num = $response_GetTransactionDetails['INVNUM']; //1234;
	$store_name = get_bloginfo('name');
	$invoice_amt = $response_GetTransactionDetails['AMT']; // Fee? //3.50;
	$invoice_tax = 0; // always 0 for now
	$invoice_country  = $response_GetTransactionDetails['COUNTRYCODE']; //'US';
	
	global $ga_addTrans_arr, $ga_addItem_arr;
    $ga_addTrans_arr =  "['_addTrans','$invoice_num','$store_name','$invoice_amt','$invoice_tax','','','','$invoice_country']";
    $prod_posts = mbudm_getCartAsPosts();
    $ga_addItem_arr = "[";
    $first = true;
    foreach($prod_posts as $prod_post){
    	if(!$first){
    		$ga_addItem_arr.= ",";
    	}else{
    		$first = false;
    	}
    	$ga_addItem_arr.= "['_addItem','" . $invoice_num ."',".   // order ID - required
						   "'" . $prod_post->ID ."',".           // SKU/code - required
						   "'" . $prod_post->post_title ."',".        // product name
						   "'',". // category or variation
						   "'" . get_post_meta( $prod_post->ID, '_mbudm_price', true ) ."',".  // unit price - required
					"'1']"    // quantity - required
					;
    }
     $ga_addItem_arr .= "]";
 
    /* clear the cart */
    mbudm_clearCart();
    
    if( MBUDM_PP_NOT_INCONTEXT_MODE ){
    	if (!headers_sent()) {
    		wp_redirect( MBUDM_PAYMENT_COMPLETE_URL );
			exit;
    		//header("Location: " . $payment_received_redirect_url);
    		/*
    		if(WP_DEBUG){
				$error_log .="Header send request to: ". $payment_received_redirect_url ."\r\n";
			}
			*/
			//exit;
		}else{
			if(WP_DEBUG){
				$error_log .="ERROR: Could not redirect to ". MBUDM_PAYMENT_COMPLETE_URL ." - headers already sent.\r\n";
			}
		}
    }
    
    if(WP_DEBUG){
		echo($error_log);
	}
}

/* Javascript message added when user cancels (see mb_checkout.js 
This is here in case we need to add anyhting else*/
function mbudm_payment_cancelled(){
	//echo " Payment Cancelled!";
}

/*
Process Instant Payment Notifications from PayPal
- adapted from this demo: https://www.x.com/node/2748/
*/
function mbudm_process_paypal_ipn(){

	global $wpdb;
	
	ini_set('log_errors', true);
	ini_set('error_log', 'ipn_errors.log');

	// instantiate the IpnListener class
	include('ipn/ipnlistener.php');
	$listener = new IpnListener();
	$listener->use_sandbox = !MBUDM_API_URL_PRODUCTION;
	$listener->use_curl = false;

	try {
		$listener->requirePostMethod();
		$verified = $listener->processIpn();
	} catch (Exception $e) {
		error_log($e->getMessage());
		
		//echo($listener->getTextReport());
		exit(0);
	}
	
	if ($verified) {
		/*
		Once you have a verified IPN you need to do a few more checks on the POST
		fields--typically against data you stored in your database during when the
		end user made a purchase (such as in the "success" page on a web payments
		standard button). The fields PayPal recommends checking are:
		
			1. Check the $_POST['payment_status'] is "Completed"
			2. Check that $_POST['txn_id'] has not been previously processed 
			3. Check that $_POST['receiver_email'] is your Primary PayPal email 
			4. Check that $_POST['payment_amount'] and $_POST['payment_currency'] 
			   are correct
		
		Since implementations on this varies, I will leave these checks out of this
		example and just send an email using the getTextReport() method to get all
		of the details about the IPN.  
		*/
		
		// get data out of post vars
		$inv = $_POST['invoice'];
		$txn = $_POST['txn_id'];
		$amt = $_POST['payment_gross'];
		$r_email = $_POST['receiver_email'];
		$p_status = $_POST['payment_status'];
		$transaction_row = $wpdb->get_row("SELECT * FROM mbudm_user_transactions WHERE invoice_id = '". $inv ."' AND gateway_transaction_id = '". $txn  ."'");
		
		$user_transaction_id = $transaction_row->ID;
		
		if($user_transaction_id){
			//add the ipn comm 
			$wpdb->insert( 
				'mbudm_user_transaction_comms', 
				array( 
					'user_transaction_id' => $user_transaction_id, 
					'comm_type' => MBUDM_TRANS_COMM_IPN,
					'comm_data' => maybe_serialize($listener->getPostData())
				), 
				array(  
					'%d',
					'%d',
					'%s'
				) 
			);
			
			//update the status if it has changed
			$status = 0; 
			switch($p_status){
				case MBUDM_TRANS_PENDING_PP:
					$status = MBUDM_TRANS_PENDING;
				break;
				case MBUDM_TRANS_COMPLETED_PP:
					$status = MBUDM_TRANS_COMPLETED;
				break;
				case MBUDM_TRANS_CANCELLED_PP:
					$status = MBUDM_TRANS_CANCELLED;
				break;
				default:
					$status = MBUDM_TRANS_INITIATED;
				break;
			}
			if($status != $transaction_row->status){
				$wpdb->update( 
					'mbudm_user_transactions', 
					array( 
						'status' => '$status'	// integer (number) 
					), 
					array( 'ID' => $transaction_row->ID ), 
					array( 
						'%d'	// value2
					), 
					array( '%d' ) 
				);
				
				if($status == MBUDM_TRANS_COMPLETED_PP){
				
					/* If it is completed then notify the buyer that the transactions has changed */
					$subject = __("Your transaction is completed",TEMPLATE_DOMAIN);
					$message = sprintf(_x("PayPal has notified us that your transaction is completed. Thanks for your purchase!\nLog in to %s and pick up your files.","Var is site url", TEMPLATE_DOMAIN),site_url() );
					$h_from = mbudm_get_option(THEMEPREFIX."_mail_name");
					$h_from_address = mbudm_get_option(THEMEPREFIX."_mail_address");
					$headers = 'From: '. $h_from .' <'. $h_from_address .'>' . "\r\n";
					$customer_email = $_POST['payer_email'];
					if(filter_var($customer_email, FILTER_VALIDATE_EMAIL)){
						wp_mail($customer_email, $subject, $message, $headers);
					}		
				}
			}
			
		}else{
			//no matching Record - alert admin
			
			$h_from = mbudm_get_option(THEMEPREFIX."_mail_name");
			$h_from_address = mbudm_get_option(THEMEPREFIX."_mail_address");
			$headers = 'From: '. $h_from .' <'. $h_from_address .'>' . "\r\n";
			wp_mail($h_from_address, __('Valid IPN but no transaction id',TEMPLATE_DOMAIN), $listener->getTextReport(), $headers);
    
			
			error_log($listener->getTextReport());
		}
	} else {
		/*
		An Invalid IPN *may* be caused by a fraudulent transaction attempt. It's
		a good idea to have a developer or sys admin manually investigate any 
		invalid IPN.
		*/
		$h_from = mbudm_get_option(THEMEPREFIX."_mail_name");
		$h_from_address = mbudm_get_option(THEMEPREFIX."_mail_address");
		$headers = 'From: '. $h_from .' <'. $h_from_address .'>' . "\r\n";
		wp_mail($h_from_address, 'Invalid IPN', $listener->getTextReport(), $headers);
		error_log($listener->getTextReport());
	}
}

/*Create the Name Value Pair data that PayPal requires
- adapted from this demo: https://www.x.com/node/2748/
*/
function mbudm_get_nvps_data($mb_trans_mode = 1){

	$nvps = array();
	
	// According to the sources I've talked to internally,
	// this HAS to be set to 65.1.  No other version is
	// currently supported.
	$nvps["VERSION"] = "65.1";
	$nvps["PAYMENTREQUEST_0_AMT"] = $_SESSION["Payment_Amount"] ;
	$nvps["PAYMENTREQUEST_0_CURRENCYCODE"] = mbudm_get_option(THEMEPREFIX."_currency");;
	$nvps["PAYMENTREQUEST_0_ITEMAMT"] = $_SESSION["Payment_Amount"] ;

	$cartPosts = mbudm_getCartAsPosts();
	
	switch($mb_trans_mode){
		case 1:
			
			$nvps["METHOD"] = "SetExpressCheckout";
			$nvps["LOCALECODE"] = mbudm_get_option(THEMEPREFIX."_pp_locale");
			$nvps["RETURNURL"] = MBUDM_PAYMENT_RETURN_URL;//send paypal a url with '&' not encoded
			$nvps["CANCELURL"] = MBUDM_PAYMENT_CANCEL_URL;//send paypal a url with '&' not encoded
			$nvps["PAYMENTREQUEST_0_ALLOWEDPAYMENTMETHOD"] = "InstantPaymentOnly"; 
			$nvps["PAYMENTREQUEST_0_DESC"] = "You are purchasing " . count($cartPosts) . " Linguaposta product(s)"; 
			$nvps["PAYMENTREQUEST_0_CUSTOM"] = _x("Thanks for purchasing!","Custom message for customers that is sent to Paypal",TEMPLATE_DOMAIN);
			$nvps["PAYMENTREQUEST_0_INVNUM"] = getInvoiceNumber();
			$nvps["PAYMENTREQUEST_0_NOTIFYURL"] = MBUDM_GATEWAY_IPN_PAYPAL;
			$nvps["PAYMENTREQUEST_0_PAYMENTACTION"] = "Sale"; 
			
			// Since it's a digital good (and not physical),
			// we don't need a shipping address.
			$nvps["REQCONFIRMSHIPPING"] = "0";
			$nvps["NOSHIPPING"] = "1";
		break;
		case 2:
			
			$nvps["METHOD"] = "DoExpressCheckoutPayment";
		
			$nvps["TOKEN"] = $_REQUEST["token"];
			$nvps["PAYERID"] = $_REQUEST["PayerID"];
		break;
	}
	
	$l_index = 0;
	foreach($cartPosts as $cartPost) {
	
		$nvps["L_PAYMENTREQUEST_0_NAME". $l_index] =substr($cartPost->post_title,0,125);
		$nvps["L_PAYMENTREQUEST_0_DESC". $l_index] =substr($cartPost->post_excerpt,0,125);
		$nvps["L_PAYMENTREQUEST_0_AMT". $l_index] = get_post_meta( $cartPost->ID, '_mbudm_price', true );
		$nvps["L_PAYMENTREQUEST_0_QTY". $l_index] = "1";
		
		// This is what makes the whole magic happen --
		// don't forget this one!
		$nvps["L_PAYMENTREQUEST_0_ITEMCATEGORY". $l_index] = "Digital";
		
		$l_index++;
	}
	return $nvps;
}	
/* called when the customer is redirected to the transactions page (mb_trans=4) */
function mbudm_purchase_completed(){
	//unused for now - alerts/errors handled in mb_transactions.php. If another location /template needs to handle mb_trans=4 then this  function will do the work
}
/* 
Payment Constants
- Called on init 
*/
function setup_Payment_Constants(){
	// setting up API credentials. always use sandbox if logged in as admin so we can test.
	$active_url = mbudm_get_option(THEMEPREFIX."_pp_active_url");
	$is_admin = current_user_can('switch_themes');
	if($active_url == THEMEPREFIX."_pp_production_url" && !$is_admin){
		$base_url = 'https://www.paypal.com' ;
		$is_production = true;
		$option_stem = 'production';
	}else{
		$base_url = 'https://www.sandbox.paypal.com' ;
		$is_production = false;
		$option_stem = 'sandbox';
		$active_url = THEMEPREFIX."_pp_sandbox_url"; // reset this in case is admin
	}
	define("MBUDM_API_URL", mbudm_get_option($active_url) );
	define("MBUDM_API_USERNAME", mbudm_get_option(THEMEPREFIX."_pp_" . $option_stem . "_api_username"));
	define("MBUDM_API_PASSWORD", mbudm_get_option(THEMEPREFIX."_pp_" . $option_stem . "_api_password"));
	define("MBUDM_API_SIGNATURE", mbudm_get_option(THEMEPREFIX."_pp_" . $option_stem . "_api_signature"));
	
	define("MBUDM_API_URL_PRODUCTION",$is_production);
	define("MBUDM_BASE_API_URL", $base_url );
	
	$checkout_mode = mbudm_get_option(THEMEPREFIX."_pp_checkout_mode");
	$is_ipad = stristr($_SERVER['HTTP_USER_AGENT'], 'Mozilla/5.0 (iPad;') ? true : false;
	$not_incontext = $checkout_mode == "standard" ? true : $is_ipad ;
	define("MBUDM_PP_NOT_INCONTEXT_MODE", $not_incontext );

	//send paypal a url with '&' not encoded
	$return_page = CHECKOUT_PAGE; 
	$return_page_pp = !MBUDM_PP_NOT_INCONTEXT_MODE ? add_querystring_var($return_page,'mb_ic','1',false) : $return_page ;
define("MBUDM_PAYMENT_RETURN_URL",add_querystring_var($return_page_pp,'mb_trans','1',false));	define("MBUDM_PAYMENT_CANCEL_URL",add_querystring_var($return_page_pp ,'mb_trans','2',false));
// for validation we need encoded URLs when used on this site
define("MBUDM_PAYMENT_RETURN_URL_ENCODED",add_querystring_var($return_page,'mb_trans','1'));	define("MBUDM_PAYMENT_CANCEL_URL_ENCODED",add_querystring_var(CHECKOUT_PAGE,'mb_trans','2'));
	//used for wp_redirect via php so don't use encoding
	define("MBUDM_PAYMENT_COMPLETE_URL",add_querystring_var(TRANSACTION_PAGE,'mb_trans','4',false));	
	//used for internal redirects via js so use encoding
	define("MBUDM_PAYMENT_COMPLETE_URL_ENCODED",add_querystring_var(TRANSACTION_PAGE,'mb_trans','4'));
}

/* Utilities */

/*
Retrieve product categories. Adapted from the corresponding wordpress function
 */
function get_the_mbudm_product_category( $id ) {

	$id = (int)$id;

	$categories = get_object_term_cache( $id, 'mbudm_product_category' );
	if ( false === $categories ) {
		$categories = wp_get_object_terms( $id, 'mbudm_product_category' );
		wp_cache_add( $id, $categories, 'mbudm_product_category_relationships');
	}

	if ( !empty( $categories ) )
		usort( $categories, '_usort_terms_by_name' );
	else
		$categories = array( );

	foreach ( (array)array_keys( $categories ) as $key ) {
		_make_cat_compat( $categories[$key] );
	}

	return $categories;
}
// Print the buy button
function mbudm_buy_button($product_id = null,$addtocart= false){
	if($product_id == null )
		$product_id = get_the_ID();
	$label = mbudm_get_option(THEMEPREFIX."_buy_label");
	if($addtocart){
		$url = add_querystring_var(CHECKOUT_PAGE, 'mb_addp', $product_id); 
	}else{
		$url = get_permalink($product_id);
	}
		?>
	<a class="buy-btn" href="<?php echo $url ?>" title="<?php echo $label . ' - ' .get_the_title($product_id) ; ?>" ><?php echo $label; ?> <em><?php mbudm_the_product_price($product_id) ?></em></a>						
	<?php
}
/* buy button meta 
- can add content before and after buy button
*/
function mbudm_buy_button_meta($post_id,$position='before'){
	$output = get_post_meta($post_id,'_'.THEMEPREFIX.'_buy_'.$position,true);
	echo $output;
}

/* get the price - formatted into currency*/
function mbudm_the_product_price($product_id = null,$with_currency = false){
	if($product_id == null )
		$product_id = get_the_ID();
	$raw_price = get_post_meta( $product_id, '_mbudm_price', true );
	if(!$raw_price){
		$raw_price = 0;
	}
	echo mbudm_format_value($raw_price,$with_currency);
}
/* format a value into currency */
function mbudm_format_value($val,$with_currency = false){
	$csymbol = mbudm_get_option(THEMEPREFIX."_currency_symbol");
	$cpos = mbudm_get_option(THEMEPREFIX."_currency_symbol_position");
	$cs = $cpos == "before" ? $csymbol : '' ;
	$ca = $cpos == "after" ? $csymbol : '' ;
	$dsep = mbudm_get_option(THEMEPREFIX."_decimal_separator");
	$tsep = mbudm_get_option(THEMEPREFIX."_thousand_separator");
	$cflag = $with_currency ? '<span class="currency-flag" >'.mbudm_get_option(THEMEPREFIX."_currency") .'</span>' : '' ;
	return $cs . number_format($val, 2, $dsep, $tsep) . $ca . $cflag ;
}
/* check if an id is a valid product */
function mbudm_is_product($pid){
	$product_record = get_post($pid);
	return $product_record->post_type == MBUDM_PT_PRODUCTS ? true : false ;
}
/* create a unique invoice number */
function getInvoiceNumber(){
	// return rand numba
	return uniqid();
}
/* get products purchased by a user 
- returns a products array with the following values:
product_id, status (integer see constants in mbudm_define_constants() ), post_title, post_excerpt
*/
function mbudm_get_user_products($user_id = 0){
	global $wpdb;
	$products;
	if($user_id){	

		$sql_products = "SELECT mbudm_transaction_products.product_id, MAX(mbudm_user_transactions.status) AS status, $wpdb->posts.post_title AS post_title, $wpdb->posts.post_excerpt AS post_excerpt FROM mbudm_user_transactions, mbudm_transaction_products, $wpdb->posts WHERE mbudm_user_transactions.user_id = '$user_id' AND mbudm_user_transactions.ID = mbudm_transaction_products.user_transaction_id AND $wpdb->posts.ID = mbudm_transaction_products.product_id GROUP BY mbudm_transaction_products.product_id";
		
		$products = $wpdb->get_results($sql_products); 
		
	}else{
		//$products[] = "FAILED";
	}
	return $products;
}
/* get product purchased by a user in detail 
- returns a product arrya with one value (object) with the following values:
product_id, status (integer see constants in mbudm_define_constants() ), post_title, invoice_id, createdDate, amount and stampedfile
*/
function mbudm_get_user_product_detail($user_id = 0, $product_id = 0){
	global $wpdb;
	$product;
	if($user_id && $product_id){
		$sql_product = "SELECT mbudm_transaction_products.product_id, $wpdb->posts.post_title AS post_title, mbudm_user_transactions.invoice_id, mbudm_user_transactions.createdDate, mbudm_user_transactions.amount,mbudm_user_transactions.status
		FROM mbudm_user_transactions, mbudm_transaction_products, $wpdb->posts 
		WHERE mbudm_user_transactions.user_id = '$user_id' 
		AND mbudm_user_transactions.status = '".MBUDM_TRANS_COMPLETED."'
		AND mbudm_transaction_products.product_id = '$product_id'
		AND mbudm_user_transactions.ID = mbudm_transaction_products.user_transaction_id AND $wpdb->posts.ID = mbudm_transaction_products.product_id";
		//echo($sql_product);
		//MBUDM_TRANS_COMPLETED
		$product = $wpdb->get_results($sql_product);
		if($product[0]->product_id == $product_id ){//&& $product[0]->status == MBUDM_TRANS_COMPLETED){
			// deliver  a stamped file! 
			$product[0]->stampedfile = mbudm_stampFile($user_id,$product_id);	
		}
	}else{
		//
	}
	return $product;
}
/* 
File delivery
- stamps a file if the pdf stamper is set up
- otherwise simply copies file 
- file is appended with a string and stored in the mbudm_uploads_folder
*/
function mbudm_stampFile($user_id = null,$post_id, $user_str = "Anonymous",  $user_email_str = ""){

	mbudm_clear_uploads();

	$is_stamper_option = mbudm_get_option(THEMEPREFIX.'_use_pdf_stamper');
	
	//The source file URL (The product or download file)
	$sourceURL = get_post_meta( $post_id,MBUDM_MK_FILE,true );
	$storage_folder = mbudm_get_option(THEMEPREFIX."_file_storage");
	$sourceURL  = empty($storage_folder) ? $sourceURL  : $storage_folder . $sourceURL ;
	
	$uploads_list = get_option('mbudm_uploads_list',array());
	
	if($is_stamper_option){
		/*** Mandatory data ***/
		// Post URL (Get this value from the Integration Help menu of this plugin)
		$postURL = get_option('WP_PDF_STAMP_URL') . '/api/stamp_api.php';
		
		// The Secret key (Get this value from the settings menu of this plugin)
		$secretKey = get_option('wp_pdf_stamp_secret_key');
			
		// prepare the data
		$data = array ();
		$data['secret_key'] = $secretKey;
		$data['source_file'] = $sourceURL;
	 
		if($user_id){
			$userdata = get_userdata( $user_id );
			$data['customer_name'] = $userdata->first_name . ' ' . $userdata->last_name;
			$data['customer_email'] = $userdata->user_login;
		}else{
			$data['customer_name'] = $user_str;
			$data['customer_email'] = $user_email_str;
		}
		$data['customer_address'] = date('D jS F Y');
	
		// send data to post URL
		$ch = curl_init ($postURL);
		curl_setopt ($ch, CURLOPT_POST, true);
		curl_setopt ($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
		$returnValue = curl_exec ($ch);
		
		// Process the return values
		list ($status, $value) = explode ("\n", $returnValue);
		if(strpos($status,"Success!") !== false)
		{
			$stampedURL = trim($value);

			$uploads_list[] = $stampedURL;
		}
		else
		{
			//echo "An error occured while trying to stamp the file! Error details: ".$value;
			$stampedURL = "#Not found: ".print_r($value,true). " postUrl: " .$postURL . " sourceURL: " .$sourceURL ;
		}
	}else{
		// use php copy  
		$src_path_parts = pathinfo($sourceURL);
		$uniquecode = uniqid("", true);
		$upload_dir = get_option('mbudm_uploads_directory');
		$upload_dir_url = get_option('mbudm_uploads_directory_url');
		$copiedFile = $upload_dir . '/' . $src_path_parts['filename'] . '_' . $uniquecode . '.' . $src_path_parts['extension'];
		$stampedURL = $upload_dir_url . '/'. $src_path_parts['filename'] . '_' . $uniquecode . '.' . $src_path_parts['extension'];
		
		if (!copy($sourceURL, $copiedFile)) {
			echo "failed to copy $sourceURL to $copiedFile ...\n";
		}else{
			$uploads_list[] = $copiedFile;
		}
	}
	
	update_option('mbudm_uploads_list',$uploads_list);
	
	return $stampedURL;
}

function mbudm_clear_uploads(){
	$uploads_list = get_option('mbudm_uploads_list');
	$five_mins_ago_time   =  strtotime('-5 min');
	//$log = 'ClearUploads: '. Date(DATE_RSS,$five_mins_ago_time);
	if(count($uploads_list) > 0){
		foreach($uploads_list as $key=>$item){
			//$log .= '\n' . $item ;
			//delete the file if it is older than 5 min 
			if(is_file($item)) {
				//$log .= '\n - is_file';
				if (file_exists($item)) {
					//$log .= '\n - file_exists';
    				$modtime = strtotime(filemtime($item));
    				
    				if($modtime < $five_mins_ago_time ){
    					unlink($item);
    					//$status = 'DEL-OLD';
    					
    					//remove from uploads_list 
    					unset($uploads_list[$key]);
    				}else{
    					//$status = 'NOTDEL-NEW';
    				}
    				//$log .= '\n - status: ' .$status;
				}
			}
		}
	}
	//echo '<pre>' . $log ;
	//print_r($uploads_list);
	//echo '</pre>';
	update_option('mbudm_uploads_list',$uploads_list);
}
// send automatic scheduled email
if ( ! wp_next_scheduled('mbudm_task_upload_cleanup') ) {
	wp_schedule_event( time(), 'hourly', 'mbudm_task_upload_cleanup' ); // hourly, daily and twicedaily
}
add_action( 'mbudm_task_cleanup', 'mbudm_clear_uploads' );

/* store the user id as last transaction user */
function mbudm_set_last_transaction_user_id($user_id = 0){
	if($user_id > 0){		
		$_SESSION[SESSION_LAST_TRANSACTION_USER_ID] = $user_id;
	}else{
		
	}
}
/* retrieve the last transaction user */
function mbudm_get_last_transaction_user_id(){
	$user_id = false;
	if(isset($_SESSION[SESSION_LAST_TRANSACTION_USER_ID]) && is_numeric($_SESSION[SESSION_LAST_TRANSACTION_USER_ID]) ){
		$user_id = $_SESSION[SESSION_LAST_TRANSACTION_USER_ID];
	}
	return $user_id;
}

/* store a summary f the last transaction */
function mbudm_set_last_transaction_summary($summary){
	if(strlen($summary) > 0){		
		$_SESSION[SESSION_LAST_TRANSACTION_SUMMARY] = $summary;
	}else{
		
	}
}
/* retrieve the last transaction summary */
function mbudm_get_last_transaction_summary(){
	$summary = '';
	if(isset($_SESSION[SESSION_LAST_TRANSACTION_SUMMARY])){
		$summary = $_SESSION[SESSION_LAST_TRANSACTION_SUMMARY];
	}
	return $summary;
}

/* local copy of encryption required by dlprotect plugin */
function mbudm_encrypt($string) {
    $result = '';
    $key = get_option('dlprotect_encrypt_key');
	for($i=1; $i<=strlen($string); $i++){
		$char = substr($string, $i-1, 1);
		$keychar = substr($key, ($i % strlen($key))-1, 1);
		$char = chr(ord($char)+ord($keychar));
		$result.=$char;
	}
	return urlencode($result);
}

/*
Add custom admin pages and menu items
Also use this hook to capture any custom admin form submissions for this theme
*/
add_action('admin_menu', 'mbudm_add_admin'); 
function mbudm_add_admin() {
    global $theme_options;
    if(isset($_GET['page'])){
    	if ( $_GET['page'] == basename(__FILE__) || $_GET['page'] == 'mailing_list_users'){
			if ( isset($_REQUEST['mb_settings_form_id']) ) {
					$resetmode = isset($_REQUEST['reset']); //otherwise it is assumed to be saving
					$redirect_url = $_SERVER['REQUEST_URI'];
					$vars = array('saved'=>'true','mbfid'=>$_REQUEST['mb_settings_form_id'], 'mbfn'=>$_REQUEST['mb_settings_form_name']);
					foreach($vars as $key=>$value){
						$redirect_url = add_querystring_var($redirect_url,$key,$value,false);
					}
					//$redirect_url =  . "&saved=true&mbfid=" . $_REQUEST['mb_settings_form_id'] . "&mbfn=" . $_REQUEST['mb_settings_form_name'];
					
					switch($_REQUEST['mb_settings_form_id']){
						case 'install-demo':
							if(!get_option('mbudm_demo_content')){
								update_option('mb_action_install', date('l j H:i:s') ); 
								include_once( mbudm_get_template_file_path('demo_content.php') );
								include_once( mbudm_get_template_file_path('demo_widgets.php') );
								update_option('mbudm_demo_content', true ); 	
							}else{
								//content already inserted
							}
						break;
						case 'mb_export_mailing_list':
							//print_r("1" . $_REQUEST);
							mbudm_export_mailing_list();
						break;
						default:
							foreach ($theme_options as $theme_options_form) { 
								if($_REQUEST['mb_settings_form_id'] == $theme_options_form['id']){
									foreach ($theme_options_form['elements'] as $value) {
										if(isset($value['id'])){
											$default_val = isset($value['std']) ? isset($value['std']) : '' ;
											$passed_val = isset($_REQUEST[ $value['id'] ]) ? $_REQUEST[ $value['id'] ] : '' ;
											$val = $resetmode ? $default_val : $passed_val ; 
											if( isset( $_REQUEST[ $value['id'] ] ) || $resetmode ) { 
												update_option( $value['id'], $val  );
											} else {
												delete_option( $value['id'] ); 
											} 
										}else{
											//it's a descritpor elemenmnt so do nothing
										}
									}
								}
							}
					   break;
				   }
				   header("Location: " . $redirect_url );
				   die;
				   
		   }
		}
    }
    $theme_page_menu_label = sprintf(__("%s Options",TEMPLATE_DOMAIN),THEMESHORTNAME);
    add_theme_page($theme_page_menu_label, $theme_page_menu_label, 'edit_themes', basename(__FILE__), 'mbudm_theme_options_admin');
    $user_page_menu_label = __("Mailing list export",TEMPLATE_DOMAIN);
	add_users_page( $user_page_menu_label, $user_page_menu_label, 'update_themes', 'mailing_list_users', 'mbudm_mailing_list_admin_page');
}

/* THEME OPTIONS */
/* declare the theme_options variable - it needs to be global*/
$theme_options;
/*two dimensional lookup array for fast checking of defaults [ option key - > default value ] */
$theme_options_defaults;

/* 
wrapper for getting theme options instead of using get_option( $option, $default ); 
This always uses defaults from $theme_options if none are set in the db 
*/
function mbudm_get_option($option){
 global $theme_options_defaults;
	$val = get_option( $option );
	if(!$val){
		//find in theme options
		$val = isset($theme_options_defaults[$option]) ? $theme_options_defaults[$option] : null ;
	}
	return $val;
}

/*
Setup the theme options 
- create a 2d lookup array
*/
function setup_mbudm_theme_options(){
	global $theme_options, $theme_options_defaults;
	
	// the theme options array
	require_once(mbudm_get_template_file_path("theme_options.php"));

	/* populate $theme_options_defaults */
	foreach ($theme_options as $theme_options_form) { 
			if(isset($theme_options_form['elements'])){
				foreach ($theme_options_form['elements'] as $value) { 
					if( isset($value['id']) &&  isset($value['std']) ){
						$theme_options_defaults[ $value['id'] ] = $value['std'];
					}
				}
			}
	}
}
/*
Render the theme options page
- Uses $theme_options arrays to build the forms
*/
function mbudm_theme_options_admin() {
    global $theme_options, $theme_options_defaults, $pagenow;
    if ( isset($_REQUEST['saved']) ) echo '<div id="message" class="updated fade"><p><strong>'.$_REQUEST['mbfn'].' saved for '.THEMENAME.' theme.</strong></p></div>';
    /*
    echo('<pre>');
    print_r($theme_options_defaults);
    echo('</pre>');
    */
    $tab_selected = isset($_GET['mb_action']) ? $_GET['mb_action'] : $theme_options[0]['id'] ;
    
	?>
	<h2><?php echo THEMENAME; ?> options</h2>
	<div class="wrap" id="themesettings">
	<?php 
	
	if(count($theme_options) > 0){
	?>
	<?php
		// menu
		$menu_output = '<ul id="themesettings_nav">';
		$form_output = '';
		ob_start();
		foreach ($theme_options as $theme_options_form) { 
			$selected_class = $tab_selected == $theme_options_form['id'] ? 'class="init-active"' : '' ;
			
			$updated_admin_url = $_SERVER['REQUEST_URI'];
			$updated_admin_url = $pagenow . '?page=functions.php&mb_action=' . $theme_options_form['id']; 
			$menu_output .= '<li ' . $selected_class .'><a href="' . $updated_admin_url .'" title="'.$theme_options_form['name'].'" >'.$theme_options_form['name'].'</a></li>';
			
			$hide_form = false;
			if(isset($theme_options_form['hide_option'])){
				$hide_form = get_option($theme_options_form['hide_option']);
			}
			$saved_form = isset($_REQUEST['saved'])? true : false ;
			
		?>
			<form method='post' id='<?php echo $theme_options_form['id']; ?>' <?php echo  $selected_class ?> >
			<?php 
			if( isset($theme_options_form['name']) ){ 
				if($saved_form && isset($theme_options_form['success_name'])){
					$name_param = 'success_name';
				}else if($hide_form && isset($theme_options_form['hide_name'])){
					$name_param = 'hide_name';
				}else{
					$name_param = 'name';
				}
			?>
				<h3><?php echo $theme_options_form[$name_param]; ?></h3>
			<?php 
			} 
			?>
			<?php 
			if( isset($theme_options_form['desc']) ){ 
				if($saved_form && isset($theme_options_form['success_desc'])){
					$desc_param = 'success_desc';
				}else if($hide_form && isset($theme_options_form['hide_desc'])){
					$desc_param = 'hide_desc';
				}else{
					$desc_param = 'desc';
				}
			?>
				<h5><?php echo $theme_options_form[$desc_param]; ?></h5>
			<?php 
			} 
			?>
			<input type="hidden" name="mb_settings_form_id" value="<?php echo $theme_options_form['id']; ?>" />
			<input type="hidden" name="mb_settings_form_name" value="<?php echo $theme_options_form['name']; ?>" />
			<ul>
		<?php
			if(isset($theme_options_form['elements'])){
				foreach ($theme_options_form['elements'] as $value) { 
					switch ( $value['type'] ) {
						case "title":
						?>
							<h4><?php echo $value['name']; ?></h4>
							<?php if(isset($value['desc'])){ ?>
							<p><?php echo $value['desc']; ?></p>
							<?php } ?>
						<?php 
						break;
						case 'text':
						?>
						<li>
							<label><?php echo $value['name']; ?></label>
							<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; } ?>" />
							<?php if(isset($value['desc'])){ ?>
							<small><?php echo $value['desc']; ?></small>
							<?php } ?>
						</li>
						<?php 
						break;
						case 'textarea':
						?>
						<li>
							<label><?php echo $value['name']; ?></label>
							<textarea name="<?php echo $value['id']; ?>"  type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; } ?></textarea>
							<?php if(isset($value['desc'])){ ?>
							<small><?php echo $value['desc']; ?></small>
							<?php } ?>
						</li>
						<?php 
						break;
						case 'select':
						?>
						<li>
						<?php
						$selected_val =  get_option( $value['id'] ) != "" ? get_option( $value['id'] ) : $value['std'] ; 
						?>
							<label><?php echo $value['name']; ?></label>
							<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><?php 
							$output = '';
							foreach ($value['options'] as $option) { 
								$output  .='<option ';
								if ( $selected_val == $option['value']) { 
									$output  .=' selected="selected"'; 
								}  
								$output  .=' value="'. $option['value'] .'">' . $option['desc'] .'</option>';
							} 
							echo $output;
							?></select>
							<?php if(isset($value['desc'])){ ?>
							<small><?php echo $value['desc']; ?></small>
							<?php } ?>
						</li>
						<?php
						break;
						case "checkbox":
						?>
						<li class="cb">
							<label><?php echo $value['name']; ?></label>
							<?php if(get_option($value['id'])){ 
									$checked = "checked=\"checked\""; 
								}else{ 
									$checked = "";
								} ?>
							<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
										
							<?php if(isset($value['desc'])){ ?>
							<small><?php echo $value['desc']; ?></small>
							<?php } ?>
						</li>
						<?php 		
						break;
						case 'color_tints':
						case 'specific_color':
						?>
									<li>
							<label><?php echo $value['name']; ?></label>
							<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; } ?>"  class="color-picker"/>
							<?php if(isset($value['desc'])){ ?>
							<small><?php echo $value['desc']; ?></small>
							<?php } ?>
						</li>
						<?php 		
						break;
						case 'font':
						?>
						<li>
							<label><?php echo $value['name']; ?></label>
							<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; } ?>"  />
							<?php if(get_option($value['id'].'_iswebfont')){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
							<p><input type="checkbox" name="<?php echo $value['id'].'_iswebfont'; ?>" id="<?php echo $value['id'].'_iswebfont'; ?>" value="true" <?php echo $checked; ?> /> Is this a Google Web font?</p>
						</li>
						<?php
						break;
					} // end switch
				} // end foreach
			} // end if 'elements'
		?>
			</ul>
			<p class="submit">
			<?php
			if(isset($theme_options_form['reset']) && !$hide_form){
			?>
			<input name="reset" type="submit" value="<?php echo $theme_options_form['reset'] ?>" />   
			<?php
			}
			
			if(!$hide_form){
				$submit_label = isset($theme_options_form['submit']) ? $theme_options_form['submit'] : __('Save changes',TEMPLATE_DOMAIN) ;
				$submit_class  = isset($theme_options_form['submit_class']) ? $theme_options_form['submit_class'] : '' ;
			?>
			<input name="save" class="button-primary <?php echo $submit_class ?>" type="submit" value="<?php echo $submit_label ?>" />  
			<?php
			}
			?>
			</p>
			</form>
	<?php
		}
		$form_output .= ob_get_contents();
		ob_end_clean();
		
		$menu_output .= '</ul>';
		echo($menu_output);
		echo($form_output);
			
	}else{
	 ?>
	 <p><?php printf(_x('No theme options for %s.','Var is theme name',TEMPLATE_DOMAIN),THEMENAME); ?></p>
	 <?php
	}
}

/*
Add the mailing list subscription status of each user to the users page
*/
add_filter( 'manage_users_columns', 'mbudm_add_mailing_list_column');
function mbudm_add_mailing_list_column( $columns){
    $columns['_mbudm_mailing_list'] = __('Mailing list',TEMPLATE_DOMAIN);
    return $columns;
}
add_filter('manage_users_custom_column',  'mbudm_add_mailing_list_column_value', 10, 3);
function mbudm_add_mailing_list_column_value( $value, $column_name, $user_id ){
	$user = get_userdata( $user_id );
	$value = $user->_mbudm_mailing_list;
	switch($value){
		case 2:
			$value = __('Subscribed',TEMPLATE_DOMAIN);
		break;
		case 1:
			$value = __('Pending',TEMPLATE_DOMAIN);
		break;
		default:
			$value =__('Not subscribed',TEMPLATE_DOMAIN);
		break;
	}
	return $value;
}
function mbudm_mailing_list_admin_page(){

	//must check that the user has the required capability 
    if (!current_user_can('update_themes'))
    {
      wp_die( __('You do not have sufficient permissions to access this page.',TEMPLATE_DOMAIN) );
    }
    ?>
    <div class="wrap">
    <h2><?php _e('Export Mailing list subscribers',TEMPLATE_DOMAIN); ?></h2>
    <p><?php _e('Export users who are subscribed or who are pending confirmation to subscribe to your mailing list as a .csv file.',TEMPLATE_DOMAIN); ?></p>
	<p><?php _e('You can edit the .csv file in excel or Google Docs and most eMarketing tools can import .csv files.',TEMPLATE_DOMAIN); ?></p>
	<form method='post' id='mb_export_mailing_list' >
		<?php
		// Noncename needed to verify where the data originated
		wp_nonce_field( 'mb_export_mailing_list', '_wpnonce_mb_export_mailing_list'); 
		?>
			<input type="hidden" name="mb_settings_form_id" value="mb_export_mailing_list" />
			<input type="hidden" name="mb_settings_form_name" value="<?php _e('Export mailing list as CSV',TEMPLATE_DOMAIN); ?>" />
		<input name="save" class="button-primary" type = 'submit' value ='<?php _e('Export as CSV',TEMPLATE_DOMAIN); ?>' />
	</form>
	</div>
	<?php
}
add_action( 'show_user_profile', 'mbudm_profile_mailing_list' );
add_action( 'edit_user_profile', 'mbudm_profile_mailing_list' );

/* 
Export Mailing List to a CSV file
Modified from the following plugin:
Plugin Name: Export Users to CSV
Plugin URI: http://pubpoet.com/plugins/
*/
function mbudm_export_mailing_list() {
		if ( isset( $_POST['_wpnonce_mb_export_mailing_list'] ) ) {
			check_admin_referer( 'mb_export_mailing_list', '_wpnonce_mb_export_mailing_list' );

			global $wpdb;
			$args = array(
				'fields' => 'all_with_meta',
				'meta_key' => '_mbudm_mailing_list',
				'meta_value' => 0,
				'meta_compare' => '>',
				'role' => ''
			);
			$users = get_users( $args );
		
			$col_headings = array(
				'ID' =>__('User ID',TEMPLATE_DOMAIN), 
				'user_login' =>__('Login',TEMPLATE_DOMAIN), 
				'user_email' =>__('Email',TEMPLATE_DOMAIN),
				'first_name' =>__('First name',TEMPLATE_DOMAIN),
				'last_name' =>__('Last name',TEMPLATE_DOMAIN),
				'nickname' =>__('Nickname',TEMPLATE_DOMAIN),
				'_mbudm_mailing_list' =>__('Subscribed',TEMPLATE_DOMAIN),
				'user_registered' =>__('Date registered',TEMPLATE_DOMAIN)
			);
				
			if ( ! $users ) {
				$referer = add_query_arg( 'error', 'empty', wp_get_referer() );
				wp_redirect( $referer );
				exit;
			}

			$sitename = sanitize_key( get_bloginfo( 'name' ) );
			$filename = $sitename . '-mailinglist-' . date( 'Y-m-d' ) . '.csv';

			header( 'Content-Description: File Transfer' );
			header( 'Content-Disposition: attachment; filename=' . $filename );
			header( 'Content-Type: text/csv; charset=' . get_option( 'blog_charset' ), true );

			echo implode( ',', array_values($col_headings) ) . "\n";

			foreach ( $users as $user ) {
				$data = array();
				foreach ( $col_headings as $field=>$nicename ) {
					$value = isset( $user->{$field} ) ? $user->{$field} : '';
					if($field == '_mbudm_mailing_list' ){
						switch($value){
							case 2:
								$value = __('Subscribed',TEMPLATE_DOMAIN);
							break;
							case 1:
								$value = __('Pending',TEMPLATE_DOMAIN);
							break;
							default:
								$value =__('Not subscribed',TEMPLATE_DOMAIN);
							break;
						}
					}
					$data[] = '"' . str_replace( '"', '""', $value ) . '"';
				}
				echo implode( ',', $data ) . "\n";
			}
			exit;
		}
}

/*
Add checkbox for mailing list signup on user profile page
*/
function mbudm_profile_mailing_list( $user ) { ?>
	<table class="form-table">
		<tr>
			<th><label for="mbudm_mailing_list"><?php printf(__('Mailing list subscription for %s.',TEMPLATE_DOMAIN),get_bloginfo() ); ?></label></th>

			<td>
			<?php 
			$mailing_list_status = get_user_meta($user->ID, '_mbudm_mailing_list', true);
			$mailing_list_checked = $mailing_list_status ? 'checked' : '' ;

			?>
				<label for="mbudm_mailing_list"><input type="checkbox" name="_mbudm_mailing_list" id="_mbudm_mailing_list" <?php echo $mailing_list_checked ?> /> <?php printf(__('Subscribed to the %s mailing list.',TEMPLATE_DOMAIN),get_bloginfo() ); ?> </label>
			</td>
		</tr>

	</table>
<?php }

add_action( 'personal_options_update', 'mbudm_profile_save_usermeta' );
add_action( 'edit_user_profile_update', 'mbudm_profile_save_usermeta' );
/* save the custom user meta */
function mbudm_profile_save_usermeta( $user_id ) {
	$mailing_list_status = isset($_POST['_mbudm_mailing_list']) ? 2 : 0 ; // 1 is for pending confirmation, not settable in this form.
	update_user_meta( $user_id, '_mbudm_mailing_list', $mailing_list_status );
}
/*
SHORTCODES
*/
/* Embed a widget in a page via a shortcode

Usage: [widget_via_shortcode widget_name="your_Widget_Class_Name" widget_option_one="Your value for widget option one" ]

*/
function widget_via_shortcode_parser( $atts, $content = null ){
	global $wp_widget_factory;
    
    extract(shortcode_atts(array(
        'widget_name' => FALSE
    ), $atts));
    
    $widget_name = esc_html($widget_name);
    
    if (!is_a($wp_widget_factory->widgets[$widget_name], 'WP_Widget')):
        $wp_class = 'WP_Widget_'.ucwords(strtolower($widget_name));
        
        if (!is_a($wp_widget_factory->widgets[$wp_class], 'WP_Widget')):
            return '<p>'.sprintf(__("%s: Widget class not found. Make sure this widget exists and the class name is correct", TEMPLATE_DOMAIN ) ,'<strong>'.$widget_name.'</strong>').'</p>';
        else:
            $widget_name = $wp_class;
        endif;
    endif;
    
    /* use the widget defaults, if they are accessible. Override any defaults with an equivalent attribute that was added to the shortcode */
    if(is_array($wp_widget_factory->widgets[$widget_name]->defaults) ){
    	$combined_atts = array_merge($wp_widget_factory->widgets[$widget_name]->defaults,$atts);
    }else{
    	$combined_atts = $atts;
    }
    
	ob_start();
	the_widget($widget_name, $combined_atts, null );
	$output = ob_get_contents();
	ob_end_clean();
	
	return $output;
}
add_shortcode( 'widget_via_shortcode', 'widget_via_shortcode_parser' );

/* Embed a section element via shortcode

Usage: [section class="col1" ][/section]

*/
function section_shortcode_parser( $atts, $content = null ){
	global $wp_widget_factory;
   // remove_filter( 'the_content', 'wpautop' );
    extract(shortcode_atts(array(
        'class' => ''
    ), $atts));

	ob_start();
	?>
	<section class="<?php echo $class ?> via-shortcode">
	<?php echo do_shortcode($content); ?>
	</section>
	<?php
	$output = ob_get_contents();
	ob_end_clean();
	
	//add_filter( 'the_content', 'wpautop' , 12);
	return $output;
}
add_shortcode( 'section', 'section_shortcode_parser' );

/* Embed a clearing element via shortcode

Usage: [clear]

*/
function clear_shortcode_parser( $atts, $content = null ){
	global $wp_widget_factory;
	ob_start();
	?>
	<div class="clear"></div>
	<?php
	$output = ob_get_contents();
	ob_end_clean();
	
	return $output;
}
add_shortcode( 'clear', 'clear_shortcode_parser' );



/* UTILITIES */
/*
return the path to the file in includes
*/
function mbudm_get_template_file_path($filename){
	//return ABSPATH . 'wp-content/themes/linguaposta/includes/' . $filename;
	return get_template_directory() .'/includes/' . $filename;
}
/*
find key in multi dimensional array
*/
function &array_find_element_by_key($key, &$form) {
  if (array_key_exists($key, $form)) {
    $ret =& $form[$key];
    return $ret;
  }
  foreach ($form as $k => $v) {
    if (is_array($v)) {
      $ret =& array_find_element_by_key($key, $form[$k]);
      if ($ret) {
        return $ret;
      }
    }
  }
  return FALSE;
}
/* 
add a value to a query string 
- note i only allows for one instance of each value
*/
function add_querystring_var($url, $key, $value, $convert = true) {
    $url = preg_replace('/(.*)(?|&)' . $key . '=[^&]+?(&)(.*)/i', '$1$2$4', $url . '&');
    $url = substr($url, 0, -1);
    if (strpos($url, '?') === false) {
        $qstring =  ('?' . $key . '=' . $value);
    } else {
        $qstring =  ('&' . $key . '=' . $value);
    }
    $qstring = $convert ? convert_chars($qstring) : $qstring ;
    return $url . $qstring;
}
/* remove a query string value by key */
function remove_querystring_var($url, $key) {
    $url = preg_replace('/(.*)(?|&)' . $key . '=[^&]+?(&)(.*)/i', '$1$2$4', $url . '&');
    $url = substr($url, 0, -1);
    return $url;
}


/* Fixes */

/* the_category triggers a html validation error */
add_filter( 'the_category', 'add_nofollow_cat' ); 
function add_nofollow_cat( $text ) { 
	$text = str_replace('rel="category"', '', $text); 
	return $text; 
}
?>
