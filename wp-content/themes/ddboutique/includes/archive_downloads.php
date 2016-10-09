	<?php 
				// check option all || featured
				$display_mode = mbudm_get_option(THEMEPREFIX."_downloads_page_mode");
				
					
				$main_tab_title = $display_mode == "featured" ? __('Featured',TEMPLATE_DOMAIN) : __('All',TEMPLATE_DOMAIN);
				
				if(isset($_GET["dc"])){
					$dc_id = $_GET['dc'];
					$dlist_args = array('tax_query' => array(
							array(
								'taxonomy' => 'mbudm_product_category',
								'field' => 'id',
								'terms' => $dc_id
							)
						),
						'post_type' => 'mbudm_download',
						'orderby' => 'title',
						'order' => 'ASC'
					);
				}else{
					$dc_id = null;
					$dlist_args = array(
						'post_type' => 'mbudm_download',
						'orderby' => 'title',
						'order' => 'ASC'
					);
					if($display_mode == "featured"){
						$sticky_array = get_option( 'sticky_posts' );
						$dlist_args['post__in'] = $sticky_array;
					}
				}
			
				
				query_posts($dlist_args); 
				
				?>
				
			
			<?php
			
			$args=array(
			  'taxonomy' => 'mbudm_product_category',
			  'orderby' => 'name',
			  'order' => 'ASC'
			  );
			$categories=get_categories($args);
			
			$allcatclass = $dc_id ? '' : 'class="active"' ;
			?>
			
			<dl id="category-select">
			<dt><?php __('Show:', TEMPLATE_DOMAIN); ?></dt>
			<dd><a <?php echo $allcatclass ?> href="<?php the_permalink(); ?>" ><?php echo $main_tab_title ?></a></dd><?php
			foreach($categories as $category) { 
				if($dc_id == $category->term_id){
					$catclass =  'class="active"' ;
					$dc_cat = $category; 
				}else{
					$catclass =  '' ;
				}
				$cat_url = add_querystring_var(get_permalink(), 'dc', $category->cat_ID);
				echo '<dd><a ' . $catclass . ' href="' . $cat_url  . '" title="' . sprintf( __( 'View all downloads in %s' , TEMPLATE_DOMAIN), $category->name ) . '" ' . '>' . $category->name.'</a></dd>';
			}
			?>
			</dl>
		

				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>  

					<section>
					<div class="col3 product-info">
						<h2><a href="<?php the_permalink(); ?>"  title="<?php printf(__('Download %s', TEMPLATE_DOMAIN), get_the_title()); ?>"><?php the_title(); ?></a> <?php echo mbudm_get_product_cat_tags( $post->ID ); ?></h2>
						
						<h5><?php echo get_the_excerpt(); ?></h5>
						
						<table class="custom_meta">
							<tbody>
						<?php
							$custom_fields = get_post_custom($post->ID);
							ksort($custom_fields);
							 foreach ( $custom_fields as $key => $value ){
								
									if($key{0} != "_"){
									?>
									
									<tr>
										<th><?php echo $key; ?>: </th>
										<td><?php echo $value[0]; ?></td>
									</tr>
									
									<?php
									}
								}
						?>
				   			</tbody>
						</table><!--close custom_meta-->
					
					</div>
   					<div class="col4">
						<h3><?php _e('Try',TEMPLATE_DOMAIN); ?></h3>
						<figure class="product-holder">
						<div class="vframe">
						<a href="<?php the_permalink(); ?>"  title="<?php printf(__('Download %s', TEMPLATE_DOMAIN), get_the_title()); ?>">
						
						
						<?php
						if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
						  the_post_thumbnail(MBUDM_IMAGESIZE_SMALL);
						  $thumbid = get_post_thumbnail_id($post->ID);
						  $imgcaption = get_post($thumbid )->post_excerpt;
						}else{ 
						  echo '<span>'. __('No Image Available',TEMPLATE_DOMAIN) . '</span>';
						  $imgcaption = get_the_excerpt();
						}
						?>
						</a>
						</div>
						<figcaption><?php echo $imgcaption ?></figcaption>
						</figure>
						<a class="info-btn" href="<?php the_permalink(); ?>" title="<?php printf(__('Download %s', TEMPLATE_DOMAIN), get_the_title()); ?>" ><?php _e('Download', TEMPLATE_DOMAIN) ?></a>
					</div>
					<?php
					$related_product = get_post_meta($post->ID, MBUDM_MK_RELATED_PRODUCT, true);
					if( !empty($related_product) ){ 
					?>
					<div class="col5">
						<h3><?php _e('Buy', TEMPLATE_DOMAIN) ?></h3>
						<?php
						//$args = 
						
						$related_product_query = new WP_Query(array('post_type'=>'mbudm_product', 'p' => $related_product));

						// The Loop
						while ( $related_product_query->have_posts() ) : $related_product_query->the_post();
							?>
							<figure class="product-holder">
							<div class="vframe">
							<a href="<?php the_permalink(); ?>" class="img-view" title="<?php printf(__('Buy %s', TEMPLATE_DOMAIN), get_the_title()); ?>">
							<?php
							if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
							  the_post_thumbnail(MBUDM_IMAGESIZE_SMALL);
							  $thumbid = get_post_thumbnail_id($post->ID);
							  $imgcaption = get_post($thumbid )->post_excerpt;
							}else{ 
							  echo '<span>'. __('No Image Available',TEMPLATE_DOMAIN) . '</span>';
							  $imgcaption = get_the_excerpt();
							}
							?>
							</a>
							</div>
							<figcaption><?php echo $imgcaption ?></figcaption>
							</figure>
							<?php mbudm_buy_button(); ?>
						
						
						<?php
						
						endwhile;
						
						// Reset Post Data
						wp_reset_postdata();
						
						?>

					</div>
					<?php } ?>
					</section>
					
					<hr />
   				 <?php endwhile; else: ?>  
   				
					<section>
					<?php
					
						$no_downloads_msg = $dc_cat ? sprintf( __( "No %s downloads available." , TEMPLATE_DOMAIN), $dc_cat->name ) : __( "No downloads available.", TEMPLATE_DOMAIN) ;
					?>
   					<h5><?php echo $no_downloads_msg ?></h5>  
   					</section>
   					<hr />
    			<?php endif; ?>  

				<?php wp_reset_query(); ?>

			<aside>
			<!-- Mailing list / buy modules -->
			<?php get_sidebar('downloads-bottom');  ?>
			</aside>
