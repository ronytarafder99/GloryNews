<?php
function theme_resources(){
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/fontawesome/css/all.css');
    wp_enqueue_style('bootstarp', get_template_directory_uri() . '/css/bootstrap.css');
    wp_enqueue_style('fonts', get_template_directory_uri() . '/css/fonts.css');
    wp_enqueue_style('flex_slider_style', get_template_directory_uri() . '/css/flexslider.css');
    wp_enqueue_style('lightgallery-css', get_template_directory_uri() . '/css/lightgallery.css');
    wp_enqueue_style('main-css', get_template_directory_uri() . '/css/main.css');
    wp_enqueue_style('responsive-css', get_template_directory_uri() . '/css/responsive.css');
    wp_enqueue_script('script_flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js', array('jquery'), null, true);
    wp_enqueue_script('lightgallery-js', get_template_directory_uri() . '/js/lightgallery-all.min.js', array('jquery'), null, true);
    wp_enqueue_script('script', get_template_directory_uri() . '/js/script.js', array('jquery'), null, true);
}

add_action('wp_enqueue_scripts', 'theme_resources');