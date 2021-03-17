<?php

function postTypes()
{
    register_post_type('slide', [
        'public' => true,
        'has_archive' => false,
        'show_in_rest' => false,
        'supports' => ['title', 'thumbnail'],
        'labels' => [
            'name' => 'Slides',
            'add_new_item' => 'Add new slide',
            'edit_item' => 'Edit slide',
            'all_items' => 'All slides',
            'not_found' => 'No slides found!',
            'singular_name' => 'Slide',
        ],
        'menu_icon' => 'dashicons-images-alt'
    ]);

    register_post_type('event', [
        'public' => true,
        'has_archive' => true,
        'show_in_rest' => true,
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
        'taxonomies' => ['category'],
        'hierarchical' => true,
        'labels' => [
            'name' => 'Events',
            'add_new_item' => 'Add new event',
            'edit_item' => 'Edit event',
            'all_items' => 'All events',
            'not_found' => 'No events found!',
            'singular_name' => 'Event',
        ],
        'menu_icon' => 'dashicons-format-aside',
    ]);
}

add_action('init', 'postTypes');
