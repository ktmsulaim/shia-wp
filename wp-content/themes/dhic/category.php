<?php

get_header();

pageBanner([
    'title' => 'Category',
    'links' => [
        '1' => [
            'label' => single_cat_title('', false),
            'url' => get_the_permalink()
        ]
    ]
]);
?>

<section id="page">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <?php
                if (have_posts()) :
                    while (have_posts()) :
                        the_post();
                ?>
                        <div class="kode_portfolio_des des_2">
                            <figure class="them_overlay">
                                <?php if (has_post_thumbnail()) : ?>
                                    <img src="<?php echo the_post_thumbnail_url('serviceThumb'); ?>" alt="<?php echo get_the_title(); ?>">
                                <?php else : ?>
                                    <img src="<?php echo get_theme_file_uri('images/placeholder.jpg'); ?>" alt="">
                                <?php endif; ?>
                            </figure>
                            <div class="kode_project_text">
                                <h4 class="<?php renderMalayalamClass(); ?>"><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
                                <div>
                                    <p style="text-transform:none;" class="<?php renderMalayalamClass(); ?>">
                                        <?php if (has_excerpt()) :
                                            echo get_the_excerpt();
                                        else :
                                            echo substr(strip_tags(get_the_content()), 0, 100);
                                        endif; ?>
                                    </p>
                                </div>
                                <div class="kode_project_share">
                                    <a class="medium_btn background-bg-dark btn_hover" href="<?php echo get_the_permalink(); ?>">View</a>
                                </div>
                            </div>
                        </div>
                <?php
                    endwhile;
                else :
                    echo '<p>No news found!</p>';
                endif;
                ?>
            </div>
            <div class="col-md-3">
                <div class="sidebar_widget">
                    <form action="" method="get" class="kode_comment">
                        <div class="kode_donation_item">
                            <select name="post_type" id="post_type" class="chosen-select" required>
                                <option value="post">News</option>
                                <option value="event">Events</option>
                                <option value="notification">Notifications</option>
                            </select>
                        </div>
                        <button type="submit" class="medium_btn theme_color_bg btn_hover2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php

get_footer();
