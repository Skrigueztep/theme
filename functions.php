<?php

    include_once(dirname(__FILE__)."/core/utils.php");

    function theme_setup() {
        add_theme_support("title-tag");
        add_theme_support('post-thumbnails');
    }

    function theme_enqueue_scripts() {
        // wp_enqueue_script('', get_template_directory_uri()."",array(), wp_get_theme()->get('Version'), true);
        wp_enqueue_style('style', get_stylesheet_uri(),array(), wp_get_theme()->get('Version'));
        wp_enqueue_style('header', get_template_directory_uri()."/css/header.css",array(), wp_get_theme()->get('Version'));
        wp_enqueue_style('footer', get_template_directory_uri()."/css/footer.css",array(), wp_get_theme()->get('Version'));
        if (is_front_page()){
            wp_enqueue_style('front-page', get_template_directory_uri()."/css/front-page.css",array(), wp_get_theme()->get('Version'));
        }
        if (is_404()) {
            wp_enqueue_style('404', get_template_directory_uri()."/css/404.css",array(), wp_get_theme()->get('Version'));
        }
        if (is_home()) {
            wp_enqueue_style('home', get_template_directory_uri()."/css/home.css",array(), wp_get_theme()->get('Version'));
        }
        if (is_single()) {
            wp_enqueue_style('single', get_template_directory_uri()."/css/single.css",array(), wp_get_theme()->get('Version'));
        }
        if (is_page()) {
            wp_enqueue_style('page', get_template_directory_uri()."/css/page.css",array(), wp_get_theme()->get('Version'));
        }
    }

    function theme_register_nav_menus() {
        register_nav_menus(array(
            'menu_identifier' => __("Menu name", 'text_domain'),
        ));
    }

    function theme_register_default_menus() {
        // Use the function below to create a new menu with default values
        // generate_theme_menu('Menu name', array(), 'menu_identifier');
    }

    add_action('init', 'theme_setup');
    add_action('init', 'theme_register_nav_menus');
    add_action('wp_enqueue_scripts', 'theme_enqueue_scripts', 10);
    add_action('after_switch_theme', 'theme_register_default_menus');
