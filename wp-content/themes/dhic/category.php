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
            <div class="col-md-12">
               
            </div>
        </div>
    </div>
</section>

<?php

get_footer();