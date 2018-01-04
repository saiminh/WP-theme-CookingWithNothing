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

		'title_reply'=>'Respond',

		'comment_notes_before' => '',

		'fields' => apply_filters( 'comment_form_default_fields', array(

		'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Your Name' ) . '</label> ' . ( $req ? '<span>*</span>' : '' ) .

	        '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',   

		'email'  => '<p class="comment-form-email">' .

	                '<label for="email">' . __( 'Your Email (will not be published)' ) . '</label> ' .

	                ( $req ? '<span>*</span>' : '' ) .

	                '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' />'.'</p>',

		'url'    => '' ) ),

		'comment_field' => '<p>' .

	        '<label for="comment">' . __( '' ) . '</label>' .

	        '<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="Enter your comment"></textarea>' .

	        '</p>',

		'comment_notes_after' => '',

	);

	if ( comments_open() ) comment_form($comment_args);
	?>
</section>