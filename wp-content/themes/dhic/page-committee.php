<?php
get_header();
pageBanner([
    'title' => 'Committee',
    'links' => [
        '1' => [
            'label' => 'About US',
            'url' => esc_url(site_url('/about-us'))
        ],
        '2' => [
            'label' => 'Committee',
            'url' => esc_url(site_url('/about-us/committee'))
        ]
    ]
]);
?>
<section id="committee">
    <div class="container">
        <div class="section_hdg hdg_2 hdg_3">
            <h3>Islamic Complex</h3>
            <span><i class="fa fa-circle"></i></span>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-4 mb-md-0">
                <div class="kode_tem_fig">
                    <figure class="committee-photo">
                        <img class="pull-top" src="<?php echo get_theme_file_uri('images/syd_hyderali.jpg'); ?>" alt="">
                        <figcaption>
                            <h4>SAYYID HYDER ALI SHIHAB</h4>
                            <p>President</p>
                            <ul class="kode_social_icon">
                                <li><a class="hvr-ripple-out" href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a class="hvr-ripple-out" href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a class="hvr-ripple-out" href="#"><i class="fa fa-tumblr"></i></a></li>
                            </ul>
                        </figcaption>
                    </figure>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-4 mb-md-0">
                <div class="kode_tem_fig">
                    <figure class="committee-photo">
                        <img src="<?php echo get_theme_file_uri('images/knmustafa.jpeg'); ?>" alt="">
                        <figcaption>
                            <h4>K.N MUSTHAFA</h4>
                            <p>General Secretary</p>
                            <ul class="kode_social_icon">
                                <li><a class="hvr-ripple-out" href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a class="hvr-ripple-out" href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a class="hvr-ripple-out" href="#"><i class="fa fa-tumblr"></i></a></li>
                            </ul>
                        </figcaption>
                    </figure>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb-4 mb-md-0">
                <div class="kode_tem_fig">
                    <figure class="committee-photo">
                        <img class="pull-top" src="<?php echo get_theme_file_uri('images/alihaji.jpg'); ?>" alt="">
                        <figcaption>
                            <h4>TP ALIKUTTY HAJI</h4>
                            <p>Treasurer</p>
                            <ul class="kode_social_icon">
                                <li><a class="hvr-ripple-out" href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a class="hvr-ripple-out" href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a class="hvr-ripple-out" href="#"><i class="fa fa-tumblr"></i></a></li>
                            </ul>
                        </figcaption>
                    </figure>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>