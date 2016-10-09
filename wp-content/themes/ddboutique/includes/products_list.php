<ul class="three-cols">
<?php

$col = 1;

foreach ( $query as $product ) :
	setup_postdata( $product );
	
	//$colClass = "item" . $col ;
	$colClass = "col" . ($col+2) ;
	$col++;
	if($col > 3) $col = 1;
?>
	<li class="<?php echo $colClass ?>">
			<?php
			
			$fp_title 	= get_the_title( $product->ID );
			$fp_title_cats = mbudm_get_product_cat_tags( $product->ID );
			$fp_url		= get_permalink( $product->ID );
			?>
			
			<a href="<?php echo $fp_url ?>" title="<?php echo $fp_title ?>" >
			<?php echo $fp_title ?>			
			</a> <?php echo $fp_title_cats ?>
    </li>
<?php endforeach; 
?>
</ul>
