<section class="entry-meta">
<!-- <span class="author vcard"><?php //the_author_posts_link(); ?></span>
	<span class="meta-sep"> | </span> -->
		<span class="entry-date">
			<?php the_time( get_option( 'date_format' ) ); ?>
		</span>
			<?php _e( 'in ', 'cookingwithnothing' ); ?>
		<span class="cat-links">
			<?php the_category( ', ' ); ?>
		</span>
</section>