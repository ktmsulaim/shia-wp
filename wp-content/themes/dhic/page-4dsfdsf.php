<?php

get_header();

pageBanner([
    'title' => 'Page not found',
    'links' => [
        '1' => [
            'label' => '404',
            'url' => esc_url(site_url('/404'))
        ]
    ]
]);


get_footer();