<?php
get_header();
?>

<div class="kode_banner_wrap banner2">
    <div class="kode-banner2-slid">
        <?php
        $slides = new WP_Query([
            'post_type' => 'slide',
        ]);

        if ($slides->have_posts()) :
            while ($slides->have_posts()) :
                $slides->the_post();

                if (get_field('image') || has_post_thumbnail()) :
        ?>

                    <div>
                        <div class="kode_banner2_des">
                            <?php if (get_field('link')) : ?>
                                <a href="<?php the_field('link'); ?>">
                                <?php endif; ?>
                                <figure title="<?php echo get_field('description') ?? ''; ?>" class="them_overlay">
                                    <img src="<?php echo get_field('image') ? get_field('image')['sizes']['slideImage'] : the_post_thumbnail_url('slideImage'); ?>" alt="<?php the_title(); ?>">
                                </figure>
                                <?php if (get_field('link')) : ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>

            <?php
                else :
                    continue;
                endif;
            endwhile;
            wp_reset_postdata();
        else : ?>
            <div>
                <div class="kode_banner2_des">
                    <figure class="them_overlay">
                        <img src="<?php echo get_theme_file_uri('images/Banner main.jpg'); ?>" alt="Darul Hasanath">
                        <div class="kode_banner_text">
                            <!-- <div class="large_text wow">Darul Hasanath</div>
                            <div class="mediume_text wow">Islamic Complex</div>
                            <div class="small_text wow">The charitable institue!</div> -->
                            <!-- <div class="koed_banner_btn wow">
                                <a data-target="#about" class="scrollTo medium_btn border margin-right-1 btn_hover" href="javascript:void(0)">Read More</a>
                            </div> -->
                        </div>
                    </figure>
                </div>
            </div>
        <?php
        endif;
        ?>
    </div>
</div>
<div class="kode_mosque2_wrap" id="about">
    <!--CONTAINER START-->
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="kode_mosque2_des">
                    <!--SECTION HDG START-->
                    <div class="section_hdg hdg_2 hdg_3">
                        <h3>About Us</h3>
                        <span><i class="fa fa-circle"></i></span>
                    </div>
                    <!--SECTION HDG END-->
                    <div class="kode_mosque2_text">
                        <p>Darul Hasanath Islamic Complex is a Charitable Institution established in 1993 for the sublime purpose of uplifting the downtrodden community which is socially, educationally and financially backward.Today, Darul Hasanath has grown into an asylum of the poor as a fruitful result of the tireless effort and sincere support of the generous hands and well-wishes.</p>
                        <p>Darul Hasanath wins the forefront of helping the destitute. It extends the help to poor girls marital expenses while giving respite to the starved, providing the patients with medical aid and taking their education as an acute responsibility.</p>
                        <!-- <p class="read">The Institution is today active in helping the deprived and sheltering the orphans. Besides, it prepares a group of talented boys equipped with both religious and material knowledge in order to make them able for Islamic exhortation. To pursue its goals, Darul Hasanath is hoping for the generous hands as it has no permanent source of income other than the donation collected from the public.</p> -->
                        <a class="medium_btn theme_color_bg btn_hover2" href="<?php echo esc_url(site_url('about-us')); ?>">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div>
                    <figure id="admin-block">
                        <img max-height="300" src="<?php echo get_theme_file_uri('images/docu_cover.png'); ?>" alt="DHIC sky view">
                    </figure>
                </div>
            </div>
        </div>
    </div>
    <!--CONTAINER END-->
</div>


