<article id="post-<?php the_ID(); ?>" class="home_latestarticle">
<header class="home_latestarticle_header">
 <?php edit_post_link(); ?> 
</header>
<div class="home_latestarticle_thumbnail">
	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
		<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
	</a>
</div>
<div class="home_latestarticle_content">
	<!-- <div class="home_latestarticle_tag">
		The Latest 
	</div> -->
	<?php
		get_template_part( 'entry', 'meta' ); 
	?>
	<h2 class="entry-title">
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a>
	</h2>
	<?php get_template_part( 'entry', ( is_archive() || is_search() ? 'summary' : 'content' ) ); ?>
	<?php get_template_part( 'entry-footer' ); ?>
</div>
</article>