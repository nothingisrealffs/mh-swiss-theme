<?php
/**
 * The theme functions file for mh-swiss-theme.
 */
function mh_swiss_theme_support(){
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'mh-swiss-theme'),
    ));
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
}
add_action('after_setup_theme', 'mh_swiss_theme_support');
function mh_swiss_theme_enqueue_scripts(){
    wp_enqueue_style('mh-swiss-theme-style', get_stylesheet_uri());
    wp_enqueue_script('mh-swiss-theme-script', get_template_directory_uri() . '/js/main.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'mh_swiss_theme_enqueue_scripts');