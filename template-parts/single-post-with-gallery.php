<?php
/**
 * Template part for displaying posts.
 * Template Name: With Gallery
 * Template Post Type: post
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package gulp-wordpress
 */
get_header('single');
?>
<section class="single-post-with-gallery">
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
<section class="gallery">
<?php $post_object = get_field( 'find_a_gallery' ); ?>
<?php if ( $post_object ): ?>
<?php $post = $post_object; ?>
<?php setup_postdata( $post ); ?>
<header class="container gallery-title">
</header>
<section class="gallery-categories clearfix">
    <div class="container">
        <a href="<?php the_permalink() ?>" class="featured-article">
            <div class="featured-article-image">
                <?php the_post_thumbnail('large'); ?>
            </div>
            <div class="featured-article-content">
                <h4 class="common-IntroText featured-article-title">
                    <?php the_title() ?>
                </h4>
                <p class="common-BodyText featured-article-subtitle"><?php the_field( 'short_description' ); ?></p>
            </div>
        </a>
    </div>
</section>
<?php wp_reset_postdata(); ?>
<?php endif; ?>
</section>
</section>
<?php
get_sidebar();
get_footer('copyright');