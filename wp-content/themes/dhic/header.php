<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Darul Hasanath Islamic Complex</title>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <!-- Loader -->
    <div class="loader">
        <div class="content">
            <img src="<?php echo get_theme_file_uri('images/logo_single.png'); ?>" width="100" alt="">
            <div class="linear-activity">
                <div class="indeterminate"></div>
            </div>
        </div>
    </div>
    <!--WRAPER START-->
    <div class="wraper">
        <header class="header">
            <!--KODE TOP2 WRAP START-->
            <div class="kode_top2_wrap">
                <!--CONTAINER START-->
                <div class="container">
                    <!--KODE TOP2 ROW START-->
                    <div class="kode_top2_row">
                        <!--KODE TOP2 INFO START-->
                        <div class="kode_top2_info">
                            <ul>
                                <li>
                                    <span><i class="fa fa-envelope"></i>Email Address</span>
                                    <a href="#">darulhasanath@gmail.com</a>
                                </li>
                                <li>
                                    <span><i class="fa fa-phone"></i>Contact No</span>
                                    <a href="#">+91 497 2796938</a>
                                </li>
                                <li>
                                    <span><i class="fa fa-calendar"></i>Office Timings</span>
                                    <a href="#">Mon - Sat 09:00 A.M - 06:00 P.M</a>
                                </li>
                            </ul>
                        </div>
                        <!--KODE TOP2 INFO END-->

                        <!--KODE TOP2 ICON START-->
                        <div class="kode_top2_icon">
                            <ul>
                                <li>
                                    <div class="kode_search_overlay">
                                        <div class="cp-search-holder">
                                            <button type="button" id="trigger-overlay"><i aria-hidden="true" class="fa fa-search"></i></button>
                                        </div>

                                        <div id="overlay" class="overlay overlay-contentscale">
                                            <button class="overlay-close" type="button">Close</button>
                                            <!--Search Bar Inner Start-->
                                            <div class="cp-search-inner">
                                                <form class="kode-search kode_search-form" method="get" id="searchform">
                                                    <input type="text" name="s" id="s" autocomplete="off" data-default="" />
                                                    <button class="submit" type="submit"><i class="fa fa-search"></i></button>
                                                </form>
                                            </div>
                                            <!--Search Bar Inner End-->
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="donate_btn">
                                <!-- Button trigger modal -->
                                <div class="medium_btn theme_color_bg btn_hover2" data-toggle="modal" data-target="#myModal">
                                    Donate Us
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <div class="modal-body">
                                                <!--KODE DONATE DES START-->
                                                <div class="kode_donate_des">
                                                    <div class="kode_doantion_amount">
                                                        <h4>Donate Now</h4>
                                                        <div class="kode_amount_list">
                                                            <span>₹100</span>
                                                            <span>₹250</span>
                                                            <span>₹500</span>
                                                            <span>₹1000</span>
                                                        </div>
                                                        <div class="kf_commet_field">
                                                            <input placeholder="Other Amount" name="amount" type="text" value="" data-default="Amount*" size="30" required>
                                                        </div>
                                                    </div>
                                                    <!--KODE DONATION ROW START-->
                                                    <div class="kode_donation_row">
                                                        <h4>Billing Information</h4>
                                                        <!--kode AUTHOR WRAP COMMENTS FORM START -->
                                                        <form method="post" class="kode_comment">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="kf_commet_field">
                                                                        <input placeholder="Enter Name" name="author" type="text" value="" data-default="Name*" size="30" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="kf_commet_field">
                                                                        <input placeholder="Your Email" name="author" type="text" value="" data-default="Name*" size="30" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="kf_commet_field">
                                                                        <input placeholder="Your Address" name="author" type="text" value="" data-default="Name*" size="30" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="kode_donation_item">
                                                                        <select class="chosen-select">
                                                                            <option value="Select Course Name">Your Country</option>
                                                                            <option value="saab">Afghanistan</option>
                                                                            <option value="mercedes">Albania</option>
                                                                            <option value="audi">Algeria</option>
                                                                            <option value="mercedes">Albania</option>
                                                                            <option value="audi">Algeria</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="kode_donation_item">
                                                                        <select class="chosen-select">
                                                                            <option value="Select Course Name">Your City</option>
                                                                            <option value="saab">Karachi</option>
                                                                            <option value="mercedes">Rawalpindi</option>
                                                                            <option value="audi">Punjab</option>
                                                                            <option value="mercedes">Faisalabad</option>
                                                                            <option value="audi">Sindh</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="kf_commet_field">
                                                                        <input placeholder="Your Mobile" name="author" type="text" value="" data-default="Name*" size="30" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="kode_payment_list">
                                                                        <h5>Choose Your Payment Method</h5>
                                                                        <ul class="radio_points">
                                                                            <li>
                                                                                <div class="checkbox_radio">
                                                                                    <input type="radio" name="one" id="radio1">
                                                                                    <span></span>
                                                                                    <label for="radio1">Pay Pal</label>
                                                                                </div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="checkbox_radio">
                                                                                    <input type="radio" name="one" id="radio2">
                                                                                    <span></span>
                                                                                    <label for="radio2">Stripe</label>
                                                                                </div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="checkbox_radio">
                                                                                    <input type="radio" name="one" id="radio3">
                                                                                    <span></span>
                                                                                    <label for="radio3">Credit Card</label>
                                                                                </div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="checkbox_radio">
                                                                                    <input type="radio" name="one" id="radio4">
                                                                                    <span></span>
                                                                                    <label for="radio4">Other Source</label>
                                                                                </div>
                                                                            </li>
                                                                        </ul>
                                                                        <p class="form-submit"><button class="medium_btn theme_color_bg">Donate Now</button></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <!--kode AUTHOR WRAP COMMENTS FORM END -->
                                                    </div>
                                                    <!--KODE DONATION ROW END-->
                                                </div>
                                                <!--KODE DONATE DES END-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--KODE TOP2 ICON END-->
                    </div>
                    <!--KODE TOP2 ROW END-->
                </div>
                <!--CONTAINER END-->
            </div>
            <!--KODE TOP2 WRAP END-->

            <!--KODE NAVIGATION WRAP START-->
            <div class="kode_navigation_wrap">
                <!--CONTAINER START-->
                <div class="container">
                    <div class="top_logo">
                        <h1><a href="<?php echo esc_url(site_url()); ?>"><img width="150" src="<?php echo get_theme_file_uri('images/logo.png'); ?>" alt="dhic"></a></h1>
                    </div>
                    <div class="navigation">
                        <?php
                        global $wp;
                        $page = $wp->request;
                        ?>
                        <ul>
                            <li>
                                <a class="<?php echo $page == '' ? 'active' : ''; ?>" href="<?php echo esc_url(site_url()); ?>">Home</a>
                            </li>
                            <li>
                                <a class="<?php echo $page == 'about-us' ? 'active' : ''; ?>" href="<?php echo esc_url(site_url('about-us')); ?>">About Us</a>
                                <ul class="kode">
                                    <li><a class="<?php echo $page == 'about-us/history' ? 'active' : ''; ?>" href="<?php echo esc_url(site_url('about-us/history')); ?>">History</a></li>
                                    <li><a class="<?php echo $page == 'about-us/committee' ? 'active' : ''; ?>" href="<?php echo esc_url(site_url('about-us/committee')); ?>">Committee</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Institutes</a></li>
                            <li><a href="javascript:void(0)">Events</a>
                                <ul class="kode">
                                    <li><a href="blog.html">Latest</a></li>
                                    <li><a href="blog.html">News</a></li>
                                    <li><a href="blog01.html">Archive</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Gallery</a></li>
                            <li><a class="<?php echo $page == 'contact-us' ? 'active' : ''; ?>" href="<?php echo esc_url(site_url('/contact-us')); ?>">Contact Us</a></li>
                        </ul>
                        <!--DL Menu Start-->
                        <div id="kode-responsive-navigation" class="dl-menuwrapper">
                            <button class="dl-trigger">Open Menu</button>
                            <ul class="dl-menu">
                                <li>
                                    <a class="<?php echo $page == '' ? 'active' : ''; ?>" href="<?php echo esc_url(site_url()); ?>">Home</a>
                                </li>
                                <li class="menu-item kode-parent-menu">
                                    <a class="<?php echo $page == 'about-us' ? 'active' : ''; ?>" href="<?php echo esc_url(site_url('about-us')); ?>">About Us</a>
                                    <ul class="dl-submenu">
                                        <li><a class="<?php echo $page == 'about-us/history' ? 'active' : ''; ?>" href="<?php echo esc_url(site_url('about-us/history')); ?>">History</a></li>
                                        <li><a class="<?php echo $page == 'about-us/committee' ? 'active' : ''; ?>" href="<?php echo esc_url(site_url('about-us/committee')); ?>">Committee</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Services</a></li>
                                <li><a href="#">Institutes</a></li>
                                <li><a href="#">Events</a>
                                    <ul class="dl-submenu">
                                        <li><a href="#">Latest</a></li>
                                        <li><a href="#">News</a></li>
                                        <li><a href="#">Archive</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Gallery</a></li>
                                <li><a class="<?php echo $page == 'contact-us' ? 'active' : ''; ?>" href="<?php echo esc_url(site_url('/contact-us')); ?>">Contact Us</a></li>
                            </ul>
                        </div>
                        <!--DL Menu END-->
                    </div>
                    <div class="kode_navi_icon">
                        <ul>
                            <li><a class="hvr-ripple-out" href="#"><i class="fa fa-whatsapp"></i></a></li>
                            <li><a class="hvr-ripple-out" href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a class="hvr-ripple-out" href="#"><i class="fa fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!--CONTAINER END-->
            </div>
            <!--KODE NAVIGATION2 WRAP END-->
        </header>