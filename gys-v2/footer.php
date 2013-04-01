<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */
?>
<?php
	/* A sidebar in the footer? Yep. You can can customize
	 * your footer with four columns of widgets.
	 */
	//get_sidebar( 'footer' );
?>

	<div id="live-button" class="hide">
		<a href="//onintercast.com/gotyour6/frame?url=http://www.gotyour6.org/live/" class="live now fancybox.iframe">Live</a>
	</div>

	<div id="callout-wells" class="callout">
		<img src="/images/partners/wells_fargo.png" alt="Wells Fargo" />
	</div>

	<div id="shop-buttons">
		<a href="/donate" class="donate">Donate</a>
		<a href="/shop" class="shop">Shop</a>
	</div>

	<div id="psa-callout" class="callout">
		<a href="//www.youtube.com/embed/eZbJkZjobFo?autoplay=1" class="fancybox.iframe">Watch Our Official PSA</a>
	</div>

	<div id="newsletter-modal">
		<form method="POST" action="/subscribe.php" id="newsletter-form">
			<input type="text" id="email" placeholder="Enter Your Email Address" />
			<button>Submit</button>
		</form>
	</div>

	<footer class="site-footer cf">
		<div class="container cf">
			<ul class="interaction_bar left cf">
				<li><a href="/social-stream" id="social-stream-callout" title="Social Stream">To Top</a></li>
				<li><a href="http://www.facebook.com/GotYourSix" id="facebook" title="Facebook">Facebook</a></li>
				<li><a href="https://twitter.com/GotYourSix" id="twitter" title="Twitter">Twitter</a></li>
				<li><a href="http://pinterest.com/GotYour6" id="pinterest" title="Pinterest">Pinterest</a></li>
				<li><a href="http://www.youtube.com/user/GotYour6Campaign/" id="youtube" title="YouTube">YouTube</a></li>
				<li><a href="http://instagram.com/gotyour6/" id="instagram" title="Instagram">Instagram</a></li>
				<li><a href="https://twitter.com/search?q=GotYour6" id="callout" title="#GotYour6">#GotYour6</a></li>
				<li><a href="#newsletter-modal" id="newsletter-signup" title="Signup for our newsletter">Signup</a></li>
			</ul>
			
			<div id="secondary_nav" class="right cf"></div>
			
			<nav class="footer-nav nav right cf">
				<ul>
<?php
// Display pages subnav
    global $post;
 
    if($post->post_parent) {
        $parent_id = get_post_ancestors($post->ID);
        $id = end($parent_id);
		wp_list_pages('title_li=&child_of=' . $id); // Only show the subnav on child pages
    } else {
        $id = $post->ID;
    }
    //wp_list_pages('title_li=&child_of=' . $id);
?>
				</ul>
			</nav>
			
			<div class="copyright-menu cf">
				<nav class="right">
					<?php wp_nav_menu( array( 'container' => false, 'theme_location' => 'secondary' ) ); ?>
				</nav>
				<span class="right">&copy;<?= date(Y) ?> GotYour6.</span>
			</div>
			
			<span id="scroll">To See The Full Experience, Scroll Down</span>
		</div>
	</footer>


	<!-- JS Scripts -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="<?php echo bloginfo('template_url') . "/js/jquery-1.9.0.min.js"; ?>"><\/script>')</script>
	
	<script src="<?php echo bloginfo('template_url') . "/js/supersized.3.2.7.min.js"; ?>"></script>
	<script src="<?php echo bloginfo('template_url') . "/js/supersized.theme.js"; ?>"></script>
	<script src="<?php echo bloginfo('template_url') . "/js/jquery.fancybox.pack.js?v=2.1.4"; ?>"></script>
	<script src="<?php echo bloginfo('template_url') . "/js/jquery.bxslider.min.js"; ?>"></script>
	<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.11.0/jquery.validate.min.js"></script>
	<script src="<?php echo bloginfo('template_url') . "/js/global.js"; ?>"></script>


	<!-- ChartBeat -->
	<script type="text/javascript">
	  var _sf_async_config = { uid: 19491, domain: 'gotyour6.org' };
	  (function() {
	    function loadChartbeat() {
	      window._sf_endpt = (new Date()).getTime();
	      var e = document.createElement('script');
	      e.setAttribute('language', 'javascript');
	      e.setAttribute('type', 'text/javascript');
	      e.setAttribute('src','//static.chartbeat.com/js/chartbeat.js');
	      document.body.appendChild(e);
	    };
	    var oldonload = window.onload;
	    window.onload = (typeof window.onload != 'function') ?
	      loadChartbeat : function() { oldonload(); loadChartbeat(); };
	  })();
	</script>


<?php
	wp_footer();
?>

</body>
</html>