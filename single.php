<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package gulp-wordpress
 */

?>
<?php get_header('single'); ?>
<div class="container blog">
<h3>Blog</h3>
</div>
<?php
while ( have_posts() ) : the_post();
get_template_part( 'template-parts/content', get_post_format() );

endwhile; // End of the loop.
?>
<?php
get_sidebar();
get_footer('single');
