<?php get_header();?>
<div class="container">
    <div class="row"> 
    <div class="col-md-9"> 

<?php 
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); 
        ?>
		
		// Post Content here
         <h2> <a href="<?php the_permalink();?>"></a>  <?php the_title(  ); ?></h2>
         <?php //the_excerpt();  
          the_content(); ?>  
         
        <?php
	} // end while
    //the_excerpt() --short description
    //the_content()--full description
} // end if
?>
</div>
<div class="col-md-3"> 
<h2>sidebar</h2>
</div>
    </div>
</div>
