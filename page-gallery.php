<?php
/*
 Template Name: Gallery
 */
get_header(); ?>

<?php
$galleryCategory = array (
	'post_type' => 'gallery',
	'post_status' => 'publish',
	'posts_per_page' => '9',
	'orderby' => 'date',
	'order' => 'desc',
	);
	$query = new WP_Query( $galleryCategory );
	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();
		}
	}

// the query
$the_query = new WP_Query( $galleryCategory ); ?>

<?php if ( $the_query->have_posts() ) : ?>
<header class="container">
	<h3 class="singlePage-postTitle">Galerija</h3>
</header>
<section class="gallery-categories clearfix">
	<div class="container">
	<!-- the loop -->
	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

	<div class="gallery-category">
	<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('thumbnail'); ?><h4><?php the_title() ?></h4></a>
	</div>
	<?php endwhile; ?>
	<!-- end of the loop -->
	<!-- pagination here -->
	</div>
</section>
<?php wp_reset_postdata(); ?>
<?php else : ?>
	<p><?php esc_html_e( 'Izvinjavamo se, trenutno ne postoji ni jedan album.' ); ?></p>
<?php endif; ?>

<?php
get_footer();