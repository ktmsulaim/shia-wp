<?php

get_header();

$parent = null;

if (has_page_parent()) {
    $parent = get_page_parent();

    $breadcrumb = [
        0 => [
            'label' => get_the_title($parent),
            'url' => get_the_permalink($parent),
        ],
        1 => [
            'label' => get_the_title(),
            'url' => get_the_permalink(),
        ]
    ];
} else {
    $breadcrumb = [
        0 => [
            'label' => get_the_title(),
            'url' => get_the_permalink(),
        ]
    ];
}

pageHeader([
    'title' => null,
    'breadcrumb' => $breadcrumb,
    'page_banner' => null,
]);
?>
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-8 order-2 order-md-1">
                <div id="students-union">
                    <div class="text-on-image">
                        <img src="<?php echo get_theme_file_uri('/img/students-union.jpg'); ?>" alt="Students union" class="img-fluid">
                        <h4 class="text">SHAMSUL HUDA STUDENTS’ UNION (SSU)</h4>
                    </div>
                    <div class="my-4">
                        <div class="content">
                            <?php echo get_field('students_union'); ?>
                        </div>
                    </div>

                    <h4 class="title-2">Latest news</h4>

                    <div class="news" id="studentUnionNews">


                        <?php
                        $news = new WP_Query([
                            'post_type' => 'post',
                            'category_name' => 'students-union',
                            'posts_per_page' => 6,
                        ]);

                        if ($news->have_posts()) :
                            while ($news->have_posts()) :
                                $news->the_post();

                                get_template_part('template-parts/single', 'news-2');

                            endwhile;
                        else :
                            no_data('news');
                        endif;

                        wp_reset_query();

                        ?>
                    </div>
                </div>
                <div id="creative-frame-section" class="mt-5 pt-4">
                    <h4 class="title-2">Creative frame</h4>
                    <div class="content">
                        <?php echo get_field('creative_frame'); ?>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="facility-box">
                                <div class="icon">
                                    <span class="mdi mdi-text-box-outline"></span>
                                </div>
                                <div class="title">
                                    <a href="<?php echo get_category_link(get_cat_ID('articles')); ?>">Articles</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="facility-box">
                                <div class="icon">
                                    <span class="mdi mdi-account-group-outline"></span>
                                </div>
                                <div class="title">
                                    <a href="<?php echo get_category_link(get_cat_ID('culture')); ?>">Culture</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content">
                    <?php echo get_the_content(); ?>
                </div>
                <div class="share-button mt-5" data-text="<?php echo get_the_title(); ?>" data-url="<?php echo get_the_permalink(); ?>" data-text="<?php echo short_content(); ?>"></div>
            </div>
            <div class="col-md-4 order-1 order-md-2">
                <div class="side-bar">
                    <?php get_template_part('template-parts/search', 'bar');  ?>
                    <?php if (has_children()) : ?>
                        <div class="widget">
                            <div class="widget-title">
                                <h4>Read also</h4>
                            </div>
                            <div class="widget-content">
                                <?php echo get_child_pages(); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>