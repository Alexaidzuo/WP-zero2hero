<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package gulp-wordpress
 */

?>
<?php get_header(); ?>

<div class="container">
    <h3 class="singlePage-postTitle"><?php the_title() ?></h3>
</div>

<section class="clearfix">
<div class="container" id="gallery">
<?php $gallery_images = get_field( 'gallery' ); ?>
<?php if ( $gallery_images ) :  ?>
<?php foreach ( $gallery_images as $gallery_image ): ?>
	<a href="<?php echo $gallery_image['url']; ?>" class="gallery-box"><img src="<?php echo $gallery_image['sizes']['thumbnail']; ?>" alt="<?php echo $gallery_image['alt']; ?>" class="gallery-img" /></a>
<?php endforeach; ?>
<?php endif; ?>
</div>
</section>

<?php
get_footer();