<?php
/**
 * @package WordPress
 * @subpackage themename
 */
?><!DOCTYPE html>
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="ie6 mouldie oldie no-js"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="ie7 mouldie oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html <?php language_attributes(); ?> class="ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html <?php language_attributes(); ?> class="no-js" > <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<?php 
	global $meta_refresh;
	echo($meta_refresh);
	?>
	<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', TEMPLATE_DOMAIN), max( $paged, $page ) );

	?></title>
	<meta name="description" content="">
	<meta name="author" content="">
	<!--  Mobile Viewport Fix -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    
	<!-- Place favicon.ico and apple-touch-icon.png in the images folder -->
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico">
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon.png"><!--60X60-->
	
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php 
	
	global  $ga_addTrans_arr, $ga_addItem_arr; 
	
	if(MBUDM_PP_NOT_INCONTEXT_MODE){
		$incontext_mode = "false";
	}else{ 
		$incontext_mode = "true";
	}
	?>
	<script type="text/javascript">
		var blogUrl = '<?php echo home_url(); ?>';
		var templateUrl = '<?php echo get_template_directory_uri(); ?>';
		var incontext_mode = <?php echo $incontext_mode; ?>;
		<?php if(strlen($ga_addTrans_arr)){ ?>
		var ga_addTrans_arr = <?php echo $ga_addTrans_arr ?>;
    	var ga_addItem_arr = <?php echo $ga_addItem_arr ?>;
    	<?php } ?>
	</script>
	<?php wp_head(); ?> 
	<?php 
	if(!current_user_can('edit_users') && IS_PRODUCTION){
	
		$ga = mbudm_get_option(THEMEPREFIX."_ga_key");
		if(strlen($ga) > 0){
	?>
	<script type="text/javascript">
	
	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', '<?php echo $ga; ?>']);
	  _gaq.push(['_trackPageview']);
	  setTimeout("_gaq.push(['_trackEvent', '15_seconds', 'read'])",15000);
	  (function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	
	</script>
	<?php
		}
	}
	?>
</head>
<body <?php body_class(); ?> >
	<div id="wrap">
		<header>
			<hgroup>
				<h1><a href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a></h1>
				<h2 class="description"><?php bloginfo('description'); ?></h2> 
			</hgroup>
			<?php 
			
				mbudm_get_navigation("header");
				
			?>
		</header>
		<div id="content">
		
