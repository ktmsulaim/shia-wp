<?php

$q = $_GET['s'];

get_header();

pageBanner([
    'title' => 'Search',
    'links' => [
        '1' => [
            'label' => 'Search',
            'url' => 'javascript:void(0)'
        ]
    ]
]);
?>

<section id="page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="section_hdg hdg_2 hdg_3">
                    <h3><?php echo 'Results for: "' . $q . '"'; ?></h3>
                    <span><i class="fa fa-circle"></i></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mx-auto">
              
            </div>
        </div>
    </div>
</section>

<?php

get_footer();