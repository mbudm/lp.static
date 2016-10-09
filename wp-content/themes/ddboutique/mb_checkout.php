<?php
/*
Template Name: MBU Checkout 
*/
?>
<?php get_header(); 

/*
echo("<pre>");
var_dump($wp_query->query_vars);
echo("</pre>");
*/
?>
            
			<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

				 <h1><?php the_title(); ?></h1>

				<?php the_content(); ?>
			<?php endwhile ?>	
			<?php else : ?>
		
			<?php include (mbudm_get_template_file_path('noposts.php') ); ?>
		
			<?php endif; ?>
			<?php
			
			$cart_ids = mbudm_getCartAsIDs();
			$cclass= count($cart_ids) ? 'class="cart_has_items"' : 'class="cart_empty"' ;
			
			?>
			<section id="checkout" <?php echo $cclass ?> >
			<?php
			
			$plist_args = array(
				'orderby' => 'title',
				'order' => 'ASC',
				'post__not_in' => $cart_ids,
				'post_type' => 'mbudm_product'
			);
			
			// The Query
			$the_plist_query = new WP_Query( $plist_args );
			
			$select_message = count($cart_ids) > 0 ? __("Select another product", TEMPLATE_DOMAIN )  : __("Select a product", TEMPLATE_DOMAIN )  ;
			
			if($the_plist_query->post_count > 0){
			?>
			<form id="addProduct" action='<?php the_permalink(); ?>' METHOD='POST'>
				<select name="mb_addp" id="mb_addp">
					<option value="" ><?php echo $select_message ?></option>
				<?php
				// The Loop
				while ( $the_plist_query->have_posts() ) : $the_plist_query->the_post();
					?>
					<option value="<?php echo $post->ID ?>" ><?php the_title(); ?> - <?php echo mbudm_get_product_cat_tags( get_the_ID(), false ); ?></option>
				<?php
				endwhile;
				
				// Reset Post Data
				wp_reset_postdata();
				
				?>
				</select>
				<input type="submit" class="btn submit-btn" name="mbudm_add_product" value="<?php _e('Add to order',TEMPLATE_DOMAIN); ?>"/>
			</form>
			
				<?php
			}
			
			?>
			<table>
				<thead>
					<tr>
						<th><?php _e('Item Description',TEMPLATE_DOMAIN); ?></th>
						<th class="currency-cell"><?php _e('Price',TEMPLATE_DOMAIN); ?></th>
					</tr>
				</thead>
				<tbody>
					<?php
					// get items in cart
					$page_permalink = $_SERVER['REQUEST_URI'];
					//remove any add or remove get vars.
					$page_permalink = remove_querystring_var($page_permalink,'mb_removep');
					$page_permalink = remove_querystring_var($page_permalink,'mb_addp');
					$products = mbudm_getCartAsPosts();
					$products_summary = '';
					if($products) : foreach($products as $post) : setup_postdata($post);
					
					$products_summary .= strlen($products_summary) > 0 ? ', ' . get_the_title() : get_the_title() ;
					?>
					
					<tr>
						<th><h4><a href="<?php the_permalink();  ?>" title="<?php  the_title();  ?>" ><?php  the_title();  ?></a> <?php echo mbudm_get_product_cat_tags( get_the_ID() ); ?></h4>
		<?php the_excerpt(); ?>
</th>
						<td class="currency-cell"><?php echo mbudm_the_product_price($post->ID,true); ?><a class="removeProduct" href="<?php echo add_querystring_var($page_permalink,'mb_removep',$post->ID); ?>" title="<?php printf(__('Remove %s from cart',TEMPLATE_DOMAIN),get_the_title()); ?>"><span class="accessibility"><?php _e('Remove product',TEMPLATE_DOMAIN); ?></span></a></th>
						</tr>
					
					<?php endforeach; ?>
					<?php wp_reset_postdata(); ?>
					<?php else : ?>
					
					<tr id="noItems">
						<td colspan="2"><?php _e('You haven\'t added any products to your order. Use the menu above to easily add products.',TEMPLATE_DOMAIN); ?></td>
					</tr>
					<?php endif; ?>
				</tbody>
			</table>
			
			
			<table id="total">
				<tr>
					<th><?php _e('Total',TEMPLATE_DOMAIN); ?></th>
					<td class="currency-cell"><?php echo mbudm_getCartTotal(false,true) ?></td>
				</tr>
			</table>

			<form id="paypalPurchase" action='<?php echo get_permalink(); ?>' METHOD='POST'>
				<input type="hidden" name="mbudm_checkout" value="1"/>
				<input type="hidden" name="mbudm_checkout_payment_option" value ="PayPal" />
				<input type="hidden" name="mbudm_cart_summary" id="mbudm_cart_summary" value ="<?php echo $products_summary ?>" />
				<input type="hidden" name="mbudm_cart_value" id="mbudm_cart_value" value ="<?php echo mbudm_getCartTotal(true) ?>" />
				<input type='image' name='checkout_submit' id="checkout_submit" src='https://www.paypal.com/en_US/i/btn/btn_dg_pay_w_paypal.gif' alt='<?php _e('Pay with PayPal',TEMPLATE_DOMAIN); ?>'/>		
				<small><?php _e('Don\'t have a PayPal account? That\'s okay, you can pay with all major credit cards via PayPal without having to set up an account.',TEMPLATE_DOMAIN); ?></small>
			</form>
		</section>


    <?php get_footer(); ?>
