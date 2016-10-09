<?php
/*
Template Name: MBU Products 
*/
?>

<?php get_header(); ?>  
			<article id="page-content">
				 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>  
   					 <?php the_content(); ?>
   				 <?php endwhile; else: ?>  
   					<?php include (mbudm_get_template_file_path('noposts.php') ); ?>
    			<?php endif; ?> 
			</article>
			<?php
				get_sidebar('products-top'); 
				
			?>
			<aside>
			<!-- widget area - Mailing list / download modules -->
			<?php get_sidebar('products-bottom'); ?>
			
			</aside>
<?php get_footer(); ?>
