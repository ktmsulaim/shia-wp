<?php

get_header();

pageBanner([
    'title' => 'Notifications',
    'links' => [
        '1' => [
            'label' => 'Notifications',
            'url' => 'javascript:void(0)'
        ]
    ]
]);
?>

<section id="notification">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="kode_blog_detail_text">
                    <h3><?php echo get_the_title(); ?></h3>
                    <ul class="kode_meta meta_2">
                        <li><a href="#"><i class="fa fa-clock-o"></i><?php echo get_the_date(); ?></a></li>
                        <li><a href="#"><i class="fa fa-tag"></i>
                                <?php
                                $categories = get_the_category();
                                if (is_array($categories) && count($categories) > 0) :
                                    foreach ($categories as $cat) :
                                ?>
                                        <a href="<?php echo get_category_link($cat->cat_ID); ?>"><?php echo $cat->cat_name; ?></a>
                                <?php
                                        if (count($categories) > 1) :
                                            echo ', ';
                                        endif;
                                    endforeach;
                                endif;
                                ?>
                            </a></li>
                    </ul>
                </div>
                <div class="mt-4">
                    <?php echo get_the_content(); ?>
                </div>
            </div>
            <div class="col-md-4">
                <?php
                $cats = wp_get_post_categories(get_the_ID(), array('fields' => 'ids'));

                $related = new WP_Query([
                    'post_type' => 'notification',
                    'posts_per_page' => 5,
                    'category__in' => $cats,
                    'post__not_in' => [get_the_ID()],
                ]);

                if ($related->have_posts()) :
                ?>
                    <div class="sidebar-widget">
                        <div class="siderbar_categories margin sidebar_bg">
                            <h4 class="sidebar_title">Recent</h4>
                            <ul class="categories_detail">
                                <?php
                                while ($related->have_posts()) :
                                    $related->the_post();
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
                    </div>

                <?php
                endif;
                ?>

            </div>
        </div>
    </div>
</section>

<?php

get_footer();
