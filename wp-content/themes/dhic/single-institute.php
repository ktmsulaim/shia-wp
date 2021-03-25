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
        <?php 
        if (get_field('category')) : 
            echo '<hr>';    
        ?>
            <div class="row">
                <div class="col-md-8">
                    <h4 class="sidebar_title">Recent news</h4>
                    <?php
                    $news = new WP_Query([
                        'post_type' => 'post',
                        'posts_per_page' => 2,
                        'cat' => get_field('category')
                    ]);

                    if ($news->have_posts()) :
                    ?>
                        <div class="row">
                            <?php
                            while ($news->have_posts()) :
                                $news->the_post();
                            ?>
                                <div class="col-md-6">
                                    <div class="kode_blog_des des_2">
                                        <figure class="them_overlay">
                                            <?php if (has_post_thumbnail()) : ?>
                                                <img src="<?php echo the_post_thumbnail_url('serviceThumb'); ?>" alt="">
                                                <a data-rel="prettyPhoto" class="expand_btn btn_hover2" href="<?php echo the_post_thumbnail_url('serviceThumb'); ?>"><i class="fa fa-arrow-right"></i></a>
                                            <?php else : ?>
                                                <img src="<?php echo get_theme_file_uri('images/placeholder.jpg'); ?>" alt="">
                                            <?php endif; ?>
                                        </figure>
                                        <div class="kode_blog_text">
                                            <h4 class="<?php renderMalayalamClass(); ?>"><a href="<?php echo get_the_permalink(); ?>"><span><?php echo get_the_title(); ?></a></h4>
                                            <div class="kode_blog_caption">
                                                <div>
                                                    <p style="text-transform:none;" class="<?php renderMalayalamClass(); ?>">
                                                        <?php if (has_excerpt()) :
                                                            echo get_the_excerpt();
                                                        else :
                                                            echo substr(strip_tags(get_the_content()), 0, 100);
                                                        endif; ?>
                                                    </p>
                                                </div>
                                                <ul class="kode_meta meta_2">
                                                    <li><a href="javascript:void(0)"><i class="fa fa-clock-o"></i><?php echo get_the_date(); ?></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            endwhile;
                            wp_reset_query();
                        ?>
                        </div>
                        <?php
                        else :
                            echo '<p>No recent news!</p>';
                        endif;
                        ?>
                    </div>
                    <div class="col-md-4">
                        <h4 class="sidebar_title">Upcoming events</h4>
                        <?php
                        $today = date('Ymd');
                        $events = new WP_Query([
                            'posts_per_page' => 3,
                            'post_type' => 'event',
                            'meta_key' => 'event_date',
                            'orderby' => 'meta_value',
                            'order' => 'ASC',
                            'cat' => get_field('category'),
                            'meta_query' => [
                                'key' => 'event_date',
                                'compare' => '>=',
                                'value' => $today,
                                'type' => 'DATE',
                            ]
                        ]);
    
                        if ($events->have_posts()) :
                        ?>
                            <ul class="kode_calender_detail detail_2">
                                <?php
                                while ($events->have_posts()) :
                                    $events->the_post();
                                ?>
                                    <li>
                                        <?php
                                        get_template_part('template-parts/content', 'event');
                                        ?>
                                    </li>
                                <?php
                                endwhile;
                                ?>
                            </ul>
                        <?php
                            wp_reset_query();
                        else :
                            echo '<p>No upcoming events!</p>';
                        endif;
                        ?>
                    </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php

get_footer();
