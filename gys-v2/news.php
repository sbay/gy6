<?php
/**
 * Template Name: Include News
 */

get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

	<div class="site-content cf">
		<div class="container cf">			

<?php the_content(); ?>


<?php
// Include news section
$pagename = get_query_var('pagename');
$numNews = 0; $posts_per_page = 5;
$args = array(
	'posts_per_page' => -1,
	'category_name' => $pagename
);
?>
<?php $news_query = new WP_Query( $args ); ?>
<?php if ($news_query->have_posts()) { ?>
<div class="news-block">
	<h2>News</h2>
	<ul class="news-list cf">
<?php while ($news_query->have_posts()) : $news_query->the_post(); ?>
<?php
if ($numNews % $posts_per_page == 0) { echo "<li>"; }
$numNews++;
?>

<?php
$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
$src = $src[0];
?>
		<div class="media-item">
			<a class="section" rel="group" href="<?php the_permalink(); ?>">
<?php if ($src){ ?>
	<img src="<?php echo bloginfo(template_url); ?>/includes/timthumb.php?src=<?php echo $src;?>&w=240&h=180&zc=1" class="fluid" />
<?php } else {?>
	<img src="http://placehold.it/240x180" class="fluid" />
<?php } ?>
				<div class="heading"><?php the_title(); ?></div>
				<time><?php the_time("M d, Y");?></time>
			</a>
		</div>
<?php if ($numNews % $posts_per_page == 0) { echo "</li>"; } ?>
		
<?php endwhile; ?>
	</ul>
</div>
<?php } ?>
<?php wp_reset_postdata(); ?>
	
		</div>
	</div>


<?php endwhile; ?>


<?php get_footer(); ?>