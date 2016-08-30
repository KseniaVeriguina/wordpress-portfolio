<?php //index.php is the last resort template, if no other templates match ?>
<?php get_header(); ?>

<main>
  <!-- ABOUT SECTION STARTS HERE -->
  <section id="about" class="about">
    <div class="about-image half">
        <img src="<?php the_field('about_image') ?>">
    </div> <!-- ./about-image half-->
    <div class="about-text half main-padding">
      <div class="split-wrapper split-right">
        <h2><?php the_field('about_heading'); ?></h2>
        <p class="tagline"><?php the_field('about_tagline'); ?></p>
        <p class="description"><?php the_field('about_text'); ?></p>
        <a href="#contact" class="arrow-link">contact</a>
      </div> <!-- ./split-wrapper split-right-->
    </div> <!-- ./about-info half-->
  </section>
  <!-- ABOUT SECTION ENDS HERE -->

  <!-- SKILLS SECTION STARTS-->
  <section id="skills" class="skills">
    <div class="wrapper">
      <h2 class="center-heading"><?php the_field('skills_heading'); ?></h2>
      <p class="tagline center-heading"><?php the_field('skills_tagline'); ?></p>
      <div class="skills-container">
        <?php while(have_rows('skills_item')): the_row();  ?>
        <div class="skills-item">
          <?php $skillsIcon = get_sub_field('skills_icon') ?>
          <?php echo $skillsIcon ?>
          <?php $skillsCaption = get_sub_field('skills_caption') ?>
          <p><?php echo $skillsCaption ?></p>
        </div> <!-- .skills-item -->
        <?php endwhile ?>
      </div> <!-- ./skills-container -->
    </div> <!-- ./wrapper -->
  </section>
  <!-- SKILLS SECTION ENDS-->

  <!-- PORTFOLIO SECTION STARTS -->
  <section id="portfolio" class="portfolio main-padding">
  	<!-- Custom query starts -->
  	<?php 
  	  $portfolio = new WP_Query(
  	    array(
  	      'post_type' => 'portfolio',
  	      'posts_per_page' => -1,
  	      'order' => 'DESC'
  	    )
  	  );
  	?>
  	<!-- Custom query ends -->

    <div class="wrapper">
      <h2 class="center-heading"><?php the_field('portfolio_heading'); ?></h2>
      <p class="tagline center-heading"><?php the_field('portfolio_tagline'); ?></p>
    </div> <!-- ./wrapper -->

  	<!-- Custom loop starts -->
  	<?php if ($portfolio->have_posts()): ?>
  	  <?php while ($portfolio->have_posts()) : $portfolio->the_post(); ?>
  	    <div class="horizontal-item">
          <div class="wrapper">
            <div class="horizontal-text smaller">
              <div class="text-wrapper">
                <h3><?php the_title(); ?></h3>
                <p class="description"><?php the_field('short_desc') ?></p>
                <p class="tech-used">Technology used:</p>

                <ul>
                <?php while(have_rows('skills_used')): the_row(); ?>
                  <li><?php the_sub_field('tech_name'); ?></li>
                <?php endwhile ?>
                </ul>

                <a href="<?php the_field('project_url'); ?>" target="_blank" class="arrow-link">view live</a>
              </div> <!-- ./text-wrapper -->
            </div> <!-- ./horizontal-text -->

            <div class="horizontal-image larger" style="background-image:url( <?php the_field('portfolio_image'); ?> )">
              <div class="lighten">
                <div class="topRight angle"></div>
                <div class="topLeft angle"></div>
                <div class="bottomRight angle"></div>
                <div class="bottomLeft angle"></div>
                <p class="live-name"><?php the_field('live_name'); ?></p>
                <p class="live-desc"><?php the_field('live_desc'); ?></p>
              </div> <!-- ./lighten -->
            </div> <!-- ./horizontal-image -->

          </div> <!-- ./wrapper -->
  	    </div> <!-- ./horizontal-item -->

  	  <?php endwhile; ?>
  	  <?php wp_reset_postdata(); ?>
  	<?php endif; ?>
  	<!-- Custom loop ends -->
  </section>
  <!-- PORTFOLIO SECTION ENDS -->

  <!-- BLOG SECTION STARTS -->
  <section id="blog" class="blog main-padding">
    	<!-- 2nd custom query starts -->
    	<?php 
        $posts = new WP_Query(
          array(
            'post_type' => 'post',
            'posts_per_page' => -1,
            'order' => 'DESC'
          )
        );
      ?>
      <!-- 2nd custom query ends -->

      <div class="wrapper">
        <h2 class="center-heading"><?php the_field('blog_heading'); ?></h2>
        <p class="tagline center-heading"><?php the_field('blog_tagline'); ?></p>
      </div> <!-- ./wrapper -->
      
      <!-- 2nd custom loop starts -->
      <?php if ($posts->have_posts()): ?>
          <?php while ($posts->have_posts()) : $posts->the_post(); ?>
            <div class="horizontal-item">
              <div class="wrapper">
                <div class="horizontal-text smaller main-padding">
                  <div class="text-wrapper">
                    <h3><?php the_title(); ?></h3>
                    <p class="description"><?php the_field('blog_desc'); ?></p>
                    <a href="<?php the_field('blog_url'); ?>" class="arrow-link" target="_blank">Read more</a>
                  </div> <!-- ./text-wrapper -->
                </div> <!-- ./horizontal-text -->

                <div class="horizontal-image larger">
                  <img src="<?php the_field('blog_image'); ?>">
                </div> <!-- ./horizontal-image -->

              </div> <!-- ./wrapper -->
            </div> <!-- ./horizontal-item -->
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
      <?php endif; ?>
      <!-- 2nd custom loop ends -->
  </section>
  <!-- BLOG SECTION ENDS -->

  <!-- CONTACT SECTION STARTS HERE -->
  <section id="contact" class="contact main-padding">
    <div class="half main-padding">
      <div class="split-wrapper split-left contact-text">
        <h2><?php the_field('contact_heading'); ?></h2>
        <p class="tagline"><?php the_field('contact_tagline'); ?></p>
        <p class="description"><?php the_field('contact_text'); ?></p>
        <!-- // registering social nav -->
        <nav class="social-nav">
          <?php wp_nav_menu( array(
            'container' => false,
            'theme_location' => 'secondary'
          )); ?>
        </nav>
      </div> <!-- ./split-wrapper split-left-->
    </div> <!-- ./half main-padding-->

    <div class="half">
      <div class="split-wrapper split-right contact-form-right">
        <?php echo do_shortcode('[contact-form-7 id="46" title="Contact form 1"]'); ?>
      </div> <!-- ./split-wrapper .split-right -->
    </div> <!-- ./half-->

  </section>
  <!-- CONTACT SECTION ENDS HERE -->

</main>

<?php get_footer(); ?>

<!-- NOTES: DON'T DELETE: The main loop pulls up page content and title, custom fields can get pulled in outside of the loop -->