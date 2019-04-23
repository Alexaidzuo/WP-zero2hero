<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gulp-wordpress
 */
?>
<footer class="footer-single footer global " id="contact">
  <div class="container">
    <h2>Da li ste spremni za nove izazove?</h2>
    <a href="<?php the_field( 'google_form_for_register', 'option' ); ?>" class="btn <?php // mailchimp ( value )
$mailchimp_array = get_field( 'mailchimp', 'option' );
if ( $mailchimp_array ):
	foreach ( $mailchimp_array as $mailchimp_item ):
	 	echo $mailchimp_item;
	endforeach;
endif; ?>">Prijavi se sa sledeću grupu polaznika</a>
    <hr class="footer-line">
<?php if ( have_rows( 'footer_information', 'option' ) ) : ?>
<?php while ( have_rows( 'footer_information', 'option' ) ) : the_row(); ?>
    <div class="info">
      <h4>DAFED</h4>
<?php if ( have_rows( 'dafed' ) ) : ?>
<?php while ( have_rows( 'dafed' ) ) : the_row(); ?>
      <?php the_sub_field( 'footer_info_dafed' ); ?>
<?php if ( have_rows( 'social_dafed' ) ): ?>
<?php while ( have_rows( 'social_dafed' ) ) : the_row(); ?>
<?php if ( get_row_layout() == 'facebook' ) : ?>
      <a href="<?php the_sub_field( 'facebook' ); ?>"><img src="<?php echo esc_url( home_url() ); ?>/wp-content/themes/zero2hero/img/icons/facebook.svg" alt="DaFed Facebook"></a>
<?php elseif ( get_row_layout() == 'youtube' ) : ?>
      <a href="<?php the_sub_field( 'youtube' ); ?>"><img src="<?php echo esc_url( home_url() ); ?>/wp-content/themes/zero2hero/img/icons/youtube.svg" alt="DaFed Youtube"></a>
<?php elseif ( get_row_layout() == 'instagram' ) : ?>
      <a href="<?php the_sub_field( 'instagram' ); ?>"><img src="<?php echo esc_url( home_url() ); ?>/wp-content/themes/zero2hero/img/icons/instagram.svg" alt="DaFed Instagram"></a>
<?php elseif ( get_row_layout() == 'twitter' ) : ?>
      <a href="<?php the_sub_field( 'twitter' ); ?>"><img src="<?php echo esc_url( home_url() ); ?>/wp-content/themes/zero2hero/img/icons/twitter.svg" alt="DaFed Twitter"></a>
<?php endif; ?>
<?php endwhile; ?>
<?php else: ?>
<?php // no layouts found ?>
<?php endif; ?>
<?php endwhile; ?>
<?php endif; ?>
    </div>
<?php if ( have_rows( 'czor' ) ) : ?>
<?php while ( have_rows( 'czor' ) ) : the_row(); ?>
  <div class="info">
    <h4>CZOR</h4>
    <?php the_sub_field( 'footer_info_czor' ); ?>
<?php if ( have_rows( 'social_czor' ) ): ?>
<?php while ( have_rows( 'social_czor' ) ) : the_row(); ?>
<?php if ( get_row_layout() == 'facebook1' ) : ?>
    <a href="<?php the_sub_field( 'facebook' ); ?>"><img src="<?php echo esc_url( home_url() ); ?>/wp-content/themes/zero2hero/img/icons/facebook.svg" alt="CZOR Facebook"></a>
<?php elseif ( get_row_layout() == 'youtube1' ) : ?>
    <a href="<?php the_sub_field( 'youtube' ); ?>"><img src="<?php echo esc_url( home_url() ); ?>/wp-content/themes/zero2hero/img/icons/youtube.svg" alt="CZOR Youtube"></a>
<?php elseif ( get_row_layout() == 'instagram1' ) : ?>
    <a href="<?php the_sub_field( 'instagram' ); ?>"><img src="<?php echo esc_url( home_url() ); ?>/wp-content/themes/zero2hero/img/icons/instagram.svg" alt="CZOR Instagram"></a>
<?php elseif ( get_row_layout() == 'twitter1' ) : ?>
    <a href="<?php the_sub_field( 'twitter' ); ?>"><img src="<?php echo esc_url( home_url() ); ?>/wp-content/themes/zero2hero/img/icons/twitter.svg" alt="CZOR Twitter"></a>
<?php endif; ?>
<?php endwhile; ?>
<?php else: ?>
<?php // no layouts found ?>
<?php endif; ?>
  </div>
<?php endwhile; ?>
<?php endif; ?>
<?php endwhile; ?>
<?php endif; ?>
  </div>
  <div class="copyright">
    <p>&copy; Copyright <?php echo date('Y'); ?>, Design and Developed by <a href="mailto:ciricx@gmail.com">Aleksandar Ćirić</a></p>
  </div>
</footer>
<!-- Modal Subscribe CTA -->
<div class="modal">
  <div class="modal-wrap text-center">
    <div class="modal-inner">
<?php the_field( 'mailchimp_shortcode', 'option' ); ?>
      <button class="closed">
        <span></span>
        <span></span>
      </button>
    </div>
  </div>
</div>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-138406758-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-138406758-1');
</script>
<?php wp_footer(); ?>
</body>
</html>