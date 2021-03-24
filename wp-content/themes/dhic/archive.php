<?php

get_header();

pageBanner([
    'title' => 'Archive',
    'links' => [
        '1' => [
            'label' => 'Archive',
            'url' => 'javascript:void(0)'
        ]
    ]
]);
?>

<section id="archive">
    <div class="container">
        <div class="row">
            <div class="col-md-7 mx-auto">

                <?php
                if (have_posts()) :
                ?>
                    <div class="kode_blog_list">
                        <ul>
                            <?php
                            while (have_posts()) :
                                the_post();
                            ?>
                                <li class="kode_blog_des">
                                    <div class="kode_blog_text">
                                        <ul class="kode_meta">
                                            <li><a href="javascript:void(0)"><i class="fa fa-calendar"></i><?php echo get_the_date(); ?></a></li>
                                            <li><?php print_categories(get_the_category()); ?></li>
                                        </ul>
                                        <h5 class="<?php renderMalayalamClass(); ?>">
                                            <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
                                        </h5>
                                        <div>
                                            <p style="text-transform:none;" class="<?php renderMalayalamClass(); ?>">
                                                <?php if (has_excerpt()) :
                                                    echo get_the_excerpt();
                                                else :
                                                    echo substr(strip_tags(get_the_content()), 0, 100);
                                                endif; ?>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                <?php
                else :
                ?>
                    <p>No data found!</p>
                <?php
                endif;
                ?>

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
