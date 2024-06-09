<?php
get_header();
?>
<main>
  <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <?php $slider=new WP_Query(
        [
          'post_type'=>'slider',
          'orderby' => 'title', 
        'order' => 'ASC',
        'per_pa'
      ]); 
      $i=0;
      while($slider->have_posts()):$slider->the_post();
      ?>
      <div class="carousel-item <?php if($i==0){echo 'active';} $i+=1; ?>">
        <?php the_post_thumbnail('full') ?>

        <div class="container">
          <div class="carousel-caption text-start">
            <h1><?php the_title() ?></h1>
            <p><?php the_content() ?></p>
            <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p>
          </div>
        </div>
      </div>
    <?php endwhile; wp_reset_postdata(); ?>
     
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>


  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

  <div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div class="row">
      <div class="col-lg-4">
        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
          <title>Placeholder</title>
          <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text>
        </svg>

        <h2>Heading</h2>
        <p>Some representative placeholder content for the three columns of text below the carousel. This is the first column.</p>
        <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
          <title>Placeholder</title>
          <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text>
        </svg>

        <h2>Heading</h2>
        <p>Another exciting bit of representative placeholder content. This time, we've moved on to the second column.</p>
        <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
          <title>Placeholder</title>
          <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text>
        </svg>

        <h2>Heading</h2>
        <p>And lastly this, the third column of representative placeholder content.</p>
        <p><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->


    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">
    <?php $i = 1;
    while (have_posts()) : the_post();
      if ($i % 2 == 1) { ?>
      <a href="<?php the_permalink() ?>">
        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading">
              <?php the_title() ?>
            </h2>
            <p class="lead"><?php the_excerpt() ?></p>
          </div>
          <div class="col-md-5">
            <?php the_post_thumbnail([300,300]) ?>
          </div>
        </div>
      </a>
        <hr class="featurette-divider">
      <?php } else { ?>
        <a href="<?php the_permalink() ?>">
        <div class="row featurette">
          <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading">
            <?php the_title() ?>
            </h2>
            <p class="lead"><?php the_excerpt() ?></p>
          </div>
          <div class="col-md-5 order-md-1">
          <?php the_post_thumbnail([300,300]) ?>
          </div>
        </div>
        </a>
        <hr class="featurette-divider">
      <?php }
      $i += 1; ?>
    <?php endwhile; ?>




    <!-- /END THE FEATURETTES -->

  </div><!-- /.container -->

  <?php get_footer() ?>