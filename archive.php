<?php get_header(); ?>
<section id="content" role="main">
	<header class="header">
		<h1 class="entry-title"><?php 
			if ( is_day() ) { printf( __( 'Daily Archives: %s', 'cookingwithnothing' ), get_the_time( get_option( 'date_format' ) ) ); }
			elseif ( is_month() ) { printf( __( 'Monthly Archives: %s', 'cookingwithnothing' ), get_the_time( 'F Y' ) ); }
			elseif ( is_year() ) { printf( __( 'Yearly Archives: %s', 'cookingwithnothing' ), get_the_time( 'Y' ) ); }
			else { _e( 'Archives', 'cookingwithnothing' ); }
			?></h1>
		</header>
		<?php $i = 0; ?>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php
			if($i == 0) {
				echo '<div class="ng-row">';
			}
		?>
			<?php get_template_part( 'entry' ); ?>

			<?php
				$i++;
				if($i == 2) {
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