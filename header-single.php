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
  <meta property="og:title" content="My Career From Zero To Hero">
  <meta property="og:url" content="<?php echo esc_url( home_url() ); ?>">
  <meta property="og:site_name" content="Zero2hero">
  <meta property="og:description" content="Nudimo ti mogućnost da razviješ veštine veb dizajna, front-end programiranja i prenosive veštine uz pomoć stručnog tima. ">
  <link rel="shortcut icon" href="<?php echo esc_url( home_url() ); ?>/favicon.ico/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" sizes="180x180" href="favicon.ico/apple-icon-180x180.png">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
<?php wp_head(); ?>
</head>

<body class="single">
<header class="header-post">
  <div id="heros-post"></div>
  <div class="header">
    <a href="<?php echo esc_url( home_url() ); ?>"><img src="<?php echo esc_url( home_url() ); ?>/wp-content/themes/zero2hero/img/logo.svg" class="logo" alt="My Career From Hero To Zero"></a>
    <nav class="nav">
      <div class="menu-toggle">
        <div class="hamburger"></div>
      </div>
      <!-- Primary menu -->
<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => '' ) ); ?>

    </nav>
  </div>
</header>