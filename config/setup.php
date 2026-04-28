<?php

// Prevent direct access
if (!defined('ABSPATH')) exit;

// add styles and scripts

function theme_enqueue_scripts() {
    // Styles
    wp_enqueue_style('reset', get_template_directory_uri(). '/styles/minified/reset.css', array(), filemtime(get_template_directory() . '/styles/minified/reset.css'));
    wp_enqueue_style('swiper_css', get_template_directory_uri(). '/styles/minified/swiper-bundle.min.css', array(), filemtime(get_template_directory() . '/styles/minified/swiper-bundle.min.css'));
    wp_enqueue_style('tailwind', get_template_directory_uri(). '/styles/minified/tailwind.min.css', array(), filemtime(get_template_directory() . '/styles/minified/tailwind.min.css'));
    wp_enqueue_style('style', get_template_directory_uri(). '/styles/style.css', array(), filemtime(get_template_directory() . '/styles/style.css'));

    // Scripts
    wp_enqueue_script('swiper_js', get_template_directory_uri() . '/scripts/minified/swiper-bundle.min.js', array(), filemtime(get_template_directory() . '/scripts/minified/swiper-bundle.min.js'), true);
    wp_enqueue_script('jquery_js', get_template_directory_uri() . '/scripts/minified/jquery.min.js', array(), filemtime(get_template_directory() . '/scripts/minified/jquery.min.js'), true);
    wp_enqueue_script('script', get_template_directory_uri() . '/scripts/script.js', array(), filemtime(get_template_directory() . '/scripts/script.js'), true);

}

add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');

// Remove tool bar

add_filter('show_admin_bar', '__return_false');