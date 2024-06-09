<?php 
/*
*This is header sction 
*/

?>

<!DOCTYPE html>
<html lang="<?php language_attributes( )?>" class="no-js">
<head>
    <meta charset="<?php bloginfo('charset')?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <?php wp_head();?>

</head>
<body <?php body_class();?>>
