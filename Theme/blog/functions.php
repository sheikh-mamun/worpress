<?php
add_theme_support('post-thumbnails');
function add_my_scripts()
{
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('bootstrap', get_theme_file_uri('assets/dist/css/bootstrap.min.css'));
    wp_enqueue_style('carousel', get_theme_file_uri('carousel.css'));
    wp_enqueue_script('js', get_theme_file_uri('assets/dist/js/bootstrap.bundle.min.js'));
}
add_action('wp_enqueue_scripts', 'add_my_scripts');


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

function set_my_sidebar()
{
    register_sidebar(array(
        'name'          => 'Sidebar', 'textdomain',
        'id'            => 'sidebar-1',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
    ));
}
add_action('widgets_init', 'set_my_sidebar');


function wpdocs_register_Slider_cpt()
{

    $labels = array(

        'name'                     => __('Sliders', 'TEXTDOMAINHERE'),
        'singular_name'            => __('Slider', 'TEXTDOMAINHERE'),
        'add_new'                  => __('Add New', 'TEXTDOMAINHERE'),
        'add_new_item'             => __('Add New Slider', 'TEXTDOMAINHERE'),
        'edit_item'                => __('Edit Slider', 'TEXTDOMAINHERE'),
        'new_item'                 => __('New Slider', 'TEXTDOMAINHERE'),
        'view_item'                => __('View Slider', 'TEXTDOMAINHERE'),
        'view_items'               => __('View Sliders', 'TEXTDOMAINHERE'),
        'search_items'             => __('Search Sliders', 'TEXTDOMAINHERE'),
        'not_found'                => __('No Sliders found.', 'TEXTDOMAINHERE'),
        'not_found_in_trash'       => __('No Sliders found in Trash.', 'TEXTDOMAINHERE'),
        'parent_item_colon'        => __('Parent Sliders:', 'TEXTDOMAINHERE'),
        'all_items'                => __('All Sliders', 'TEXTDOMAINHERE'),
        'archives'                 => __('Slider Archives', 'TEXTDOMAINHERE'),
        'attributes'               => __('Slider Attributes', 'TEXTDOMAINHERE'),
        'insert_into_item'         => __('Insert into Slider', 'TEXTDOMAINHERE'),
        'uploaded_to_this_item'    => __('Uploaded to this Slider', 'TEXTDOMAINHERE'),
        'featured_image'           => __('Featured Image', 'TEXTDOMAINHERE'),
        'set_featured_image'       => __('Set featured image', 'TEXTDOMAINHERE'),
        'remove_featured_image'    => __('Remove featured image', 'TEXTDOMAINHERE'),
        'use_featured_image'       => __('Use as featured image', 'TEXTDOMAINHERE'),
        'menu_name'                => __('Sliders', 'TEXTDOMAINHERE'),
        'filter_items_list'        => __('Filter Slider list', 'TEXTDOMAINHERE'),
        'filter_by_date'           => __('Filter by date', 'TEXTDOMAINHERE'),
        'items_list_navigation'    => __('Sliders list navigation', 'TEXTDOMAINHERE'),
        'items_list'               => __('Sliders list', 'TEXTDOMAINHERE'),
        'item_published'           => __('Slider published.', 'TEXTDOMAINHERE'),
        'item_published_privately' => __('Slider published privately.', 'TEXTDOMAINHERE'),
        'item_reverted_to_draft'   => __('Slider reverted to draft.', 'TEXTDOMAINHERE'),
        'item_scheduled'           => __('Slider scheduled.', 'TEXTDOMAINHERE'),
        'item_updated'             => __('Slider updated.', 'TEXTDOMAINHERE'),
        'item_link'                => __('Slider Link', 'TEXTDOMAINHERE'),
        'item_link_description'    => __('A link to an Slider.', 'TEXTDOMAINHERE'),

    );

    $args = array(

        'labels'                => $labels,
        'description'           => __('organize and manage company Sliders', 'TEXTDOMAINHERE'),
        'public'                => true,
        'menu_icon'             => 'dashicons-xing',
        'capability_type'       => 'post',
        'supports'              => array('title', 'editor', 'thumbnail', 'custom-fields'),
    );

    register_post_type('slider', $args);
}
add_action('init', 'wpdocs_register_Slider_cpt');



function my_customizer($wp_customize)
{
    // Theme Options Panel
    $wp_customize->add_panel(
        'my_theme_options',
        array(
            'title'            => __('Theme Options', 'my_theme'),
            'description'      => __('Theme Modifications like color scheme, theme texts and layout preferences can be done here', 'my_theme'),
        )
    );

    $wp_customize->add_section(
        'text_options',
        array(
            'title'         => __('Text Options', 'my_theme'),
            'priority'      => 1,
            'panel'         => 'my_theme_options'
        )
    );
    // Setting for Copyright text.
    $wp_customize->add_setting(
        'my_copyright_text',
        array(
            'default'           => __('All rights reserved ', 'my_theme'),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'refresh',
        )
    );
    // Control for Copyright text
    $wp_customize->add_control(
        'my_copyright_text',
        array(
            'type'        => 'text',
            'priority'    => 10,
            'section'     => 'text_options',
            'label'       => 'Copyright text',
            'description' => 'Text put here will be outputted in the footer',
        )
    );
    $wp_customize->add_setting('logo', array(
        'capability'        => 'edit_theme_options',
        'default'           => '',
        'sanitize_callback' => 'ic_sanitize_image',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        'logo',
        array(
            'label'    => __('Logo', 'text-domain'),
            'section'  => 'text_options',
            'settings' => 'logo',
        )
    ));
}
function ic_sanitize_image($file, $setting)
{

    $mimes = array(
        'jpg|jpeg|jpe' => 'image/jpeg',
        'gif'          => 'image/gif',
        'png'          => 'image/png',
        'bmp'          => 'image/bmp',
        'tif|tiff'     => 'image/tiff',
        'ico'          => 'image/x-icon'
    );

    //check file type from file name
    $file_ext = wp_check_filetype($file, $mimes);
    //if file has a valid mime type return it, otherwise return default
    return ($file_ext['ext'] ? $file : $setting->default);
}
add_action('customize_register', 'my_customizer');
include_once 'class.banglaDate.php';

class My_Widget extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'my-text',  // Base ID
			'My Text'   // Name
		);
	}

	public function widget( $args, $instance ) {
		echo "<h3>".$instance['title']."</h3>";
        echo "<p>".$instance['text']."</p>";
     
        $bn = new BanglaDate(time());
        $d=$bn->get_date();
        echo $d[0].' '.$d[1].', '.$d[2];
	}

	public function form( $instance ) {
		$title = $instance['title'];
		$text  = $instance['text'];
		?>
		<p>
			<label>Title</label>
			<input name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo $title; ?>">
		</p>
		<p>
			<label>Text:</label>
			<textarea name="<?php echo esc_attr( $this->get_field_name( 'text' ) ); ?>" type="text" cols="30" rows="10"><?php echo $text; ?></textarea>
		</p>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance          = array();
		$instance['title'] = $new_instance['title'];
		$instance['text']  = $new_instance['text'];
		return $instance;
	}
}

add_action( 'widgets_init', function() {
    register_widget( 'My_Widget' );
});