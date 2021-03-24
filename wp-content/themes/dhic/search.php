<?php

$q = $_GET['s'];

get_header();

pageBanner([
    'title' => 'Search',
    'links' => [
        '1' => [
            'label' => 'Search: ' . $q,
            'url' => 'javascript:void(0)'
        ]
    ]
]);

$news = [];
$events = [];
$notification = [];
$institute = [];

while (have_posts()) :
    the_post();

    $type = get_post_type();

    if ($type == 'post') {
        $news[get_the_ID()] = [
            'title' => get_the_title(),
            'id' => get_the_ID(),
            'url' => get_the_permalink(),
            'categories' => get_the_category(),
            'image' => has_post_thumbnail() ? get_the_post_thumbnail_url(null, 'serviceThumb') : get_theme_file_uri('images/placeholder.jpg'),
            'date' => get_the_date(),
            'excerpt' => has_excerpt() ? get_the_excerpt() : wp_trim_words(wp_strip_all_tags(get_the_content()), 10)
        ];
    } elseif ($type == 'event') {
        $events[get_the_ID()] =  [
            'title' => get_the_title(),
            'id' => get_the_ID(),
            'url' => get_the_permalink(),
            'categories' => get_the_category(),
            'image' => has_post_thumbnail() ? get_the_post_thumbnail_url(null, 'serviceThumb') : get_theme_file_uri('images/placeholder.jpg'),
            'date' => get_the_date(),
            'excerpt' => has_excerpt() ? get_the_excerpt() : wp_trim_words(wp_strip_all_tags(get_the_content()), 10),
            'location' => get_field('location'),
            'event_date' => get_field('event_date')
        ];
    } else {
        $$type[get_the_ID()] =  [
            'title' => get_the_title(),
            'id' => get_the_ID(),
            'url' => get_the_permalink(),
            'categories' => get_the_category(),
            'image' => has_post_thumbnail() ? get_the_post_thumbnail_url(null, 'serviceThumb') : get_theme_file_uri('images/placeholder.jpg'),
            'date' => get_the_date(),
            'excerpt' => has_excerpt() ? get_the_excerpt() : wp_trim_words(wp_strip_all_tags(get_the_content()), 10)
        ];
    }

endwhile;
?>

<section id="search-part1">
    <div class="container">
        <div class="row">
            <div class="col-md-7 mx-auto">
                <?php get_template_part('template-parts/content', 'search'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="kode_blog_row">
                    <!--SECTION HDG START-->
                    <div class="section_hdg">
                        <h3>News</h3>
                    </div>
                    <!--SECTION HDG END-->
                    <div class="kode_blog_list">
                        <?php
                        if ($news && count($news) > 0) :
                        ?>
                            <ul>
                                <?php
                                foreach ($news as $new) :
                                ?>
                                    <li>
                                        <div class="kode_blog_fig">
                                            <figure class="them_overlay">
                                                <img style="width: 230px;" src="<?php echo $new['image']; ?>" alt="">
                                                <a class="plus_icon hvr-ripple-out" data-rel="prettyPhoto" href="<?php echo $new['image']; ?>"><i class="fa fa-plus"></i></a>
                                            </figure>
                                            <div class="kode_blog_text">
                                                <ul class="kode_meta">
                                                    <li><a href="javascript:void(0)"><i class="fa fa-calendar"></i><?php echo $new['date'] ?></a></li>
                                                    <li><?php print_categories($new['categories']) ?></li>
                                                </ul>
                                                <h5 class="<?php renderMalayalamClass(); ?>"><a href="<?php echo $new['url']; ?>"><?php echo $new['title']; ?></a></h5>
                                                <p class="<?php renderMalayalamClass(); ?>"><?php echo $new['excerpt']; ?></p>
                                            </div>
                                        </div>
                                    </li>
                                <?php
                                endforeach;
                                ?>
                            </ul>
                        <?php
                        else :
                        ?>
                            <p>No news found!</p>
                        <?php
                        endif;
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="kode_event_row">
                    <!--SECTION HDG START-->
                    <div class="section_hdg">
                        <h3>Events</h3>
                    </div>
                    <!--SECTION HDG END-->
                    <!--KODE EVENT DES START-->
                    <div class="kode_event_des">
                        <?php
                        if ($events && count($events) > 0) :
                        ?>
                            <ul class="kode_calender_detail">
                                <?php
                                foreach ($events as $event) :
                                ?>
                                    <li>
                                        <div class="kode_calender_list">
                                            <span><?php echo datetimeFromString($event['event_date'], 'd'); ?> <i><?php echo datetimeFromString($event['event_date'], 'M'); ?></i></span>
                                            <div class="kode_event_text">
                                                <h6><a href="<?php echo $event['url']; ?>"><?php echo $event['title']; ?></a></h6>
                                                <p><?php echo $event['location']; ?></p>
                                            </div>
                                        </div>
                                    </li>
                                <?php
                                endforeach;
                                ?>
                            </ul>
                        <?php
                        else :
                        ?>
                            <p>No events found!</p>
                        <?php
                        endif;
                        ?>



                    </div>
                    <!--KODE EVENT DES END-->
                </div>
            </div>
        </div>
    </div>
</section>
<section id="search-part-2" class="bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="section_hdg">
                    <h3>Notifications</h3>
                </div>
                <div class="kode_event_des">
                    <?php
                    if ($notification && count($notification) > 0) :
                        echo '<ul class="kode_calender_detail detail_2">';

                        foreach ($notification as $noti) :
                    ?>
                            <li>
                                <div class="kode_calender_list">
                                    <div class="kode_event_text pl-0">
                                        <h4><a href="<?php echo $noti['url'] ?>"><?php echo $noti['title']; ?></a></h4>
                                        <div>
                                            <p style="text-transform:none;" class="<?php renderMalayalamClass(); ?>">
                                                <?php echo $noti['excerpt']; ?>
                                            </p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <div><?php print_categories($noti['categories']); ?></div>
                                            <p><i class="fa fa-clock-o"></i> <?php echo $noti['date']; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                    <?php
                        endforeach;
                        echo '</ul>';
                    else :
                        echo '<p>No notification found!</p>';
                    endif;
                    ?>


                </div>
            </div>
            <div class="col-md-8">
                <div class="section_hdg">
                    <h3>Institutes</h3>
                </div>
                <div class="kode_blog_list">
                        <?php
                        if ($institute && count($institute) > 0) :
                        ?>
                            <ul>
                                <?php
                                foreach ($institute as $insti) :
                                ?>
                                    <li>
                                        <div class="kode_blog_fig">
                                            <figure class="them_overlay">
                                                <img style="width: 230px;" src="<?php echo $insti['image']; ?>" alt="">
                                                <a class="plus_icon hvr-ripple-out" data-rel="prettyPhoto" href="<?php echo $insti['image']; ?>"><i class="fa fa-plus"></i></a>
                                            </figure>
                                            <div class="kode_blog_text">
                                                <h5 class="<?php renderMalayalamClass(); ?>"><a href="<?php echo $insti['url']; ?>"><?php echo $insti['title']; ?></a></h5>
                                                <p class="<?php renderMalayalamClass(); ?>"><?php echo $insti['excerpt']; ?></p>
                                            </div>
                                        </div>
                                    </li>
                                <?php
                                endforeach;
                                ?>
                            </ul>
                        <?php
                        else :
                        ?>
                            <p>No institute found!</p>
                        <?php
                        endif;
                        ?>
                    </div>
            </div>
        </div>
    </div>
</section>
<?php

get_footer();
