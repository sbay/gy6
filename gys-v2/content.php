<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
		<div class="featured-post cf">
			<?php _e( 'Featured post', 'twentyten' ); ?>
		</div>
		<?php endif; ?>

		<header class="entry-header cf">
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<time class="entry-date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo get_the_date(); ?></time>
		</header>

		<?php the_post_thumbnail('medium', array('class' => 'press-thumbnail alignleft')); ?>

		<div class="entry-content cf">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentyten' ) ); ?>
			<?php //wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
		</div>

	</article>
