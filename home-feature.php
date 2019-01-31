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
	<?php get_template_part( 'entry', 'summary' ); ?>
</div>
</article>
<!-- <div class="browseby">
	<h2 class="tag-title">Browse by meal type:</h2>
	<a href="" rel="tag">Breakfast</a> <a href="" rel="tag">Lunch</a> <a href="" rel="tag">Dinner</a> <a href="" rel="tag">Desert</a>
	<h2 class="tag-title">Popular topics:</h2>
	<a href="" rel="tag">Seasonal</a> <a href="" rel="tag">FMT</a> <a href="" rel="tag">Low FODMAP</a> <a href="" rel="tag">Sugar-free</a>
</div> -->