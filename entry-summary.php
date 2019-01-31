<section class="entry-summary">
	<?php 	if (is_search() ) { search_excerpt_highlight(); } 
			else { the_excerpt(); } 
	?>
<?php if( is_search() ) { ?><div class="entry-links"><?php wp_link_pages(); ?></div><?php } ?>
</section>