<?php

    include_once(dirname(__FILE__)."/../includes/custom-controls/custom-divider/title-control-divider.php");

    /**
     * Add one element | item to menu
     *
     * NOTE:
     *      This code was copied from stackoverflow.com
     *      And this only add custom links elements | items to menu
     *
     * @param $id => Menu id
     * @param $title => Title of element | item
     * @param $url => URL for associate element | item
     *
    */
    function generate_theme_menu_item( $id, $title, $url ) {
        wp_update_nav_menu_item($id, 0, array(
            'menu-item-title'   =>  sprintf( __('%s', 'theme-inmobiliaria'), $title ),
            'menu-item-url'     =>  $url,
            // 'menu-item-object'  => 'page',
            // 'menu-item-type' => 'post_type',
            'menu-item-status'  =>  'publish'
        ) );
    }

    /**
     * Create a menu with given values
     *
     * NOTE:
     *      This code was copied from stackoverflow.com
     *
     * @param $menu_name => Menu name
     * @param $menu_items_array => Elements | Items of menu
     * @param $location_target => Location to register the new menu
     */
    function generate_theme_menu( $menu_name, $menu_items_array, $location_target ) {
        $menu_primary = $menu_name;
        wp_create_nav_menu( $menu_primary );
        $menu_primary_obj = get_term_by('name', $menu_primary, 'nav_menu' );
        foreach( $menu_items_array as $page_name => $page_location ) {
            generate_theme_menu_item( $menu_primary_obj->term_id, $page_name, $page_location );
        }
        $locations_primary_arr = get_theme_mod( 'nav_menu_locations' );
        $locations_primary_arr[$location_target] = $menu_primary_obj->term_id;
        set_theme_mod( 'nav_menu_locations', $locations_primary_arr );

        update_option( 'menu_check', true );
    }

    /**
     * NOTE: Always validate the page to create that not exist
     *
     * Create a page
     * @param string $title => Title page
     * @param string $slug => (Optional) Title of page
     * @param string $template => (Optional) Template page for custom template
     * @return int | null $page_id => New page id
     */
    function create_post($title = '', $slug = '', $template = '') {
        $page_id = null;
        if (isset($_GET['activated']) && is_admin()){

            if (empty($title)) die('Theme error: create_post function error, title is empty');

            $new_page = array(
                'post_type' => 'page',
                'post_title' => $title,
                'post_content' => '',
                'post_status' => 'publish',
                'post_author' => 1,
                'post_name'  => $slug,
                'comment_status' => 'closed',
                'ping_status' => 'closed'
            );
            $new_page_id = wp_insert_post($new_page);
            $page_id = $new_page_id;
            if(!empty($template)){
                update_post_meta($new_page_id, '_wp_page_template', $template);
            }
        }
        return $page_id;
    }

    /**
     *  Create a Custom Divider with parameters passed
     *
     * @param $wp_customize -> WP_Customize_Manager object
     * @param $section -> Section to show divider
     * @param $title -> Text to show inside divider block
     * @param $count -> Unique identifier to create multiple sections
     */
    function divider($wp_customize, $section, $title, $count) {
        /** Divider */
        $wp_customize->add_setting('theme_divider_settings'.$count);
        $wp_customize->add_control(new Title_Control_Divider($wp_customize, 'main_page_divider'.$count, array(
            'label' => __($title, "maplander_theme"),
            'settings' => 'theme_divider_settings'.$count,
            'section' => $section
        )));
    }

