<?php
add_theme_support('post-thumbnails');
function add_my_scripts(){
    wp_enqueue_style('style',get_stylesheet_uri());
    wp_enqueue_style('bootstrap',get_theme_file_uri('assets/dist/css/bootstrap.min.css'));
    wp_enqueue_style('carousel',get_theme_file_uri('carousel.css'));
    wp_enqueue_script('js',get_theme_file_uri('assets/dist/js/bootstrap.bundle.min.js'));
}
add_action('wp_enqueue_scripts','add_my_scripts');


function mytheme_register_nav_menu()
{
    register_nav_menus(
        array(
            'primary_menu' => __('Primary Menu', 'text_domain'),
        )
    );
}
add_action('after_setup_theme', 'mytheme_register_nav_menu', 0);

class AWP_Menu_Walker extends Walker_Nav_Menu
{
    
    function start_el(&$output, $item, $depth = 0, $args = [], $id = 0)
    {
        $output .= '<li class="nav-item"><a class="nav-link" href="' . $item->url . '">' . $item->title . '</a>';
    }
}

function set_my_sidebar(){
    register_sidebar(array(
        'name'          => 'Sidebar', 'textdomain',
		'id'            => 'sidebar-1',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
    ));
}
add_action('widgets_init','set_my_sidebar');
