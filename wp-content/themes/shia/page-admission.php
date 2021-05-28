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
                <div class="text-on-image mb-4">
                    <img src="<?php echo get_theme_file_uri('/img/admission.jpg'); ?>" class="img-fluid" alt="">
                    <h4 class="text">How to apply</h4>
                </div>
                <div class="content">
                    <div id="how">
                        <?php echo get_field('how'); ?>
                    </div>

                    <div class="my-4">
                        <h4 class="title-3">Who</h4>
                    </div>

                    <div id="who" class="bg-light rounded p-3">
                        <?php echo get_field('who'); ?>
                    </div>
                    <?php echo get_the_content(); ?>
                </div>
                <div class="share-button mt-5" data-text="<?php echo get_the_title(); ?>" data-url="<?php echo get_the_permalink(); ?>" data-text="<?php echo short_content(); ?>"></div>
            </div>
            <div class="col-md-4 order-1 order-md-2">
                <div class="side-bar">
                    <?php get_template_part('template-parts/search', 'bar');  ?>
                    <?php if(has_children()) : ?>
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