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

<div class="kode_contact_wrap">
    <!--CONTAINER START-->
    <!--KODE CONTACT DES START-->
    <div class="kode_contact_des">
        <div class="container">
            <div class="row">
                <div class="kode_contact_field">
                    <div class="section_hdg hdg_2 hdg_3">
                        <h3>Contact Us</h3>
                        <span><i class="fa fa-circle"></i></span>
                    </div>
                    <form method="post" id="contact-form" class="comment-form">
                        <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="kf_commet_field">
                                    <input placeholder="Your Name" name="user_name" type="text" value="" data-default="Name*" size="30" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="kf_commet_field">
                                    <input placeholder="Your Email" name="user_email" type="text" value="" data-default="Name*" size="30" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="kf_commet_field">
                                    <input placeholder="Your Mobile" name="user_phone" type="text" value="" data-default="Name*" size="30" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="kode_textarea">
                                    <textarea placeholder="Your Message" name="message"></textarea>
                                </div>

                                <div class="">
									<div class="g-recaptcha" data-sitekey="6LeN-YYaAAAAAKYR-yUZLdg60Vlx6EVGbpsWn7Nv"></div>
								</div>
                            </div>
                        </div>
                        </div>
                        <p class="form-submit">
                            <!-- <input name="submit" id="submit-contact" type="button" class="medium_btn background-bg-dark btn_hover mt-4" value="Submit Now"> -->
                            <button name="submit" type="button" id="submit-contact" class="medium_btn theme_color_bg btn_hover2 mt-4">Submit Now</button>
                        </p>
                    </form>
                </div>
            </div>
            <!--KODE CONTACT SERVICE START-->
            <div class="kode_contact_service">
                <ul>
                    <li>
                        <div class="kode_contact_text">
                            <h5><a href="javascript:void(0)">ADDRESS</a></h5>
                            <a href="javascript:void(0)"><i class="fa fa-map-marker"></i></a>
                            <p class="p-2">Niduvat, Kannadiparamba, P. O. Narath Kannur District, Kerala, India
                            </p>
                        </div>
                    </li>
                    <li>
                        <div class="kode_contact_text">
                            <h5><a href="javascript:void(0)">PHONE</a></h5>
                            <a href="javascript:void(0)"><i class="fa fa-phone"></i></a>
                            <p class="p-2"><span class="d-block d-md-inline">Landline : +91 497 2797032</span>
                                <span>Landline : +91 497 2796938</span>
                                Mobile : +91 99616 92628
                            </p>
                        </div>
                    </li>
                    <li>
                        <div class="kode_contact_text">
                            <h5><a href="javascript:void(0)">EMAIL ADDRESS</a></h5>
                            <a href="javascript:void(0)"><i class="fa fa-envelope"></i></a>
                            <p class="p-2"><span class="d-block d-md-inline">General : darulhasanath@gmail.com</span>
                                Office : office@darulhasanath.com
                            </p>
                        </div>
                    </li>
                </ul>
            </div>
            <!--KODE CONTACT SERVICE END-->
        </div>
        <!--CONTAINER END-->
    </div>
    <!--KODE CONTACT DES END-->
</div>

<?php

get_footer();
