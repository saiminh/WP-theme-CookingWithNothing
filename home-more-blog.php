<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
<div class="article_content">
	<?php
		if ( get_post_type() == 'post' )
			get_template_part( 'entry', 'meta' ); 
	?>
	<header>
	<?php
		if ( is_singular() ) 
			{ echo '<h1 class="entry-title">'; } 
		elseif ( $home_latestrecipes = "1" ) 
			{ echo '<h3 class="entry-title_latestrecipes">'; }
		else 
			{ echo '<h2 class="entry-title">'; } 
	?>
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a>
	<?php 
		if ( is_singular() ) { 
				echo '</h1>'; 				
		} 
		elseif ( $home_latestrecipes = "1" ) 
			{ echo '</h3>'; }
		else 
			{ echo '</h2>'; } 
	?> 

	<!-- <?php edit_post_link(); ?> -->
	</header>
	<?php get_template_part( 'entry', ( is_archive() || is_search() || is_home() ? 'summary' : 'content' ) ); ?>
</div>

<?php if ( !is_search() and is_singular() ) get_template_part( 'entry-footer' ); ?>

</article>