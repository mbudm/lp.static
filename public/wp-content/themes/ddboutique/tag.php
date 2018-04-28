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
	
			<?php include (mbudm_get_template_file_path('noposts.php') ); ?>
			

		<?php endif; ?>     
		</section>
		<aside class="col6">
 			<?php get_sidebar(); ?>
		</aside>

<?php get_footer(); ?>  
