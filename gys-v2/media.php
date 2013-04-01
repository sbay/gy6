<?php
/**
 * Template Name: Media Page
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */

get_header(); ?>


<?php

// http://stackoverflow.com/questions/3386154/showing-wordpress-posts-on-two-pages?rq=1s
// http://wp.tutsplus.com/tutorials/theme-development/a-beginners-guide-to-the-wordpress-loop/

// Setup variables and get all posts
$featured_posts = ''; $regular_posts = '';
$postNo = 0; $featuredNo = 0;

// Select which categories to get the posts from (can use an array)
$cats = array(21);
$cat_string = implode(',', $cats);

// Set arguments for the query
$args = array(
	'posts_per_page' => -1,
	'category' => $cat_string
);

// Run the query
$media_posts = get_posts( $args );

// Loop through the query
foreach($media_posts as $post) : setup_postdata($post);

	// Increase the iteration; current post number
	$postNo++;

	// Determine the post type and assign it as a class
	$mediaType = '';
	foreach ($post->post_category as $k => $v) {
		switch ($v) {
			case 3:		$mediaType .= ' press'; break;
			case 13:	$mediaType .= ' video'; break;
			case 18:	$mediaType .= ' photo'; break;
		}
	}

	// Retrieve post's thumbnail image
	$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
	$src = $src[0];

	// If there is a thumbnail assigned, use it; otherwise, pull a placeholder image
	if ($src) {
		$post_image = '<img src="' . get_bloginfo(template_url) . '/includes/timthumb.php?src=' . $src . '&w=240&h=180&zc=1" class="fluid" />';
	} else {
		$post_image = '<img src="http://placehold.it/240x180" class="fluid" />';
	}


	// Determine if the current media post is marked as FEATURED
	$is_featured = get_post_meta($post->ID, 'featured', TRUE);

	// Treat posts according to their FEATURED status
	if ($is_featured && $featuredNo <= 5) {
		$featuredNo++;
		$featured_posts .= '<li data-id="id-' . $postNo . '" class="media-item ' . $mediaType . '">' .
						'<a class="section" rel="featured_group" href="' . get_permalink() . '">' . $post_image . 
						'<div class="heading">' . get_the_title() . '</div>' .
						'<time>' . get_the_time("M d Y") . '</time>' . 
						'</a></li>';

	} else {
		$regular_posts .= '<div data-id="id-' . $postNo . '" class="media-item ' . $mediaType . '">' .
						'<a class="section" rel="regular_group" href="' . get_permalink() . '">' . $post_image . 
						'<div class="heading">' . get_the_title() . '</div>' .
						'<time>' . get_the_time("M d Y") . '</time>' . 
						'</a></div>';

	}

endforeach;
?>

<?php wp_reset_postdata(); ?>



	<div class="site-content cf">
		<div class="container cf">
			<ul class="media cf" id="featured_media">
<?= $featured_posts ?>
			</ul>
			
			<hr />

			<ul class="media cf" id="media">
<?= $regular_posts ?>
			</ul>
		</div>
	</div>



<?php get_footer(); ?>