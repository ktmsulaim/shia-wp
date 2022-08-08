<?php

get_header();

pageHeader([
    'title' => 'Creative Frame',
    'breadcrumb' => [
        0 => [
            'label' => 'Creative frame',
            'url' => 'javascript:void(0)'
        ]
    ],
    'page_banner' => get_theme_file_uri('/img/banner-art.jpg'),
]);
?>
<section id="single-artwork" class="section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="box">
                    <?php
                    if (has_post_thumbnail()) :
                    ?>
                        <div class="post-image">
                            <img src="<?php echo post_image('large'); ?>" class="img-fluid" alt="Artwork">
                        </div>
                    <?php
                    endif;
                    ?>

                    <div class="post-title <?php echo get_language_class(); ?>">
                        <h4 <?php echo get_text_direction(); ?>><?php echo get_the_title(); ?></h4>
                    </div>

                    <div class="post-meta">
                        <ul class="meta-list">
                            <li>
                                <span class="mdi mdi-clock-outline"></span>
                                <span><?php echo get_the_date('F d, Y'); ?></span>
                            </li>
                            <li>
                                <span class="mdi mdi-tag-outline"></span>
                                <span><?php the_category(', '); ?></span>
                            </li>
                        </ul>
                    </div>

                    <div class="content <?php echo get_language_class(); ?>" <?php echo get_text_direction(); ?>>
                        <?php echo get_the_content(); ?>
                    </div>

                    <div class="author">

                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box h-auto">
                    <h4 class="title-2 mb-2">Writer</h4>

                    <div class="text-center">
                        <div class="author-image mb-2">
                            <?php student_author_image(150); ?>
                        </div>
                        <div class="author-name <?php echo get_language_class(); ?>">
                            <p><?php echo get_field('author_name'); ?></p>
                            <?php
                            if (get_field('class')) :
                            ?>
                                <p class="small text-muted">(<?php echo get_field('class'); ?>)</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</section>
<?php
get_footer();
