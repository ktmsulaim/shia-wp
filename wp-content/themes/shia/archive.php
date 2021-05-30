<?php

get_header();

$title = 'Untitled';
$type = 'Null';

if (is_category()) {
    $title = single_cat_title("", false);
    $type = 'Category';
} else if (is_author()) {
    $title = get_the_author();
    $type = 'Author';
} else {					
    $title = get_the_archive_title();
    $type = 'Archive';
}

pageHeader([
    'title' => $title,
    'breadcrumb' => [
            0 => [
            'label' => $type,
            'url' => 'javascript:void(0)',
            ],
    ],
    'page_banner' => null,
]);
?>
<section class="section">
    <div class="container">
        <div class="row">
           <?php
           $count = 1;

            if(have_posts()):
                while(have_posts()):
                    the_post();
                    echo '<div class="col-md-4 ' .($count > 3 ? 'mt-4' : '') .'">';
                    get_template_part('template-parts/single', 'news-2');
                    echo '</div>';

                    $count++;
                endwhile;
            else:
            ?>
                <div class="col-md-6 mx-auto">
                    <?php no_data('news'); ?>
                </div>
            <?php
            endif;
           ?>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <?php echo bootstrap_pagination(); ?>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>