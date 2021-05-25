<?php
add_action( 'after_setup_theme', 'cookingwithnothing_setup' );
function cookingwithnothing_setup()
{
load_theme_textdomain( 'cookingwithnothing', get_template_directory() . '/languages' );
add_theme_support( 'title-tag' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
global $content_width;
if ( ! isset( $content_width ) ) $content_width = 640;
register_nav_menus(
array( 'main-menu' => __( 'Main Menu', 'cookingwithnothing' ) )
);
}
add_action( 'wp_enqueue_scripts', 'cookingwithnothing_load_scripts' );
function cookingwithnothing_load_scripts()
{
wp_enqueue_script( 'jquery' );
}
add_action( 'comment_form_before', 'cookingwithnothing_enqueue_comment_reply_script' );
function cookingwithnothing_enqueue_comment_reply_script()
{
if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}
add_filter( 'the_title', 'cookingwithnothing_title' );
function cookingwithnothing_title( $title ) {
if ( $title == '' ) {
return '&rarr;';
} else {
return $title;
}
}
add_filter( 'wp_title', 'cookingwithnothing_filter_wp_title' );
function cookingwithnothing_filter_wp_title( $title )
{
return $title . esc_attr( get_bloginfo( 'name' ) );
}
add_action( 'widgets_init', 'cookingwithnothing_widgets_init' );
function cookingwithnothing_widgets_init()
{
register_sidebar( array (
'name' => __( 'Sidebar Widget Area', 'cookingwithnothing' ),
'id' => 'primary-widget-area',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => "</li>",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
}
function cookingwithnothing_custom_pings( $comment )
{
$GLOBALS['comment'] = $comment;
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php 
}
add_filter( 'get_comments_number', 'cookingwithnothing_comments_number' );
function cookingwithnothing_comments_number( $count )
{
if ( !is_admin() ) {
global $id;
$comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
return count( $comments_by_type['comment'] );
} else {
return $count;
}
}

/**
 * Get the CMB2 bootstrap!
 */
if ( file_exists(  __DIR__ . '/cmb2/init.php' ) ) {
  require_once  __DIR__ . '/cmb2/init.php';
} elseif ( file_exists(  __DIR__ . '/CMB2/init.php' ) ) {
  require_once  __DIR__ . '/CMB2/init.php';
}

// ------------------------------------------------
// Adding my own CSS to the backend to overwrite stuff here
// ------------------------------------------------

function cmb2_override_styles() {
   echo '<link rel="stylesheet" href="'. get_template_directory_uri().'/assets/cmb2overrides.css" type="text/css" media="all">';
}

add_action('admin_head', 'cmb2_override_styles');

// ------------------------------------------------
// Adding the Custom CMB2 Metaboxes
// ------------------------------------------------

add_action( 'cmb2_admin_init', 'recipe_box' );
/**
 * Define the metabox and field configurations.
 */
function recipe_box() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_recipe_';

    /**
     * Initiate the metabox
     */
    $recipe_metabox = new_cmb2_box( array(
        'id'            => 'recipe',
        'title'         => __( 'Recipe', 'cmb2' ),
        'object_types'  => array( 'post', ), // Post type
        'show_on'       => array( 'key' => 'page-template', 'value' => 'recipe-post.php' ),
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        'repeatable'    => true,
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
    ) );

    $recipe_data = $recipe_metabox->add_field( array(
        'id'          => 'recipe_component_data_group',
        'type'        => 'group',
        'description' => __( '', 'cmb2' ),
        // 'repeatable'  => false, // use false if you want non-repeatable group
        'options'     => array(
            'group_title'   => __( 'Recipe component {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
            'add_button'    => __( 'Add Another Recipe component', 'cmb2' ),
            'remove_button' => __( 'Remove component', 'cmb2' ),
            'sortable'      => true, // beta
            // 'closed'     => true, // true to have the groups closed by default
        ),
    ) );

        $recipe_metabox->add_group_field( $recipe_data, array(
            'id'            => 'recipe_component_name',
            'type'          => 'text',
            'description'   => __( 'Name of the part of the dish' ),
            'classes'       => 'recipe_component_name',
        ) );

        $recipe_metabox->add_group_field( $recipe_data, array(
            'name'    => esc_html__( 'Ingredients List', 'cmb2' ),
            'desc'    => esc_html__( 'Put your ingredients in a list', 'cmb2' ),
            'id'      => 'recipe_component_ingredients',
            'type'    => 'wysiwyg',
            'classes' => 'recipe_component_ingredients',
            'options' => array( 
                'textarea_rows' => 5, 
                'media_buttons' => false, // show insert/upload button(s)
                'teeny'         => true,
            ),
        ) );

    $instructions_metabox = new_cmb2_box( array(
        'id'            => 'instructions',
        'title'         => __( 'Instructions', 'cmb2' ),
        'object_types'  => array( 'post', ), // Post type
        'show_on'       => array( 'key' => 'page-template', 'value' => 'recipe-post.php' ),
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        'repeatable'    => false,
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
    ) );

    $instructions_data = $instructions_metabox->add_field( array(
        'id'          => 'instructions_data',
        'type'        => 'wysiwyg',
        'description' => __( 'Fill the cooking instructions', 'cmb2' ),
        // 'repeatable'  => false, // use false if you want non-repeatable group
        'options' => array( 
            'textarea_rows' => 5, 
            'media_buttons' => false, // show insert/upload button(s)
            'teeny'         => false,
        ),
    ) );
}

add_action( 'cmb2_admin_init', 'is_instagram_post' );

function is_instagram_post() {

    // Start with an underscore to hide fields from custom fields list
    $prefix = '_is_insta_';

    /**
     * Initiate the metabox
     */
    $is_insta_metabox = new_cmb2_box( array(
        'id'            => 'is_insta',
        'title'         => __( 'Instagram?', 'cmb2' ),
        'object_types'  => array( 'post', ), // Post type
    //    'show_on'       => array( 'key' => 'page-template', 'value' => 'recipe-post.php' ),
        'context'       => 'normal',
        'priority'      => 'low',
        'show_names'    => true, // Show field names on the left
        'repeatable'    => false,
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
    ) );

    $is_insta_metabox->add_field( array(
    'name' => 'Is this post linked to from an instagram post?',
    'desc' => 'Yes, display it on my instagram link page!',
    'id'   => 'is_insta_checkbox',
    'type' => 'checkbox',
) );

}

//* Add description to menu items
add_filter( 'walker_nav_menu_start_el', 'wpstudio_add_description', 10, 2 );
function wpstudio_add_description( $item_output, $item ) {
    $description = $item->post_content;
    if (' ' !== $description ) {
        return preg_replace( '/(<a.*)</', '$1' . '<span class="menu-description">' . $description . '</span><', $item_output) ;
    }
    else {
        return $item_output;
    };
}

// ---------------------------------------------
// Limiting the homepage with the blog newest article formatting to a certain amount of posts 
// while limiting page 2 onwards to one less than that
// ---------------------------------------------

function special_offset_pregp_wpse_105496($qry) {
  if (is_home() && $qry->is_main_query()) {
    $ppg = get_option('posts_per_page');
    $offset = 10;
    if (!$qry->is_paged()) {
      $qry->set('posts_per_page',$offset);
    } else {
      $qry->set('posts_per_page',$offset-1);
    }
  }
}
add_action('pre_get_posts','special_offset_pregp_wpse_105496');

// ---------------------------------------------
// Search Highlighting
// This highlights search terms in both titles, excerpts and content
// ---------------------------------------------

function search_excerpt_highlight() {
 $excerpt = get_the_excerpt();
 $keys = implode('|', explode(' ', get_search_query()));
 $excerpt = preg_replace('/(' . $keys .')/iu', '<strong class="search-highlight">\0</strong>', $excerpt);

 echo '<p>' . $excerpt . '</p>';
}


function search_title_highlight() {
 $title = get_the_title();
 $keys = implode('|', explode(' ', get_search_query()));
 $title = preg_replace('/(' . $keys .')/iu', '<strong class="search-highlight">\0</strong>', $title);

 echo $title;
}

// ---------------------------------------------
//* Add SEO stuff
// ---------------------------------------------

function doctype_opengraph($output) {
    return $output . '
    xmlns:og="http://opengraphprotocol.org/schema/"
    xmlns:fb="http://www.facebook.com/2008/fbml"';
}
add_filter('language_attributes', 'doctype_opengraph');

function fb_opengraph() {
    global $post;
 
    if(is_single()) {
        if(has_post_thumbnail($post->ID)) {
            $img_src = wp_get_attachment_image_url(get_post_thumbnail_id( $post->ID ), 'full');
        } else {
            $img_src = get_stylesheet_directory_uri() . '/theme_assets/CWN_facebook_cover.png';
        }
        if( $excerpt = $post->post_excerpt ) {
            $excerpt = strip_tags($post->post_excerpt);
            $excerpt = str_replace("", "'", $excerpt);
        } else {
            $excerpt = get_bloginfo('description');
        }
        
 
    echo '<meta property="og:title" content="' . the_title() . '"/>';
    echo '<meta property="og:description" content="'. $excerpt . '"/>';
    echo '<meta property="og:type" content="article"/>';
    echo '<meta property="og:url" content="' . the_permalink() . '"/>';
    echo '<meta property="og:site_name" content="' . get_bloginfo() . '"/>';
    echo '<meta property="og:image" content="' . $img_src . '"/>';
 
    } else {
        return;
    }
}
add_action('wp_head', 'fb_opengraph', 5);

/**
 * Extend WordPress search to include custom fields
 *
 * https://adambalee.com
 */

/**
 * Join posts and postmeta tables
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_join
 */
function cf_search_join( $join ) {
    global $wpdb;

    if ( is_search() ) {    
        $join .=' LEFT JOIN '.$wpdb->postmeta. ' ON '. $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
        
       // This next line is supposed to also add the tags to the search results... this relies on a plugin called 'Simple taxonomy search' by Ryan Meier 
        
        $join .= "LEFT JOIN {$wpdb->term_relationships} tr ON {$wpdb->posts}.ID = tr.object_id INNER JOIN {$wpdb->term_taxonomy} tt ON tt.term_taxonomy_id=tr.term_taxonomy_id INNER JOIN {$wpdb->terms} t ON t.term_id = tt.term_id";
    }

    return $join;
}
add_filter('posts_join', 'cf_search_join' );

/**
 * Modify the search query with posts_where
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_where
 */
function cf_search_where( $where ) {
    global $pagenow, $wpdb;

    if ( is_search() ) {
        $where = preg_replace(
            "/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
            "(".$wpdb->posts.".post_title LIKE $1) OR (".$wpdb->postmeta.".meta_value LIKE $1)", $where );
    }

    return $where;
}
add_filter( 'posts_where', 'cf_search_where' );

/**
 * Prevent duplicates
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_distinct
 */
function cf_search_distinct( $where ) {
    global $wpdb;

    if ( is_search() ) {
        return "DISTINCT";
    }

    return $where;
}
add_filter( 'posts_distinct', 'cf_search_distinct' );