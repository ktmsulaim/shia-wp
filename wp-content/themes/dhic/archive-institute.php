<?php

get_header();

pageBanner([
    'title' => 'Institutes',
    'links' => [
        '1' => [
            'label' => 'Institutes',
            'url' => 'javascript:void(0)'
        ]
    ]
]);

?>

<section id="institutes">
    <div class="container">
        <div class="row">
            <?php
            if (have_posts()) :
                while (have_posts()) :
                    the_post();
            ?>
                    <div class="col-md-6">
                        <div class="kode_portfolio_des">
                            <figure class="them_overlay">
                                <?php if (has_post_thumbnail()) : ?>
                                    <img src="<?php echo the_post_thumbnail_url('medium_large'); ?>" alt="">
                                <?php else : ?>
                                    <img src="<?php echo get_theme_file_uri('images/placeholder.jpg'); ?>" alt="">
                                <?php endif; ?>
                            </figure>
                            <div class="kode_portfolio_text">
                                <h4><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
                                <div>
                                    <?php
                                    if (has_excerpt()) :
                                        the_excerpt();
                                    else :
                                        echo substr(strip_tags(get_the_content()), 0, 130);
                                    endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                endwhile;
            else :
                ?>
                <div class="col-md-7 mx-auto">
                    <p>Sorry! no data found!</p>
                </div>
            <?php
            endif;
            ?>


        </div>
        <div class="row">
            <div class="col-md-12">
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
