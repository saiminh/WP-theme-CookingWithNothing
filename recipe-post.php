<?php  /* 
		* Template Name: Recipe 
	    * Template Post Type: post
		*/  
get_header(); ?>

<section id="content" role="main">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
	<?php // get_template_part( 'entry' ); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="article_content">
		<?php
			if ( !is_search() ) 
				get_template_part( 'entry', 'meta' ); 
		?>
		<header>
		<h1 class="entry-title">			
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h1>

		<!-- <?php edit_post_link(); ?> -->
		</header>
		<?php get_template_part( 'entry', ( is_archive() || is_search() ? 'summary' : 'content' ) ); ?>
		<button class="toggle-cookmode">Cookmode on!</button>
	</div>

	</article>

	<div class="recipe">
		<a class="toggle-cookmode close-cookmode">Exit Cookmode 
			<svg version="1.1" id="Layer_1" class="svg-icon closex" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
				 viewBox="0 0 492 492" style="enable-background:new 0 0 492 492;" xml:space="preserve">
				<path d="M300.188,246L484.14,62.04c5.06-5.064,7.852-11.82,7.86-19.024c0-7.208-2.792-13.972-7.86-19.028L468.02,7.872
						c-5.068-5.076-11.824-7.856-19.036-7.856c-7.2,0-13.956,2.78-19.024,7.856L246.008,191.82L62.048,7.872
						c-5.06-5.076-11.82-7.856-19.028-7.856c-7.2,0-13.96,2.78-19.02,7.856L7.872,23.988c-10.496,10.496-10.496,27.568,0,38.052
						L191.828,246L7.872,429.952c-5.064,5.072-7.852,11.828-7.852,19.032c0,7.204,2.788,13.96,7.852,19.028l16.124,16.116
						c5.06,5.072,11.824,7.856,19.02,7.856c7.208,0,13.968-2.784,19.028-7.856l183.96-183.952l183.952,183.952
						c5.068,5.072,11.824,7.856,19.024,7.856h0.008c7.204,0,13.96-2.784,19.028-7.856l16.12-16.116
						c5.06-5.064,7.852-11.824,7.852-19.028c0-7.204-2.792-13.96-7.852-19.028L300.188,246z"/>
			</svg>

		</a>
		<?php
			echo '<div class="recipe_thumbnail">';
			the_post_thumbnail(); 
			echo '</div>';
		// Grab the metadata from the database
			$recipe_array = get_post_meta( get_the_ID(), 'recipe_component_data_group', true );
			
			if ($recipe_array) 
				
				foreach ((array)$recipe_array as $key => $entry) {
					$recipe_component_name = $recipe_component_ingredients = $recipe_component_steps = '';

					if ( isset( $entry[ 'recipe_component_name' ] ) )
						$recipe_component_name = esc_html( $entry[ 'recipe_component_name' ] );
					if ( isset( $entry[ 'recipe_component_ingredients' ] ) )
						$recipe_component_ingredients = $entry[ 'recipe_component_ingredients' ];
					if ( isset( $entry[ 'recipe_component_steps' ] ) )
						$recipe_component_steps = $entry[ 'recipe_component_steps' ];					
						echo '<div class="recipe_component">';
							echo '<h2 class="recipe_component_name">' .$recipe_component_name. '</h2>';
							echo '<div class="recipe_component_ingredients"><h3 class="recipe_component_header">Ingredients</h3>' .$recipe_component_ingredients. '</div>';
							echo '<div class="recipe_component_steps"><h3 class="recipe_component_header">Instructions</h3>' .$recipe_component_steps. '</div>';
						echo '</div>';
				}
			
//			else echo 'schmahoney';

		?>
	</div>

	<?php if ( ! post_password_required() ) comments_template( '', true ); ?>
	<?php endwhile; endif; ?>
	<?php get_template_part( 'entry-footer' ); ?>

	
	<footer class="footer">
		<?php get_template_part( 'nav', 'below-single' ); ?>
	</footer>

</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>