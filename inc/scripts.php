<?php

/**
 * Enqueue scripts and styles.
 */
function taxi_transfer_scripts() {
    wp_enqueue_style('taxi-transfer-style', get_stylesheet_uri(), array(), _S_VERSION);
    wp_enqueue_style('roboto-font', 'https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap', array(), null, 'all');
    wp_enqueue_style('datepicker-css-classic', get_stylesheet_directory_uri() . '/assets/css/datepicker/classic.min.css', array(), _S_VERSION, 'all');
    wp_enqueue_style('datepicker-css-date', get_stylesheet_directory_uri() . '/assets/css/datepicker/classic.date.css', array(), _S_VERSION, 'all');
    wp_enqueue_style('select2-css', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css', array(), _S_VERSION, 'all');
    wp_enqueue_style('lightbox-css', get_stylesheet_directory_uri() . '/assets/css/lightbox/lightboxed.css', array(), _S_VERSION);
    wp_style_add_data('taxi-transfer-style', 'rtl', 'replace');

    wp_enqueue_script('jquery');
    wp_enqueue_script('lightbox-js', get_template_directory_uri() . '/js/lightbox/lightboxed.js', array(), _S_VERSION, true);
    wp_enqueue_script('main-script', get_template_directory_uri() . '/js/main.js', array(), _S_VERSION, true);
    wp_enqueue_script('datepicker', get_template_directory_uri() . '/js/datepicker/picker.js', array(), _S_VERSION, true);
    wp_enqueue_script('datepicker-date', get_template_directory_uri() . '/js/datepicker/picker.date.js', array(), _S_VERSION, true);
    wp_enqueue_script('select2-js', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js', array(), _S_VERSION, true);
    wp_enqueue_script('form-script', get_template_directory_uri() . '/js/header-form.js', array(), _S_VERSION, true);
    wp_enqueue_script('transfer-filters', get_template_directory_uri() . '/js/transfer-filters-ajax.js', array(), _S_VERSION, true);
    wp_localize_script('transfer-filters', 'wp_ajax', array('ajax_url' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'taxi_transfer_scripts');
