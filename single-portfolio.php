<?php

/*
  Template Name: Full Page, No Sidebar
*/

get_header();  ?>

<div class="main">
	<div class="container">
	<?php // Start the loop ?>
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

		<h2><?php the_title(); ?></h2>
		<?php the_content(); ?>
		<?php the_field('client_name'); ?>
		<?php the_field('short_desc'); ?>
		<!-- grabs image -->
		<?php while(have_rows('images')): the_row();  ?>
			<!-- This was initially used t grab image from custom field, as the image return was set to Object and NOT url (changed in dashboard) -->
			<!-- <?php // $image = get_sub_field('image') ?> -->
			<!-- <img src="<?php // echo $image['sizes']['medium'] ?>"> -->
			<img src="<?php the_sub_field('image'); ?>">
		<?php endwhile ?>

		<?php while(have_rows('skills_used')): the_row(); ?>
			<span><?php the_sub_field('tech_name'); ?></span>
		<?php endwhile ?>

	<?php endwhile; // end the loop?>
	</div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>