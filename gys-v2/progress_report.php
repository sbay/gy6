<?php
/**
 * Template Name: Progress Report
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */

get_header(''); ?>


<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

	<div class="site-content cf">
		<div class="container cf">
			<div class="oblique_box cf" id="progress_report">
				<div class="row cf">

<?php the_content(); ?>

				</div>
			</div>
		</div>
	</div>

<?php endwhile; ?>


<?php get_footer('simple'); ?>