<?php

add_action('wp_enqueue_scripts', 'scripts');

function scripts()
{
    wp_enqueue_style('bootstrap', get_theme_file_uri('/css/bootstrap.css'));
    wp_enqueue_style('fontawesome', get_theme_file_uri('/css/font-awesome.css'));
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


    wp_enqueue_script('jqueryCore', get_theme_file_uri('/js/jquery.js'), NULL, '1.0', true);
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
}


add_action('after_setup_theme', 'website_features');

function website_features()
{
    add_theme_support('title_tag');
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
