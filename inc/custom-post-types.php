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
