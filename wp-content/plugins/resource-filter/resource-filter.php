<?php
/*
Plugin Name: Resource Filter
Description: A plugin to create and filter Resources.
Version: 1.0
Author: Your Name
*/

// Register Custom Post Type
function rfp_register_resource_post_type() {
    $labels = array(
        'name' => 'Resources',
        'singular_name' => 'Resource',
        'menu_name' => 'Resources',
        'name_admin_bar' => 'Resource',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Resource',
        'new_item' => 'New Resource',
        'edit_item' => 'Edit Resource',
        'view_item' => 'View Resource',
        'all_items' => 'All Resources',
        'search_items' => 'Search Resources',
        'not_found' => 'No resources found.',
        'not_found_in_trash' => 'No resources found in Trash.'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'rewrite' => array('slug' => 'resources')
    );

    register_post_type('resource', $args);
}
add_action('init', 'rfp_register_resource_post_type');

// Register Custom Taxonomies
function rfp_register_resource_taxonomies() {
    // Resource Type
    $labels = array(
        'name' => 'Resource Types',
        'singular_name' => 'Resource Type',
        'search_items' => 'Search Resource Types',
        'all_items' => 'All Resource Types',
        'parent_item' => 'Parent Resource Type',
        'parent_item_colon' => 'Parent Resource Type:',
        'edit_item' => 'Edit Resource Type',
        'update_item' => 'Update Resource Type',
        'add_new_item' => 'Add New Resource Type',
        'new_item_name' => 'New Resource Type Name',
        'menu_name' => 'Resource Type'
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'resource-type')
    );

    register_taxonomy('resource_type', array('resource'), $args);

    // Resource Topic
    $labels = array(
        'name' => 'Resource Topics',
        'singular_name' => 'Resource Topic',
        'search_items' => 'Search Resource Topics',
        'all_items' => 'All Resource Topics',
        'parent_item' => 'Parent Resource Topic',
        'parent_item_colon' => 'Parent Resource Topic:',
        'edit_item' => 'Edit Resource Topic',
        'update_item' => 'Update Resource Topic',
        'add_new_item' => 'Add New Resource Topic',
        'new_item_name' => 'New Resource Topic Name',
        'menu_name' => 'Resource Topic'
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'resource-topic')
    );

    register_taxonomy('resource_topic', array('resource'), $args);
}
add_action('init', 'rfp_register_resource_taxonomies');

function rfp_enqueue_scripts() {
    wp_enqueue_script('rfp-ajax-script', plugin_dir_url(__FILE__) . 'js/rfp-ajax.js', array('jquery'), null, true);
    wp_localize_script('rfp-ajax-script', 'rfp_ajax_obj', array(
        'ajax_url' => admin_url('admin-ajax.php')
    ));
}
add_action('wp_enqueue_scripts', 'rfp_enqueue_scripts');


function rfp_filter_resources() {
    $type = isset($_POST['type']) ? sanitize_text_field($_POST['type']) : '';
    $topic = isset($_POST['topic']) ? sanitize_text_field($_POST['topic']) : '';
    $keyword = isset($_POST['keyword']) ? sanitize_text_field($_POST['keyword']) : '';

    $args = array(
        'post_type' => 'resource',
        'posts_per_page' => -1,
    );

    if ($type) {
        $args['tax_query'][] = array(
            'taxonomy' => 'resource_type',
            'field' => 'slug',
            'terms' => $type,
        );
    }

    if ($topic) {
        $args['tax_query'][] = array(
            'taxonomy' => 'resource_topic',
            'field' => 'slug',
            'terms' => $topic,
        );
    }

    if ($keyword) {
        $args['s'] = $keyword;
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            get_template_part('template-parts/content', 'resource');
        }
    } else {
        echo 'No resources found.';
    }

    wp_die();
}
add_action('wp_ajax_rfp_filter_resources', 'rfp_filter_resources');
add_action('wp_ajax_nopriv_rfp_filter_resources', 'rfp_filter_resources');


?>

