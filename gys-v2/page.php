<?php
/**
 * The template for displaying all pages.
 */

get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<?php
// If the parent page has sub pages then redirect to the first sub page
$redirecting_posts = array(10); // List parent pages' post ID numbers

$pagekids = get_pages("child_of=".$post->ID."&sort_column=menu_order");
if ($pagekids & in_array($post->ID, $redirecting_posts)) {
	$firstchild = $pagekids[0];
	wp_redirect(get_permalink($firstchild->ID));
}
?>

	<div class="site-content cf">
		<div class="container cf">			

<?php the_content(); ?>
	
		</div>
	</div>

<?php endwhile; ?>

<?php /* get_sidebar(); */ ?>
<?php get_footer(); ?>