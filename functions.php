<?php

function school_enqueues() {

    if (is_front_page()) {

        //load lightbox scripts
        wp_register_script('Light_Gallery', 'https://cdn.jsdelivr.net/npm/lightgallery@2.8.2/lightgallery.umd.min.js');
        wp_enqueue_script('Light_Gallery');

        //load lightbox styles
        wp_register_style('Light_Gallery_CSS', 'https://cdn.jsdelivr.net/npm/lightgallery@2.8.2/css/lightgallery-bundle.min.css');
        wp_enqueue_style('Light_Gallery_CSS');

        wp_enqueue_script(
            'school-settings',
            get_theme_file_uri('assets/school-settings.js'),
            array(),
            '20250226',
            array('strategy' => 'defer')
        );
    }
};

add_action('wp_enqueue_scripts', 'school_enqueues');

// Load Custom Blocks
require get_theme_file_path() . '/school-blocks/school-blocks.php';
