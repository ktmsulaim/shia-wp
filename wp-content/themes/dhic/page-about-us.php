<?php
get_header();
pageBanner([
    'title' => 'About US',
    'links' => [
        '1' => [
            'label' => 'About US',
            'url' => esc_url(site_url('/about-us'))
        ]
    ]
]);
?>
<section id="thangal" class="bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-3 mb-4 mb-md-0">
                <div>
                    <figure class="text-center">
                        <img style="width: auto; float:none" height="200" src="<?php echo get_theme_file_uri('images/thangal.jpg'); ?>" alt="Sayyid Hashim Thangal">
                    </figure>
                </div>
            </div>
            <div class="col-md-9">
                <div class="kode_overview">
                    <div class="kode_view_row">
                        <div class="kode_view_des">
                            <h3>Sayyid Hashim Baalavi</h3>
                            <!-- <span>Senior Manager</span> -->
                        </div>
                    </div>
                    <div class="kode_view_text">
                        <!-- <h4 class="sidebar_title title_2"></h4> -->
                        <p>Sayyid Hashim Baalavi, the compassionate face of a paternal redeemer is the founding chairman of Darul Hasanath. With a thorough understanding of the contemporary challenges of the society ,he
                            tried to firmly enroot its academic and cultural discourses within the ambit of Islamic doctrines</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="vision-and-mission">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 order-2">
                <div>
                    <p>Darul Hasanath is one of the prominent
                        charitable institutions in kerala, committed to
                        uplifting the marginalized sections of Muslim
                        community, enhancing the multidimensional
                        intellectual growth of students and nurturing of
                        Islamic knowledge and culture. Darul Hasanath
                        is composed of an Orphanage and destitute
                        home, college of Islamic and Arabic studies with
                        differences on its central focus, Institute for
                        Quran studies and memorization, two English
                        Medium High Schools, Islamic Madrassas,
                        Medical centers, Relief cells and help lines.</p>
                    <p>Educationally, we try to formulate a much
                        better frame- work of knowledge with a prime
                        focus on bridging the gap between the main
                        stream secular education and sacred Islamic
                        knowledge</p>
                    <p>Generally we strive to impart the full meaning
                        of education that enable our students to their
                        own potential, accelerate lifelong growth and
                        development</p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 order-1 order-md-2 mb-4 mb-md-0">
                <div class="vision">
                    <div class="section_hdg hdg_2 hdg_3 section_title">
                        <h3>Vision and Mission</h3>
                    </div>
                    <img src="<?php echo get_theme_file_uri('images/mission_and_vision.jpg'); ?>" alt="mission" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>