<div class="kode_gallery_wrap bg-light" id="news">
    <!--CONTAINER START-->
    <div class="container">
        <!--SECTION HDG START-->
        <div class="section_hdg hdg_2 hdg_3">
            <h3>Latest news</h3>
            <span><i class="fa fa-circle"></i></span>
        </div>
        <!--SECTION HDG END-->
        <div class="row">
            <?php
            query_posts([
                'post_type' => 'post',
                'posts_per_page' => 1,
            ]);
            ?>
            <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12">
                <?php
                $i = 0;
                while (have_posts() && $i < 1) :
                    the_post();
                ?>
                    <div class="kode_blog_des des_2">
                        <figure class="them_overlay">
                            <?php if (has_post_thumbnail()) : ?>
                                <img src="<?php echo the_post_thumbnail_url('serviceThumb'); ?>" alt="">
                            <?php else : ?>
                                <img src="<?php echo get_theme_file_uri('images/placeholder.jpg'); ?>" alt="">
                            <?php endif; ?>
                        </figure>
                        <div class="kode_blog_text">
                            <h4 class="<?php renderMalayalamClass(); ?>"><a href="<?php echo get_the_permalink(); ?>"><span><?php the_title(); ?></h4>
                            <div class="kode_blog_caption">
                                <p class="<?php renderMalayalamClass(); ?>">
                                    <?php if (has_excerpt()) :
                                        the_excerpt();
                                    else :
                                        echo substr(strip_tags(get_the_content()), 0, 100);
                                    endif; ?>
                                </p>
                                <ul class="kode_meta meta_2">
                                    <li><a href="javascript:void(0)"><i class="fa fa-clock-o"></i><?php echo get_the_date(); ?></a></li>
                                    <li>
                                        <i class="fa fa-tag"></i>
                                        <span>
                                            <?php
                                            $categories = get_the_category();
                                            if (is_array($categories) && count($categories) > 0) :
                                                foreach ($categories as $cat) :
                                            ?>
                                                    <a href="<?php echo get_category_link($cat->cat_ID); ?>"><?php echo $cat->cat_name; ?></a>
                                            <?php
                                                    if (count($categories) > 1) :
                                                        echo ', ';
                                                    endif;
                                                endforeach;
                                            endif;
                                            ?>

                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php
                    $i++;
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12">
                <?php
                query_posts([
                    'post_type' => 'post',
                    'posts_per_page' => 3,
                    'nopage' => true,
                ]);
                $newsCount = 0;
                while (have_posts()) :
                    the_post();

                    if ($newsCount > 0 && $newsCount < 4) :
                ?>
                        <div>
                            <div class="news-box-2">
                                <div class="box-image">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <img src="<?php echo the_post_thumbnail_url('serviceThumb'); ?>" alt="">
                                    <?php else : ?>
                                        <img src="<?php echo get_theme_file_uri('images/placeholder.jpg'); ?>" alt="">
                                    <?php endif; ?>
                                </div>
                                <div class="box-info">
                                    <div class="box-info__title">
                                        <a class="<?php renderMalayalamClass(); ?>" href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a>
                                    </div>
                                    <div class="box-info__extract <?php renderMalayalamClass(); ?>">
                                        <?php if (has_excerpt()) :
                                            the_excerpt();
                                        else :
                                            echo substr(strip_tags(get_the_content()), 0, 100);
                                        endif; ?>
                                    </div>
                                    <div class="box-info__meta">
                                        <ul>
                                            <li>
                                                <i class="fa fa-clock-o"></i>
                                                <span><?php echo get_the_date(); ?></span>
                                            </li>
                                            <li>
                                                <i class="fa fa-tag"></i>
                                                <span>
                                                    <?php
                                                    $categories = get_the_category();
                                                    if (is_array($categories) && count($categories) > 0) :
                                                        foreach ($categories as $cat) :
                                                    ?>
                                                            <a href="<?php echo get_category_link($cat->cat_ID); ?>"><?php echo $cat->cat_name; ?></a>
                                                    <?php
                                                            if (count($categories) > 1) :
                                                                echo ', ';
                                                            endif;
                                                        endforeach;
                                                    endif;
                                                    ?>

                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php// endif; ?>
                <?php
                    endif;
                    $newsCount++;
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
    <!--CONTAINER END-->
</div>


