<?php

get_header();

pageBanner([
    'title' => get_the_title(),
    'links' => [
        '1' => [
            'label' => 'Institutes',
            'url' => get_post_type_archive_link('institute'),
        ],
        '2' => [
            'label' => get_the_title(),
            'url' => 'javascript:void(0)'
        ]
    ]
]);
?>

<section id="single-institute">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="sidebar-widget">
                    <?php
                    // Notifications
                    $notifications = null;

                    if (get_field('category')) {
                        $notifications = new WP_Query([
                            'post_type' => 'notification',
                            'cat' => get_field('category'),
                            'posts_per_page' => 5
                        ]);
                    }

                    if ($notifications && $notifications->have_posts()) :
                    ?>
                        <div class="siderbar_categories margin sidebar_bg">
                            <h4 class="sidebar_title">Notifications</h4>
                            <ul class="categories_detail">

                                <?php
                                while ($notifications->have_posts()) :
                                    $notifications->the_post();
                                ?>
                                    <li>
                                        <a href="<?php echo get_the_permalink(); ?>">
                                            <div class="notification-title"><?php echo get_the_title(); ?></div>
                                            <div class="small">
                                                <span><i class="fa fa-clock-o"></i> <?php echo get_the_date(); ?></span>
                                            </div>
                                        </a>
                                    </li>
                                <?php
                                endwhile;
                                ?>
                            </ul>
                        </div>
                    <?php
                    endif;
                    wp_reset_query();
                    ?>

                    <div class="siderbar_categories margin sidebar_bg">
                        <h4 class="sidebar_title">Institutes</h4>
                        <ul class="categories_detail">
                            <?php
                            global $wp;
                            $current_page = site_url($wp->request);

                            $institutes = new WP_Query([
                                'post_type' => 'institute',
                                'meta_key' => 'order',
                                'orderby' => 'meta_value_num',
                                'order' => 'ASC'
                            ]);

                            while ($institutes->have_posts()) :
                                $institutes->the_post();

                                // echo esc_url(site_url('institutes/' . get_post_field( 'post_name', get_post() )));
                            ?>
                                <li><a class="<?php echo $current_page == esc_url(site_url('institutes/' . get_post_field('post_name', get_post()))) ? 'active' : ''  ?>" href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></li>

                            <?php
                            endwhile;
                            wp_reset_query();
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</section>

<?php

get_footer();
