<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Darul Hasanath Islamic Complex</title>
    <link rel="shortcut icon" href="<?php echo get_theme_file_uri('images/logo_single.png') ?>" type="image/x-icon">

    <?php wp_head(); ?>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <meta name="theme-color" content="#d2973b">
    <meta name="google-site-verification" content="I_zTVEYYay0UJ2H6v1jF-LHdbOvyylIjCgevUyCJhCY" />
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
                                    <a href="mailto:darulhasanath@gmail.com">darulhasanath@gmail.com</a>
                                </li>
                                <li>
                                    <span><i class="fa fa-phone"></i>Contact No</span>
                                    <a href="tel:+914972797032">+91 497 2797032</a>
                                </li>
                                <li>
                                    <span><i class="fa fa-calendar"></i>Office Timings</span>
                                    <a href="javascript:void(0)">Mon - Sat 09:00 A.M - 06:00 P.M</a>
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
                                                <form action="<?php echo esc_url(site_url()); ?>" class="kode-search kode_search-form" method="get" id="searchform">
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
                                <a href="<?php echo esc_url(site_url('donate')); ?>" class="medium_btn theme_color_bg btn_hover2">
                                    Donate Us
                                </a>
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
            <div class="kode_navigation_wrap sticky-nav">
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
                            <li><a class="<?php echo $page == 'services' ? 'active' : ''; ?>" href="<?php echo esc_url(site_url('/services')) ?>">Services</a></li>
                            <li><a class="<?php echo $page == 'institutes' ? 'active' : ''; ?>" href="<?php echo get_post_type_archive_link('institute'); ?>">Institutes</a></li>
                            <li><a href="javascript:void(0)">Events</a>
                                <ul class="kode">
                                    <li><a href="<?php echo esc_url(site_url('latest-events')); ?>">Latest</a></li>
                                    <li><a href="<?php echo get_post_type_archive_link('post'); ?>">News</a></li>
                                    <li><a href="<?php echo get_post_type_archive_link('event'); ?>">Archive</a></li>
                                </ul>
                            </li>
                            <li><a <?php echo $page == 'gallery' ? 'active' : ''; ?> href="<?php echo esc_url(site_url('/gallery')); ?>">Gallery</a></li>
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
                                <li><a href="<?php echo esc_url(site_url('/services')) ?>">Services</a></li>
                                <li><a href="<?php echo get_post_type_archive_link('institute'); ?>">Institutes</a></li>
                                <li><a href="javascript:void(0)">Events</a>
                                    <ul class="dl-submenu">
                                    <li><a href="<?php echo esc_url(site_url('latest-events')); ?>">Latest</a></li>
                                    <li><a href="<?php echo get_post_type_archive_link('post'); ?>">News</a></li>
                                    <li><a href="<?php echo get_post_type_archive_link('event'); ?>">Archive</a></li>
                                    </ul>
                                </li>
                                <li><a <?php echo $page == 'gallery' ? 'active' : ''; ?> href="<?php echo esc_url(site_url('/gallery')); ?>">Gallery</a></li>
                                <li><a class="<?php echo $page == 'contact-us' ? 'active' : ''; ?>" href="<?php echo esc_url(site_url('/contact-us')); ?>">Contact Us</a></li>
                            </ul>
                        </div>
                        <!--DL Menu END-->
                    </div>
                    <div class="kode_navi_icon">
                        <ul>
                            <li><a class="hvr-ripple-out" href="https://wa.me/919747619659" target="_blank"><i class="fa fa-whatsapp"></i></a></li>
                            <li><a class="hvr-ripple-out" href="https://www.facebook.com/darulhasanath" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a class="hvr-ripple-out" href="https://www.youtube.com/channel/UCo9Okjd_22LjGnmmEYVuhTw/videos" target="_blank"><i class="fa fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!--CONTAINER END-->
            </div>
            <!--KODE NAVIGATION2 WRAP END-->
        </header>