<section>
    <div class="kode_event_wrap">
        <!--CONTAINER START-->
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="kode_event_row">
                        <!--SECTION HDG START-->
                        <div class="section_hdg hdg_2 hdg_3">
                            <h3>Our Events</h3>
                            <span><i class="fa fa-circle"></i></span>
                        </div>
                        <!--SECTION HDG END-->
                        <!--KODE EVENT DES START-->
                        <div class="kode_event_des">
                            <?php
                            $today = date('Ymd');
                            $events = new WP_Query([
                                'posts_per_page' => 3,
                                'post_type' => 'event',
                                'meta_key' => 'event_date',
                                'orderby' => 'meta_value',
                                'order' => 'ASC',
                                'meta_query' => [
                                    'key' => 'event_date',
                                    'compare' => '>=',
                                    'value' => $today,
                                    'type' => 'DATE',
                                ]
                            ]);

                            if ($events->have_posts()) :
                            ?>
                                <ul class="kode_calender_detail detail_2">
                                    <?php
                                    while ($events->have_posts()) :
                                        $events->the_post();
                                    ?>
                                        <li>
                                            <?php
                                            get_template_part('template-parts/content', 'event');
                                            ?>
                                        </li>
                                    <?php
                                    endwhile;
                                    ?>
                                </ul>
                            <?php
                            else :
                            ?>
                                <p class="text-center">No upcoming events!</p>
                            <?php
                            endif;
                            ?>
                        </div>
                        <!--KODE EVENT DES END-->
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="kode_event_video">
                        <!--SECTION HDG START-->
                        <div class="section_hdg hdg_2 hdg_3">
                            <h3>Video Prsentation</h3>
                            <span><i class="fa fa-circle"></i></span>
                        </div>
                        <!--SECTION HDG END-->
                        <div class="kode_event_fig">
                            <figure class="them_overlay">
                                <img src="<?php echo get_theme_file_uri('images/docu_cover.png'); ?>" alt="">
                                <a data-rel="prettyPhoto" href="https://www.youtube.com/watch?v=kJlF_Fs2Ij8"><i class="fa fa-play-circle"></i></a>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--CONTAINER END-->
    </div>
</section>
<!--KODE EVENT WRAP END-->

<!-- Institutes -->
<section class="section bg-light" id="institutes">
    <div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="section_hdg hdg_2 hdg_3">
                        <h3>Our Institutes</h3>
                        <span><i class="fa fa-circle"></i></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?php
                    $institutes = new WP_Query([
                        'post_type' => 'institute',
                        'meta_key' => 'order',
                        'orderby' => 'meta_key_num',
                        'order' => 'ASC'
                    ]);
                    ?>
                    <div class="gallery">
                        <div id="insti-slider" class="gallery-container">
                            <?php
                            while ($institutes->have_posts()) :
                                $institutes->the_post();
                            ?>
                                <div class="gallery-item">
                                    <div class="institute">
                                        <div class="institute__image">
                                            <?php if (has_post_thumbnail()) : ?>
                                                <img src="<?php echo the_post_thumbnail_url('serviceThumb'); ?>" alt="<?php echo get_the_title(); ?>" class="img-fluid">
                                            <?php else : ?>
                                                <img src="<?php echo get_theme_file_uri('images/placeholder.jpg'); ?>" alt="">
                                            <?php endif; ?>
                                        </div>
                                        <div class="institute__title">
                                            <a href="<?php echo get_the_permalink(); ?>">
                                                <span><?php echo get_the_title(); ?></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            <?php
                            endwhile;
                            wp_reset_query();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="p-0" id="services">
    <div class="container-fluid">
        <div class="row">
            <div id="hajj-cell" class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="box">
                    <div class="box-title">
                        HAJJHELP LINE
                    </div>
                    <div class="box-body">
                        <p>Hajj cell provide hajj pilgrims with study and practic al classes to perform
                            hajj and umrah practices effectively. It also emphasizes on the journey
                            with the presence of exponent trainers and servants.</p>
                    </div>
                </div>
            </div>
            <div id="relief-cell" class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="box">
                    <div class="box-title">
                        RELIEF CELL
                    </div>
                    <div class="box-body">
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
                </div>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
?>