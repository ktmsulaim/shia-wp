<?php

get_header();

pageBanner([
    'title' => get_the_title(),
    'links' => [
        '1' => [
            'label' => get_the_title(),
            'url' => get_the_permalink()
        ]
    ]
]);
?>

<section id="page">
    <div class="container">
        <div class="row">
            <div class="col-md-7 mx-auto">
               <?php the_content(); ?>
            </div>
        </div>
    </div>
</section>

<?php

get_footer();