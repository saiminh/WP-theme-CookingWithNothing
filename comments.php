<?php if ( 'comments.php' == basename( $_SERVER['SCRIPT_FILENAME'] ) ) return; ?>
<section id="comments">

<div class="share-container">
		<!-- <span class="share-title">-->
			<span class="sharelink-title sharelink"><span class="icon icon--facebook">
			<svg class="svg-icon" fill="#665555" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
		    <path d="M18 16.08c-.76 0-1.44.3-1.96.77L8.91 12.7c.05-.23.09-.46.09-.7s-.04-.47-.09-.7l7.05-4.11c.54.5 1.25.81 2.04.81 1.66 0 3-1.34 3-3s-1.34-3-3-3-3 1.34-3 3c0 .24.04.47.09.7L8.04 9.81C7.5 9.31 6.79 9 6 9c-1.66 0-3 1.34-3 3s1.34 3 3 3c.79 0 1.5-.31 2.04-.81l7.12 4.16c-.05.21-.08.43-.08.65 0 1.61 1.31 2.92 2.92 2.92 1.61 0 2.92-1.31 2.92-2.92s-1.31-2.92-2.92-2.92z"/>
			</svg>
			</span>
			</span>
		<!--Share:
		</span> -->
		<a class="button sharelink sharelink--facebook" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url(get_permalink()); ?>">
			<span class="icon icon--facebook">
				<svg class="svg-icon" viewBox="0 0 1280 1280">
					<path fill="#000" d="M952.607,216.477H842.814c-86.015,0-102.099,41.259-102.099,100.701v132.169h204.897L918.34,656.343
					H740.716v530.776H526.727V656.343H348.403V449.347h178.324v-152.45c0-176.925,108.393-273.43,266.437-273.43
					c75.525,0,140.561,5.595,159.443,8.392V216.477z"></path>
				</svg>
			</span>
			<!-- Facebook -->
		</a>
		<a class="button sharelink sharelink--twitter" target="_blank" href="https://twitter.com/intent/tweet?url=<?php echo esc_url(get_permalink()); ?>&text=<?php echo esc_html( the_title()); ?>">
			<span class="icon icon--twitter">
				<svg
				  class="svg-icon" viewbox="0 0 2000 1625.36" width="2000" height="1625.36" version="1.1" xmlns="http://www.w3.org/2000/svg">
				  <path
				    d="m 1999.9999,192.4 c -73.58,32.64 -152.67,54.69 -235.66,64.61 84.7,-50.78 149.77,-131.19 180.41,-227.01 -79.29,47.03 -167.1,81.17 -260.57,99.57 C 1609.3399,49.82 1502.6999,0 1384.6799,0 c -226.6,0 -410.328,183.71 -410.328,410.31 0,32.16 3.628,63.48 10.625,93.51 -341.016,-17.11 -643.368,-180.47 -845.739,-428.72 -35.324,60.6 -55.5583,131.09 -55.5583,206.29 0,142.36 72.4373,267.95 182.5433,341.53 -67.262,-2.13 -130.535,-20.59 -185.8519,-51.32 -0.039,1.71 -0.039,3.42 -0.039,5.16 0,198.803 141.441,364.635 329.145,402.342 -34.426,9.375 -70.676,14.395 -108.098,14.395 -26.441,0 -52.145,-2.578 -77.203,-7.364 52.215,163.008 203.75,281.649 383.304,284.946 -140.429,110.062 -317.351,175.66 -509.5972,175.66 -33.1211,0 -65.7851,-1.949 -97.8828,-5.738 181.586,116.4176 397.27,184.359 628.988,184.359 754.732,0 1167.462,-625.238 1167.462,-1167.47 0,-17.79 -0.41,-35.48 -1.2,-53.08 80.1799,-57.86 149.7399,-130.12 204.7499,-212.41"
				    />
				</svg>
			</span>
			<!-- Facebook -->
		</a>
		<a class="button sharelink sharelink--email" target="_blank" href="mailto:?&subject=Awesome article on Cooking with Nothing&body=You%20gotta%20check%20out%20this%20article%3A%0A<?php echo esc_url(get_permalink()); ?>">
			<span class="icon icon--email">
				<svg class="svg-icon" viewBox="0 0 1280 1280">
					<path fill="#000" d="M1266.598,1075.229c0,61.539-50.35,111.89-111.889,111.89H125.324c-61.539,0-111.89-50.351-111.89-111.89
					V314.38c0-61.539,50.351-111.89,111.89-111.89h1029.385c61.539,0,111.889,50.351,111.889,111.89V1075.229z M1154.709,292.002
					H125.324c-11.888,0-22.378,10.49-22.378,22.378c0,79.721,39.861,148.953,102.799,198.604
					c93.708,73.428,187.415,147.554,280.423,221.681c37.063,30.07,104.197,94.407,153.149,94.407h0.699h0.699
					c48.952,0,116.086-64.337,153.149-94.407c93.009-74.127,186.716-148.253,280.423-221.681
					c45.455-35.665,102.799-113.288,102.799-172.729C1177.086,322.771,1181.282,292.002,1154.709,292.002z M1177.086,538.159
					c-14.686,16.783-30.77,32.168-48.252,46.154c-100.002,76.925-200.702,155.247-297.906,236.367
					c-52.448,44.057-117.484,97.903-190.213,97.903h-0.699h-0.699c-72.729,0-137.764-53.847-190.212-97.903
					C351.9,739.561,251.2,661.238,151.198,584.313c-17.483-13.986-33.567-29.371-48.252-46.154v537.07
					c0,11.889,10.49,22.378,22.378,22.378h1029.385c11.888,0,22.377-10.489,22.377-22.378V538.159z"></path>
				</svg>
			</span>
			<!-- Email -->
		</a>
	</div>

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
	if ( comments_open() ) comment_form();
	?>
</section>