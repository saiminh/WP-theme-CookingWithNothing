<?php get_header(); ?>
<section id="content" role="main">

<!-- Latest Article -->
<?php
	$catquery = new WP_Query( 'category_name=news&posts_per_page=4' );

	// Small function to detect first post
	function is_first_post()
	{
	    static $called = FALSE;

	    if ( ! $called )
	    {
	        $called = TRUE;
	        return TRUE;
	    }

	    return FALSE;
	}

	$blogpost_counter = 0;

	//Get the post data
	if ( $catquery->have_posts() ) : while ( $catquery->have_posts() ) : $catquery->the_post(); 

	if ( is_first_post() )
	{
	    echo '<div class="home_latestarticle_wrapper">';
	    get_template_part( 'entry-home-feature' );
	    echo '</div>'; 
	    $blogpost_counter++;
	    // echo $blogpost_counter;
	}
	else
	{		
		if ( $blogpost_counter == 1 ){
			echo '<div class="home_morearticles_wrapper">';
			//echo '<h2 class="home_morearticles_wrapper_header">Earlier blog posts</h2>';
		}
	    get_template_part( 'entry-home-more-blog' );
	    $blogpost_counter++;
	   	// echo $blogpost_counter;
	    if ( $blogpost_counter == 4 ){	    	
	    	$category_id = get_category_by_slug( 'news' );
	    	echo '<a class="button home_morearticles_morebtn" href="'. get_category_link( $category_id ). '">All blog posts</a>';
	    	echo '</div>';
	    }
	}
?>

<?php endwhile; endif; ?>

<!-- Latest Recipes -->
<div class="home_latestrecipes_wrapper">
<h2 class="home_latestrecipes_wrapper_header">Latest Recipes</h2>
<?php
	$catquery = new WP_Query( 'category_name=cooking&posts_per_page=3' );
	if ( $catquery->have_posts() ) : while ( $catquery->have_posts() ) : $catquery->the_post(); ?>
<?php 	$home_latestrecipes = "1";
		get_template_part( 'entry' );
		$home_latestrecipes = "0"; ?>
<?php endwhile; endif; ?>
</div>
<?php // get_template_part( 'nav', 'below' ); ?>

</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>