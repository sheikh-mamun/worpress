<?php
// in index.php or where you want to include header
get_header(); 
?>
<div class="container"> 
    <div class="row"> 
        <div class="col-md-8"> 
        <?php 
        if ( have_posts() ) {
            while ( have_posts() ) {
                the_post(); 
                ?>
                <h2>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                </h2>
                <?php the_content();  
                //the_excerpt(); ?>
                
                <?php
            } // end while
            //the_excerpt() --short description
            //the_content()--full description
        } // end if
        ?>
        </div>
        <div class="col-md-4"> 
        <h2 style="color:aqua">sidebar</h2>
        <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
        </div>
    </div>



</div>
<?php get_footer()?>