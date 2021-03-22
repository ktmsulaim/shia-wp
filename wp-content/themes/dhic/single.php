<?php

get_header();

pageBanner([
    'title' => 'News',
    'links' => [
        '1' => [
            'label' => 'News',
            'url' => get_the_permalink()
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
                    <!--KODE BLOG DETAIL DES START-->
                    <div class="kode_blog_detail_des">
                        <figure class="them_overlay">
                            <?php if (has_post_thumbnail()) : ?>
                                <img src="<?php echo the_post_thumbnail_url('serviceThumb'); ?>" alt="">
                            <?php else : ?>
                                <img src="<?php echo get_theme_file_uri('images/placeholder.jpg'); ?>" alt="">
                            <?php endif; ?>
                        </figure>
                        <div class="kode_blog_detail_text">
                            <h3 class="<?php renderMalayalamClass(); ?>"><a href="javascript:void(0)"><?php echo get_the_title(); ?></a></h3>
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
                        <div class="<?php renderMalayalamClass(); ?> text-large">
                            <?php the_content(); ?>
                        </div>
                    </div>

                    <?php
                    if (get_field('highlight')) :
                    ?>
                        <!--KODE BLOG DETAIL DES END-->
                        <blockquote class="blog_quote">
                            <span><i class="fa fa-quote-left"></i></span>
                            <div class="quote_text">
                                <p class="<?php renderMalayalamClass(); ?> text-large"><?php echo get_field('highlight'); ?></p>
                            </div>
                        </blockquote>


                    <?php
                    endif;
                    ?>

                    <!--KODE SOCIAL SHARE START-->
                    <div class="kode_social_share">
                        <a href="javascript:void(0)"><i class="fa fa-share-alt"></i>Share This Post</a>
                        <!-- <ul class="social_meta">
                            <li><a class="hvr-ripple-out" href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a class="hvr-ripple-out" href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a class="hvr-ripple-out" href="#"><i class="fa fa-tumblr"></i></a></li>
                        </ul> -->
                        <?php echo do_shortcode('[DISPLAY_ULTIMATE_SOCIAL_ICONS]'); ?>

                        <!--KODE PAGINATION START-->
                        <div class="kode_pagination">
                            <!-- <a class="prve" href="<?php //echo get_previous_post_link(); 
                                                        ?>"><i class="fa fa-arrow-left"></i>Previous</a> -->
                            <!-- <a class="next" href="<?php //echo get_next_post_link(); 
                                                        ?>">Next<i class="fa fa-arrow-right"></i></a> -->
                            <span class="prve">
                                <?php
                                echo get_previous_post_link('%link', '<i class="fa fa-arrow-left"></i>Previous');
                                ?>
                            </span>
                            <span class="next">

                                <?php
                                echo get_next_post_link('%link', 'Next <i class="fa fa-arrow-right"></i>');
                                ?>
                            </span>
                        </div>
                        <!--KODE PAGINATION END-->
                    </div>
                    <!--KODE SOCIAL SHARE END-->


                    <?php
                    $recent_posts = new WP_Query([
                        'post_type' => 'post',
                        'posts_per_page' => 2,
                        'post__not_in' => [get_the_ID()],
                    ]);

                    if ($recent_posts->have_posts()) :
                    ?>
                        <!--ROW START-->
                        <div class="row">
                            <div class="kode_blog_detail_post">
                                <div class="col-md-12">
                                    <!--SECTION HDG START-->
                                    <div class="section_hdg">
                                        <h3>Recent Posts</h3>
                                        <span><i class="fa fa-circle"></i></span>
                                    </div>
                                    <!--SECTION HDG END-->
                                </div>
                                <div class="row">
                                    <?php
                                    while ($recent_posts->have_posts()) :
                                        $recent_posts->the_post();
                                    ?>
                                        <div class="col-md-6">
                                            <div class="kode_blog_des des_2">
                                                <figure class="them_overlay">
                                                    <?php if (has_post_thumbnail()) : ?>
                                                        <img src="<?php echo the_post_thumbnail_url('serviceThumb'); ?>" alt="">
                                                        <a data-rel="prettyPhoto" class="expand_btn btn_hover2" href="<?php echo the_post_thumbnail_url('serviceThumb'); ?>"><i class="fa icon-arrows-1"></i></a>
                                                    <?php else : ?>
                                                        <img src="<?php echo get_theme_file_uri('images/placeholder.jpg'); ?>" alt="">
                                                    <?php endif; ?>
                                                </figure>
                                                <div class="kode_blog_text">
                                                    <h4 class="<?php renderMalayalamClass(); ?>"><a href="<?php echo get_the_permalink(); ?>"><span><?php echo get_the_title(); ?></a></h4>
                                                    <div class="kode_blog_caption">
                                                        <p class="<?php renderMalayalamClass(); ?>"><?php if (has_excerpt()) :
                                                                the_excerpt();
                                                            else :
                                                                echo substr(strip_tags(get_the_content()), 0, 100);
                                                            endif; ?></p>
                                                        <ul class="kode_meta meta_1">
                                                            <li><a href="javascript:void(0)"><i class="fa fa-clock-o"></i><?php echo get_the_date(); ?></a></li>
                                                            <li><a href="javascript:void(0)"><i class="fa fa-tag"></i>
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
                                                </div>
                                            </div>
                                        </div>

                                    <?php
                                    endwhile;
                                    wp_reset_query();
                                    ?>
                                </div>
                            </div>
                        </div>
                        <!--ROW END-->
                    <?php endif; ?>
                </div>
                <!--KODE BLOG DETAIL ROW END-->
            </div>
            <div class="col-md-4">
                <!--SIDEBAR WIDGET START-->
                <div class="sidebar-widget">
                    <!--KODE SEARCH MARGIN START-->
                    <?php echo get_template_part('template-parts/content', 'search'); ?>
                    <!--KODE SEARCH MARGIN END-->

                    <!--SIDEBAR CATEGORIES MARGIN START-->
                    <div class="siderbar_categories margin sidebar_bg">
                        <h4 class="sidebar_title">Categories</h4>
                        <ul class="categories_detail">
                            <?php
                            foreach (get_the_category() as $category) :
                            ?>
                                <li><a href="<?php echo get_category_link($category); ?>"><?php echo $category->cat_name; ?></a></li>
                            <?php
                            endforeach;
                            ?>
                        </ul>
                    </div>
                    <!--SIDEBAR CATEGORIES MARGIN END-->
                    <?php
                    // check this has related news
                    $cats = wp_get_post_categories(get_the_ID(), array('fields' => 'ids'));
                    $related_news = new WP_Query([
                        'post_type' => 'post',
                        'posts_per_page' => 3,
                        'post__not_in' => [get_the_ID()],
                        'category__in' => $cats
                    ]);

                    if ($related_news->have_posts()) :
                    ?>
                        <!--SIDEBAR CATEGORIES RECENT NEWS MARGIN START-->
                        <div class="siderbar_categories recent_news margin sidebar_bg">
                            <h4 class="sidebar_title">Related news</h4>
                            <ul class="kode_calender_detail">
                                <?php
                                while ($related_news->have_posts()) :
                                    $related_news->the_post();
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
                                            <div class="kode_event_text">
                                                <h6 class="<?php renderMalayalamClass(); ?>"><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h6>
                                                <ul class="kode_meta">
                                                    <li><a href="javascript:void(0)"><i class="fa fa-clock-o"></i><?php echo get_the_date(); ?></a></li>
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
                <!--SIDEBAR WIDGET END-->
            </div>
        </div>
    </div>
    <!-- CONTAINER END -->
</div>

<?php

get_footer();
