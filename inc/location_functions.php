<?php
/* Registering Locations */
function create_locations()
{
    $labels = array(
        'name' => _x('Location', 'taxonomy general name'),
        'singular_name' => _x('Location', 'taxonomy singular name'),
        'search_items' =>  __('Search Locations'),
        'all_items' => __('All Locations'),
        'parent_item' => __('Parent Location'),
        'parent_item_colon' => __('Parent Location:'),
        'edit_item' => __('Edit Location'),
        'update_item' => __('Update Location'),
        'add_new_item' => __('Add New Location'),
        'not_found'         => __('No locations found'),
        'new_item_name' => __('New Location Name'),
        'menu_name' => __('Locations'),
    );

    register_taxonomy('location', array('post'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        //'rewrite' => array( 'slug' => 'location' ),
        'rewrite' => array('hierarchical' => true),
        'hierarchical'               => true,
        'show_in_rest'               => true,
    ));
}
add_action('init', 'create_locations', 0);