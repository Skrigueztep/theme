<?php

    function generate_theme_menu_item( $id, $title, $url ) {
        wp_update_nav_menu_item($id, 0, array(
            'menu-item-title'   =>  sprintf( __('%s', 'theme-inmobiliaria'), $title ),
            'menu-item-url'     =>  $url,
            // 'menu-item-object'  => 'page',
            // 'menu-item-type' => 'post_type',
            'menu-item-status'  =>  'publish'
        ) );
    }

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

