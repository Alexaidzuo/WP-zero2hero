<?php
/**
 * The header for our homepage.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gulp-wordpress
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Nudimo ti mogućnost da razviješ veštine veb dizajna, front-end programiranja i prenosive veštine uz pomoć stručnog tima.">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:site" content="@Zero2hero">
  <meta name="twitter:title" content="My Career From Zero To Hero">
  <meta name="twitter:description" content="Nudimo ti mogućnost da razviješ veštine veb dizajna, front-end programiranja i prenosive veštine uz pomoć stručnog tima.">
  <meta name="twitter:image" content="<?php echo esc_url( home_url() ); ?>/wp-content/themes/zero2hero/preview.png">
  <meta property="og:image" content="<?php echo esc_url( home_url() ); ?>/wp-content/themes/zero2hero/preview.png" itemprop="thumbnailUrl">
  <meta property="og:title" content="My Career From Zero To Hero">
  <meta property="og:url" content="<?php echo esc_url( home_url() ); ?>">
  <meta property="og:site_name" content="Zero2hero">
  <meta property="og:description" content="Nudimo ti mogućnost da razviješ veštine veb dizajna, front-end programiranja i prenosive veštine uz pomoć stručnog tima. ">
  <link rel="shortcut icon" href="<?php echo esc_url( home_url() ); ?>/favicon.ico/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" sizes="180x180" href="favicon.ico/apple-icon-180x180.png">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header class="homepage">
  <div id="heros">
    <span></span>
    <span></span>
  </div>
  <div class="header">
    <a href="<?php echo esc_url( home_url() ); ?>"><img src="<?php echo esc_url( home_url() ); ?>/wp-content/themes/zero2hero/img/logo.svg" class="logo" alt="My Career From Hero To Zero"></a>
    <nav class="nav">
      <div class="menu-toggle">
        <div class="hamburger"></div>
      </div>
<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => '' ) ); ?>

    </nav>
    <div class="hero">
      <div class="container padding-top">
        <?php
  $HeroContent = get_field( 'hero_information', 'option' );
  if(!empty($HeroContent)) {
    the_field('hero_information', 'option');
  } else {
    echo '<h1>My Career<br /> <strong>FROM ZERO TO HERO</strong></h1>
        <p>Nudimo ti mogućnost da razviješ veštine <strong>veb dizajna</strong>, <strong>front-end programiranja</strong> i <strong>prenosive veštine</strong> uz pomoć stručnog tima. </p>';
  }
  ?>

        <a href="<?php the_field( 'google_form_for_register' , 'option'); ?>" class="btn <?php // mailchimp ( value )
$mailchimp_array = get_field( 'mailchimp', 'option' );
if ( $mailchimp_array ):
	foreach ( $mailchimp_array as $mailchimp_item ):
	 	echo $mailchimp_item;
	endforeach;
endif; ?>"><?php
      $CTAtext = get_field( 'button_text' , 'option');
      if (!empty($CTAtext)) {
        the_field( 'button_text' , 'option' );
      } else{
        echo 'PRIJAVI SE ZA KURS';
      }
    ?></a>
      </div>
    </div>
    <div id="logo-kid">
      <img src="<?php echo esc_url( home_url() ); ?>/wp-content/themes/zero2hero/img/logo-kid.svg" class="logo-kid" alt="From Zero To Hero Fly">
    </div>
  </div>
</header>