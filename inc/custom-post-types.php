<?php

/**
 * Register custom post types and taxonomies
 */

// Register Student Custom Post Type
function school_register_student_cpt()
{
    $labels = array(
        'name'               => 'Students',
        'singular_name'      => 'Student',
        'menu_name'          => 'Students',
        'name_admin_bar'     => 'Student',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Student',
        'new_item'           => 'New Student',
        'edit_item'          => 'Edit Student',
        'view_item'          => 'View Student',
        'all_items'          => 'All Students',
        'search_items'       => 'Search Students',
        'parent_item_colon'  => 'Parent Students:',
        'not_found'          => 'No students found.',
        'not_found_in_trash' => 'No students found in Trash.'
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'student'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-welcome-learn-more',
        'supports'           => array('title', 'editor', 'thumbnail'),
        'show_in_rest'       => true, // Enable Gutenberg editor
        'template'           => array(
            array('core/paragraph', array(
                'placeholder' => 'Enter student biography here...'
            )),
            array('core/button', array(
                'text' => 'View Portfolio',
                'url' => '#'
            ))
        ),
        'template_lock'      => 'all' // Prevents adding, removing, or moving blocks
    );

    register_post_type('student', $args);
}
add_action('init', 'school_register_student_cpt');

// Register Student Specialization Taxonomy
function school_register_student_taxonomy()
{
    $labels = array(
        'name'              => 'Specializations',
        'singular_name'     => 'Specialization',
        'search_items'      => 'Search Specializations',
        'all_items'         => 'All Specializations',
        'parent_item'       => 'Parent Specialization',
        'parent_item_colon' => 'Parent Specialization:',
        'edit_item'         => 'Edit Specialization',
        'update_item'       => 'Update Specialization',
        'add_new_item'      => 'Add New Specialization',
        'new_item_name'     => 'New Specialization Name',
        'menu_name'         => 'Specializations',
    );

    $args = array(
        'hierarchical'      => true, // Like categories
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'specialization'),
        'show_in_rest'      => true, // Enable in Gutenberg editor
    );

    register_taxonomy('specialization', array('student'), $args);
}
add_action('init', 'school_register_student_taxonomy');

// Change the title placeholder for Students
function school_change_student_title_placeholder($title)
{
    $screen = get_current_screen();
    if ('student' === $screen->post_type) {
        $title = 'Add student name';
    }
    return $title;
}
add_filter('enter_title_here', 'school_change_student_title_placeholder');

// Create default taxonomy terms
function school_create_default_specializations()
{
    // Only run this once
    if (get_option('school_specializations_created')) {
        return;
    }

    // Create the taxonomy terms
    wp_insert_term('Designer', 'specialization');
    wp_insert_term('Developer', 'specialization');

    // Set the flag
    update_option('school_specializations_created', true);
}
add_action('init', 'school_create_default_specializations');
