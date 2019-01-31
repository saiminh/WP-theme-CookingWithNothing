<?php get_header(); ?>
<section id="content" role="main">
	<header class="header">
		<h1 class="entry-title"><?php _e( '', 'cookingwithnothing' ); ?><?php single_cat_title(); ?></h1>
		<?php if ( '' != category_description() ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . category_description() . '</div>' ); ?>
	</header>
	<?php 
		if ( is_category( 'cooking' ) ):
	?>
		<div class="category_subnav">
			<!-- <h3 class="category_subnav_header">Jump to:</h3> -->
			<a rel="tag" href="<?php echo esc_url( home_url( '/?tag=breakfast' ) ); ?>">Breakfast</a>
			<a rel="tag" href="<?php echo esc_url( home_url( '/?tag=lunch' ) ); ?>">Lunch</a>
			<a rel="tag" href="<?php echo esc_url( home_url( '/?tag=dinner' ) ); ?>">Dinner</a>
		</div>
		
	<?php endif; ?>
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
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>