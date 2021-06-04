<?php
$id = get_the_ID();
$cat_ids = wp_get_post_categories($id, ['fields' => 'ids']);

if ($cat_ids) {
    $related = new WP_Query([
        'post_type' => get_post_type($id),
        'category__in' => $cat_ids,
        'posts_per_page' => 5,
        'post__not_in' => [$id],
    ]);
} else {
    $related = null;
}


if ($related && $related->have_posts()) :
?>

    <div class="widget">
        <div class="widget-title">
            <h4>Related</h4>
        </div>
        <div class="widget-content">
            <?php
            while ($related->have_posts()) :
                $related->the_post();
            ?>
                <a href="<?php echo get_the_permalink(); ?>">
                    <div class="news-box news-box-3">
                        <div class="news-box-image">
                            <img src="<?php echo post_image(); ?>" alt="Post image" class="img-fluid">
                        </div>
                        <div class="news-box-data">
                            <div class="news-box-title">
                                <?php echo get_the_title(); ?>
                            </div>
                            <div class="news-box-meta">
                                <div class="date">
                                    <span class="mdi mdi-calendar-outline"></span>
                                    <span class="date-text"><?php echo get_the_date(); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            <?php
            endwhile;

            wp_reset_query();
            ?>
        </div>

    </div>

<?php endif; ?>