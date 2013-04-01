<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */
?>
<?php
// Enqueue Contact Form 7 JS only on Contact page
if ( is_page('contact') && function_exists( 'wpcf7_enqueue_scripts' ) ) {
	wpcf7_enqueue_scripts();
}
?><!DOCTYPE HTML>
<!--[if lt IE 9]><html class="ie no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"> -->
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<meta name="author" content="Stas Baydakov - thesblab.com" />

	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	
	<link rel="shortcut icon" href="/favicon.ico">


<script type="text/javascript">
  var _gaq = _gaq || [];
  var pluginUrl = '//www.google-analytics.com/plugins/ga/inpage_linkid.js';
  _gaq.push(['_require', 'inpage_linkid', pluginUrl]);
  _gaq.push(['_setAccount', 'UA-30760013-1']);
  _gaq.push(['_setDomainName', 'gotyour6.org']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>

<!-- ChartBeat -->
<script type="text/javascript">var _sf_startpt=(new Date()).getTime()</script>

<?php
	wp_head();
?>
</head>

<body <?php body_class(); ?>>

	<header class="site-header cf">
		<div class="container cf">
			<h1><a href="<?php echo home_url( '/' ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			
			<nav class="site-nav nav cf">
				<?php wp_nav_menu( array( 'container' => false, 'theme_location' => 'primary' ) ); ?>
			</nav>
		</div>
	</header>