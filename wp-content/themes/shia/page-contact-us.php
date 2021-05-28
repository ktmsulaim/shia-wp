<?php

get_header();

$breadcrumb = [
    0 => [
        'label' => get_the_title(),
        'url' => get_the_permalink(),
    ]
];

pageHeader([
    'title' => null,
    'breadcrumb' => $breadcrumb,
    'page_banner' => null,
]);

?>
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="row">
                    <div class="col-md-6">
                        <div id="address">
                            <h4 class="title-1 mb-4">Contact us</h4>
                            <p>Shamsul Huda Islamic academy </p>
                            <p>Run by: Kuttikkattoor Muslim orphanage committee </p>
                            <p>Kuttikkattoor (po), Calicut- 673008, Kerala, India </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div id="map">
                            <h4 class="title-1 mb-4">Locate us</h4>
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-md-12">
                        <h4 class="title-2">Visit us</h4>
                    </div>

                    <div class="col-md-6">
                        <div class="contact-box">
                            <div class="icon">
                                <span class="mdi mdi-airplane"></span>
                            </div>
                            <div class="contact-details">
                                <div class="title">
                                    <h4>Airports</h4>
                                </div>
                                <div class="contact-content">
                                    <p>Calicut International Airport (CCJ) - 24 km </p>
                                    <p>Cochin International Airport (COK) - 168 km</p>
                                    <p>Kannur Airport (KNR) – 101 km </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="contact-box">
                            <div class="icon">
                                <span class="mdi mdi-road"></span>
                            </div>
                            <div class="contact-details">
                                <div class="title">
                                    <h4>Road ways</h4>
                                </div>
                                <div class="contact-content">
                                    <p><b>From Calicut/ Kannur/ Kasargod:</b> <br>
                                    By Bus from Calicut to kuttikkattoor yatheem khana Bus Stop</p>
                                    <p><b>From arecode/ manjeri/ nilamboor:</b> <br>
                                        by bus from arecode to Kuttikkattoor yatheem khana Bus stop</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mt-4">
                        <div class="contact-box">
                            <div class="icon">
                                <span class="mdi mdi-train"></span>
                            </div>
                            <div class="contact-details">
                                <div class="title">
                                    <h4>Railway station</h4>
                                </div>
                                <div class="contact-content">
                                    <p>13 KM from Calicut railway station</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 mt-4">
                        <div class="contact-box">
                            <div class="icon">
                                <span class="mdi mdi-bus"></span>
                            </div>
                            <div class="contact-details">
                                <div class="title">
                                    <h4>Bus station</h4>
                                </div>
                                <div class="contact-content">
                                    <p>Kuttikkattoor bus stop</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>