<?php
// Chargement du style CSS et des scripts
    function theme_enqueue_styles()
    {
        wp_enqueue_style('theme', get_template_directory_uri() . '/css/theme.css');
        wp_enqueue_style('style', get_template_directory_uri() . '/style.css');
        wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css', array(), null);
    }

    add_action('wp_enqueue_scripts', 'theme_enqueue_styles');