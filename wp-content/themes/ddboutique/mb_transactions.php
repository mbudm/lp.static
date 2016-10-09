<?php
/*
Template Name: MBU Transactions 
*/
?>
<?php get_header(); 
/*
echo("<pre>");
var_dump($wp_query->query_vars);
echo("</pre>");
*/
?>
            
<?php 
$mb_trans_param = isset($wp_query->query_vars['mb_trans']) ? $wp_query->query_vars['mb_trans'] : '';
$has_checkedout = $mb_trans_param == '4' ? true : false ;

// If the user has bought something this session then get the details for that user account
$session_tuid = mbudm_get_last_transaction_user_id();
if($session_tuid == false){
	//echo('No session trans id');
	$session_tuid_obj = false;
}else{
	//echo('Session trans id is: '.$session_tuid );
	$session_tuid_obj = get_userdata( $session_tuid );
}

if ( is_user_logged_in() ){ 
	global $current_user;
	get_currentuserinfo();
	
?>
<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
	<article>
	<h1><?php the_title(); ?></h1>
	<?php the_content(); ?>
	</article>
<?php endwhile ?>	
<?php else : ?>

	<?php include (mbudm_get_template_file_path('noposts.php') ); ?>

<?php endif; ?>
	<section>
<?php 

		// If the user has bought something this session then check they are logged in as that user 
		if( ($session_tuid_obj != false) && ($session_tuid != $current_user->ID) ){
			// is the user here direct from a checkout?
			if($has_checkedout){
				?>
				<p class="alerts"> <?php _e( 'Thanks for purchasing!',TEMPLATE_DOMAIN ); ?></p>
<?php
			}
			?>
			<div class="errors">
			<p><?php printf(__('You are logged in to an account that uses an email address that is different to the email in your PayPal account. We sent the password and login for your recent purchase to: %s.', TEMPLATE_DOMAIN), $session_tuid_obj->user_email); ?></p>
<?php
	$a_title = __('Log out of this account',TEMPLATE_DOMAIN);
	$a_open ='<a href="' . wp_logout_url( get_permalink() ) .'" title="'. $a_title. '">';
	$a_close = '</a>';
?>
			<p><?php printf(_x('%1$sLog out%2$s and sign in with those details to access your purchase(s).','Variables 1 and 2 are the opening and closing tags for a link to the log out script', TEMPLATE_DOMAIN),$a_open,$a_close); ?></p>
			</div>
			<?php
		}else{
			// is the user here direct from a checkout?
			if($has_checkedout){
				?>
				<p class="alerts"> <?php _e( 'Thanks for purchasing! Access your Purchase(s) below',TEMPLATE_DOMAIN ); ?></p>
		<?php
			}
		}
		
		if(isset($_GET['mbp']) && is_numeric($_GET['mbp'])){
		// product download link view
			
			$product_id = (int) $_GET['mbp'];
			
			$product = mbudm_get_user_product_detail($current_user->ID,$product_id);

			$stampedfile_start = strrpos($product[0]->stampedfile,'/') + 1;
			$stampedfile = substr($product[0]->stampedfile,$stampedfile_start);
			
			if(mbudm_get_option(THEMEPREFIX."_use_dlprotect")){
				$url = site_url() . "/wp-content/plugins/download-protect/downloader.php?d=" . mbudm_encrypt(get_option("dlprotect_download_directory") . $stampedfile ) . "&v=" . mbudm_encrypt("private");
			}else{
				$url = $product[0]->stampedfile;
			}
			
			$title_with_cats_plain_text = $product[0]->post_title . ' - ' . mbudm_get_product_cat_tags( $product_id , false);
			
			?>
			<h2><?php printf(__('Download %s',TEMPLATE_DOMAIN),$title_with_cats_plain_text); ?></h2>
			<p>
			<a href="<?php echo $url ?>" title="<?php echo $title_with_cats_plain_text ?>"  class="submit-btn" id="product-download"><?php printf(__('Download your copy of %s',TEMPLATE_DOMAIN),$title_with_cats_plain_text); ?></a></p>
			<ul>
				<li><a href="<?php the_permalink() ?>" title="<?php _e('All transactions',TEMPLATE_DOMAIN); ?>" ><?php _e('Back to all transactions',TEMPLATE_DOMAIN); ?></a></li>
			</ul>
			<?php
			
		}else{
		// list products view
			$products = mbudm_get_user_products($current_user->ID);
		
		?>
		<h2><?php _e('Your purchases',TEMPLATE_DOMAIN); ?></h2>
		<table>
			<thead>
				<th><?php _e('Product',TEMPLATE_DOMAIN); ?></th>
				<th><?php _e('Status',TEMPLATE_DOMAIN); ?></th>
			</thead>
			<tbody>
				<?php 
				
				if(count($products) > 0){
					foreach($products as $p){ 
						$status_html = "";
						switch( $p->status){
							case MBUDM_TRANS_PENDING:
								$status_html = __('Pending',TEMPLATE_DOMAIN);
							break;
							case MBUDM_TRANS_COMPLETED:
								$status_html = '<a class="download_product" href="' . add_querystring_var(get_permalink(), 'mbp', $p->product_id)  .'" title="'.  $p->post_title . '">' . _x('Download','Verb',TEMPLATE_DOMAIN) . '</a>';
							break;
							case MBUDM_TRANS_INITIATED:
							case MBUDM_TRANS_CANCELLED:
							default:
								
							break;
						}
						if(strlen($status_html) > 0){
					?>
					<tr>
						<th> <a href="<?php echo get_permalink($p->product_id) ?>" title="<?php echo $p->post_title ?>" ><?php echo $p->post_title ?></a> <?php echo mbudm_get_product_cat_tags( $p->product_id); ?>
						<p><?php echo $p->post_excerpt ?></p></th>
						<td><?php echo $status_html ?></td>
					</tr>
					<?php
						}
					} 
				}else{ // end if detail/listing
				
				
	$a_title = __('Products',TEMPLATE_DOMAIN);
	$a_open ='<a href="' . PRODUCT_PAGE .'" title="'. $a_title. '">';
	$a_close = '</a>';
				?>
			
					<tr id="noItems">
								<td colspan="2"><?php printf(_x('You haven\'t purchased any %1$sproducts%2$s yet.','Variables 1 and 2 are the opening and closing tags for a link to the products page', TEMPLATE_DOMAIN),$a_open,$a_close); ?></td>
							</tr>
					
				<?php
				}
				?>
			</tbody>
		</table>
		
		<?php
		} // end 
		
		?>
		</section>
		<?php
	}else{	// user not logged in
	?>
	<article class="col7">
	
	<!---
	
	Use a custom var to display some logged out content?
	
	-->
	<?php
		$loggedout_title = get_post_meta($post->ID, "loggedout_title", true);
		if(!empty($loggedout_title) ){
			echo "<h1>" . $loggedout_title . "</h1>";
		}
		// is the user here direct from a checkout?
		if($has_checkedout){
			if(isset($session_tuid_obj)){
				?>
				<p class="alerts"> <?php printf(_x( 'Thanks for purchasing! To access your purchase(s) log in using the details we sent to %s.','The email address from the Paypal account used in the last transaction for this session',TEMPLATE_DOMAIN ),$session_tuid_obj->user_email); ?></p>
<?php
			}else{
				?>
				<p class="alerts"> <?php _e( 'Thanks for purchasing! To to access your purchase(s) log in using the details we sent to your email (The same email address that is used for your PayPal account).',TEMPLATE_DOMAIN ); ?></p>
<?php
			}
		}
		$loggedout_content = get_post_meta($post->ID, "loggedout_content", true);
		if(!empty($loggedout_content) ){
			echo "<p>" . $loggedout_content . "</p>";
		}
		
		// show login form
		mbudm_login_form();
	?>
	</article>
	<aside class="col6">
	<?php 
		get_sidebar(); 
		?>
	</aside>
	<?php
	}
?>

	<aside>
	<?php
	
	get_sidebar("transactions-bottom"); 
	
	?>
	</aside>
    <?php get_footer(); ?>
