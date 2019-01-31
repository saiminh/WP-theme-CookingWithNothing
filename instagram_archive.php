<?php  /* 
		* Template Name: Instagram Archive 
	    * Template Post Type: page
		*/  
get_header(); ?>
<section id="content" role="main">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<header class="header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<div class="archive-meta"><?php the_content(); ?></div>
	</header>			
		<?php // get_template_part( 'nav', 'below' ); ?>
		<?php endwhile; endif; ?>
	
	<?php $i = 0; // This whole extra code is to create rows for column layouts ?>
	<?php
	    $args = array(
	        'post_type' => 'post',
	        'posts_per_page' => -1
	    );

	    $post_query = new WP_Query($args);
		if($post_query->have_posts() ) {
		  while($post_query->have_posts() ) {
		    $post_query->the_post();
		    ?>		    
		    <?php if ( get_post_meta( get_the_ID(), 'is_insta_checkbox', 1 ) ) : ?>
		    <?php
		    	if($i == 0) {
		    		echo '<div class="ng-row">';
		    	}
		    ?>
		    	<article class="post">
		    		<a href="<?php the_permalink(); ?>">
				    	<div class="thumbnail">
				    	 <?php the_post_thumbnail(); ?>
				    	 </div>
				    	 <h2 class="is_insta_title"><?php the_title(); ?></h2>
			    	 </a>
		    	</article>
		    <?php
		    	$i++;
		    	if($i == 3) {
		    		$i = 0;
		    		echo '</div>';
		    	}
		    ?>
		    <?php endif; ?>

		    
		    <?php
		  }
		}
		wp_reset_postdata();
	?>
	<?php
		if($i > 0) {
			echo '</div>';
		}
	?>


</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>