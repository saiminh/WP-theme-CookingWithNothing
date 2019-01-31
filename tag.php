<?php get_header(); ?>
<section id="content" role="main">
<header class="header">
	<div class="archive-meta">
	<p>All things</p>
</div>
<h1 class="entry-title"><?php _e( '', 'cookingwithnothing' ); ?><?php single_tag_title(); ?></h1>

</header>
<?php $i = 0; ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<?php if (is_search() ) { search_excerpt_highlight(); } ?>
<?php
	if($i == 0) {
		echo '<div class="ng-row">';
	}
?>
	<?php get_template_part( 'entry' ); ?>

	<?php
		$i++;
		if($i == 3) {
			$i = 0;
			echo '</div>';
		}
	?>
<?php endwhile; endif; ?>
<?php
	if($i > 0) {
		echo '</div>';
	}
?>
<?php get_template_part( 'nav', 'below' ); ?>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>