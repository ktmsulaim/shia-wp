<?php

get_header();

pageBanner([
    'title' => 'Category',
    'links' => [
        '1' => [
            'label' => single_cat_title('', false),
            'url' => get_the_permalink()
        ]
    ]
]);
?>

<section id="page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="section_hdg hdg_2 hdg_3">
                    <h3><?php single_cat_title(); ?></h3>
                    <span><i class="fa fa-circle"></i></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7 mx-auto">
               <?php the_content(); ?>
            </div>
        </div>
    </div>
</section>

<?php

get_footer();