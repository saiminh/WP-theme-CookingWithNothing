<div class="clear"></div>
<footer id="footer" role="contentinfo">
	<div class="contact">
	<a href="<?php echo get_home_url(); ?>/privacy-policy">Privacy Policy</a><span class="footer_divider"> | </span>
	<a href="https://www.facebook.com/cookingwnothing/">Visit my facebook page</a><span class="footer_divider"> | </span>
	<a href="mailto:tracey.m.ingram@gmail.com">Send me an Email</a>
	</div>
	<div id="copyright">
	<?php echo sprintf( __( '%1$s %2$s %3$s. All Rights Reserved.', 'cookingwithnothing' ), '&copy;', date( 'Y' ), esc_html( get_bloginfo( 'name' ) ) ); echo sprintf( __( ' Theme By: %1$s.', 'cookingwithnothing' ), '<a href="http://floter.design">Simon Floter</a>' ); ?>
	</div>
</footer>
</div>
</div>

<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/jQuery.succinct.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/barba.min.js" type="text/javascript"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/clipboard.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.4/TweenMax.min.js"></script>
<script type="text/javascript">

	(function($) {	


		// ------------------------------------
		// Stuff that happens after page has loaded
		// ------------------------------------
		$(window).on('load', function() { // makes sure the whole site is loaded  
			//$('body').removeClass('loading');
			$('body.home .home_morearticles_wrapper .entry-summary p').succinct({
		        size: 100
	        });
			Barba.Pjax.start();
			Barba.Prefetch.init();
		});

		// ------------------------------------
		//	Page Transitions
		// ------------------------------------				

			
		/*
		$('.menu-item').on('click', function(){
			$('body').addClass('loading');
		});*/

		Barba.Pjax.Dom.wrapperId = "wrapper";		

		var FadeTransition = Barba.BaseTransition.extend({
		  start: function() {
		    /**
		     * This function is automatically called as soon the Transition starts
		     * this.newContainerLoading is a Promise for the loading of the new container
		     * (Barba.js also comes with an handy Promise polyfill!)
		     */

		    // As soon the loading is finished and the old page is faded out, let's fade the new page
		    Promise
		      .all([this.newContainerLoading, this.fadeOut()])
		      .then(this.fadeIn.bind(this));
		  },

		  fadeOut: function() {
		    /**
		     * this.oldContainer is the HTMLElement of the old Container
		     */

	        // in case it's mobile nav remove the menu active classes so that the mobnav disappears 
	        $('.navTrigger').removeClass('active');
	    	$('body').removeClass('menu-active');

		    //return $(this.oldContainer).animate({ opacity: 0 }).promise();
		    var deferred = Barba.Utils.deferred();
		    var obj = { y: window.pageYOffset };

		    $("body").append("<div class='curtain'></div>");

		    TweenMax.set(".curtain", {
		    	position: "fixed",
		    	top: "-34%",
		    	left: "-34%",
		    	width: "200%",
		    	height: "200%",		    	
		    	backgroundColor: "#f8e8e6",
		    	rotationX: 45,
		    	zIndex: 0,
		    	rotationY: 90,		    	
		    	transformOrigin: "50% 50%"
		    });

		    var tl = new TimelineMax()
			/*.staggerTo(".thumbnail", .5, {		    	
		    	y: -100,
		    	opacity: 0,
		    	ease: Power2.easeInOut
		    }, .125, 0 )

		    .staggerTo(".article_content", .5, {		    	
		    	y: 100,
		    	opacity: 0,
		    	ease: Power2.easeInOut
		    }, .125, 0 )
*/
		    .to(".curtain", .5, {
		    	rotationY: 0,
		    	ease: Power2.easeIn,
		    	onComplete: function () {
				 deferred.resolve();
				}
		    }, 0);
		    
		  /*  TweenMax.to($(this.oldContainer), 1, {
				
				onComplete: function () {
				 deferred.resolve();
				}
			});*/
			
            return deferred.promise;        

		  },

		  fadeIn: function() {
		    /**
		     * this.newContainer is the HTMLElement of the new Container
		     * At this stage newContainer is on the DOM (inside our #barba-container and with visibility: hidden)
		     * Please note, newContainer is available just after newContainerLoading is resolved!
		     */

		    var _this = this;
		    var $el = $(this.newContainer);
		    var completeHandler = _this.done();		     

		    window.scrollTo(0, 0);

		    $(this.oldContainer).hide();

		    TweenMax.to(".curtain", .5, {
		    	rotationY: 90,
		    	onComplete: function(){ $(".curtain").remove(); }
		    })

		    TweenMax.from($el, 1, {
		    	
		    	onComplete: completeHandler
		    });		   
		    
		  }
		});

		/**
		 * Next step, you have to tell Barba to use the new Transition
		 */

		Barba.Pjax.getTransition = function() {
		  /**
		   * Here you can use your own logic!
		   * For example you can use different Transition based on the current page or link...
		   */

		  return FadeTransition;
		};

		Barba.Dispatcher.on('newPageReady', function(currentStatus, oldStatus, container, newPageRawHTML) {
		  var response = newPageRawHTML.replace(/(<\/?)body( .+?)?>/gi, '$1notbody$2>', newPageRawHTML)
		  var bodyClasses = $(response).filter('notbody').attr('class')
		  $('body').attr('class', bodyClasses);

		  const navs = $(newPageRawHTML).find('.menu-item');

		    $('.menu-item').each(function(index) {
		        const newClasses = $(navs[index]).get(0).classList.value;
		        $(this).attr('class', newClasses);
		    });

		// -------------------------------------
		// scrolldown Animation
		// -------------------------------------

		var tl = new TimelineLite( {paused: true} )
			.fromTo(".thumbnail_single", .5, {
				autoAlpha: 1,
				yPercent: 0
			}, {
				autoAlpha: 0,
				yPercent: -20
			}, 0);	

		$(window).scroll( function(){
		  var st = $(this).scrollTop();
		  var ht = $( '.thumbnail_single' ).height()/1.5;
		   if( st < ht && st >= 0 ){
		        windowScroll = st/ht;
		        tl.progress( windowScroll );
		    }
		});

		// ------------------------------------
		//	Initiate Clipboard sharing
		// ------------------------------------
		var clipboard = new ClipboardJS('.sharelink--copylink');

		clipboard.on('success', function(e) {
			if (!$(".sharing-tooltip").length) {
			    $(".sharelink--copylink").before("<span class='sharing-tooltip'>Copied!</span>")
			    TweenMax.fromTo(".sharing-tooltip", .5, {
			    	autoAlpha: 0,
			    	y: 10
			    	}, {
			    	autoAlpha: 1,
			    	y: 0,
			    	ease: Elastic.easeOut.config(1, 0.3)
			    })
			} else {
				TweenMax.fromTo(".sharing-tooltip", .5, {
					autoAlpha: 0,
					y: 10
					}, {
					autoAlpha: 1,
					y: 0,
					ease: Elastic.easeOut.config(1, 0.3)
				})
			}
		});

		clipboard.on('error', function(e) {
		    if (!$(".sharing-tooltip").length) {
		        $(".sharelink--copylink").before("<span class='sharing-tooltip'>Press Ctrl + C to copy</span>")
		        TweenMax.fromTo(".sharing-tooltip", .5, {
		        	autoAlpha: 0,
		        	y: 10
		        	}, {
		        	autoAlpha: 1,
		        	y: 0,
		        	ease: Elastic.easeOut.config(1, 0.3)
		        })
		    } else {
		    	TweenMax.fromTo(".sharing-tooltip", .5, {
		    		autoAlpha: 0,
		    		y: 10
		    		}, {
		    		autoAlpha: 1,
		    		y: 0,
		    		ease: Elastic.easeOut.config(1, 0.3)
		    	})
		    }
		});

		// ------------------------------------
		//	Enter cook mode
		// ------------------------------------		
		$('.toggle-cookmode').on('click', function(){
			$('#container').toggleClass('cookmode-on');
		});

		// ------------------------------------
		//	Comments Form Stuff
		// ------------------------------------	
		$('textarea#comment').on('focus', function(){
			$('.comment-form-author, .comment-form-email, .comment-form .form-submit, .comment-form-cookies-consent').show();
		});
		$('textarea#comment').on('blur', function(){
			if ( !$('textarea#comment').val() ){
				$('.comment-form-author, .comment-form-email, .comment-form .form-submit, .comment-form-cookies-consent').hide();
			};
		});
		})

		// ------------------------------------
		//	Mobile Nav
		// ------------------------------------		
		$('.navTrigger').on('click', function(){
		  $(this).toggleClass('active');
		  $('body').toggleClass('menu-active');
		});

		/*$('.menu-item a').on('click', function(){
			$('navTrigger').removeClass('active');
			$('body').removeClass('menu-active');
		})*/

		
		
	})( jQuery );
</script>
<?php wp_footer(); ?>
</body>
</html>