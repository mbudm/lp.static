<?php get_header(); ?>
			
			<section class="col7">
			 <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
                <div class="p-holder-wrap col2">  
                <figure class="product-holder ">
					<div class="vframe"><!-- used for vertical centering -->
					<?php 
					// preview file?
					$preview_url = wp_get_attachment_url( get_post_meta( $post->ID,MBUDM_MK_PREVIEW_FILE,true ) );
					if ( has_post_thumbnail( $post->ID ) ){
						$thumbid = get_post_thumbnail_id($post->ID);
						if(!$preview_url){								
							$large_image_url = wp_get_attachment_image_src( $thumbid, 'full');
							$preview_url = $large_image_url[0];
						}
						$img_markup = get_the_post_thumbnail($post->ID,'product-large') . 
						get_the_post_thumbnail($post->ID,'product-medium');
						$imgcaption = get_post($thumbid )->post_excerpt;
						$title_att = the_title_attribute('echo=0'); /* could use image title as an option */
					}else{ 
						$title_att = the_title_attribute('echo=0');
						$img_markup =  '<span>'. __('No Image Available',TEMPLATE_DOMAIN) . '</span>';
						$imgcaption = get_the_excerpt();
					 } 
					 
					  if(!$preview_url){	
					 	echo $img_markup ;
					 }else{
					 	echo '<a href="' . $preview_url . '" title="' . sprintf(__('Preview: %s',TEMPLATE_DOMAIN),$title_att) . '" class="productPreview" >' . $img_markup . '</a>';
					 }
					 ?>
					</div>
					<figcaption><?php echo $imgcaption ?></figcaption>
				</figure>
				</div><!-- .p-holder-wrap -->
				<div class="product-info col6">
					<h2><?php the_title(); ?> <?php echo mbudm_get_product_cat_tags( get_the_ID() ); ?></h2>
					<h5><?php echo get_the_excerpt(); ?></h5>
					<?php
						/**
						 * Custom meta HTML and loop
						*/		 
						$tdata = "";
						$custom_fields = get_post_custom($post->ID );
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
					<?php mbudm_buy_button_meta($post->ID,'before'); ?>
						<li><?php mbudm_buy_button($post->ID,true); ?></li>
						<?php mbudm_buy_button_meta($post->ID,'after'); ?>
					</ul>
				</div>
				<article>
					<?php the_content(); ?>
					
				</article>
				<div id="comments_template">
					<?php comments_template( '/product-comments.php' ); ?>
				</div>
			
				<?php endwhile; ?>
				<?php else: ?>
				
					<?php include (mbudm_get_template_file_path('noposts.php') ); ?>

				
				<?php endif; ?>
					
				
			</section>
			<aside class="col6">
 			<?php get_sidebar('product-left'); ?>
			</aside>
			<aside>
			<?php get_sidebar('product-bottom'); ?>
			</aside>
<?php get_footer(); ?>
