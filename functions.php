<?php

    function theme_setup() {
        add_theme_support("title-tag");
        add_theme_support('post-thumbnails');
    }

    function theme_enqueue_scripts() {
        wp_enqueue_style('style', get_stylesheet_uri(),array(), wp_get_theme()->get('Version'));
        wp_enqueue_style('header', get_template_directory_uri()."/css/header.css",array(), wp_get_theme()->get('Version'));
        wp_enqueue_style('footer', get_template_directory_uri()."/css/footer.css",array(), wp_get_theme()->get('Version'));
        // wp_enqueue_style('', get_template_directory_uri()."",array(), wp_get_theme()->get('Version'));
        // wp_enqueue_script('', get_template_directory_uri()."",array(), wp_get_theme()->get('Version'), true);
    }

    function theme_register_nav_menus() {
        register_nav_menus(array(
            'menu_identifier' => __("Menu name", 'text_domain'),
        ));
    }

    add_action('init', 'theme_setup');
    add_action('wp_enqueue_scripts', 'theme_enqueue_scripts', 10);
