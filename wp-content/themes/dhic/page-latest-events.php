<?php

get_header();

pageBanner([
    'title' => 'Latest events',
    'links' => [
        '1' => [
            'label' => 'Latest events',
            'url' => 'javascript:void(0)'
        ]
    ]
]);

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$latest_events = new WP_Query([
    'post_type' => 'event',
    'posts_per_page' => '10',
    'paged' => $paged,
    'meta_key' => 'event_date',
    'orderby' => 'meta_value',
    'order' => 'ASC',
    'meta_query' => [
        'key' => 'event_date',
        'compare' => '>=',
        'value' => date('Ymd'),
        'type' => 'DATE',
    ]
]);
?>

<!--KODE EVENT WRAP START-->
<div class="kode_event_wrap">
    <!--CONTAINER START-->
    <div class="container">
        <div class="kode_event_detail">
            <?php
            if ($latest_events->have_posts()) :
            ?>
                <ul>
                    <?php
                    while ($latest_events->have_posts()) :
                        $latest_events->the_post();

                        $day = datetimeFromString(get_field('event_date'), 'd');
                        $month = datetimeFromString(get_field('event_date'), 'F');
                        $year = datetimeFromString(get_field('event_date'), 'Y');

                    ?>
                        <li>
                            <div class="event_date">
                                <span><?php echo $day; ?></span>
                                <p><?php echo $month;
                                    echo date('Y') != $year ? ' - ' . $year : ''; ?></p>
                            </div>
                            <div class="kode_calender_list">
                                <figure class="them_overlay">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <img class="img-fluid" style="width: 150px;" src="<?php echo the_post_thumbnail_url('serviceThumb'); ?>" alt="">
                                    <?php else : ?>
                                        <img class="img-fluid" style="width: 150px;" src="<?php echo get_theme_file_uri('images/placeholder.jpg'); ?>" alt="">
                                    <?php endif; ?>
                                </figure>
                                <div class="kode_event_text">
                                    <h4 class="<?php renderMalayalamClass(); ?>"><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
                                    <p class="<?php renderMalayalamClass(); ?>">
                                        <?php if (has_excerpt()) :
                                            echo get_the_excerpt();
                                        else :
                                            echo substr(strip_tags(get_the_content()), 0, 100);
                                        endif; ?>
                                    </p>
                                    <div>
                                        <span>
                                            <?php
                                            $categories = get_the_category();
                                            if (is_array($categories) && count($categories) > 0) :
                                            ?>
                                                <i class="fa fa-tag"></i>
                                                <?php foreach ($categories as $cat) :
                                                ?>
                                                    <a href="<?php echo get_category_link($cat->cat_ID); ?>"><?php echo $cat->cat_name; ?></a>
                                            <?php
                                                    if (count($categories) > 1) :
                                                        echo ', ';
                                                    endif;
                                                endforeach;
                                            endif;
                                            ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="kode_event_ticket">
                                <a class="event_studium" href="javscript:void(0)"><i class="fa fa-map-marker"></i><?php echo get_field('location') ?? 'NULL'; ?></a>
                                <a class="medium_btn background-bg-dark" href="<?php echo get_the_permalink(); ?>">View</a>
                            </div>
                        </li>
                    <?php

                    endwhile;
                    ?>
                </ul>
            <?php
            else :
            ?>
                <p>No upcoming events! Explore our <a href="<?php echo get_post_type_archive_link('event'); ?>">recent events</a></p>
            <?php
            endif;
            ?>
        </div>

        <div class="kode_pagination_list">
                <div class="kode_pagination">
                    <span class="prve">
                        <?php
                         previous_posts_link('<i class="fa fa-arrow-left"></i> Previous', $latest_events->max_num_pages);
                        ?>
                    </span>
                    <span class="next">

                        <?php
                         next_posts_link('Next <i class="fa fa-arrow-right"></i>', $latest_events->max_num_pages);
                        ?>
                    </span>
                </div>
        </div>
    </div>
</div>
<?php

get_footer();
