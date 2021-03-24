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

<section id="news">
    <div class="container">
        <div class="row">
            <?php
            if (have_posts()) :
                while (have_posts()) :
                    the_post();
            ?>
                    <div class="col-md-6 mb-4">
                        <div class="kode_blog_des">
                            <figure class="them_overlay">
                                <?php if (has_post_thumbnail()) : ?>
                                    <img src="<?php echo the_post_thumbnail_url('medium_large'); ?>" alt="<?php echo get_the_title(); ?>">
                                <?php else : ?>
                                    <img src="<?php echo get_theme_file_uri('images/placeholder.jpg'); ?>" alt="">
                                <?php endif; ?>
                            </figure>
                            <div class="kode_blog_text">
                                <h4><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
                                <ul class="kode_meta meta_2">
                                    <li><a href="javascript:void(0)"><i class="fa fa-clock-o"></i><?php echo get_the_date(); ?></a></li>
                                    <li>
                                        <i class="fa fa-tag"></i>
                                        <span>
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

                                        </span>
                                    </li>
                                </ul>
                                <?php if (has_excerpt()) :
                                    the_excerpt();
                                else :
                                    echo substr(strip_tags(get_the_content()), 0, 100);
                                endif; ?>
                                <div class="mt-2">
                                    <a class="medium_btn background-bg-dark btn_hover" href="<?php echo get_the_permalink(); ?>">See More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                endwhile;

            else :
                ?>
                <p>Sorry! no data found!</p>
            <?php
            endif;
            ?>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="kode_pagination_list">
                    <div class="kode_pagination">
                        <?php echo paginate_links([
                            'type' => 'list',
                            'prev_text'    => '<i class="fa fa-arrow-left"></i>Previous',
                            'next_text'    => 'Next<i class="fa fa-arrow-right"></i>',
                        ]); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php

get_footer();
