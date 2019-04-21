<?php
/*
 Template Name: Students
 */
get_header(); ?>
<?php
$studentsCategory = array (
	'post_type' => 'students',
	'post_status' => 'publish',
	'posts_per_page' => '9',
	'orderby' => 'date',
	'order' => 'desc',
	);
	$query = new WP_Query( $studentsCategory );
	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();
		}
	}

// the query
$the_query = new WP_Query( $studentsCategory ); ?>

<?php if ( $the_query->have_posts() ) : ?>
<header class="container">
	<h3 class="singlePage-postTitle">Studenti</h3>
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
	<p><?php esc_html_e( 'Izvinjavamo se, trenutno ne postoji ni jedan student.' ); ?></p>
<?php endif; ?>

<section>
<div class="container">
<?php if ( have_rows( 'student' ) ) : ?>
	<?php while ( have_rows( 'student' ) ) : the_row(); ?>
		<?php $profil_picture = get_sub_field( 'profil_picture' ); ?>
		<?php if ( $profil_picture ) { ?>
			<img src="<?php echo $profil_picture['url']; ?>" alt="<?php echo $profil_picture['alt']; ?>" />
		<?php } ?>
		<?php the_sub_field( 'student_full_name' ); ?>
		<?php $student_cv = get_sub_field( 'student_cv' ); ?>
		<?php if ( $student_cv ) { ?>
			<a href="<?php echo $student_cv['url']; ?>"><?php echo $student_cv['filename']; ?></a>
		<?php } ?>
		<?php the_sub_field( 'student_git_profile' ); ?>
	<?php endwhile; ?>
<?php else : ?>
	<?php // no rows found ?>
<?php endif; ?>
</div>
</section>
<?php
get_footer();