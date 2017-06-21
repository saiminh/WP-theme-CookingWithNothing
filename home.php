<?php get_header(); ?>
<section id="content" role="main">

<!-- Latest Article -->
<?php
	$catquery = new WP_Query( 'cat=4&posts_per_page=1' );
	if ( $catquery->have_posts() ) : while ( $catquery->have_posts() ) : $catquery->the_post(); ?>
<div class="home_latestarticle_wrapper">
	<?php get_template_part( 'entry-home-feature' ); ?>
</div>
<?php endwhile; endif; ?>

<!-- Latest Recipes -->
<div class="home_latestrecipes_wrapper">
<h2 class="home_latestrecipes_wrapper_header">Latest Recipes</h2>
<?php
	$catquery = new WP_Query( 'cat=2&posts_per_page=3' );
	if ( $catquery->have_posts() ) : while ( $catquery->have_posts() ) : $catquery->the_post(); ?>
<?php 	$home_latestrecipes = "1";
		get_template_part( 'entry' );
		$home_latestrecipes = "0"; ?>
<?php endwhile; endif; ?>
</div>
<?php get_template_part( 'nav', 'below' ); ?>

</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>