<?php get_header(); ?>
<section id="content" role="main">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
			<div class="thumbnail_single <?php if ( !has_post_thumbnail()){ echo 'no-thumbnail';} ?>">
				<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
			</div>
			<div class="article_content <?php if ( !has_post_thumbnail()){ echo 'no-thumbnail';} ?>">
				<header class="header">
					<h1 class="entry-title"><?php the_title(); ?></h1> <?php edit_post_link(); ?>
				</header>
				<section class="entry-content">
					
					<?php the_content(); ?>
					<div class="entry-links"><?php wp_link_pages(); ?></div>
				</section>
			</div>
		</article>
		<?php if ( ! post_password_required() ) comments_template( '', true ); ?>

		<?php 
			$ingredients_list = get_post_meta( get_the_ID(), '_ingredientslist_text', true );
			echo $ingredients_list;
		?>

	<?php endwhile; endif; ?>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>