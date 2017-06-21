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

        $recipe_metabox->add_group_field( $recipe_data, array(
            'name'    => esc_html__( 'Cooking Instructions', 'cmb2' ),
            'desc'    => esc_html__( 'Step by step instructions (ideally in a numbered list)', 'cmb2' ),
            'id'      => 'recipe_component_steps',
            'type'    => 'wysiwyg',
            'classes' => 'recipe_component_steps',
            'options' => array( 
                'textarea_rows' => 5, 
                'media_buttons' => false, // show insert/upload button(s)
                'teeny'         => true,
            ),
        ) );

 /* Too complicated  
    // All info for one ingredient item
    //
    $recipe_ingredient_data = $ingredients_metabox->add_field( array(
    'id'          => 'ingredient_data_group',
    'type'        => 'group',
    'description' => __( 'List all ingredients for your recipe', 'cmb2' ),
    // 'repeatable'  => false, // use false if you want non-repeatable group
    'options'     => array(
        'group_title'   => __( 'Ingredient {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
        'add_button'    => __( 'Add Another Ingredient', 'cmb2' ),
        'remove_button' => __( 'Remove Ingredient', 'cmb2' ),
        'sortable'      => true, // beta
        // 'closed'     => true, // true to have the groups closed by default
    ),
   ) );

           $ingredients_metabox->add_group_field( $recipe_ingredient_data, array(
            'name' => __( 'Amount', 'theme-domain' ),
            'desc' => __( 'Number only', 'msft-newscenter' ),
            'id'   => 'amount',
            'type' => 'text',
            'classes' => 'ingred ingred_amount',            

           ) );

           // Id's for group's fields only need to be unique for the group. Prefix is not needed.
           $ingredients_metabox->add_group_field( $recipe_ingredient_data, array(
            'name' => 'Unit',
            'desc' => 'eg. grams, cloves, x, pounds',
            'id'   => 'unit',
            'type' => 'text',
            'classes' => 'ingred ingred_unit',
            'attributes'  => array(
                'placeholder' => 'eg. grams, cloves, x...',
                ),
            // 'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
           ) );

           $ingredients_metabox->add_group_field( $recipe_ingredient_data, array(
            'name' => 'Ingredient',
            'description' => 'carrots, sugarlumps, porknuckles',
            'id'   => 'name',
            'type' => 'text',
            'classes' => 'ingred ingred_name',
            'attributes'  => array(
                'placeholder' => 'eg. Carrots, flour, semen',
                ),
           ) );

           $ingredients_metabox->add_group_field( $recipe_ingredient_data, array(
            'name' => 'Alternatives',
            'desc' => '(optional) can this be swapped for anything else?',
            'id'   => 'alternative',
            'type' => 'text',
            'classes' => 'ingred ingred_alternative',
            'attributes'  => array(
                'placeholder' => 'Can be swapped for...',
                ),
            //'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
           ) );
    */

 

}