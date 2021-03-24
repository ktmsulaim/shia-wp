<?php

add_action('wp_enqueue_scripts', 'scripts');

function scripts()
{
    wp_enqueue_style('bootstrap', get_theme_file_uri('/css/bootstrap.css'));
    wp_enqueue_style('fontawesome', get_theme_file_uri('/css/font-awesome.css'));
    wp_enqueue_style('sidebarWidget', get_theme_file_uri('/css/sidebar-widget.css'));
    wp_enqueue_style('slick', get_theme_file_uri('/css/slick.css'));
    wp_enqueue_style('slickTheme', get_theme_file_uri('/css/slick-theme.css'));
    wp_enqueue_style('jqueryBoxSlider', get_theme_file_uri('/css/jquery.bxslider.css'));
    wp_enqueue_style('audio', get_theme_file_uri('/css/audio.css'));
    wp_enqueue_style('prettyPhoto', get_theme_file_uri('/css/prettyphoto.css'));
    wp_enqueue_style('component', get_theme_file_uri('/css/component.css'));
    wp_enqueue_style('hover', get_theme_file_uri('/css/hover.css'));
    wp_enqueue_style('jqueryPluginProgress', get_theme_file_uri('/css/jQuery-plugin-progressbar.css'));
    wp_enqueue_style('chosen', get_theme_file_uri('/css/chosen.min.css'));
    wp_enqueue_style('animate', get_theme_file_uri('/css/animate.css'));
    wp_enqueue_style('typo', get_theme_file_uri('/css/typography.css'));
    wp_enqueue_style('shortcode', get_theme_file_uri('/css/shotcode.css'));
    wp_enqueue_style('mainStyle', get_theme_file_uri('/css/main.css'));
    wp_enqueue_style('svgIcon', get_theme_file_uri('/css/svg-icon.css'));
    wp_enqueue_style('color', get_theme_file_uri('/css/color.css'));
    wp_enqueue_style('responsive', get_theme_file_uri('/css/responsive.css'));


    wp_enqueue_script('jqueryCore', get_theme_file_uri('/js/jquery.js'), NULL, '3.6', true);
    wp_enqueue_script('bootstrapJs', get_theme_file_uri('/js/bootstrap.js'), NULL, '1.0', true);
    wp_enqueue_script('slickJs', get_theme_file_uri('/js/slick.min.js'), NULL, '1.0', true);
    wp_enqueue_script('wowJs', get_theme_file_uri('/js/wow.min.js'), NULL, '1.0', true);
    wp_enqueue_script('bxsliderJs', get_theme_file_uri('/js/jquery.bxslider.min.js'), NULL, '1.0', true);
    wp_enqueue_script('jqueryPluginProgressBar', get_theme_file_uri('/js/jQuery-plugin-progressbar.js'), NULL, '1.0', true);
    wp_enqueue_script('chosenJquery', get_theme_file_uri('/js/chosen.jquery.min.js'), NULL, '1.0', true);
    wp_enqueue_script('modernizr', get_theme_file_uri('/js/modernizr.custom.js'), NULL, '1.0', true);
    wp_enqueue_script('dlMenu', get_theme_file_uri('/js/jquery.dlmenu.js'), NULL, '1.0', true);
    wp_enqueue_script('musicPlayer', get_theme_file_uri('/js/musicplayer.js'), NULL, '1.0', true);
    wp_enqueue_script('prettyPhoto', get_theme_file_uri('/js/jquery.prettyphoto.js'), NULL, '1.0', true);
    wp_enqueue_script('downCount', get_theme_file_uri('/js/jquery.downCount.js'), NULL, '1.0', true);
    wp_enqueue_script('wayPoints', get_theme_file_uri('/js/waypoints-min.js'), NULL, '1.0', true);
    wp_enqueue_script('customJs', get_theme_file_uri('/js/custom.js'), NULL, '1.0', true);
    wp_enqueue_script('searchScript', get_theme_file_uri('/js/search-script.js'), NULL, '1.0', true);
    wp_enqueue_script('juqerySticky', get_theme_file_uri('/js/jquery.sticky.js'), NULL, '1.0', true);
    wp_enqueue_script('juqeryEasyTicker', get_theme_file_uri('/js/jquery.easy-ticker.min.js'), NULL, '1.0', true);
    wp_enqueue_script('jqueryEasing', get_theme_file_uri('/js/jquery.easing.min.js'), NULL, '1.0', true);
}


