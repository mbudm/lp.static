<?php 
	get_header(); 
	
	$term_qv = get_query_var( 'term' );
	$tax_qv = get_query_var( 'taxonomy' );
	
	$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); 

  $term_meta = get_option( "taxonomy_" . $term->term_id  );  
  
  $colClassNum = 3;
  $evenClassBool = false;
  $downloads = Array();
?>  
		<section class="col7"> 
<?php if(isset($term_meta['cat_archive_page_head']) ){ ?>
		<h1><?php echo sprintf( $term_meta['cat_archive_page_head'], $term->name ); ?></h1>
<?php }	?>
		<p><?php echo $term->description ?></p>
		<ul id="product-promo"><?php if(have_posts()) : while(have_posts()) : the_post(); 
            
            $p_title 	= get_the_title();
            $p_url 		= get_permalink();
            $p_excerpt 	= get_the_excerpt();
            $p_desc	= get_the_content();
            $p_id		= get_the_ID();
            $p_type		= get_post_type($p_id);
            if ( has_post_thumbnail() ){
				$p_img	= get_the_post_thumbnail( $p_id , 'product-small');
            	$thumbid = get_post_thumbnail_id($post->ID);
				$imgcaption = get_post($thumbid )->post_excerpt;
			}else{ 
				$imgcaption = get_the_excerpt();
				$p_img = null;
			}
			
			if($p_type == MBUDM_PT_PRODUCTS){
			
				//end if($p_type == MBUDM_PT_PRODUCTS){
				$col_class = "col" . $colClassNum;
				$colClassNum++;
				if($colClassNum >5){
					$colClassNum  = 3;
				}
				$evenOddClass = $evenClassBool ? "itemEven" : "itemOdd" ;
				$evenClassBool = !$evenClassBool;
				
				?><li class="<?php echo $col_class . ' ' . $evenOddClass ?>">
				<figure class="product-holder">
						<div class="vframe"><!-- used for vertical centering -->
						<a href="<?php echo $p_url ?>" title="<?php echo $p_title ?>" ><?php 	
						if ( has_post_thumbnail() ){ 
							echo $p_img; 
						}else{ 
							echo '<span>'. __('No Image Available',TEMPLATE_DOMAIN) . '</span>';
						 } 
						 ?>
						</a>
						</div>
						<figcaption><?php echo $imgcaption ?></figcaption>
					</figure>
					<div class="product-info">
						<h2><a href="<?php echo $p_url ?>" title="<?php printf(__('More info on %s', TEMPLATE_DOMAIN), $p_title); ?>" ><?php echo $p_title ?></a></h2>
						<p><?php echo $p_excerpt ?></p>
						
						<?php
							/**
							 * Custom meta HTML and loop
							*/		 
							$tdata = "";
							$custom_fields = get_post_custom($p_id );
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
							<li><a class="info-btn" href="<?php echo $p_url ?>" title="<?php printf(__('More info on %s', TEMPLATE_DOMAIN), $p_title); ?>" ><?php _e('More Info', TEMPLATE_DOMAIN); ?></a></li>
							<li><?php mbudm_buy_button($p_id,true); ?></li>
						</ul>
					</div>
				</li><?php 
				}else{ // end check if is product	
					$downloads[] =  array(
										'title' => $p_title, 
										'url' => $p_url,
										'excerpt' => $p_excerpt,
										'desc' => $p_desc,
										'id' => $p_id,
										'post_type' => $p_type,
										'img' => $p_img
					);	
            	}
				endwhile ?></ul>
		<?php else : ?>
	
			<?php include (mbudm_get_template_file_path('noposts.php') ); ?>
			

		<?php endif; ?>
		<?php 
		
		// Reset Post Data
		wp_reset_postdata();
						
		if(count($downloads) > 0){ 
		?>
		<aside>
<?php if(isset($term_meta['cat_archive_downloads_head']) ){ ?>
		<h2><?php echo sprintf( $term_meta['cat_archive_downloads_head'], $term->name ); ?></h2>
<?php }	?>
		
		<ul class="three-cols">
		<?php
		
		$col = 3;

		foreach($downloads as $d){
			
		$colClass = "col" . $col ;
		$col++;
		if($col > 5) $col = 3;
		
		?>
		<li class="<?php echo $colClass ?>" ><a href="<?php echo $d['url'] ?>" title="<?php echo $d['title'] ?>"><?php echo $d['title'] ?></a></li>
		<?php
		}
		?>
		</ul>
		</aside>
		<?php
		} // end if downloads
		?>
		
		</section>
		
		<aside class="col6">
 		<?php get_sidebar('product-cat-left'); ?>
 		</aside>

	    <aside>
			<?php get_sidebar('product-cat-bottom'); ?>
		</aside>
<?php get_footer(); ?>  
