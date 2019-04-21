<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package gulp-wordpress
 */

?>

<section class="no-results not-found container">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Traženi sadržaj trenutno nije pronađen', 'gulp-wordpress' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'gulp-wordpress' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php esc_html_e( 'Žao nam je, ali ništa ne odgovara vašim pojmovima za pretraživanje. Pokušajte ponovo sa nekim drugim ključnim rečima.', 'gulp-wordpress' ); ?></p>
			<?php
				get_search_form();

		else : ?>

			<p><?php esc_html_e( 'Izgleda da ne možemo da pronađemo ono što tražite. Možda pretraživanje može pomoći.', 'gulp-wordpress' ); ?></p>
			<?php
				get_search_form();

		endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
