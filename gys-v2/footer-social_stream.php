<?php
/**
 * The template for displaying the footer.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */
?>




	<!-- JS Scripts -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="<?php echo bloginfo('template_url') . "/js/jquery-1.9.0.min.js"; ?>"><\/script>')</script>
	<script src="<?php echo bloginfo('template_url') . "/js/jquery-migrate-1.1.1.min.js"; ?>"></script>
	<script src="<?php echo bloginfo('template_url') . "/js/jquery.social.stream.wall.1.3.js"; ?>"></script>
	<script src="<?php echo bloginfo('template_url') . "/js/jquery.social.stream.1.5.min.js"; ?>"></script>
	
<script>
	$('#social-stream').dcSocialStream({
		feeds: {
			twitter: {
				id: 'GotYourSix,#gotyour6',
				thumb: true,
				url: '/twitter.php'
			},
			facebook: {
				id: '184494718313537',
				text: 'contentSnippet'
			},
			youtube: {
				id: 'GotYour6Campaign'
			},
			pinterest: {
				id: 'GotYour6'
			},
			instagram: {
				id: '!54593814,#gotyour6',
				accessToken: '54593814.f52b28a.1dc9a83ff5d1485b8f11be1abc5111f8',
				clientId: 'f52b28a78fc6402e812e22d386033da9',
				comments: 2,
				likes: 4
			}
		},
		rotate: {
			delay: 0
		},
		twitterId: 'GotYourSix',
		control: false,
		filter: true,
		wall: true,
		//cache: false,
		max: 'limit',
		limit: 10,
		order: 'random',
		iconPath: '/wp-content/themes/gys-v2/img/social/stream-icons/',
		imagePath: '/wp-content/themes/gys-v2/img/social/'
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