<?php

get_header();

pageHeader([
    'title' => null,
    'breadcrumb' => [
        0 => [
            'label' => "Gallery",
            'url' => 'javascript:void(0)'
        ]
    ],
    'page_banner' => null,
]);

$galleries = new WP_Query([
    'post_type' => 'gallery'
]);

?>

<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if ($galleries->have_posts()) :
                ?>
                    <div class="row">
                        <?php
                        $count = 0;
                        while ($galleries->have_posts()) :
                            $galleries->the_post();
                        ?>
                            <div class="col-md-4 <?php echo $count > 3 ? 'mt-4' : ''; ?>">

                                <?php get_template_part('template-parts/single', 'gallery'); ?>
                            </div>
                        <?php
                            $count++;
                        endwhile;
                        ?>
                    </div>
                <?php
                else :
                    no_data('galleries');
                endif; ?>

                <div class="share-button mt-5" data-text="<?php echo get_the_title(); ?>" data-url="<?php echo get_the_permalink(); ?>" data-text="<?php echo short_content(); ?>"></div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>