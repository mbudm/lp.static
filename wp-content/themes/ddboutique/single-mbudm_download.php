<?php

/*session_start();*/

if (isset($_SESSION['token']) && isset($_POST['timecheck']) && ( $_POST['timecheck'] == $_SESSION['token']))
{
	$post_name = htmlentities($_POST['username']) == '' ? 'Anonymous' : htmlentities($_POST['username']);
	$post_email = htmlentities($_POST['useremail']);
	
	// process any mailing list signups
	$m_signup = isset($_POST['mbudm_mailing_list_signup']);
	
	//var that collects the new user id of a mailing list subscriber when their account is created
	$signup_user_id = false;
	
	if($m_signup){
		$post_email_valid = filter_var($post_email, FILTER_VALIDATE_EMAIL);
		if($post_email_valid){
			// is email subscribed?
			$email_user_id = email_exists($post_email);
			$is_email_signedup = get_user_meta($email_user_id, MBUDM_UMK_MAILING_LIST, true); 	
		}
			
		if($m_signup && !$is_email_signedup){
			if($post_email_valid){
				$message = __('Thanks for signing up to the Linguaposta mailing list. To confirm your subscription click on this link:',TEMPLATE_DOMAIN) . '\r\n';
				// add user if doesn't exist
				if(!$email_user_id ){
					//create account and log them in
					$random_password = wp_generate_password( 12, false );
					
					$creds = array();
					$creds['user_login'] = $post_email;
					$creds['user_password'] = $random_password ;
					$creds['remember'] = true;
					$signup_user = wp_signon( $creds, false );
					if ( is_wp_error($signup_user) )
					   echo $signup_user->get_error_message();
					$signup_user_id = $signup_user->ID;
					$message .=__('To cancel your subscription just log in to our memeber area. Here are your new login details that we have created for you:',TEMPLATE_DOMAIN) . '\r\n' . _('User name:',TEMPLATE_DOMAIN). ' '. $creds['user_login'] .'\r\n' . __('Password:',TEMPLATE_DOMAIN). ' '. $creds['user_password'] .'\r\n';
				}else{
					$signup_user_id = $email_user_id;
					$message .=__('You have an account with us already but since you were not logged in, we ask that you confirm your email address before we add you to our list.',TEMPLATE_DOMAIN) . '\r\n';
				}
				
				// set mailing list status for user to pending
				update_user_meta($signup_user_id, MBUDM_UMK_MAILING_LIST, MBUDM_MAILING_LIST_PENDING);
				
				// send confirmation email
				$subject = __("Confirm your Linguaposta mailing list subscription",TEMPLATE_DOMAIN);
				$headers = 'From: '. mbudm_get_option(THEMEPREFIX."_mail_name") .' <'. mbudm_get_option(THEMEPREFIX."_mail_address") .'>' . "\r\n";
				wp_mail($post_email, $subject, $message, $headers);
				
			}
		}

	} // end if m_signup
	if($signup_user_id){
		$user_id = $signup_user_id;
	}else if(is_user_logged_in()) {
		$user_id = get_current_user_id();
	}else{
		$user_id = null;
	}
	$stampedFile = mbudm_stampFile($user_id,$post->ID,$post_name,$post_email);		
	
	$stampedfile_start = strrpos($stampedFile,'/') + 1;
	$stampedfileName = substr($stampedFile,$stampedfile_start);
	
	$submitted = true;
    $_SESSION['dl'] = $stampedFile;
    $meta_refresh = '<meta http-equiv="refresh" content="2;url='.get_bloginfo('template_directory').'/download.php">';
}else{
	$submitted = false;
}

$token = md5(uniqid(rand(), true));
$_SESSION['token'] = $token;

