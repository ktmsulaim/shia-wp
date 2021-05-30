<?php

get_header();

$category = get_queried_object();

pageHeader([
    'title' => 'Creative Frame',
    'breadcrumb' => [
        0 => [
            'label' => 'Categories',
            'url' => 'javascript:void(0)',
        ],
        1 => [
            'label' => single_cat_title('', false),
            'url' => get_category_link($category->term_id),
        ]
    ],
    'page_banner' => get_theme_file_uri('/img/banner-art.jpg'),
]);
?>
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                <?php
                $count = 1;

                if (have_posts()) :
                    while (have_posts()) :
                        the_post();
                        echo '<div class="col-md-4 ' . ($count > 3 ? 'mt-4' : '') . '">';
                        get_template_part('template-parts/single', 'culture-aw');
                        echo '</div>';

                        $count++;
                    endwhile;
                    wp_reset_query();
                else :
                ?>
                    <div class="col-md-6 mx-auto">
                        <?php no_data('data'); ?>
                    </div>
                <?php
                endif;
                ?>
                </div>
            </div>
            <div class="col-md-3">
                <div class="side-bar">
                    <?php get_template_part('template-parts/sidebar', 'categories'); ?>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <?php
                echo bootstrap_pagination();
                ?>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>