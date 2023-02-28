<?php

/**
 *  ACF Options Page
 */
if (function_exists('acf_add_options_page')) {
    acf_add_options_page();

    acf_add_options_page(array(
        'page_title'    => 'Page Settings',
        'menu_title'    => 'Page Settings',
        'menu_slug'     => 'page-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
}
/**
 * Breadcrump
 */
function get_breadcrumb() {
    echo '<a class="breadcrump__link" href="' . home_url() . '" rel="nofollow">Homepage</a>';
    if (is_category() || is_single()) {
        echo "<span class='breadcrump__divider'>&gt;</span>" . "<span class='breadcrump__title'>" . get_the_category('&bull;') . "</span>";
        if (is_single()) {
            echo "<span class='breadcrump__divider'>&gt;</span>" . "<span class='breadcrump__title'>" . get_the_title() . "</span>";
        }
    } elseif (is_page()) {
        echo "<span class='breadcrump__divider'>&gt;</span>" . "<span class='breadcrump__title'>" . get_the_title() . "</span>";
    } elseif (is_search()) {
        echo "<span class='breadcrump__divider'>&gt;</span>Search Results for... ";
        echo '"<em>';
        echo the_search_query();
        echo '</em>"';
    }
}

/**
 * Remove <p> from cf7
 */
add_filter('wpcf7_autop_or_not', '__return_false');

function new_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

function my_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'my_excerpt_length');
