<?php

get_header();

// check if has a parent


pageHeader([
    'title' => null,
    'breadcrumb' => [
        0 => [
            'label' => get_the_title(),
            'url' => get_the_permalink()
        ]
    ],
    'page_banner' => null,
]);
?>
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-8 order-2 order-md-1">
                <div class="content">
                    <?php echo get_the_content(); ?>

                    <div id="overview" class="mb-4">
                        <div class="text-on-image mb-4">
                            <img src="<?php echo get_theme_file_uri('/img/college_1.JPG'); ?>" alt="College photo" class="img-fluid">
                            <h4 class="text">Overview</h4>
                        </div>
                        <?php echo get_field('overview'); ?>
                    </div>
                    <div id="history" class="mb-4">
                        <h4 class="title-2">History</h4>
                        <?php echo get_field('history'); ?>
                    </div>
                    <div id="philosophy" class="mb-4">
                        <h4 class="title-2">Our philosophy</h4>
                        <?php echo get_field('philosophy'); ?>
                    </div>
                    <div id="vision-and-mission" class="mb-4">
                        <h4 class="title-2">Vision and Mission</h4>
                        <?php echo get_field('vision_and_mission'); ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4 order-1 mb-5 mb-md-0">
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

                <div class="about-contents stick-on-top">
                        <ul class="overview-sections">
                            <li><a href="#overview" class="scrollTo" data-target="#overview">Overview</a></li>
                            <li><a href="#history" class="scrollTo" data-target="#history">History</a></li>
                            <li><a href="#philosophy" class="scrollTo" data-target="#philosophy">Philosphy</a></li>
                            <li><a href="#vision-and-mission" class="scrollTo" data-target="#vision-and-mission">Vision and Mission</a></li>
                        </ul>
                    </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>