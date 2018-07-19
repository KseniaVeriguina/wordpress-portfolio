<?php
// This file will contain hero section on the site.

if ( is_front_page() ) { // For front page display hero section.
?>
	<div class="header-bottom">
		<div class="header-text">
			<h1><?php the_field( 'header_title' ); ?></h1>
			<p><?php the_field( 'header_tagline' ); ?></p>
			<a href="#contact" class="accent-button">contact</a>
		</div>
	</div>
<?php
} else {
?>
	<div class="blog-header-bottom">
		<div class="">
			<h1><?php echo get_the_title(); ?></h1>
		</div>
	</div>
<?php
}
