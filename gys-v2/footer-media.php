<?php
/**
 * The template for displaying the footer.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */
?>


	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="<?php echo bloginfo('template_url') . "/js/jquery-1.9.0.min.js"; ?>"><\/script>')</script>

	<script>
		// Open external links in new windows
		$('a[rel="external"]').click( function() {
			window.open( $(this).attr('href') );
			return false;
		});
		
		// Open all external links in a new window
		$('a').each(function() {
			if ( !($(this).hasClass('live') || $(this).hasClass('fancybox.iframe') || $(this).hasClass('fancybox') || $(this).attr('rel') == "fancybox") ) {
				var a = new RegExp('/' + window.location.host + '/'); var b = new RegExp('postback');
				if(!a.test(this.href) && !b.test(this.href.toLowerCase())) {
					$(this).click(function(event) {
						event.preventDefault(); event.stopPropagation(); window.open(this.href, '_blank');
					});
				}
			}
		});
	</script>


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