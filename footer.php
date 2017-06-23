<div class="clear"></div>
</div>
<footer id="footer" role="contentinfo">
<div id="copyright">
<?php echo sprintf( __( '%1$s %2$s %3$s. All Rights Reserved.', 'cookingwithnothing' ), '&copy;', date( 'Y' ), esc_html( get_bloginfo( 'name' ) ) ); echo sprintf( __( ' Theme By: %1$s.', 'cookingwithnothing' ), '<a href="http://tidythemes.com/">TidyThemes</a>' ); ?>
</div>
</footer>
</div>
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