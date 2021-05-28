<?php

add_action('wp_enqueue_scripts', 'scripts');

function scripts()
{
    wp_enqueue_style('bootstrap', get_theme_file_uri('/css/bootstrap.min.css'));
    wp_enqueue_style('slick', get_theme_file_uri('/css/slick/slick.css'));
    wp_enqueue_style('slickTheme', get_theme_file_uri('/css/slick/slick-theme.css'));
    wp_enqueue_style('materialicons', get_theme_file_uri('/css/materialdesignicons.min.css'));
    wp_enqueue_style('animate', get_theme_file_uri('/css/animate.css'));
    wp_enqueue_style('main', get_theme_file_uri('/css/main.css'));
    wp_enqueue_style('responsive', get_theme_file_uri('/css/responsive.css'));

    wp_enqueue_script('jqueryCore', get_theme_file_uri('/js/jquery-3.6.0.min.js'), NULL, '3.6.0', false);
    wp_enqueue_script('bootstrapBundle', get_theme_file_uri('/js/bootstrap.bundle.min.js'), NULL, '5.0.0', false);
    wp_enqueue_script('slick', get_theme_file_uri('/js/slick.min.js'), NULL, '1.8.1', false);
    wp_enqueue_script('jqueryEasyTicker', get_theme_file_uri('/js/jquery.easy-ticker.min.js'), NULL, '3.1.0', false);
    wp_enqueue_script('jqueryEasing', get_theme_file_uri('/js/jquery.easing.min.js'), NULL, '1.0.0', false);
    wp_enqueue_script('mouseTrap', get_theme_file_uri('/js/mousetrap.min.js'), NULL, '1.0.0', false);
    wp_enqueue_script('search', get_theme_file_uri('/js/search.js'), NULL, '1.0.0', false);
    wp_enqueue_script('custom', get_theme_file_uri('/js/main.js'), NULL, '1.0', false);
}

add_action('after_setup_theme', 'website_features');

function website_features()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    add_image_size('landscapeThumbnail', 400, 260, true);
    add_image_size('portraitThumbnail', 480, 650, true);
    add_image_size('pageBanner', 1920, 500, true);
    add_image_size('imageSlider', 1922, 700, true);
}

function short_content($words = 10)
{
    if (has_excerpt()) {
        return get_the_excerpt();
    } else {
        wp_trim_words(wp_strip_all_tags(get_the_content()), $words);
    }
}

function post_image($size = 'landscapeThumbnail')
{
    if (has_post_thumbnail()) {
        return the_post_thumbnail_url($size);
    } else {
        return get_theme_file_uri('img/placeholder.jpg');
    }
}

function student_author_image($size = 50)
{
    if (get_field('author_photo')) {
        $src = get_field('author_photo');
    } else {
        $src = get_theme_file_uri('img/student.png');
    }

    echo "<img src='$src' class='img-fluid' width='$size' />";
}

function no_data($type, $size = 150)
{
?>
    <div class="text-center">
        <img src="<?php echo get_theme_file_uri('/img/empty-box.png'); ?>" width="<?php echo $size; ?>" alt="No <?php echo $type; ?>">
        <div class="mt-2">
            <p class="text-center">No <?php echo $type; ?> found!</p>
        </div>
    </div>
<?php
}


function is_current_uri($uri)
{
    return $_SERVER['REQUEST_URI'] == $uri;
}

function is_active($uri)
{
    echo is_current_uri($uri) ? 'active' : '';
}

function pageHeader(array $attributes = ['title' => null, 'page_banner' => null, 'breadcrumb' => null])
{
    if (!$attributes['title']) {
        $attributes['title'] = get_the_title();
    }

    if (!$attributes['page_banner']) {
        $attributes['pageBanner'] = get_field('page_banner');
    }

    if (!$attributes['breadcrumb']) {
        $attributes['breadcrumb'] = [];
    }


?>

    <div class="header" id="secondary" style="background-image: url(<?php echo $attributes['page_banner'] ?? get_theme_file_uri('/img/banner.jpg'); ?>);">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="header-box">
                        <div class="title"><?php echo $attributes['title']; ?></div>
                        <div class="breadcrumb-wrapper">
                            <ul class="breadcrumb">
                                <li><a href="<?php echo esc_url(site_url('/')); ?>">Home</a></li>
                                <?php
                                if ($attributes && $attributes['breadcrumb'] && count($attributes['breadcrumb'])) :
                                    foreach ($attributes['breadcrumb'] as $bc) :
                                ?>
                                        <li><a href="<?php echo $bc['url']; ?>"><?php echo $bc['label']; ?></a></li>
                                <?php
                                    endforeach;
                                endif;
                                ?>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php
}

function has_children()
{
    global $post;

    $children = get_pages(array('child_of' => $post->ID));
    if (count($children) == 0) {
        return false;
    } else {
        return true;
    }
}

function get_child_pages()
{

    global $post;

    if (is_page() && $post->post_parent)

        $childpages = wp_list_pages('sort_column=menu_order&title_li=&child_of=' . $post->post_parent . '&echo=0');
    else
        $childpages = wp_list_pages('sort_column=menu_order&title_li=&child_of=' . $post->ID . '&echo=0');

    if ($childpages) {

        $string = '<ul class="wpb_page_list">' . $childpages . '</ul>';
    }

    return $string;
}

if(!function_exists('has_sibling')) {
    function has_sibling($parent) {
        if(!$parent): 
            return;
        endif;

        $pages = wp_list_pages(array(
            'child_of' => $parent->ID,
            'exclude' => get_the_ID(),
            'echo' => false,
        ));

        return $pages;
    }
}

if(!function_exists('get_sibling')) {
    function get_sibling($parent) {
        if(!$parent): 
            return;
        endif;

        return wp_list_pages(array(
            'child_of' => $parent->ID,
            'exclude' => get_the_ID(),
            'title_li' => '',
        ));
    }
}

if (!function_exists('has_page_parent')) {
    function has_page_parent()
    {
        global $post;

        if($post->post_parent) {
            return get_post($post->post_parent);
        }

        return false;
    }
}

if (!function_exists('get_page_parent')) {
    function get_page_parent()
    {
        return has_page_parent();
    }
}
