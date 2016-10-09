<?php
/*
Template Name: MBU Home 
*/
?>

<?php get_header(); ?> 
			<!-- home-top - for full width banner -->
			<?php get_sidebar('home-top'); ?>
			<article id="page-content">
				 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>  
   					 <?php the_content(); ?>
   				 <?php endwhile; else: ?>  
   					<?php include (mbudm_get_template_file_path('noposts.php') ); ?>
    			<?php endif; ?> 
			</article>
			<div class="col1">
				<?php get_sidebar('home-left'); ?>
			</div>
     		<div class="col2">
     			<?php get_sidebar('home-right'); ?>
			</div>
			<?php get_sidebar('home-bottom'); ?>
			
<?php get_footer(); ?>  
