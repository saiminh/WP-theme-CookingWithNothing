<div class="clear"></div>
</div>
</div>
<footer id="footer" role="contentinfo">
	<!-- <div class="footer_logo">
		<?php 
			//get_template_part( 'theme_assets/inline', 'CWN_logo.svg' );
		?>
	</div> -->
	<div class="contact">
	<a href="https://www.facebook.com/cookingwnothing/">Visit my facebook page</a> | 
	<a href="mailto:tracey.m.ingram@gmail.com">Send me an Email</a>
	</div>
	<div id="copyright">
	<?php echo sprintf( __( '%1$s %2$s %3$s. All Rights Reserved.', 'cookingwithnothing' ), '&copy;', date( 'Y' ), esc_html( get_bloginfo( 'name' ) ) ); echo sprintf( __( ' Theme By: %1$s.', 'cookingwithnothing' ), '<a href="http://floter.design">Simon Floter</a>' ); ?>
	</div>
</footer>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/jQuery.succinct.min.js"></script>
<script type="text/javascript">

	(function($) {	

		// ------------------------------------
		// Stuff that happens after page has loaded
		// ------------------------------------
		$(window).on('load', function() { // makes sure the whole site is loaded  
			$('body').removeClass('loading');
		});

		// ------------------------------------
		//	Page Transitions
		// ------------------------------------				

		$('body.home .home_morearticles_wrapper .entry-summary p').succinct({
	        size: 100
        });	

		$('.menu-item').on('click', function(){
			$('body').addClass('loading');
		});
		// ------------------------------------
		//	Enter cook mode
		// ------------------------------------		
		$('.toggle-cookmode').on('click', function(){
			$('body').toggleClass('cookmode-on');
		});

		// ------------------------------------
		//	Mobile Nav
		// ------------------------------------		
		$('.navTrigger').click(function(){
		  $(this).toggleClass('active');
		  $('body').toggleClass('menu-active');
		});


		
	})( jQuery );
</script>
<?php wp_footer(); ?>
</body>
</html>