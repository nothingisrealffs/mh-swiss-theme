<?php
/* mh-swiss-theme functions and definitions */

if ( ! function_exists( 'mh_swiss_setup' ) ) {
    function mh_swiss_setup() {
        load_theme_textdomain( 'mh-swiss-theme', get_template_directory() . '/languages' );
        add_theme_support( 'title-tag' );
        add_theme_support( 'custom-logo' );
        add_theme_support( 'post-thumbnails' );
        register_nav_menus( array(
            'primary' => __( 'Primary Menu', 'mh-swiss-theme' ),
        ) );
        add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
    }
}
add_action( 'after_setup_theme', 'mh_swiss_setup' );
/*run scripts and styles*/
function mh_swiss_enqueue_scripts() {
    wp_enqueue_style( 'mh-swiss-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
}
add_action( 'wp_enqueue_scripts', 'mh_swiss_enqueue_scripts' );

/* Widgets */
function mh_swiss_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Sidebar', 'mh-swiss-theme' ),
        'id'            => 'sidebar-1',
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'mh_swiss_widgets_init' );
