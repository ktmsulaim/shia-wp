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
                <?php
                    if(has_post_thumbnail()) :
                    ?>
                        <div class="text-on-image mb-4">
                            <img src="<?php the_post_thumbnail_url('medium_large'); ?>" alt="Post Image" class="img-fluid">
                            <h4 class="text"><?php echo get_the_title(); ?></h4>
                        </div>
                    <?php
                    endif;
                ?>
                <div class="content">
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
                    
                    <?php if($parent && has_sibling($parent)) : ?>
                        <div class="widget">
                        <div class="widget-title">
                            <h4>Related</h4>
                        </div>
                        <div class="widget-content">
                            <ul class="wpb_page_list">
                                <?php echo get_sibling($parent); ?>
                            </ul>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>