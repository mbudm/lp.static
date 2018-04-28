<?php if($expanded){ ?><div id="product-promo-wrapper"><div class="slider-content"><?php } ?><ul id="product-promo" class="<?php echo $dmode ?>"><?php


$sticky_array = get_option( 'sticky_posts' );
$args = array(
			'post__in' => $sticky_array,
			'post_type' => 'mbudm_product',
			'orderby' => 'rand'
	);
$query = new WP_Query( $args );
	
$counter = 0;
if( $query->have_posts() ) :
while ( $query->have_posts() ) : $query->the_post();

	$fp_title 	= get_the_title();
	$fp_url		= get_permalink();
	$fp_excerpt	= get_the_excerpt();
	$fp_desc	= get_the_content();
	$fp_id		= get_the_ID();
	$fp_product_cats = mbudm_get_product_cat_tags( $fp_id );
	$counter++;
	$last_post_class = $counter == $query->found_posts ? 'last' : '' ;
	
	
?><li class="featured_product_<?php echo $fp_id	; ?>  <?php echo $last_post_class ?>" ><?php
	
	if ( has_post_thumbnail() ){
		/* thumb id */
		$fp_img_id =  get_post_thumbnail_id($fp_id);
						
		$fp_img_atts  = wp_get_attachment_image_src( $fp_img_id,  $image_size, false);
		$fp_img_medium_atts = $image_size != MBUDM_IMAGESIZE_MEDIUM ? 
		wp_get_attachment_image_src( $fp_img_id,  MBUDM_IMAGESIZE_MEDIUM, false) : null ;
				
		$fp_img		= '<img src="' . $fp_img_atts[0] . '"  width="' . $fp_img_atts[1] . '"  height="' . $fp_img_atts[2] . '"  class="attachment-' . $image_size . '" />';
		$fp_img_medium = $fp_img_medium_atts ? '<img src="' . $fp_img_medium_atts[0] . '"  width="' . $fp_img_medium_atts[1] . '"  height="' . $fp_img_medium_atts[2] . '"  class="attachment-' . MBUDM_IMAGESIZE_MEDIUM . '" />' : '' ;
			
		$imgcaption = get_post($fp_img_id  )->post_excerpt;
	}else{ 
		$imgcaption = get_the_excerpt();
		$fp_img	= null;
	}
					
	if(!$expanded){
			?>
			<div class="sc-wrap">
				<figure class="product-holder">
					<div class="vframe"><!-- used for vertical centering -->
					<a href="<?php echo $fp_url ?>" title="<?php echo $fp_title ?>" ><?php 		
					if ( has_post_thumbnail() ){
						echo $fp_img; 
						if($fp_img_medium){
						echo $fp_img_medium; }
					}else{ 
					?><span><?php _e('No Image Available',TEMPLATE_DOMAIN); ?></span><?php 
					} ?></a>
					</div>
					<figcaption><h3><?php echo $fp_title ?></h3>
					<p><?php echo $fp_excerpt ?></p></figcaption>
				</figure>
			</div>
			<?php
			}else{
			?>
				<figure class="product-holder">
					<div class="vframe"><!-- used for vertical centering -->
					<a href="<?php echo $fp_url ?>" title="<?php echo $fp_title ?>" ><?php if ( has_post_thumbnail() ){ 
						echo $fp_img; 
					}else{ ?>
					<span><?php _e('No Image Available',TEMPLATE_DOMAIN); ?></span>
					<?php } ?>
					</a>
					</div>
					<figcaption><?php echo $imgcaption ?></figcaption>
				</figure>
				<div class="product-info">
					<h2><a href="<?php echo $fp_url ?>" title="<?php printf(__('More info on %s', TEMPLATE_DOMAIN), $fp_title); ?>" ><?php echo $fp_title ?></a> <?php echo $fp_product_cats ?></h2>
					<p><?php echo $fp_excerpt ?></p>
					
					<?php
						/**
						 * Custom meta HTML and loop
						*/		 
						$tdata = "";
						$custom_fields = get_post_custom($fp_id );
						ksort($custom_fields);
						foreach ( $custom_fields as $key => $value ){
							if(substr($key,0,1) != "_"){
							$tdata.="<tr><th>".$key . "</th><td>" . join(',',$value) . "</td></tr>";
							}
						}
						if(strlen($tdata)>0){
							echo "<table>" . $tdata . "</table>";
						}
						
						?>
						
					<ul>
						<li><a class="info-btn" href="<?php echo $fp_url ?>" title="<?php printf(__('More info on %s', TEMPLATE_DOMAIN), $fp_title); ?>" ><?php _e('More info', TEMPLATE_DOMAIN); ?></a></li>
						<li>
						<?php mbudm_buy_button($fp_id,true); ?>
						</li>
					</ul>
				</div>
		
        	
        
        	<?php
        	}
        	?></li><?php 
endwhile; 
endif;

wp_reset_query();
?></ul><?php if($expanded){ ?></div></div><?php } ?>
