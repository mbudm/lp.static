<?php get_header(); ?>
            <section class="col7">
			<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
				<article>
				<h1><?php the_title(); ?></h1>

				<?php the_content(); ?>
				</article>
			<?php endwhile ?>	
			<?php else : ?>
		
				<?php include (mbudm_get_template_file_path('noposts.php') ); ?>	
		
			<?php endif; ?>
			</section>
			<aside class="col6">
 			<?php get_sidebar(); ?>
		</aside>
    <?php get_footer(); ?>
