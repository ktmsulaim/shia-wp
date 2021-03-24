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
    
    register_post_type('institute', [
        'public' => true,
        'has_archive' => true,
        'show_in_rest' => true,
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
        'hierarchical' => true,
        'labels' => [
            'name' => 'Institutes',
            'add_new_item' => 'Add new institute',
            'edit_item' => 'Edit institute',
            'all_items' => 'All institutes',
            'not_found' => 'No institutes found!',
            'singular_name' => 'Institute',
        ],
        'menu_icon' => 'dashicons-bank',
        'rewrite' => [
            'slug' => 'institutes'
        ]
    ]);

    register_post_type('notification', [
        'public' => true,
        'has_archive' => true,
        'show_in_rest' => true,
        'supports' => ['title', 'editor', 'excerpt'],
        'taxonomies' => ['category'],
        'hierarchical' => true,
        'labels' => [
            'name' => 'Notifications',
            'add_new_item' => 'Add new notification',
            'edit_item' => 'Edit notification',
            'all_items' => 'All notifications',
            'not_found' => 'No notifications found!',
            'singular_name' => 'Notification',
        ],
        'menu_icon' => 'dashicons-bell',
        'rewrite' => [
            'slug' => 'notifications'
        ]
    ]);
}

add_action('init', 'postTypes');
