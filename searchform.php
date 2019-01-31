<?php
/**
 * Template for displaying search forms in Cooking with Nothing
 *
 * @package WordPress
 * @subpackage CookingWithNothing
 * @since Cooking with Nothing 1.0
 */
?>
	<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<label class="searchlabel" for="s">
			<span class="search_label_text"><?php echo _x( 'Search', 'label', 'twentyseventeen' ); ?></span>
			<svg version="1.1" id="magnifying-glass" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
				 width="30px" height="30px" viewBox="0 0 30 30" enable-background="new 0 0 30 30" xml:space="preserve">
			<path d="M29.402,26.516l-7.618-7.617c-0.04-0.041-0.087-0.07-0.131-0.106c1.375-1.942,2.19-4.309,2.19-6.87
				C23.844,5.338,18.505,0,11.922,0C5.338,0,0,5.338,0,11.922c0,6.583,5.338,11.922,11.922,11.922c2.561,0,4.928-0.815,6.87-2.19
				c0.036,0.044,0.065,0.091,0.106,0.131l7.617,7.618C26.914,29.801,27.437,30,27.959,30c0.521,0,1.044-0.199,1.443-0.598
				C30.199,28.604,30.199,27.313,29.402,26.516z M2.041,11.922c0-5.448,4.433-9.881,9.881-9.881s9.881,4.433,9.881,9.881
				c0,2.7-1.091,5.148-2.852,6.934c-0.017,0.017-0.037,0.027-0.053,0.043s-0.026,0.036-0.043,0.053
				c-1.785,1.761-4.233,2.852-6.934,2.852C6.474,21.803,2.041,17.37,2.041,11.922z"/>
			</svg>			
		</label>
		<input type="text" class="field" name="s" id="s" class="search_query_input" placeholder="<?php esc_attr_e( 'Search', 'twentyeleven' ); ?>" />

		<button type="submit" class="search-submit">			
			<span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'twentyseventeen' ); ?></span>
		</button>
	</form>