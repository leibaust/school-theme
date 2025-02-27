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

/**
 * Register Staff Custom Post Type
 */
function school_register_staff_cpt()
{
    $labels = array(
        'name'               => 'Staff',
        'singular_name'      => 'Staff Member',
        'menu_name'          => 'Staff',
        'name_admin_bar'     => 'Staff',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Staff Member',
        'new_item'           => 'New Staff Member',
        'edit_item'          => 'Edit Staff Member',
        'view_item'          => 'View Staff Member',
        'all_items'          => 'All Staff',
        'search_items'       => 'Search Staff',
        'parent_item_colon'  => 'Parent Staff:',
        'not_found'          => 'No staff members found.',
        'not_found_in_trash' => 'No staff members found in Trash.'
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'staff'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 6,
        'menu_icon'          => 'dashicons-businessperson',
        'supports'           => array('title', 'editor', 'thumbnail'),
        'show_in_rest'       => true, // Enable Gutenberg editor
        'template'           => array(
            array('core/paragraph', array(
                'placeholder' => 'Enter job title here...',
                'content' => '',
                'className' => 'staff-job-title'
            )),
            array('core/paragraph', array(
                'placeholder' => 'Enter email address here...',
                'content' => '',
                'className' => 'staff-email'
            ))
        ),
    );

    register_post_type('staff', $args);
}
add_action('init', 'school_register_staff_cpt');

/**
 * Register Staff Department Taxonomy with restricted capabilities
 */
function school_register_staff_taxonomy()
{
    $labels = array(
        'name'              => 'Departments',
        'singular_name'     => 'Department',
        'search_items'      => 'Search Departments',
        'all_items'         => 'All Departments',
        'parent_item'       => 'Parent Department',
        'parent_item_colon' => 'Parent Department:',
        'edit_item'         => 'Edit Department',
        'update_item'       => 'Update Department',
        'add_new_item'      => 'Add New Department',
        'new_item_name'     => 'New Department Name',
        'menu_name'         => 'Departments',
    );

    $capabilities = array(
        'manage_terms' => 'manage_options', // Only admins can manage
        'edit_terms'   => 'manage_options', // Only admins can edit
        'delete_terms' => 'manage_options', // Only admins can delete
        'assign_terms' => 'edit_posts',     // Anyone who can edit posts can assign terms
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'department'),
        'show_in_rest'      => true,
        'capabilities'      => $capabilities, // Restrict capabilities
    );

    register_taxonomy('department', array('staff'), $args);
}
add_action('init', 'school_register_staff_taxonomy');

/**
 * Change the title placeholder for Staff members
 */
function school_change_staff_title_placeholder($title)
{
    $screen = get_current_screen();
    if ('staff' === $screen->post_type) {
        $title = 'Add staff name';
    }
    return $title;
}
add_filter('enter_title_here', 'school_change_staff_title_placeholder');

/**
 * Create default department taxonomy terms
 */
function school_create_default_departments()
{
    // Only run this once
    if (get_option('school_departments_created')) {
        return;
    }

    // Create the taxonomy terms
    wp_insert_term('Faculty', 'department');
    wp_insert_term('Administrative', 'department');

    // Set the flag
    update_option('school_departments_created', true);
}
add_action('init', 'school_create_default_departments');