?>
<?php get_header(); ?>
		<section class="col7">
			 <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
			 <article>
			 	<div class="product-info col8">
					<?php
						$downloadtitle = get_the_title();
						$downloadtitle_with_cats = $downloadtitle . ' ' . mbudm_get_product_cat_tags( get_the_ID() ); 
					?>
					<h2><?php echo $downloadtitle_with_cats ?></h2>
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
						
					<?php the_content(); ?>
				
				</div>
				<div class="p-holder-wrap col9">
				<figure class="product-holder">
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
						$img_markup = get_the_post_thumbnail($post->ID,'product-medium');
						$imgcaption = get_post($thumbid )->post_excerpt;
						$title_att = the_title_attribute('echo=0'); /* could use image title as an option */
					}else{ 
						$title_att = the_title_attribute('echo=0');
						$img_markup =  '<div><span>'. __('No Image Available',TEMPLATE_DOMAIN) . '</span></div>';
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
			   </article>
				<section id="download-actions">
					<?php
						if(!$submitted):
						
							// hide mailing list signup if user is signed up already
							// prepopulate with name/email if they are logged in but not signed up
							// is logged in and signed up to the mailing list?
							if ( is_user_logged_in() ){ 
								global $current_user;
								get_currentuserinfo();
								$signedupflag = get_user_meta($current_user->ID, MBUDM_UMK_MAILING_LIST, true);  
							}else{
								$signedupflag = false;
							}
							
							$is_on_mailing_list = $signedupflag == MBUDM_MAILING_LIST_SUBSCRIBED || $signedupflag == MBUDM_MAILING_LIST_PENDING ? 1 : 0 ;
							$u_name = $current_user ? $current_user->user_firstname : '' ;
							$u_email = $current_user ? $current_user->user_email : '' ;
					
					
							$download_request_mode = mbudm_get_option(THEMEPREFIX."_download_request_mode");
							switch($download_request_mode){
								case 'none':
									$show_ml_form = false;
								break;
								case 'optional':
									$show_ml_form = !$is_on_mailing_list;
								break;
							}
							
					?>
					<h4><?php printf(__('Download %s',TEMPLATE_DOMAIN),'<strong>'. $downloadtitle .'</strong>'); ?></h4>
					<!-- Mailing list/download link show ifirst-->
						<form action="<?php echo get_permalink(); ?>" id="request-download" class="f-compact" method="POST">
							<?php
							if($show_ml_form){
							?>
							<p><?php printf(__('To download your copy of %s enter your name and email address.',TEMPLATE_DOMAIN),$downloadtitle); ?></p>
							<?php 
							}else{
							?>
							<p><?php printf(__('Download your copy of %s.',TEMPLATE_DOMAIN),$downloadtitle); ?></p>
							<?php
							}
							?>
							<input type="hidden" value="<?php echo $token ?>" name="timecheck" />
							<input type="hidden" value="<?php echo $downloadtitle ?>" name="download-title" id="download-title" />
							<?php
							if($show_ml_form){
							?>
							<ul>
								<li class="multiple">
									<label for="request-download-username" ><?php _e('Your Name',TEMPLATE_DOMAIN); ?></label>
									<input type="text" id="request-download-username" name="username" value="<?php echo $u_name ?>" placeholder="<?php _e('Your Name',TEMPLATE_DOMAIN); ?>" />
									<label for="request-download-useremail" ><?php _e('Your Email',TEMPLATE_DOMAIN); ?></label>
									<input type="text" id="request-download-useremail" name="useremail" value="<?php echo $u_email ?>" placeholder = "<?php _e('Your Email',TEMPLATE_DOMAIN); ?>" />				
								</li>
							
								<li class="cb">
									<label><input type="checkbox" name="mbudm_mailing_list_signup"  /><?php printf(__('Sign up to the %s mailing list.',TEMPLATE_DOMAIN),get_option('blogname')); ?></label>
								</li>
								<li class="submit-actions">
									<input class="submit-btn" type="submit" value="<?php _e('Download Free Sample',TEMPLATE_DOMAIN); ?>" />
								</li>
							</ul>
							<?php 
							}else{
							?>
							<input class="submit-btn" type="submit" value="<?php _e('Download Free Sample',TEMPLATE_DOMAIN); ?>" />
							<?php
							}
							?>
						</form>
						
					<?php
						else:
					?>
						<!-- Download link - show after above form has been submitted -->
						<h4><?php printf(__('Thanks for trying  %s',TEMPLATE_DOMAIN),'<strong>'.$downloadtitle.'</strong>'); ?></h4>
						<?php if($post_name != 'Anonymous'){ ?>
						<p><?php printf(__('Hello %s , thanks for joining our mailing list!',TEMPLATE_DOMAIN),$post_name); ?></p>
						<?php } ?>
						<p class="alerts"><?php printf(__('%s should shortly save to the default download location on your computer.',TEMPLATE_DOMAIN),'<strong>' .$downloadtitle. '</strong>'); ?></p>
						<p><?php printf(__('If the file does not download then you can click the button below to manually download it. If you have trouble finding it, search for the following filename: %s',TEMPLATE_DOMAIN),'<strong>' .$stampedfileName. '</strong>'); ?></p>
						<a class="info-btn" href="<?php echo $stampedFile ?>" target="mb_download" title="<?php printf(__('Download  %s',TEMPLATE_DOMAIN),$downloadtitle); ?>" ><?php printf(__('Manually download  %s',TEMPLATE_DOMAIN),$downloadtitle); ?></a>
					<?php
						endif;
					?>
					</section>
<?php
	$related_product = get_post_meta($post->ID,MBUDM_MK_RELATED_PRODUCT,true);				
	if(!empty($related_product)){
?>
					<section id="upgrade-promo">
	<?php
	$stored_val_title = get_post_meta($post->ID,'_mb_related_product_title',true );
	$stored_val_text = get_post_meta( $post->ID,'_mb_related_product_text',true );
	$related_product_query = new WP_Query(array('post_type'=>'mbudm_product', 'p' => 		$related_product));
						// The Loop
						while ( $related_product_query->have_posts() ) : $related_product_query->the_post();
						
							?>
							<figure class="product-holder">
								<div class="vframe">
								<a href="<?php the_permalink(); ?>" class="img-view" title="Buy <?php the_title(); ?>">
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
							
							<h2><?php echo $stored_val_title ?></h2>
							<p><?php echo $stored_val_text ?></p>

							<ul class="cfix">
								<li><a class="info-btn" href="<?php the_permalink(); ?>" title="<?php printf(__('More Info on %s',TEMPLATE_DOMAIN),get_the_title()); ?>" ><?php _e('More Info',TEMPLATE_DOMAIN); ?></a></li>
								<li>
								<?php mbudm_buy_button($post->ID,true); ?>
								</li>
							</ul>
						<?php
						
						endwhile;
						
						// Reset Post Data
						wp_reset_postdata();
						
						?>
				</section>
<?php
		} // if related product

?>				
				<section id="comments_template">
					<?php comments_template( '/product-comments.php' ); ?>
				</section>
				
				
				<?php endwhile; ?>
				<?php else: ?>
				
					<?php include (mbudm_get_template_file_path('noposts.php') ); ?>

				
				<?php endif; ?>
				
				</section>
				<aside class="col6">
					<?php get_sidebar('download-left'); ?>
				</aside>
			<aside>
			<?php get_sidebar('download-bottom'); ?>
			</aside>
				
<?php get_footer(); ?>
