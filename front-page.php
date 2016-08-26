<?php //index.php is the last resort template, if no other templates match ?>
<?php get_header(); ?>

<div class="main">
    <!-- ABOUT SECTION STARTS HERE -->
    <section id="about" class="about">
      <div class="about-image half">
          <!-- NOTES: DON'T DELETE: when having issues displaying images-->
          <!-- Get_ instead of The_ lets you store the info in the variable -->
              <!-- <?php $aboutImage = get_field('about_image'); ?> -->
          <!-- then print it out on the page, and use square brackets to dig deeper into the array object -->
              <!--  <pre><?php print_r($aboutImage['sizes']['medium']); ?></pre> -->
          <!-- use the found object info to create a url for the image -->
              <!-- <img src="<?php echo $aboutImage['sizes']['medium'] ?>"> -->
          <img src="<?php the_field('about_image') ?>">
      </div> <!-- ./about-image half-->
      <div class="about-text half">
        <div class="split-wrapper split-right">
          <h2><?php the_field('about_heading'); ?></h2>
          <p><?php the_field('about_tagline'); ?></p>
          <p><?php the_field('about_text'); ?></p>
          <a href="#contact">work with me</a>
        </div> <!-- ./split-wrapper split-right-->
      </div> <!-- ./about-info half-->
    </section>
    <!-- ABOUT SECTION ENDS HERE -->

    <!-- SKILLS SECTION STARTS-->
    <section id="skills" class="skills">

      <div class="skills-text half">
        <div class="split-wrapper split-left">
          <h2><?php the_field('skills_heading'); ?></h2>
          <p><?php the_field('skills_tagline'); ?></p>
        </div> <!-- ./split-wrapper split-left -->
      </div> <!-- ./skills-text half-->

      <div class="skills-image half">
        <div class="split-wrapper split-right skills-item-container">
        <?php while(have_rows('skills_item')): the_row();  ?>
          <div class="skills-item">
            <?php $skillsIcon = get_sub_field('skills_icon') ?>
            <?php echo $skillsIcon ?>
            <?php $skillsCaption = get_sub_field('skills_caption') ?>
            <p><?php echo $skillsCaption ?></p>
          </div> <!-- .skills-item -->
        <?php endwhile ?>
        </div> <!-- split-wrapper split-right skills-item-container-->
      </div> <!-- ./skills-image half-->

    </section>
    <!-- SKILLS SECTION ENDS-->

    <!-- PORTFOLIO SECTION STARTS -->
    <section id="portfolio" class="portfolio">
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
      <div class="wrapper">
        <h2><?php the_field('portfolio_heading'); ?></h2>
        <p><?php the_field('portfolio_tagline'); ?></p>
      </div> <!-- ./wrapper -->

    	<?php if ($portfolio->have_posts()): ?>
    	  <?php while ($portfolio->have_posts()) : $portfolio->the_post(); ?>
    	    <div class="portfolio-item">
            <div class="wrapper">
              <div class="portfolio-text smaller">
                <h2> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </h2>
                <p><?php the_field('short_desc') ?></p>
                <?php while(have_rows('skills_used')): the_row(); ?>
                  <span><?php the_sub_field('tech_name'); ?></span>
                <?php endwhile ?>
                <a href="<?php the_field('project_url'); ?>" target="_blank">view live</a>
              </div> <!-- ./portfolio-text -->

              <?php while(have_rows('images')): the_row();  ?>
              <div class="portfolio-image larger">
                <img src="<?php the_sub_field('image'); ?>">
              </div> <!-- ./portfolio-image -->
              <?php endwhile ?>

            </div> <!-- ./wrapper -->
    	    </div> <!-- ./portfolio-item -->

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
        <img src="<?php the_field('contact_image') ?>">
        <h2><?php the_field('contact_heading'); ?></h2>
        <p><?php the_field('contact_tagline'); ?></p>
        <!-- NOTES: DON'T DELETE: The main loop pulls up page content and title, custom fields can get pulled in outside of the loop -->
        
        <?php echo do_shortcode('[contact-form-7 id="46" title="Contact form 1"]'); ?>
    </section>
    <!-- CONTACT SECTION ENDS HERE -->

    <!-- <?php get_sidebar(); ?> -->
</div> <!-- /.main -->

<?php get_footer(); ?>