<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
			if ( is_category() ) { echo '<div class="thumbnail_category">'; }

			if ( !is_singular() && has_post_thumbnail() ) { 
				echo '<a href="'; 
				the_permalink(); 
				echo '" title="<?php the_title_attribute(); ?>" rel="bookmark">';
				the_post_thumbnail(); 
				echo '</a>';
			}
			if ( is_category() ) { echo '</div>'; } 
	?>
<div class="article_content">
	<?php
		if ( !is_search() ) 
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
				if ( has_post_thumbnail() ) { 
					echo '<div class="thumbnail_single">';
					the_post_thumbnail(); 
					echo '</div>';
				}
		} 
		elseif ( $home_latestrecipes = "1" ) 
			{ echo '</h3>'; }
		else 
			{ echo '</h2>'; } 
	?> 

	<!-- <?php edit_post_link(); ?> -->
	</header>
	<?php get_template_part( 'entry', ( is_archive() || is_search() ? 'summary' : 'content' ) ); ?>
</div>

<?php if ( !is_search() ) get_template_part( 'entry-footer' ); ?>

</article>