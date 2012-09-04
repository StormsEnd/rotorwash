<?php

if( !function_exists('rw_add_custom_post_types') ):
/**
 * Register custom post type function.
 *
 *
 * @return void
 * @since RotorWash 1.0
 * @uses register_sidebar
 */

function rw_add_custom_post_types($custom_post_types) {
    $defaults = array(
            'singular'              => 'Copter Custom Post',
            'plural'                => 'Copter Custom Posts',
            'public'                => TRUE,
            'publicly_queryable'    => TRUE,
            'show_ui'               => TRUE,
            'show_in_menu'          => TRUE,
            'query_var'             => TRUE,
            'rewrite'               => TRUE,
            'capability_type'       => 'post',
            'has_archive'           => TRUE,
            'hierarchical'          => FALSE,
            'menu_position'         => NULL,
            'supports'              => array('title', 'editor'),
        );

    foreach ($custom_post_types as $cpt) {
        $post = array_merge($defaults, $cpt);

        $labels = array(
            'name'                  => _x($post['plural'], 'General post type descriptor'),
            'singular_name'         => _x($post['singular'], 'Singular post type descriptor'),
            'add_new'               => _x('Add New', $post['singular']),
            'add_new_item'          => __('Add New '.$post['singular']),
            'edit_item'             => __('Edit '.$post['singular']),
            'new_item'              => __('New '.$post['singular']),
            'all_items'             => __('All '.$post['plural']),
            'view_item'             => __('View '.$post['singular']),
            'search_items'          => __('Search '.$post['plural']),
            'not_found'             => __('No '.strtolower($post['plural']).' found'),
            'not_found_in_trash'    => __('No '.strtolower($post['plural']).' in the trash'),
            'parent_item_colon'     => '',
            'menu_name'             => $post['plural'],
        );
        $args = array(
            'labels'                => $labels,
            'public'                => $post['public'],
            'publicly_queryable'    => $post['publicly_queryable'],
            'show_ui'               => $post['show_ui'],
            'show_in_menu'          => $post['show_in_menu'],
            'query_var'             => $post['query_var'],
            'rewrite'               => $post['rewrite'],
            'capability_type'       => $post['capability_type'],
            'has_archive'           => $post['has_archive'],
            'hierarchical'          => $post['hierarchical'],
            'menu_position'         => $post['menu_position'],
            'supports'              => $post['supports'],
        );

        // Add a register_post_type() call for each needed custom post type
        register_post_type(sanitize_title($cpt['plural']), $args);
    }
}
endif;
