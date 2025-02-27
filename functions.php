<?php

function school_enqueues()
{

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

/**
 * Include custom post types
 */
require get_template_directory() . '/inc/custom-post-types.php';

/**
 * Add custom image sizes
 */
function school_custom_image_sizes()
{
    // Add student profile image sizes 
    add_image_size('student-profile-large', 450, 800, true);  // large profile image
    add_image_size('student-profile-small', 225, 400, true);  // smaller profile image

    // Make these sizes available in the WordPress admin
    add_filter('image_size_names_choose', 'school_custom_image_size_names');
}
add_action('after_setup_theme', 'school_custom_image_sizes');

/**
 * Add custom image sizes to media library dropdown
 */
function school_custom_image_size_names($sizes)
{
    return array_merge($sizes, array(
        'student-profile-large' => __('Student Profile Large'),
        'student-profile-small' => __('Student Profile Small')
    ));
}
