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
			<svg viewBox="0 0 17 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="si-glyph si-glyph-magnifier">
				    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
				        <g transform="translate(1.000000, 0.000000)" fill="#434343">
				            <path d="M16,5.954 C16,2.665 13.317,0 10.009,0 C6.698,0 4.016,2.665 4.016,5.954 C4.016,9.241 6.699,11.906 10.009,11.906 C13.317,11.906 16,9.241 16,5.954 L16,5.954 Z M4.934,6.019 C4.934,3.213 7.213,0.943 10.026,0.943 C12.837,0.943 15.114,3.214 15.114,6.019 C15.114,8.823 12.837,11.094 10.026,11.094 C7.213,11.094 4.934,8.822 4.934,6.019 L4.934,6.019 Z" class="si-glyph-fill"></path>
				            <path d="M1.822,15.964 L0,14.142 L4.037,10.104 C4.037,10.104 4.133,10.869 4.617,11.351 C5.099,11.835 5.859,11.927 5.859,11.927 L1.822,15.964 L1.822,15.964 Z" class="si-glyph-fill"></path>
				            <path d="M13.398,5.073 C13.398,5.645 13.838,5.429 13.838,4.634 C13.838,3.264 12.729,2.154 11.359,2.154 C10.562,2.154 10.347,2.593 10.92,2.593 C12.29,2.593 13.398,3.704 13.398,5.073 L13.398,5.073 Z" class="si-glyph-fill"></path>
				        </g>
				    </g>
				</svg>
			<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'twentyseventeen' ); ?></span>
		</label>
		<input type="text" class="field" name="s" id="s" class="search_query_input" placeholder="<?php esc_attr_e( 'Search', 'twentyeleven' ); ?>" />

		<button type="submit" class="search-submit">			
			<span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'twentyseventeen' ); ?></span>
		</button>
	</form>