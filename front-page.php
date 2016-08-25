<?php //index.php is the last resort template, if no other templates match ?>
<?php get_header(); ?>

<div class="main">



    <!-- ABOUT SECTION STARTS HERE -->
    <section id="about">
        <!-- NOTES: DON'T DELETE: when having issues displaying images-->
        <!-- Get_ instead of The_ lets you store the info in the variable -->
            <!-- <?php $aboutImage = get_field('about_image'); ?> -->
        <!-- then print it out on the page, and use square brackets to dig deeper into the array object -->
            <!--  <pre><?php print_r($aboutImage['sizes']['medium']); ?></pre> -->
        <!-- use the found object info to create a url for the image -->
            <!-- <img src="<?php echo $aboutImage['sizes']['medium'] ?>"> -->
        <?php $aboutImage = get_field('about_image') ?>
        <img src="<?php echo $aboutImage['sizes']['medium'] ?>">
        <h2><?php the_field('about_heading'); ?></h2>
        <p><?php the_field('about_tagline'); ?></p>
        <p><?php the_field('about_text'); ?></p>
    </section>
    <!-- ABOUT SECTION ENDS HERE -->

    <!-- SKILLS SECTION STARTS-->
    <section id="skills">
        <h2><?php the_field('skills_heading'); ?></h2>
        <p><?php the_field('skills_tagline'); ?></p>

        <?php while(have_rows('skills_item')): the_row();  ?>
          <?php $skillsIcon = get_sub_field('skills_icon') ?>
          <?php echo $skillsIcon ?>
          <?php $skillsCaption = get_sub_field('skills_caption') ?>
          <p> <?php echo $skillsCaption ?> </p>
        <?php endwhile ?>
    </section>
    <!-- SKILLS SECTION ENDS-->

    <!-- PORTFOLIO SECTION STARTS -->
    <section id="portfolio">
    	<!-- Custom query starts -->
    	<?php 
    	  $portfolio = new WP_Query(
    	    array(
    	      'post_type' => 'portfolio',
    	      'posts_per_page' => -1,
    	      'order' => 'ASC'
    	    )
    	  );
    	?>
    	<!-- Custom query ends -->
    	<!-- Custom loop starts -->
    	<h2><?php the_field('portfolio_heading'); ?></h2>
        <p><?php the_field('portfolio_tagline'); ?></p>
    	<?php if ($portfolio->have_posts()): ?>
    	  <?php while ($portfolio->have_posts()) : $portfolio->the_post(); ?>
    	    <div class="portfolio-item">
    	      <h2> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </h2>

    	      <?php while(have_rows('images')): the_row();  ?>
                <div class="portfolio-image">
        	        <img src="<?php the_sub_field('image'); ?>">
                </div>
    	      <?php endwhile ?>

    	      <p><?php the_field('short_desc') ?></p>
    	    </div>
    	  <?php endwhile; ?>
    	  <?php wp_reset_postdata(); ?>
    	<?php endif; ?>
    	<!-- Custom loop ends -->
    </section>
    <!-- PORTFOLIO SECTION ENDS -->

    <!-- BLOG SECTION STARTS -->
    <section id="blog">
    	<!-- 2nd custom query starts -->
    	<?php 
            $posts = new WP_Query(
              array(
                'post_type' => 'post',
                'posts_per_page' => -1,
                'order' => 'ASC'
              )
            );
        ?>
        <!-- 2nd custom query ends -->
        <!-- 2nd custom loop starts -->
        <h2><?php the_field('blog_heading'); ?></h2>
        <p><?php the_field('blog_tagline'); ?></p>
        <?php if ($posts->have_posts()): ?>
            <?php while ($posts->have_posts()) : $posts->the_post(); ?>
              <div class="posts">
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <p><?php the_content(); ?></p>
              </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>
        <!-- 2nd custom loop ends -->
    </section>
    <!-- BLOG SECTION ENDS -->

    <!-- CONTACT SECTION STARTS HERE -->
    <section id="contact">
        <?php $contactImage = get_field('contact_image') ?>
        <img src="<?php echo $contactImage['sizes']['medium'] ?>">
        <h2><?php the_field('contact_heading'); ?></h2>
        <p><?php the_field('contact_tagline'); ?></p>
        <!-- NOTES: DON'T DELETE: The main loop pulls up page content and title, custom fields can get pulled in outside of the loop -->
        
        <?php echo do_shortcode('[contact-form-7 id="46" title="Contact form 1"]'); ?>
        
    </section>
    <!-- CONTACT SECTION ENDS HERE -->

    <!-- <?php get_sidebar(); ?> -->
</div> <!-- /.main -->

<?php get_footer(); ?>