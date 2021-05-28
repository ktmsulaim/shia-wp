<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header>
        <div class="pre-header">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="contact-numbers">
                            <a href="tel:+914952965145"><span class="icon mdi mdi-phone-in-talk"></span>
                                <span class="number ml-2">04952965145</span></a>
                            <a href="tel:+918281536145"><span class="icon mdi mdi-phone-in-talk"></span>
                                <span class="number ml-2">8281536145</span></a>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="d-flex justify-content-end">
                            <div class="mx-2">
                                <a href="mailto:shamsulhudaacademy@yahoo.com">
                                    <span class="icon mdi mdi-email"></span>
                                    <span class="email ml-2">shamsulhudaacademy@yahoo.com</span>
                                </a>
                            </div>
                            <ul class="social-icons">
                                <li><a href="javascript:void(0)">
                                        <span class="mdi mdi-whatsapp"></span>
                                    </a></li>
                                <li><a href="javascript:void(0)">
                                        <span class="mdi mdi-instagram"></span>
                                    </a></li>
                                <li><a href="javascript:void(0)">
                                        <span class="mdi mdi-youtube"></span>
                                    </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav id="main-nav" class="shadow-sm">
            <div class="container">
                <div class="d-flex justify-content-between" id="navWrapper">
                    <div class="logo p-2">
                        <img src="<?php echo get_theme_file_uri('img/logo.png') ?>" width="80" alt="">
                    </div>
                    <div class="menu">
                        <ul class="dropdown-items">
                            <li class="<?php is_active('/'); ?>"><a href="<?php echo esc_url(site_url('/')); ?>">Home</a></li>
                            <li class="<?php is_active('/about-us/'); ?>">
                                <a class="dropdown-heading" href="<?php echo esc_url(site_url('/about-us')); ?>">
                                    About
                                </a>
                                <ul class="menu-items animated faster">
                                    <li><a class="scrollTo" data-target="#overview" href="<?php echo esc_url(site_url('/about-us/#overview')); ?>">Overview</a></li>
                                    <li><a class="scrollTo" data-target="#history" href="<?php echo esc_url(site_url('/about-us/#history')); ?>">History</a></li>
                                    <li><a class="scrollTo" data-target="#philosophy" href="<?php echo esc_url(site_url('/about-us/#philosophy')); ?>">Our philosophy</a></li>
                                    <li><a class="scrollTo" data-target="#vision-and-mission" href="<?php echo esc_url(site_url('/about-us/#vision-and-mission')); ?>">Vision and Mission</a></li>
                                    <li><a href="<?php echo esc_url(site_url('/about-us/management')); ?>">Management</a></li>
                                </ul>
                            </li>
                            <li class="<?php is_active('/academics/'); ?>">
                                <a href="<?php echo esc_url(site_url('/academics')) ?>">Academics</a>
                                <ul class="menu-items animated faster">
                                    <li><a class="scrollTo" data-target="#carriculum" href="<?php echo esc_url(site_url('/academics#curriculum')) ?>">Carriculum</a></li>
                                    <li><a class="scrollTo" data-target="#programs" href="<?php echo esc_url(site_url('/academics#programs')) ?>">Programs</a></li>
                                </ul>
                            </li>
                            <li class="<?php is_active('/admission/'); ?>"><a href="<?php echo esc_url(site_url('/admission')); ?>">Admission</a></li>
                            <li class="<?php is_active('/facilities/'); ?>">
                                <a href="<?php echo esc_url(site_url('/facilities')); ?>">Facilities</a>
                                <ul class="menu-items animated faster">
                                    <li><a href="<?php echo esc_url(site_url('/facilites/library')); ?>">Library</a></li>
                                    <li><a href="<?php echo esc_url(site_url('/facilites/i-t-lab')); ?>">I.T Lab</a></li>
                                    <li><a href="<?php echo esc_url(site_url('/facilites/smart-room')); ?>">Smart Room</a></li>
                                    <li><a href="<?php echo esc_url(site_url('/facilites/mess')); ?>">Mess</a></li>
                                    <li><a href="<?php echo esc_url(site_url('/facilites/play-and-physical-education')); ?>">Play & Physical Education</a></li>
                                    <li><a href="<?php echo esc_url(site_url('/facilites/masjid')); ?>">Masjid</a></li>
                                    <li><a href="<?php echo esc_url(site_url('/facilites/studio')); ?>">Studio</a></li>
                                </ul>
                            </li>
                            <li class="<?php is_active('/activities/'); ?>">
                                <a href="<?php echo esc_url(site_url('/activities')); ?>">Activities</a>
                                <ul class="menu-items animated faster">
                                    <li><a class="scrollTo" data-target="#artfest" href="<?php echo esc_url(site_url('/activities#artfest')); ?>">Art Fest</a></li>
                                    <li><a class="scrollTo" data-target="#extracurricular" href="<?php echo esc_url(site_url('/activities#extracurricular')); ?>">Extracurricular</a></li>
                                </ul>
                            </li>
                            <li class="<?php echo is_active('/huda-book-cell/'); ?>"><a href="<?php echo esc_url(site_url('/huda-book-cell')); ?>">Huda Book Cell</a></li>
                            <li class="<?php echo is_active('/students-corner/'); ?>">
                                <a href="<?php echo esc_url(site_url('/students-corner')); ?>">Students corner</a>
                                <ul class="menu-items animated faster">
                                    <li><a class="scrollTo" data-target="#students-union" href="<?php echo esc_url(site_url('/students-corner#students-union')); ?>">Students' union</a></li>
                                    <li>
                                        <a class="scrollTo" data-target="#creative-frame-section" href="<?php echo esc_url(site_url('/students-corner#creative-frame-section')); ?>">Creative Frame</a>
                                        <ul class="menu-items animated faster sub">
                                            <li><a href="#">Articles</a></li>
                                            <li><a href="#">Culture</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="<?php echo is_active('/contact-us/'); ?>"><a href="<?php echo esc_url(site_url('/contact-us')); ?>">Contact us</a></li>
                        </ul>
                    </div>
                    <div class="search">
                        <span id="searchTrigger" class="mdi mdi-magnify"></span>

                        <div id="searchFormWrapper" class="search-form">
                            <form id="searchForm" action="<?php echo esc_url(site_url('/')); ?>" method="get">
                                <input type="text" name="s" class="header-search-input mousetrap" placeholder="Search here..." required>
                                <span class="close-button mdi mdi-close" id="searchFormClose"></span>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>