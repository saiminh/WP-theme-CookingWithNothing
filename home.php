<?php get_header(); ?>
<section id="content" role="main">

<!-- Latest Article -->

<?php
   
    if ( is_paged() ) {
        echo '
            <header class="header">
                <h1 class="entry-title">Older posts</h1>
        ';
        get_template_part( 'nav', 'below' );
        echo '</header>';
    }

    // Function to detect first post
    function is_latest_post() {
        $latestpost = get_posts ( array(
            'numberposts' => 1
        ) );
        $latestpost = $latestpost[0];
        $is_latest = ( $latestpost->ID == get_the_ID() ? true : false );
        return $is_latest;
    }

    $column_counter = 0;
?>


 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); //Get the post data ?>

    <?php if ( is_latest_post() && !is_paged())
        {
            echo '<div class="home_latestarticle_wrapper">';
            get_template_part( 'home-feature' );
            echo '</div>'; 
            $column_counter++;
        }
        else
        {               
            if ( is_paged() ) { // Check if we're on page number 2
                if($column_counter == 0) {
                    echo '<div class="ng-row">';
                }
                get_template_part( 'entry' );

                $column_counter++;
                if($column_counter == 3) {
                    $column_counter = 0;
                    echo '</div>';
                }
            }
            else {
                 // This whole extra code is to create rows for column layouts
                
                if($column_counter == 1) {
                    echo '<div class="ng-row">';
                }
                get_template_part( 'entry' );

                $column_counter++;
                if($column_counter == 4) {
                    $column_counter = 1;
                    echo '</div>';
                }
            }            
        }
    ?>

<?php endwhile; endif; ?>

<?php get_template_part( 'nav', 'below' ); ?>
</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
</div>

