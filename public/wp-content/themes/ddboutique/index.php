<?php get_header(); ?>  
		<section class="col7">
 		<?php

		 if(have_posts()) : while(have_posts()) : the_post(); ?>
            <article>
			<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
			<small><?php the_time('M d'); ?>. <?php the_category(', '); ?></small>
			
			<?php the_content(' Read more'); ?>
			</article>
		<?php endwhile ?>	

			<div id="posts_navigation">
				<?php previous_posts_link(); ?>		
				<?php next_posts_link(); ?>
			</div>

		<?php else : ?>
	
				<h2 class="center"><?php _e('Not Found',TEMPLATE_DOMAIN); ?></h2>
			
			<p class="center"><?php _e('Sorry, but you are looking for something that isn\'t here.',TEMPLATE_DOMAIN); ?></p>
			<?php get_search_form() ?>
			

		<?php endif; ?>     
		</section>
		<aside class="col6">
 			<?php get_sidebar(); ?>
		</aside>

<?php get_footer(); ?>  
