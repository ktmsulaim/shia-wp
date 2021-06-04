<?php

function postTypes()
{
    register_post_type('slide', [
        'public' => true,
        'has_archive' => false,
        'show_in_rest' => false,
        'supports' => ['title'],
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

    register_post_type('artwork', [
        'public' => true,
        'has_archive' => true,
        'show_in_rest' => true,
        'supports' => ['title', 'editor', 'excerpt', 'thumbnail'],
        'hierarchical' => true,
        'taxonomies'  => ['category'],
        'labels' => [
            'name' => 'Artworks',
            'add_new_item' => 'Add new artwork',
            'edit_item' => 'Edit artwork',
            'all_items' => 'All artworks',
            'not_found' => 'No artworks found!',
            'singular_name' => 'Artwork',
        ],
        'menu_icon' => 'dashicons-editor-paste-word',
        'rewrite' => [
            'slug' => 'artworks'
        ]
    ]);
    
    register_post_type('gallery', [
        'public' => true,
        'has_archive' => true,
        'show_in_rest' => true,
        'supports' => ['title', 'editor', 'thumbnail'],
        'hierarchical' => true,
        'labels' => [
            'name' => 'Galleries',
            'add_new_item' => 'Add new gallery',
            'edit_item' => 'Edit gallery',
            'all_items' => 'All galleries',
            'not_found' => 'No galleries found!',
            'singular_name' => 'Gallery',
        ],
        'menu_icon' => 'dashicons-images-alt2',
        'rewrite' => [
            'slug' => 'galleries'
        ]
    ]);

    
    register_post_type('download', [
        'public' => true,
        'has_archive' => true,
        'show_in_rest' => true,
        'supports' => ['title'],
        'hierarchical' => true,
        'labels' => [
            'name' => 'Downloads',
            'add_new_item' => 'Add new download',
            'edit_item' => 'Edit download',
            'all_items' => 'All downloads',
            'not_found' => 'No downloads found!',
            'singular_name' => 'Download',
        ],
        'menu_icon' => 'dashicons-download',
        // 'rewrite' => [
        //     'slug' => 'downloads'
        // ]
    ]);

}

add_action('init', 'postTypes');