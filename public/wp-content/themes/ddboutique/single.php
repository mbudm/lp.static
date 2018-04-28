<?php get_header(); ?>
            <section class="col7">
				 <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
				 <article>
				 		<h1><?php the_title(); ?></h1>
                        
                        <?php the_content(); ?>
						<?php
						$authlink = '<a href="'.get_author_posts_url(get_the_author_meta( 'ID' )) .'">' .get_the_author_meta('display_name').'</a>';
						$ptime= get_the_time('M d');
						$cats= get_the_category_list(', ');
						$tags= get_the_tag_list('');
						?>
                        <small><?php printf(_x('By %1$s. %2$s in %3$s. %4$s','Var 1 author name and link, var 2 is the date of the post (M d), var 3 is the categories and var 4 is the tag list',TEMPLATE_DOMAIN),$authlink,$ptime,$cats,$tags); ?></small>
                         
				</article>
                    <?php endwhile; ?>
                    <?php else: ?>
						<?php include (mbudm_get_template_file_path('noposts.php') ); ?>
                    <?php endif; ?>

                    <section id="comments_template">
                        <?php comments_template(); ?>
                    </section>
			</section>
			<aside class="col6">
 			<?php get_sidebar(); ?>
		</aside>
<?php get_footer(); ?>
