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
                <div class="row">
                    <div class="col-md-3">
                        <div class="facility-box">
                            <div class="icon">
                                <span class="mdi mdi-book"></span>
                            </div>
                            <div class="title">
                                <a href="<?php echo esc_url(site_url('/facilites/library')); ?>">Library</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="facility-box">
                            <div class="icon">
                                <span class="mdi mdi-laptop"></span>
                            </div>
                            <div class="title">
                                <a href="<?php echo esc_url(site_url('/facilites/i-t-lab')); ?>">I.T Lab</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="facility-box">
                            <div class="icon">
                                <span class="mdi mdi-projector"></span>
                            </div>
                            <div class="title">
                                <a href="<?php echo esc_url(site_url('/facilites/smart-room')); ?>">Smart Room</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="facility-box">
                            <div class="icon">
                                <span class="mdi mdi-silverware"></span>
                            </div>
                            <div class="title">
                                <a href="<?php echo esc_url(site_url('/facilites/mess')); ?>">Mess</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-3">
                            <div class="facility-box">
                                <div class="icon">
                                    <span class="mdi mdi-run-fast"></span>
                                </div>
                                <div class="title">
                                    <a href="<?php echo esc_url(site_url('/facilites/play-and-physical-education')); ?>">Play & Physical Education</a>
                                </div>
                            </div>
                        </div>
                    <div class="col-md-3">
                            <div class="facility-box">
                                <div class="icon">
                                    <span class="mdi mdi-star"></span>
                                </div>
                                <div class="title">
                                    <a href="<?php echo esc_url(site_url('/facilites/masjid')); ?>">Masjid</a>
                                </div>
                            </div>
                        </div>
                    <div class="col-md-3">
                            <div class="facility-box">
                                <div class="icon">
                                    <span class="mdi mdi-camera-outline"></span>
                                </div>
                                <div class="title">
                                    <a href="<?php echo esc_url(site_url('/facilites/studio')); ?>">Studio</a>
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
<?php get_footer(); ?>