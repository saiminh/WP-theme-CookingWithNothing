<?php if ( 'comments.php' == basename( $_SERVER['SCRIPT_FILENAME'] ) ) return; ?>
<section id="comments">

	<?php 
		if ( have_comments() ) : 
			global $comments_by_type;
		$comments_by_type = &separate_comments( $comments );
		if ( ! empty( $comments_by_type['comment'] ) ) : 
	?>
	<section id="comments-list" class="comments">
		<h3 class="comments-title"><?php comments_number(); ?></h3>
		<?php if ( get_comment_pages_count() > 1 ) : ?>
			<nav id="comments-nav-above" class="comments-navigation" role="navigation">
				<div class="paginated-comments-links"><?php paginate_comments_links(); ?></div>
			</nav>
		<?php endif; ?>
		<ul>
			<?php wp_list_comments( 'type=comment' ); ?>
		</ul>
		<?php if ( get_comment_pages_count() > 1 ) : ?>
			<nav id="comments-nav-below" class="comments-navigation" role="navigation">
				<div class="paginated-comments-links"><?php paginate_comments_links(); ?></div>
			</nav>
		<?php endif; ?>
	</section>
	<?php 
	endif; 
	if ( ! empty( $comments_by_type['pings'] ) ) : 
		$ping_count = count( $comments_by_type['pings'] ); 
	?>
	<section id="trackbacks-list" class="comments">
		<h3 class="comments-title"><?php echo '<span class="ping-count">' . $ping_count . '</span> ' . ( $ping_count > 1 ? __( 'Trackbacks', 'cookingwithnothing' ) : __( 'Trackback', 'cookingwithnothing' ) ); ?></h3>
		<ul>
			<?php wp_list_comments( 'type=pings&callback=cookingwithnothing_custom_pings' ); ?>
		</ul>
	</section>
	<?php 
	endif; 
	endif;

	$comment_args = array( 

		'title_reply'=>'
		<svg class="svgIcon-respond" width="29" height="29" viewBox="0 0 29 29">
			<path d="M21.27 20.058c1.89-1.826 2.754-4.17 2.754-6.674C24.024 8.21 19.67 4 14.1 4 8.53 4 4 8.21 4 13.384c0 5.175 4.53 9.385 10.1 9.385 1.007 0 2-.14 2.95-.41.285.25.592.49.918.7 1.306.87 2.716 1.31 4.19 1.31.276-.01.494-.14.6-.36a.625.625 0 0 0-.052-.65c-.61-.84-1.042-1.71-1.282-2.58a5.417 5.417 0 0 1-.154-.75zm-3.85 1.324l-.083-.28-.388.12a9.72 9.72 0 0 1-2.85.424c-4.96 0-8.99-3.706-8.99-8.262 0-4.556 4.03-8.263 8.99-8.263 4.95 0 8.77 3.71 8.77 8.27 0 2.25-.75 4.35-2.5 5.92l-.24.21v.32c0 .07 0 .19.02.37.03.29.1.6.19.92.19.7.49 1.4.89 2.08-.93-.14-1.83-.49-2.67-1.06-.34-.22-.88-.48-1.16-.74z"></path>
		</svg> Comment',

		'comment_notes_before' => '',

		'fields' => apply_filters( 'comment_form_default_fields', array(

			'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Your Name' ) . '</label> ' . ( $req ? '<span>*</span>' : '' ) .

	        	'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',   

			'email'  => '<p class="comment-form-email">' .

	                '<label for="email">' . __( 'Your Email (will not be published)' ) . '</label> ' .

	                ( $req ? '<span>*</span>' : '' ) .

	                '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' />'.'</p>',

			'url'    => '',
			// New privacy checkbox optin
			 
	        'cookies' => '<p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"' . $consent . ' />' . '<label for="wp-comment-cookies-consent">' . __( ' Save my name and email in this browser for the next time I comment.' ) . '</label></p>' ) ),

		'comment_field' => '<p>' .

	        '<label for="comment">' . __( '' ) . '</label>' .

	        '<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="Enter your comment"></textarea>' .

	        '</p>',

		'comment_notes_after' => '',

	);

	if ( comments_open() ) comment_form($comment_args);
	?>
</section>