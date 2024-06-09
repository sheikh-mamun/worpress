<?php
get_header();
?>
<main>
  
  <div class="container marketing">
<div class="row">
  <div class="col-12">
    <img src="https://backoffice.daily-bangladesh.com/media/imgAll/2023December/mahedi-hasan3-1703657649.jpg" alt="" width="700" height="200">
  </div>
    <div class="col-8">
    <h1><?php single_term_title() ?></h1>
    <?php 
    while (have_posts()) : the_post();
      ?>
      <a href="<?php the_permalink() ?>">
        <div class="row featurette">
        <div class="col-md-3">
            <?php the_post_thumbnail([150,150]) ?>
          </div>
          <div class="col-md-9">
            <h5 class="featurette-heading">
              <?php the_title() ?>
            </h5>
            <p class="lead"><?php the_excerpt() ?></p>
          </div>
          
        </div>
      </a>
        <hr class="featurette-divider">
      
    <?php endwhile; ?>
    </div>
    <div class="col-4">
        <?php get_sidebar() ?>
    </div>
</div>
    




    <!-- /END THE FEATURETTES -->

  </div><!-- /.container -->

  <?php get_footer() ?>