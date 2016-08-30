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
<!-- checkbox input (display:none) for slide-out nav -->
<input type="checkbox" id="toggle" name="toggle" class="toggle-checkbox">

<header id="top" style="background-image:url( <?php the_field('hero_image'); ?> )">
  <label for="toggle" class="toggle-label"><i class="fa fa-bars" aria-hidden="true"></i></label>
  <div class="header_top">
    <img src="<?php the_field('header_logo'); ?>" alt="" class="header-logo">
    <nav class="main-nav">
      <?php wp_nav_menu( array(
        'container' => false,
        'theme_location' => 'primary'
      )); ?>
    </nav>
  </div> <!-- ./header_top -->


  <div class="header-bottom">
    <div class="half"></div>
    <div class="half">
      <div class="split-wrapper split-right">
        <h1> <?php the_field('header_title') ?> </h1>
        <p> <?php the_field('header_tagline') ?> </p>
        <a href="#contact" class="accent-button">contact</a>
      </div> <!-- ./split-wrapper split-right -->
    </div> <!-- ./half -->
  </div> <!-- ./header-bottom -->
</header><!-- ./header-->

