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

    register_post_type('notification', [
        'public' => true,
        'has_archive' => true,
        'show_in_rest' => true,
        'supports' => ['title', 'editor', 'excerpt'],
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
