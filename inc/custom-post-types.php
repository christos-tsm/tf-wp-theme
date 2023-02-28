<?php

// Stops
function n22_stops_cpt() {
    register_post_type(
        'stops',
        // CPT Options
        array(
            'labels' => array(
                'name' => __('Stops'),
                'singular_name' => __('Stops')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'Stops'),
            'show_in_rest' => true,
            'menu_icon' => 'dashicons-sos',
            'supports' => array('title', 'editor', 'thumbnail'),

        )
    );
}
add_action('init', 'n22_stops_cpt');

// Tours
function n22_tours_cpt() {
    register_post_type(
        'tours',
        // CPT Options
        array(
            'labels' => array(
                'name' => __('Tours'),
                'singular_name' => __('Tours')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'Tours'),
            'show_in_rest' => true,
            'menu_icon' => 'dashicons-sos',
            'supports' => array('title', 'editor', 'thumbnail'),

        )
    );
}
add_action('init', 'n22_tours_cpt');

// Price List
function n22_prices_cpt() {
    register_post_type(
        'prices',
        // CPT Options
        array(
            'labels' => array(
                'name' => __('Prices'),
                'singular_name' => __('Price')
            ),
            'public' => true,
            'has_archive' => false,
            'rewrite' => array('slug' => 'prices'),
            'show_in_rest' => true,
            'menu_icon' => 'dashicons-money-alt',
            'supports' => array('title'),

        )
    );
}
add_action('init', 'n22_prices_cpt');

// Cars
function n22_cars_cpt() {
    register_post_type(
        'cars',
        // CPT Options
        array(
            'labels' => array(
                'name' => __('Cars'),
                'singular_name' => __('Cars')
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'cars'),
            'show_in_rest' => true,
            'menu_icon' => 'dashicons-car',
            'supports' => array('title', 'editor', 'thumbnail'),
        )
    );
}
add_action('init', 'n22_cars_cpt');

//hook into the init action and call create_book_taxonomies when it fires

add_action('init', 'create_subjects_hierarchical_taxonomy', 0);

//create a custom taxonomy name it subjects for your posts

function create_subjects_hierarchical_taxonomy() {

    // Add new taxonomy, make it hierarchical like categories
    //first do the translations part for GUI

    $labels = array(
        'name' => _x('Car Categories', 'taxonomy general name'),
        'singular_name' => _x('Car Category', 'taxonomy singular name'),
        'search_items' =>  __('Search Car Categories'),
        'all_items' => __('All Car Categories'),
        'parent_item' => __('Parent Car Category'),
        'parent_item_colon' => __('Parent Car Category:'),
        'edit_item' => __('Edit Car Category'),
        'update_item' => __('Update Car Category'),
        'add_new_item' => __('Add New Car Category'),
        'new_item_name' => __('New Car Category Name'),
        'menu_name' => __('Car Categories'),
    );

    // Now register the taxonomy
    register_taxonomy('car-categories', array('cars'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'car-categories'),
    ));
}