add_action('after_setup_theme', 'website_features');

function website_features()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_image_size('serviceThumb', 400, 260, true);
    add_image_size('slideImage', 1350, 555, true);
    add_image_size('pageBanner', 1500, 350, true);
}


function pageBanner($args = ['title' => null, 'links' => array(), 'photo' => null])
{
    $userPageBanner = false;

    if (!array_key_exists('title', $args) || !$args['title']) {
        $args['title'] = get_the_title();
    }

    if (!array_key_exists('photo', $args) || !$args['photo']) {
        if (get_field('page_background_image') && !is_archive() && !is_home()) {
            $userPageBanner = true;
            $args['photo'] = get_field('page_background_image')['sizes']['pageBanner'];
        } else {
            $args['photo'] = get_theme_file_uri('/images/banner-pattran-bg.png');
        }
    }

?>
    <!--KODE SAB BANNER WRAP START-->
    <div class="kode_sab_banner_wrap them_overlay <?php echo $userPageBanner ? 'custom' : ''; ?>" <?php echo $userPageBanner ? 'style="background:"' . $args['photo'] . '"' : ''; ?>>
        <!--CONTAINER START-->
        <div class="container">
            <div class="sab_banner_text">
                <h2><?php echo $args['title']; ?></h2>
                <ul class="breadcrumbs">
                    <li><a href="<?php echo esc_url(site_url()); ?>"><i class="fa fa-home"></i></a></li>
                    <?php
                    if (is_array($args['links']) && count($args['links']) > 0) :
                        foreach ($args['links'] as $link) :
                    ?>
                            <li><a href="<?php echo $link['url']; ?>"><strong><?php echo $link['label']; ?></strong></a></li>
                    <?php
                        endforeach;
                    endif;
                    ?>
                </ul>
            </div>
        </div>
        <!--CONTAINER END-->
    </div>

    <?php
}

function datetimeFromString($datetime, $newFormat = 'F j, Y g:i A')
{
    if ($datetime) {

        $finalDateTime = DateTime::createFromFormat('F j, Y g:i a', $datetime, new DateTimeZone('Asia/Kolkata'));

        return $finalDateTime->format($newFormat);
    } else {
        return 'NULL';
    }
}


function renderMalayalamClass()
{
    if (get_field('enable_malayalam')) {
        echo 'ml';
    }
}

function print_categories($categories)
{
    if (is_array($categories) && count($categories) > 0) :
    ?>
        <i class="fa fa-tag"></i>
        <?php foreach ($categories as $key => $cat) :
        ?>
            <a class="primary-color" href="<?php echo get_category_link($cat->cat_ID); ?>"><?php echo $cat->cat_name; ?></a>
<?php
            if (count($categories) > 1 && $key != count($categories)) :
                echo ', ';
            endif;
        endforeach;
    endif;
}



function custom_query($query)
{
    if (!is_admin() && $query->is_main_query()) {
        if (is_post_type_archive('institute')) {
            $query->set('meta_key', 'order');
            $query->set('orderby', 'meta_key_num');
            $query->set('order', 'ASC');
        }

        if (is_post_type_archive('event')) {
            $query->set('meta_key', 'event_date');
            $query->set('orderby', 'meta_value');
            $query->set('order', 'DESC');
            $query->set('meta_query', [
                'key' => 'event_date',
                'compare' => '<',
                'value' => date('Ymd'),
                'type' => 'DATE'
            ]);
        }

        if ($query->is_search()) {
            $query->set('post_type', ['post', 'event', 'institute', 'notification']);
            $query->set('posts_per_page', 5);
        }
    }

    return $query;
}

add_action('pre_get_posts', 'custom_query');
