<!doctype html>
<html lang="en">
  <head>
    <title><?php echo bloginfo('title') ?></title>
    <?php wp_head() ?>
  </head>
  <body>
    
<header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="<?php echo home_url( '/' ) ?>"><?php echo bloginfo('title') ?></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
          </li>
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div> -->
      <?php 
        wp_nav_menu(array(
            'theme_location' => 'primary_menu',
            'menu_class' => "navbar-nav me-auto mb-2 mb-md-0",
            "container_class" => "collapse navbar-collapse",
            "container_id" => "navbarCollapse",
            "walker" => new AWP_Menu_Walker(),
        ));
      ?>
    </div>
  </nav>
</header>