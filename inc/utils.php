<?php
// ACF Options Page
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
