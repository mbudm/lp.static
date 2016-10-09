<?php 
function hex2rgb($hex){
	$hex = prepareHex($hex);
	$rgb = array(hexdec(substr($hex,0,2)), hexdec(substr($hex,2,2)), hexdec(substr($hex,4,2)));
	return $rgb;
}
function hex2rgbstr($hex){
	$rgb = hex2rgb($hex);
	return implode(",", $rgb);
}

function rgb2hex($rgb){
	$hex = '';
	for($i=0; $i < 3; $i++) {
		// Convert the decimal digit to hex
		$hexDigit = dechex($rgb[$i]);
		// Add a leading zero if necessary
		if(strlen($hexDigit) == 1) {
		$hexDigit = "0" . $hexDigit;
		}
		// Append to the hex string
		$hex .= $hexDigit;
	}
	return '#'.$hex;
}

function prepareHex($hex){
	// Remove hash if given
	$hex = str_replace('#','',$hex);
	
	
	// Check if shorthand hex value given (eg. #FFF instead of #FFFFFF)
	if(strlen($hex) == 3) {
	$hex = str_repeat(substr($hex,0,1), 2) . str_repeat(substr($hex,1,1), 2) . str_repeat(substr($hex,2,1), 2);
	}
	return $hex;
}
function colourBrightness($hex, $percent) {
	$hex = prepareHex($hex);
	/// HEX TO RGB
	//$rgb = array(hexdec(substr($hex,0,2)), hexdec(substr($hex,2,2)), hexdec(substr($hex,4,2)));
	$rgb = hex2rgb($hex);
	
	//// CALCULATE
	for ($i=0; $i<3; $i++) {
		$rgb[$i] = $rgb[$i] + round(255 * $percent);
		
		// In over 255 or under 0
		if ($rgb[$i] > 255) {
			$rgb[$i] = 255;
		}
		if ($rgb[$i] < 0) {
			$rgb[$i] = 0;
		}
	}

	$hex = rgb2hex($rgb);
	// hash added above
	return $hex;
}

$mb_body_bg = mbudm_get_option("mb_body_bg");
$bg_image = mbudm_get_option("mb_body_bg_image");
if($bg_image){
	$mb_background_image_str = ' url('. $bg_image .')';
}else{
	$mb_background_image_str = '';
}

$mb_content_bg = mbudm_get_option("mb_content_bg");
$mb_content_bg_rgb_str = hex2rgbstr($mb_content_bg);

$mb_shadow  = mbudm_get_option("mb_shadow");
$mb_shadow_rgb_str = hex2rgbstr($mb_shadow);
$mb_header_line  = mbudm_get_option("mb_header_line");
$mb_buy_color = mbudm_get_option("mb_buy_color");
$mb_info_color = mbudm_get_option("mb_info_color");
$mb_action_color = mbudm_get_option("mb_action_color");
$mb_sub_action_color = mbudm_get_option("mb_sub_action_color");
$mb_linkCol = mbudm_get_option("mb_linkCol");
$mb_linkColHover = mbudm_get_option("mb_linkColHover");
$mb_linkColActive = mbudm_get_option("mb_linkColActive");
$mb_linkColVisited = mbudm_get_option("mb_linkColVisited");
$mb_headingCol = mbudm_get_option("mb_headingCol");
$mb_subHeadCol = mbudm_get_option("mb_subHeadCol");
$mb_emCol = mbudm_get_option("mb_emCol");
$mb_bodyCol = mbudm_get_option("mb_bodyCol");
$mb_heading_text = mbudm_get_option("mb_heading_text");
$mb_body_text = mbudm_get_option("mb_body_text");
$mb_navpos_small = mbudm_get_option("mb_navpos_small");
$mb_navpos_medium = mbudm_get_option("mb_navpos_medium");
$mb_navpos_large = mbudm_get_option("mb_navpos_large");
$mb_navitem_space_large = mbudm_get_option("mb_navitem_space_large");
$mb_navitem_space_medium = mbudm_get_option("mb_navitem_space_medium");
$mb_navitem_space_small = mbudm_get_option("mb_navitem_space_small");
$mb_logo_big = mbudm_get_option("mb_logo_big");
$mb_logo_medium = mbudm_get_option("mb_logo_medium");
$mb_logo_small = mbudm_get_option("mb_logo_small");
$mb_logo_big_width = mbudm_get_option("mb_logo_big_width");
$mb_logo_big_height = mbudm_get_option("mb_logo_big_height");
$mb_logo_medium_width = mbudm_get_option("mb_logo_medium_width");
$mb_logo_medium_height = mbudm_get_option("mb_logo_medium_height");
$mb_logo_small_width = mbudm_get_option("mb_logo_small_width");
$mb_logo_small_height = mbudm_get_option("mb_logo_small_height");

