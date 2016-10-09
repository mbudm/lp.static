		</div> <!--#content -->
		
	<footer>

		<?php 
		
			mbudm_get_navigation("footer");
			
		?>
		
		<small>
		<span>&copy; <?php the_time('Y'); ?> <?php bloginfo('name'); ?></span>  
		<a href="<?php bloginfo('rss2_url'); ?>"><?php _e('RSS',TEMPLATE_DOMAIN); ?></a>
		<?php
		if(!mbudm_get_option(THEMEPREFIX."_theme_credit")){
		?>
		<span id="creditlink">Theme: <a href="http://themeforest.net/user/mbudm?ref=mbudm" title="This site uses the <?php echo THEMENAME ?>, available from Theme Forest "><?php echo THEMENAME ?></a></span>
		<?php
		}
		?>
		</small>
		
		
	</footer>  
	</div><!-- #wrap -->
	
	<?php wp_footer(); ?>
</body>
</html>
