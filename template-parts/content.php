<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package gulp-wordpress
 */
?>
<section class="single-post">
<article >
<header>
<?php
	if ( has_post_thumbnail() ) {
		the_post_thumbnail();
	} ?>
<div class="entry-content">
<?php
	if ( is_single() ) {
		the_title( '<h2 class="entry-title">', '</h2>' );
	} else {
		the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
	}

if ( 'post' === get_post_type() ) : ?>
</div>
<div class="entry-meta">
	<p>ISTANKNUTO <?php the_time('d.m.Y.') ?></p>
</div>
<!-- .entry-meta -->
<?php
endif; ?>
</header><!-- .entry-header -->
<div class="entry-content">
<?php
	the_content( sprintf(
		/* translators: %s: Name of current post. */
		wp_kses( __( 'Pročitaj više <span class="meta-nav">&rarr;</span>', 'gulp-wordpress' ), array( 'span' => array( 'class' => array() ) ) ),
		the_title( '<span class="screen-reader-text">"', '"</span>', false )
	) );

	wp_link_pages( array(
		'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'gulp-wordpress' ),
		'after'  => '</div>',
	) );
?>
</div><!-- .entry-content -->
<footer class="entry-footer">
	<?php gulp_wordpress_entry_footer(); ?>
</footer><!-- .entry-footer -->
</article><!-- #post-## -->
</section>
