<?php
/**
 * The template for displaying posts in the Video post format
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<header class="entry-header cf">
			<h1><?php the_title(); ?></h1>
			<time class="entry-date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo get_the_date(); ?></time>
		</header><!-- .entry-meta -->

		<div class="entry-content cf">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentyten' ) ); ?>
		</div><!-- .entry-content -->

		<div class="video-wrapper cf">
			<div class="video-container">
				<?php echo get_post_meta($post->ID, 'video_code', TRUE); ?>
			</div>
		</div><!-- end video-wrapper -->

	</article><!-- #post -->
