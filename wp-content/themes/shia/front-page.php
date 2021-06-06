<?php

get_header();
?>
<div class="slider text-center">
    <?php
    $slides = new WP_Query([
        'post_type' => 'slide',
    ]);

    if ($slides->have_posts()) :
        while ($slides->have_posts()) :
            $slides->the_post();
    ?>
            <div class="slide">
                <?php if (get_field('link')) :
                    echo '<a href="' . get_field('link') . '">';
                endif; ?>
                <img src="<?php  echo get_field('image')['sizes']['imageSlider']; ?>" alt="Slide">

                <?php if (get_field('link')) :
                    echo '</a>';
                endif; ?>
            </div>
        <?php
        endwhile;
        wp_reset_query();
    else :
        ?>
        <div class="slide-default">
            <img src="<?php echo get_theme_file_uri('img/slide-default.jpg'); ?>" alt="">
        </div>
    <?php
    endif;
    ?>
</div>

<section class="section" id="recent-news">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h4 class="title-1">News & Events</h4>

                <div class="news" id="newsSlider">


                    <?php
                    $news = new WP_Query([
                        'post_type' => 'post',
                        'category_name' => 'main',
                        'posts_per_page' => 6,
                    ]);

                    if ($news->have_posts()) :
                        while ($news->have_posts()) :
                            $news->the_post();

                            get_template_part('template-parts/single', 'news');

                        endwhile;
                    else :
                        no_data('news');
                    endif;

                    wp_reset_query();

                    ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box box-1">
                    <div class="notification-wrapper">
                        <h4 class="title-1">Notifications</h4>

                        <div class="notifications">
                            <?php
                            $notifications = new WP_Query([
                                'post_type' => 'notification',
                                'posts_per_page' => 10,
                            ]);

                            if ($notifications->have_posts()) :
                                echo '<ul>';
                                while ($notifications->have_posts()) :
                                    $notifications->the_post();
                                    get_template_part('template-parts/single', 'notification');
                                endwhile;
                                echo '</ul>';

                                wp_reset_query();
                            else :
                                echo '<p>No notifications found!</p>';
                            endif;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-dark" id="mission-and-vision">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6" id="blockImage" style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url(<?php echo get_theme_file_uri('img/dron.JPG') ?>);">
            </div>
            <div class="col-md-6 py-5">
                <div class="accordion accordion-flush p-4" id="aboutAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="missionTitle">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#missionTab" aria-expanded="false" aria-controls="missionTab">
                                Our Mission
                            </button>
                        </h2>
                        <div id="missionTab" class="accordion-collapse show" aria-labelledby="missionTitle">
                            <div class="accordion-body">
                                <p>To develop an innovative system of Islamic education capable at grooming a group of 'Ulema' who can spread the message of Islam throughout the world.</p>
                                <p>To promote propagators of Islam who would be talented in religious and modern teachings and could understand the new challenges that the religion has been facing.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="visionTitle">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#visionTab" aria-expanded="false" aria-controls="visionTab">
                                Our Vision
                            </button>
                        </h2>
                        <div id="visionTab" class="accordion-collapse collapse show" aria-labelledby="visionTitle">
                            <div class="accordion-body">
                                <p>To develop an Islamic educational framework in order to prepare religious scientists (‘Ulama) who acquire, practice and propagate Islam, and To be a center for intellectual leadership for holistic empowerment of society rooted in moral values and principles and to offer a comprehensive educational system to provide opportunities for students of different walks of the society instilled with skill and values.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-light section" id="quote">
    <div class="container">
        <div class="row">
            <div class="col-md-9 mx-auto">
                <div class="box box-quote">
                    <div class="box-quote-image">
                        <img src="<?php echo get_theme_file_uri('img/principal.JPG'); ?>" alt="Principal">
                        <div class="box-quote-name">
                            <div class="full-name">Unais Hudawi</div>
                            <div class="position">Principal</div>
                        </div>
                    </div>

                    <div class="box-quote-message">
                        <blockquote>
                            Being a torch bearer in Islamic education, Shamsul huda has been functioning since 2016 as an affiliated institution of Darul Huda Islamic University aiming to produce a new generation of Muslim scholars able to shoulder the responsibility of Islamic Da'wa in modern era. we stand with clear-cut viewpoint that the knowledge should be attained, internalized and circulated (ta'lim, tarbiyah, dawah) for sake of the Almighty Allah and for benefit of the self and people. At present, the institution accommodates more than 240 students and 10 teaching staff.
                        </blockquote>
                    </div>

                    <div class="box-quote-icon">
                        <span class="mdi mdi-format-quote-close-outline"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section" id="students-corner">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h4 class="title-1">Students' union</h4>
                <div class="news" id="studentUnionNews">


                    <?php
                    $news = new WP_Query([
                        'post_type' => 'post',
                        'category_name' => 'students-union',
                        'posts_per_page' => 6,
                    ]);

                    if ($news->have_posts()) :
                        while ($news->have_posts()) :
                            $news->the_post();

                            get_template_part('template-parts/single', 'news-2');

                        endwhile;
                    else :
                        no_data('news');
                    endif;

                    wp_reset_query();

                    ?>
                </div>
            </div>
            <div class="col-md-4" id="creative-frame">
                <h4 class="title-1">Creative Frame</h4>
                <div id="artworkCultureSlider">
                    <?php
                    $culture_aws = new WP_Query([
                        'post_type' => 'artwork',
                        'posts_per_page' => 6
                    ]);

                    if ($culture_aws->have_posts()) :
                        while ($culture_aws->have_posts()) :
                            $culture_aws->the_post();

                            get_template_part('template-parts/single', 'culture-aw');

                        endwhile;
                    else :
                        no_data('artworks', 100);
                    endif;

                    wp_reset_query();
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php

get_footer();