$mb_buy_color_very_light= colourBrightness($mb_buy_color, 0.3);
$mb_buy_color_light= colourBrightness($mb_buy_color, 0.15); 
$mb_buy_color_tint= colourBrightness($mb_buy_color, 0.05);
$mb_buy_color_shade= colourBrightness($mb_buy_color, -0.05);
$mb_buy_color_dark= colourBrightness($mb_buy_color, -0.15);
$mb_buy_color_very_dark= colourBrightness($mb_buy_color, -0.3);

$mb_info_color_very_light= colourBrightness($mb_info_color, 0.3);
$mb_info_color_light= colourBrightness($mb_info_color, 0.2);
$mb_info_color_tint= colourBrightness($mb_info_color, 0.1);
$mb_info_color_shade= colourBrightness($mb_info_color, -0.1);
$mb_info_color_dark= colourBrightness($mb_info_color, -0.2);
$mb_info_color_very_dark= colourBrightness($mb_info_color, -0.3);

$mb_info_color_very_light_rgb_str = hex2rgbstr($mb_info_color_very_light);
$mb_info_color_very_dark_rgb_str = hex2rgbstr($mb_info_color_very_dark);

$mb_action_color_very_light= colourBrightness($mb_action_color, 0.3);
$mb_action_color_light= colourBrightness($mb_action_color, 0.15);
$mb_action_color_tint= colourBrightness($mb_action_color, 0.05);
$mb_action_color_shade= colourBrightness($mb_action_color, -0.05);
$mb_action_color_dark= colourBrightness($mb_action_color, -0.15);
$mb_action_color_very_dark = colourBrightness($mb_action_color, -0.3);
$mb_action_color_uber_dark = colourBrightness($mb_action_color, -0.5);


$mb_sub_action_color_very_light= colourBrightness($mb_sub_action_color, 0.3);
$mb_sub_action_color_light= colourBrightness($mb_sub_action_color, 0.2);
$mb_sub_action_color_tint= colourBrightness($mb_sub_action_color, 0.1);
$mb_sub_action_color_shade= colourBrightness($mb_sub_action_color, -0.1);
$mb_sub_action_color_dark= colourBrightness($mb_sub_action_color, -0.2);
$mb_sub_action_color_very_dark= colourBrightness($mb_sub_action_color, -0.3);

$mb_sub_action_color_light_rgb_str = hex2rgbstr($mb_sub_action_color_light);
/* product category names and colors */
$args=array(
'taxonomy' => 'mbudm_product_category',
'orderby' => 'name',
'order' => 'ASC'
);

$categories=get_categories($args);
$cat_slugs_colors = array();
foreach($categories as $category) { 
	$term_meta = get_option( "taxonomy_" . $category->term_id  );  
	if($term_meta['category_color']){
		$new_arr = array('slug'=>$category->slug,'col'=>$term_meta['category_color']);
		$cat_slugs_colors[] = $new_arr ;
	}
}

$hide_product_shadow = mbudm_get_option(THEMEPREFIX."_hide_product_shadow") ? true : false ;
?>
