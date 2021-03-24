<?php

get_header();

pageBanner([
    'title' => 'Event',
    'links' => [
        '1' => [
            'label' => 'Events',
            'url' => get_post_type_archive_link('event')
        ],
        '2' => [
            'label' => wp_trim_words(get_the_title(), 5),
            'url' => 'javascript:void(0)'
        ] 
    ]
]);
?>

<div class="kode_blog_madium_wrap detail padding">
    <!--CONTAINER START-->
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!--KODE BLOG DETAIL ROW START-->
                <div class="kode_blog_detail_row">
                    <!--KODE SERVICE DETAIL LIST START-->
                    <div class="kode_service_detail_list">
                        <div class="kode_service_des">
                            <figure>
                                <?php if (has_post_thumbnail()) : ?>
                                    <img src="<?php echo the_post_thumbnail_url('medium_large'); ?>" alt="">
                                <?php else : ?>
                                    <img src="<?php echo get_theme_file_uri('images/placeholder.jpg'); ?>" alt="">
                                <?php endif; ?>
                            </figure>
                            <div class="kode_service_text">
                                <h4 class="<?php renderMalayalamClass(); ?>"><a href="javascript:void(0)"><?php echo get_the_title(); ?></a></h4>
                                <?php
                                if (get_field('event_date')) {
                                    $dt = get_field('event_date');
                                    $finalDateTime = datetimeFromString($dt);
                                }
                                ?>
                                <p><i class="fa fa-clock-o"></i>Timing : <?php echo get_field('event_date') ? $finalDateTime : 'NULL'; ?></p>
                                <p><i class="fa fa-map-marker"></i> <?php echo get_field('location') ? get_field('location') : 'NULL'; ?></p>
                            </div>
                        </div>
                        <div class="<?php renderMalayalamClass(); ?> text-large">
                            <?php the_content(); ?>
                        </div>
                    </div>
                    <!--KODE SERVICE DETAIL LIST END-->
                </div>
            </div>
            <div class="col-md-4">
                <!--SIDEBAR WIDGET START-->
                <div class="sidebar-widget">
                    <?php echo get_template_part('template-parts/content', 'search'); ?>
                    <?php
                    $categories = get_the_category();
                    if ($categories) :
                    ?>
                        <!--SIDEBAR CATEGORIES MARGIN START-->
                        <div class="siderbar_categories margin sidebar_bg">
                            <h4 class="sidebar_title">Categories</h4>
                            <ul class="categories_detail">
                                <?php foreach ($categories as $category) : ?>
                                    <li><a href="<?php echo get_category_link($category); ?>"><?php echo $category->cat_name; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <!--SIDEBAR CATEGORIES MARGIN END-->
                    <?php endif; ?>

                    <?php
                    // Recent events
                    $recent_events = new WP_Query([
                        'post_type' => 'event',
                        'posts_per_page' => 3,
                        'post__not_in' => [get_the_ID()],
                        'meta_key' => 'event_date',
                        'orderby' => 'meta_value',
                        'order' => 'ASC',
                        'meta_query' => [
                            'key' => 'event_date',
                            'compare' => '<=',
                            'value' => date('Ymd'),
                            'type' => 'DATE'
                        ]
                    ]);

                    if ($recent_events->have_posts()) :
                    ?>
                        <!--SIDEBAR CATEGORIES RECENT NEWS MARGIN START-->
                        <div class="siderbar_categories recent_news margin sidebar_bg">
                            <h4 class="sidebar_title">Recent events</h4>
                            <ul class="kode_calender_detail">
                                <?php
                                while ($recent_events->have_posts()) :
                                    $recent_events->the_post();
                                ?>
                                    <li>
                                        <div class="kode_calender_list">
                                            <figure class="them_overlay">
                                                <a href="<?php echo get_the_permalink(); ?>">
                                                    <?php if (has_post_thumbnail()) : ?>
                                                        <img style="width:83px;" src="<?php echo the_post_thumbnail_url('serviceThumb'); ?>" alt="">
                                                    <?php else : ?>
                                                        <img style="width:83px;" src="<?php echo get_theme_file_uri('images/placeholder.jpg'); ?>" alt="">
                                                    <?php endif; ?>
                                                </a>
                                            </figure>
                                            <div class="kode_event_text text_2">
                                                <h6 class="<?php renderMalayalamClass(); ?>"><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h6>
                                                <ul class="kode_meta">
                                                    <li><a href="javascript:void(0)"><i class="fa fa-clock-o"></i><?php echo get_field('event_date') ? datetimeFromString(get_field('event_date')) : 'NULL'; ?></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                <?php
                                endwhile;
                                wp_reset_query();
                                ?>
                            </ul>
                        </div>
                        <!--SIDEBAR CATEGORIES RECENT NEWS MARGIN END-->
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</div>

<?php

get_footer();
