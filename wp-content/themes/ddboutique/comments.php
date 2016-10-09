<?php
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');
if ( post_password_required() ) {
	_e( 'This post is password protected. Enter the password to view comments.',TEMPLATE_DOMAIN);
	return;
}

	$reqval = $req ? '<strong>' .__('(required)',TEMPLATE_DOMAIN) . '</strong>' : '' ;
?>

<?php if ( have_comments() ) : ?>
    <h3 id="comments"><?php comments_number('No Comments', 'One Comment','% Comments');?></h3>
     
    <ul class="commentlist">
		<?php wp_list_comments('type=comment&avatar_size=55'); ?>
	</ul>

<?php if ( !empty($comments_by_type['pings']) ) : ?>
    <h3 id="trackbacks"><?php _e('Trackbacks and Pingbacks',TEMPLATE_DOMAIN); ?></h3>
	<ul class="commentlist">
		<?php wp_list_comments('type=pings'); ?>
	</ul>
<?php endif; ?>
     
    <div class="navigation">
        <div class="alignleft"><?php previous_comments_link() ?></div>
        <div class="alignright"><?php next_comments_link() ?></div>
    </div>
    
<?php else : // this is displayed if there are no comments so far ?>

		<?php if ($post->comment_status == 'open') : ?>
        <p id="comment-prompt"><?php _e('There are no comments yet, add one below.',TEMPLATE_DOMAIN); ?></p>
    <?php else : ?>
        <p id="comment-prompt"><?php _e('Comments are closed.',TEMPLATE_DOMAIN); ?></p>
    <?php endif; ?>

<?php endif; ?>



<?php if ('open' == $post->comment_status) : ?>

     <div id="respond">   
        <h2><?php comment_form_title( 'Leave a Comment', 'Leave a Reply to %s' ); ?></h2>
    
        <?php if ( get_option('comment_registration') && !$user_ID ) {
        $url_open = '<a href="' . home_url() . '/wp-login.php?redirect_to=' .get_permalink() . '">';
        $url_close = '</a>';
        ?>
        <p><?php printf(_x('You must be %1$s logged in %2$s to post a comment.','Variables 1 and 2 are the opening and closing tags for a link to the login page',TEMPLATE_DOMAIN),$url_open,$url_close); ?></p>
    
        <?php }else{ ?>
        <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
            
            <?php comment_id_fields(); ?>
            <ul>
            <?php if ( $user_ID ) : ?>
    
                <li><?php printf(__('Logged in as %s.',TEMPLATE_DOMAIN),'<a href="' .get_option('siteurl') .'/wp-admin/profile.php">' . $user_identity. '</a>'); ?>
                <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="<?php _e('Log out of this account',TEMPLATE_DOMAIN); ?>"><?php _e('Logout',TEMPLATE_DOMAIN); ?></a></li>
            <?php else : ?>
                <li>
                	<label for="author"><?php _e('Name',TEMPLATE_DOMAIN); ?> <?php echo $reqval ?></label>
                	<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" class="input" />
                </li>
    			<li>
    				<label for="email"><?php _e('Mail',TEMPLATE_DOMAIN); ?> <?php echo $reqval ?><small><?php _e('(will not be published)',TEMPLATE_DOMAIN); ?></small></label>
    				<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="50" class="input" />
                </li>
                <li>
                	<label for="url"><?php _e('Website',TEMPLATE_DOMAIN); ?></label>
                	<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="50"  class="input"/>
                </li>
            <?php endif; ?>
            
            <li>
            	<label for="comment"><?php _e('Comment',TEMPLATE_DOMAIN); ?></label>
            	<textarea name="comment" id="comment" rows="7" tabindex="4"></textarea></li>
    
            <li><input class="submit-btn" name="submit" type="submit" id="submit" tabindex="5" value="<?php _e('Submit Comment',TEMPLATE_DOMAIN); ?>" />
        
            </li>
    		</ul>
            <?php do_action('comment_form', $post->ID); ?>
    
        </form>
        
        <div id="cancel-comment-reply">
			<small><?php cancel_comment_reply_link() ?></small>
    	</div>

	</div>

<?php } ?>
<?php endif; ?>
