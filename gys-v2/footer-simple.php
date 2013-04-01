<?php
/**
 * The template for displaying the footer.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */
?>

	<footer class="site-footer cf">
		<div class="container cf">

			<div class="heading report-title left"><span>Official Status Report</span> (as of 1/24/13)</div>

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