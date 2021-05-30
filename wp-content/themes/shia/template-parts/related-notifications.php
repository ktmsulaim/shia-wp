<?php
$id = get_the_ID();

$related = new WP_Query([
    'post_type' => get_post_type($id),
    'posts_per_page' => 5,
    'post__not_in' => [$id],
]);

if ($related && $related->have_posts()) :
?>

    <div class="widget">
        <div class="widget-title">
            <h4>Recent notifications</h4>
        </div>
        <div class="widget-content">
            <div class="notifications">

                <?php
                while ($related->have_posts()) :
                    $related->the_post();
                    echo '<ul>';
                    get_template_part('template-parts/single', 'notification');
                    echo '</ul>';
                endwhile;

                wp_reset_query();
                ?>
            </div>
        </div>

    </div>

<?php endif; ?>