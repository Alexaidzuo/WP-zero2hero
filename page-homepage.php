<?php
/*
 Template Name: Homepage
 */

get_header('homepage'); ?>
<!-- SECTION PROGRAM -->
<section class="program" id="program">
  <div class="container">
<?php if ( have_rows( 'program_information' ) ): ?>
<?php while ( have_rows( 'program_information' ) ) : the_row(); ?>
<?php if ( get_row_layout() == 'block' ) : ?>
<?php if ( have_rows( 'block_info' ) ) : ?>
<?php while ( have_rows( 'block_info' ) ) : the_row(); ?>
    <h2><?php the_sub_field( 'block_title' ); ?></h2>
	<?php the_sub_field( 'block_text' ); ?>
<?php endwhile; ?>
<?php endif; ?>
<?php elseif ( get_row_layout() == 'columns' ) : ?>
<?php if ( have_rows( 'columns_info' ) ) : ?>
    <div class="program-tab clearfix">
<?php while ( have_rows( 'columns_info' ) ) : the_row(); ?>
      <div class="program-icon">
<?php $info_image = get_sub_field( 'info_image' ); ?>
<?php if ( $info_image ) { ?>
        <img src="<?php echo $info_image['url']; ?>" alt="<?php echo $info_image['alt']; ?>" />
<?php } ?>
		<h3><?php the_sub_field( 'info_title' ); ?></h3>
		<?php the_sub_field( 'info_text' ); ?>
      </div>
<?php endwhile; ?>
    </div>
<?php else : ?>
<?php // no rows found ?>
<?php endif; ?>
<?php endif; ?>
<?php endwhile; ?>
<?php else: ?>
<?php // no layouts found ?>
<?php endif; ?>
</section>
<!-- SECTION TEACHERS -->
<section class="teachers">
  <div class="container">
    <h2>Ko su predavači?</h2>
    <div class="clearfix">
<?php if ( have_rows( 'teacher' ) ) : ?>
<?php while ( have_rows( 'teacher' ) ) : the_row(); ?>
      <div class="teacher">
        <div class="profile">
<?php $teacher_image = get_sub_field( 'teacher_image' ); ?>
<?php if ( $teacher_image ) { ?>
          <img src="<?php echo $teacher_image['url']; ?>" alt="<?php echo $teacher_image['alt']; ?>" />
<?php } ?>
          <a href="<?php the_sub_field( 'linkedin_profile' ); ?>" target="_blank" class="<?php
			$linkedIn_profile = get_sub_field( 'linkedin_profile' );
			if (!empty($linkedIn_profile)) {
			echo 'overlay';
			} else{
			echo 'hidden';
			}
			?>"><i class="Linked-in"></i></a>
        </div>
        <h3><?php the_sub_field( 'teacher_full_name' ); ?></h3>
        <p><?php the_sub_field( 'teacher_position' ); ?></p>
      </div>
<?php endwhile; ?>
<?php else : ?>
<?php // no rows found ?>
<?php endif; ?>
    </div>
</section>
<!-- SECTION TESTIMONIAL -->
<section class="testimonials">
  <div class="container">
    <h2>Utisci naših polaznika</h2>
    <div class="testimonial-slider">
<?php if ( have_rows( 'testimonials' ) ) : ?>
<?php while ( have_rows( 'testimonials' ) ) : the_row(); ?>
      <div class="profile-testimonial clearfix">
        <div class="student-testimonial">
          <h3><?php the_sub_field( 'student_full_name' ); ?></h3>
          <p><?php the_sub_field( 'student_testimonial' ); ?></p>
        </div>
      </div>
<?php endwhile; ?>
<?php else : ?>
<?php // no rows found ?>
<?php endif; ?>
    </div>
  </div>
</section>
<!-- SECTION GALLERY -->
<section class="gallery">
<div id="bg-gallery">
  <span></span>
  <span></span>
  <span></span>
  <span></span>
</div>
  <h2>Galerija</h2>
<?php
$galleryCategory = array (
	'post_type' => 'gallery',
	'post_status' => 'publish',
	'posts_per_page' => '1',
	'orderby' => 'date',
	'order' => 'desc',
	);
	$query = new WP_Query( $galleryCategory );
	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();
		}
	}
$the_query = new WP_Query( $galleryCategory ); ?>
<?php if ( $the_query->have_posts() ) : ?>
<header class="container gallery-title">
</header>
<section class="gallery-categories clearfix">
<div class="container">
<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
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
<?php endwhile; ?>
</div>
</section>
<?php wp_reset_postdata(); ?>
<?php else : ?>
	<p><?php esc_html_e( 'Izvinjavamo se, trenutno ne postoji ni jedan album.' ); ?></p>
<?php endif; ?>
</section>
<!-- SECTION ABOUT US -->
<section class="about-us">
  <div class="container" id="about-us">
    <h2>O nama</h2>
    <p><?php the_field( 'intro_text' ); ?></p>
    <div class="clearfix">
<?php if ( have_rows( 'organizations' ) ) : $counter = 0; ?>
<?php while ( have_rows( 'organizations' ) ) : the_row(); ($counter <= 6); ?>
      <div class="organization">
<?php $organization_logo = get_sub_field( 'organization_logo' ); ?>
<?php if ( $organization_logo ) { ?>
  <a href="<?php the_sub_field( 'organization_website_' ); ?>" target="_blank"><img src="<?php echo $organization_logo['url']; ?>" alt="<?php echo $organization_logo['alt']; ?>" class="orgImage-<?php echo $counter++ ?>" /></a>
<?php } ?>
        <h2><?php the_sub_field( 'organization_name' ); ?></h2>
        <p><?php the_sub_field( 'organization_text' ); ?></p>
      </div>
<?php endwhile; ?>
<?php else : ?>
<?php // no rows found ?>
<?php endif; ?>
    </div>
</section>
<!-- SECTION DONATORS AND SPONSORS -->
<section class="support clearfix">
  <div class="container" id="donators-and-partners">
    <h2>Donatori i partneri</h2>
    <p><?php the_field( 'donators_&_partners_intro' ); ?></p>
    <div class="donators">
<?php if ( have_rows( 'donators_logo' ) ) : ?>
<?php while ( have_rows( 'donators_logo' ) ) : the_row(); ?>
<?php $insert_donator_logo = get_sub_field( 'insert_donator_logo' ); ?>
<?php if ( $insert_donator_logo ) { ?>
		<a href="<?php the_sub_field( 'donator_website_url' ); ?>" target="_blank"><img src="<?php echo $insert_donator_logo['url']; ?>" alt="<?php echo $insert_donator_logo['alt']; ?>" /></a>
<?php } ?>
<?php endwhile; ?>
<?php else : ?>
<?php // no rows found ?>
<?php endif; ?>
	</div>
<?php if ( have_rows( 'partners_logo' ) ) : ?>
    <div class="partners clearfix">
<?php while ( have_rows( 'partners_logo' ) ) : the_row(); ?>
<?php $insert_partner_logo = get_sub_field( 'insert_partner_logo' ); ?>
<?php if ( $insert_partner_logo ) { ?>
		<a href="<?php the_sub_field( 'partner_website_url' ); ?>" target="_blank"><img src="<?php echo $insert_partner_logo['url']; ?>" alt="<?php echo $insert_partner_logo['alt']; ?>" /></a>
<?php } ?>
<?php endwhile; ?>
<?php else : ?>
<?php // no rows found ?>
    </div>
<?php endif; ?>
	</div>
</section>
<?php
get_sidebar();
get_footer();