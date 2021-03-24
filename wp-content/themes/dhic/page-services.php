<?php

get_header();

pageBanner([
    'title' => 'Services',
    'links' => [
        '1' => [
            'label' => 'Services',
            'url' => get_the_permalink()
        ]
    ]
]);
?>

<section id="services">
    <div class="container">
        <div class="row my-4">
            <div class="col-md-12">
                <img src="<?php echo get_theme_file_uri('images/hajj.png') ?>" alt="Hajj helpline" class="img-fluid">
            </div>
        </div>
        <div class="row">
            <div class="col-md-7 mx-auto">
                <h4 class="comment_title">HAJJHELP LINE</h4>
                <p>Hajj cell provide hajj pilgrims with study and practic al classes to perform hajj and umrah practices effectively. It also emphasizes on the journey with the presence of exponent trainers and servants.</p>
            </div>
        </div>

    </div>
</section>

<section id="relief" class="bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="comment_title">RELIEF CELL</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <p>Many humanitarian activities
                    that ranges from facilitating
                    education for students from
                    under privilized communities
                    and remote areas, distributing
                    Forde dresses and medicines
                    and providing health care, are
                    taken up by Darul Hasanath
                    relief cell.</p>

            </div>
            <div class="col-md-6">
                <img src="<?php echo get_theme_file_uri('images/ambulance.png') ?>" alt="" class="img-fluid">
            </div>
            <div class="col-md-3">
                <p class="mt-3 mt-md-0">We perform the tasks irrespe
                    ctive of the religion, casts
                    gender and other social hurdles.
                    In the process, The cell bears the
                    medical expenses of more than
                    50 cancer patients, provides
                    wheal chairs to the physically
                    challenged and generally, it
                    helps the region achieve many
                    of its fundamental goals and
                    long-cherished achievements.</p>
            </div>
        </div>
    </div>
</section>

<?php

get_footer();
