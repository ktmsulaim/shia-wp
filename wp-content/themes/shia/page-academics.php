<?php

get_header();


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
                <div id="curriculum">
                    <div class="text-on-image">
                        <img src="<?php echo get_theme_file_uri('/img/book-with-board.jpg'); ?>" class="img-fluid" alt="">
                        <h4 class="text">Curriculum</h4>
                    </div>
                    <div class="data mt-4">
                        <div class="content">
                            <?php echo get_field('curriculum'); ?>
                        </div>
                    </div>
                </div>

                <div id="programs" class="my-5">
                    <div class="title">
                        <h4 class="title-2">Programs</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box box-3 h-100">
                                <div class="box-image mb-2">

                                </div>
                                <div class="box-data">
                                    <h5 class="m-0 text-uppercase small color-secondary fw-bold">Secondary</h5>
                                    <div class="mt-2">
                                        <?php echo get_field('secondary'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="box box-3 h-100">
                                <div class="box-image mb-2">

                                </div>
                                <div class="box-data">
                                    <h5 class="m-0 text-uppercase small color-secondary fw-bold">Senior Secondary</h5>
                                    <div class="mt-2">
                                        <?php echo get_field('senior_secondary'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
<?php 
    if(get_the_content()):
?>
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <?php echo get_the_content(); ?>
                    </div>
                </div>
            </div>
        </section>
<?php 
    endif;
    get_footer(); 
?>