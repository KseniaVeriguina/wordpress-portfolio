<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php get_template_part( 'templates/header/meta' ); ?>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!-- checkbox input (display:none) for slide-out nav -->
<input type="checkbox" id="toggle" name="toggle" class="toggle-checkbox">

<header id="top" style="background-image:url( <?php the_field('hero_image'); ?> )">
    <label for="toggle" class="toggle-label">
        <i class="fa fa-bars" aria-hidden="true"></i>
    </label>
    <div class="header_top">
        <?php
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $image          = wp_get_attachment_image_src( $custom_logo_id , 'full' );
        ?>
        <img src="<?php echo $image[0]; ?>" alt="" class="header-logo">
        <nav class="main-nav">
        <?php wp_nav_menu( array(
            'container'      => false,
            'theme_location' => 'primary',
        )); ?>
        </nav>
    </div> <!-- ./header_top -->

    <?php get_template_part( 'templates/header/hero' ); ?>
</header><!-- ./header-->

