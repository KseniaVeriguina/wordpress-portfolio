<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php // Load Meta ?>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php  wp_title('|', true, 'right'); ?></title>
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  <!-- animate css -->
  <link rel="stylesheet" href=" <?php bloginfo('template_url') ?>/animate.css">
  <!-- stylesheets should be enqueued in functions.php -->

  <?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>
<header id="top" style="background-image:url( <?php // the_field('hero_image'); ?> )">
  <div class="header_top">
    <div class="header_top_container wrapper">
      <!-- pulls in header_logo -->
      <img src="<?php the_field('header_logo'); ?>" alt="">
      <!-- pulls in main nav -->
      <nav class="main-nav">
        <?php wp_nav_menu( array(
          'container' => false,
          'theme_location' => 'primary'
        )); ?>
      </nav>
    </div> <!-- ./header_top_container wrapper -->
  </div> <!-- ./header_top -->
  <div class="wrapper">
    <h1> <?php the_field('header_title') ?> </h1>
    <p> <?php the_field('header_tagline') ?> </p>
    <a href="#contact">work with me</a>
  </div> <!-- ./wrapper -->
</header><!-- ./header-->

