<?php 

get_header(); 

pageHeader([
    'title' => null,
    'breadcrumb' => [
        0 => [
            'label' => get_the_title(),
            'url' => get_the_permalink(),
        ]
    ],
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
                <div class="mb-4">
                <div id="creative-frame-section">
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
                </div>
                <div class="content">
                    <?php echo get_the_content(); ?>
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