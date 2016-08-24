<?php //index.php is the last resort template, if no other templates match ?>
<?php get_header(); ?>

<div class="main">
  <div class="container">
	<h2>IS THIS HOME fo real???</h2>
    <div class="content">
    	<?php // Start the loop ?>
    	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    		<h2><?php the_title(); ?></h2>
    	    <?php the_content(); ?>
    	<?php endwhile; // end the loop?>

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
    	<h2> Portfolio Items</h2>
    	<?php if ($portfolio->have_posts()): ?>
    	  <?php while ($portfolio->have_posts()) : $portfolio->the_post(); ?>
    	    <div class="portfolio-item">
    	      <h2><?php the_title(); ?></h2>

    	      <?php while(have_rows('images')): the_row();  ?>
    	        <?php $image = get_sub_field('image') ?>
    	        <img src="<?php echo $image['sizes']['medium'] ?>">
    	        <?php $caption = get_sub_field('caption') ?>
    	        <p> <?php echo $caption ?> </p>
    	      <?php endwhile ?>

    	      <p><?php the_field('short_desc') ?></p>
    	    </div>
    	  <?php endwhile; ?>
    	  <?php wp_reset_postdata(); ?>
    	<?php endif; ?>
    	<!-- Custom loop ends -->

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
	    <?php if ($posts->have_posts()): ?>
	        <?php while ($posts->have_posts()) : $posts->the_post(); ?>
	          <div class="posts">
	            <h2><?php the_title(); ?></h2>
	            <p><?php the_content(); ?></p>
	          </div>
	        <?php endwhile; ?>
	        <?php wp_reset_postdata(); ?>
	    <?php endif; ?>
	    <!-- 2nd custom loop ends -->

    </div> <!--/.content -->

    <?php get_sidebar(); ?>

  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>