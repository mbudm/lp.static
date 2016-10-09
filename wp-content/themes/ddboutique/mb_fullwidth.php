<?php
/*
Template Name: MBU Full Width 
*/
?>

<?php get_header(); ?>  
			<article id="page-content">
				 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>  
				 	 <h1><?php the_title(); ?></h1>
   					 <?php the_content(); ?>
   				 <?php endwhile; else: ?>  
   					<?php include (mbudm_get_template_file_path('noposts.php') ); ?> 
    			<?php endif; ?> 
			</article>
<?php get_footer(); ?>
