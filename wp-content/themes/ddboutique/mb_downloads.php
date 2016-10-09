<?php
/*
Template Name: MBU Downloads 
*/
?>

<?php get_header(); ?>  

				 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?> 
				 <article>
				 	<h1><?php the_title(); ?></h1>
   					<?php the_content(); ?>
   				</article>
   				 <?php endwhile; else: ?>  
   					<?php include (mbudm_get_template_file_path('noposts.php') ); ?>
    			<?php endif; ?>  
				
<?php
include_once(mbudm_get_template_file_path('archive_downloads.php') );
?>
<?php get_footer(); ?>  
