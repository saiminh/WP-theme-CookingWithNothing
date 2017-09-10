<?php  /* 
		* Template Name: Recipe 
	    * Template Post Type: post
		*/  
get_header(); ?>

<section id="content" role="main">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
	<?php // get_template_part( 'entry' ); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php 
		echo '<div class="thumbnail_single">';
		the_post_thumbnail(); 
		echo '</div>';
	?>
	<div class="article_content">
		<?php
			if ( !is_search() ) 
				get_template_part( 'entry', 'meta' );  
		?>
		<header>
		<h1 class="entry-title">			
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h1>
		<button class="toggle-cookmode">
						Cookmode
					</button>
		<!-- <?php edit_post_link(); ?> -->
		</header>
		<?php get_template_part( 'entry', ( is_archive() || is_search() ? 'summary' : 'content' ) ); ?>

			<div class="recipe">	
				<div class="recipe_components_ingredients_group">			
				<?php			
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
								
								echo '<div class="recipe_component_ingredients">';
									echo '<h2 class="recipe_component_name">' .$recipe_component_name. '</h2>';
								echo $recipe_component_ingredients. '</div>';
								
							echo '</div>';
						}
				?>
				</div>
				<?php
				// Instructions
					$cookinstructions = wpautop(get_post_meta( get_the_ID(), 'instructions_data', true ));

					if($cookinstructions) {
						echo '<div class="recipe_component_steps"><h2 class="recipe_component_name">Instructions</h2>';
						echo $cookinstructions;
						echo '</div>';
					}
					else { 
						// do nothing
					}				
				?>
			</div>
		
	</div>



	</article>

	
	<?php get_template_part( 'entry-footer' ); ?>
	<?php if ( ! post_password_required() ) comments_template( '', true ); ?>
	<?php endwhile; endif; ?>

	
	<footer class="footer">
		<?php // get_template_part( 'nav', 'below-single' ); ?>
	</footer>

</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>