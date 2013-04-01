<?php
/**
 * Template Name: Social Stream
 *
 * This is the template that displays all pages by default.
 * Please note that this is the wordpress construct of pages
 * and that other 'pages' on your wordpress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */

get_header('media'); ?>



<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	

		<?php the_content(); ?>


<?php endwhile; ?>


<div id="social-stream"></div>


<?php get_footer('social_stream'); ?>