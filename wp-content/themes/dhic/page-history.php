<?php
get_header();
pageBanner([
    'title' => 'History',
    'links' => [
        '1' => [
            'label' => 'About US',
            'url' => esc_url(site_url('/about-us'))
        ],
        '2' => [
            'label' => 'History',
            'url' => esc_url(site_url('/about-us/history'))
        ]
    ]
]);
?>
<section id="history">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="section_hdg hdg_2 hdg_3">
                    <h3>1993 - <?php echo date('Y'); ?></h3>
                    <span><i class="fa fa-circle"></i></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7 mx-auto">
                <p class="">
                    Established in 1993, Darul Hasanath has been a prestigi
                    ous name of culture. As the name itself literally denotes,
                    it has gradually grown into a “house of goodness” or
                    goodness or good deeds” it is a center of social, cultural
                    progress as well as educational excellence.
                    Darul Hasanath extends the help to poor girl marital
                    expenses while giving respite to the starved. Providing
                    the patient with medical aid and taking their education
                    as a social responsibility. The institution is today active in
                    helping the deprived and sheltering the orphans. Besides,
                    it truly attempts to combine much significant aspects of
                    profane knowledge stimulated by direct experiences of
                    spiritual refreshment.
                </p>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>