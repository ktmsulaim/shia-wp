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
                <div id="artfest">
                    <div class="text-on-image">
                        <img src="<?php echo get_theme_file_uri('/img/artfest.JPG'); ?>" class="img-fluid" alt="Artfest image">
                        <h4 class="text">Artfest</h4>
                    </div>
                    <div class="content my-4">
                        <?php echo get_field('art_fest'); ?>
                    </div>
                </div>
                <div id="extracurricular">
                    <div class="title">
                        <h4 class="title-2">Extracurricular</h4>
                    </div>
                    <div class="content">
                        <?php echo get_field('extracurricular'); ?>
                    </div>
                </div>
                <div class="share-button mt-5" data-text="<?php echo get_the_title(); ?>" data-url="<?php echo get_the_permalink(); ?>" data-text="<?php echo short_content(); ?>"></div>
            </div>
            <div class="col-md-4 order-1 order-md-2">
                <div class="side-bar">
                    <?php get_template_part('template-parts/search', 'bar');  ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>