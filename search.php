<?php get_header(); ?>
<section id="content" role="main">
	<?php if ( have_posts() ) : ?>
		<header class="header">
			<h1 class="entry-title">Search Results for</h1>
			<div class="archive-meta">
				"<?php echo get_search_query(); ?>"
			</div>
		</header>
		<?php $i = 0; // This whole extra code is to create rows for column layouts ?>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
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
	<?php else : ?>
		<article id="post-0" class="post no-results not-found">
			<header class="header">
				<h2 class="entry-title"><?php _e( 'Nothing Found', 'cookingwithnothing' ); ?></h2>
			</header>
			<section class="entry-content">
				<p><?php _e( 'Sorry, nothing matched your search. Please try again.', 'cookingwithnothing' ); ?></p>
				<?php get_search_form(); ?>
			</section>
		</article>
	<?php endif; ?>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>