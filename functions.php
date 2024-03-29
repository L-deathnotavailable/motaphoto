<?php
// Charging CSS styles and scripts
    function theme_enqueue_styles()
    {
        wp_enqueue_style('theme', get_template_directory_uri() . '/css/theme.css');
        wp_enqueue_style('style', get_template_directory_uri() . '/style.css');
        // Library font awesome :
        wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css', array(), null);
    }
    add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

    //  Chargement du script JS
    function theme_enqueue_script() {
        wp_enqueue_script('jquery');
        wp_enqueue_script('script', get_template_directory_uri() . '/js/scripts.js');
    }
    add_action('wp_enqueue_scripts', 'theme_enqueue_script');

    // Add menu management to wordpress dashboard
    function register_custom_menus() {
        register_nav_menus(array(
            'menu_principal' => __('Menu principal', 'Photographe'),
            'menu_secondaire' => __('Menu secondaire', 'Photographe'),
        ));
    }
     
    add_action('init', 'register_custom_menus');

    // Ouverture du type de contenu personnalisé "photographies" avec single-photo.php
function custom_single_template($single) {
    global $post;
    if ($post->post_type === 'photographies') {
        return get_template_directory() . '/single-photo.php';
    }
    return $single;
}
add_filter('single_template', 'custom_single_template');

// Ajout d'un logo personnalisable au panel d'administration de wordpress
add_theme_support('custom-logo', array(
    'height'      => 100,
    'width'       => 400,
    'flex-height' => true,
    'flex-width'  => true,
));