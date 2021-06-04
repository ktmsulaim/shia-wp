<?php

add_action('wp_enqueue_scripts', 'scripts');

function scripts()
{
    wp_enqueue_style('bootstrap', get_theme_file_uri('/css/bootstrap.min.css'));
    wp_enqueue_style('slick', get_theme_file_uri('/css/slick/slick.css'));
    wp_enqueue_style('slickTheme', get_theme_file_uri('/css/slick/slick-theme.css'));
    wp_enqueue_style('materialicons', get_theme_file_uri('/css/materialdesignicons.min.css'));
    wp_enqueue_style('lightBoxGallery', get_theme_file_uri('/css/lightbox.min.css'));
    wp_enqueue_style('animate', get_theme_file_uri('/css/animate.css'));
    wp_enqueue_style('main', get_theme_file_uri('/css/main.css'));
    wp_enqueue_style('responsive', get_theme_file_uri('/css/responsive.css'));

    wp_enqueue_script('jqueryCore', get_theme_file_uri('/js/jquery-3.6.0.min.js'), NULL, '3.6.0', false);
    wp_enqueue_script('bootstrapBundle', get_theme_file_uri('/js/bootstrap.bundle.min.js'), NULL, '5.0.0', false);
    wp_enqueue_script('slick', get_theme_file_uri('/js/slick.min.js'), NULL, '1.8.1', false);
    wp_enqueue_script('jqueryEasyTicker', get_theme_file_uri('/js/jquery.easy-ticker.min.js'), NULL, '3.1.0', false);
    wp_enqueue_script('jqueryEasing', get_theme_file_uri('/js/jquery.easing.min.js'), NULL, '1.0.0', false);
    wp_enqueue_script('mouseTrap', get_theme_file_uri('/js/mousetrap.min.js'), NULL, '1.0.0', false);
    wp_enqueue_script('lightBoxGallery', get_theme_file_uri('/js/lightbox.min.js'), NULL, '1.0.0', false);
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

if (!function_exists('has_sibling')) {
    function has_sibling($parent)
    {
        if (!$parent) :
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

if (!function_exists('get_sibling')) {
    function get_sibling($parent)
    {
        if (!$parent) :
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

        if ($post->post_parent) {
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

function bootstrap_pagination(\WP_Query $wp_query = null, $echo = true, $params = [])
{
    if (null === $wp_query) {
        global $wp_query;
    }

    $add_args = [];

    //add query (GET) parameters to generated page URLs
    /*if (isset($_GET[ 'sort' ])) {
        $add_args[ 'sort' ] = (string)$_GET[ 'sort' ];
    }*/

    $pages = paginate_links(
        array_merge([
            'base'         => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
            'format'       => '?paged=%#%',
            'current'      => max(1, get_query_var('paged')),
            'total'        => $wp_query->max_num_pages,
            'type'         => 'array',
            'show_all'     => false,
            'end_size'     => 3,
            'mid_size'     => 1,
            'prev_next'    => true,
            'prev_text'    => __('« Prev'),
            'next_text'    => __('Next »'),
            'add_args'     => $add_args,
            'add_fragment' => ''
        ], $params)
    );

    if (is_array($pages)) {
        //$current_page = ( get_query_var( 'paged' ) == 0 ) ? 1 : get_query_var( 'paged' );
        $pagination = '<div class="pagination-wrapper"><ul class="pagination justify-content-center">';

        foreach ($pages as $page) {
            $pagination .= '<li class="page-item ' . (strpos($page, 'current') !== false ? 'active' : '') . '"> ' . str_replace('page-numbers', 'page-link', $page) . '</li>';
        }

        $pagination .= '</ul></div>';

        if ($echo) {
            echo $pagination;
        } else {
            return $pagination;
        }
    }

    return null;
}

function get_subcategory_ids($category)
{
    if (!$category) :
        return;
    endif;

    $sub_categories = get_categories(['child_of' => $category]);

    $data = [];

    if ($sub_categories) {
        foreach ($sub_categories as $scat) {
            array_push($data, $scat->term_id);
        }
    }

    return $data;
}

add_filter('pre_get_posts', 'query_post_type');

function query_post_type($query)
{
    if (!is_admin() && $query->is_main_query()) {
        $culture = get_cat_ID('culture');
        $article = get_cat_ID('article');

        if ($query->is_category($culture) || $query->is_category($article) || $query->is_category(get_subcategory_ids($culture))) {
            $query->set('post_type', 'artwork');

            return $query;
        }
    }
}

add_filter('category_template', 'creative_frame_template');

function creative_frame_template($template)
{
    $category = get_queried_object();

    $culture = get_cat_ID('culture');
    $article = get_cat_ID('article');

    if ($category->term_id == $culture) {
        $template = locate_template('category-culture.php');
    } elseif ($category->term_id == $article) {
        $template = locate_template('category-articles.php');
    } elseif ($category->category_parent == $culture) {
        $template = locate_template('category-culture.php');
    } elseif ($category->category_parent == $article) {
        $template = locate_template('category-articles.php');
    }

    return $template;
}

function get_language_class()
{
    $enable = get_field('enable_language_support');
    $lang = get_field('language');

    if ($enable && $lang) {
        if ($lang == 'Arabic') {
            return 'ar';
        } elseif ($lang == 'Malayalam') {
            return 'ml';
        } elseif ($lang == 'Urdu') {
            return 'ur';
        }
    }
}

function formatSizeUnits($bytes)
{
    if ($bytes >= 1073741824) {
        $bytes = number_format($bytes / 1073741824, 2) . ' GB';
    } elseif ($bytes >= 1048576) {
        $bytes = number_format($bytes / 1048576, 2) . ' MB';
    } elseif ($bytes >= 1024) {
        $bytes = number_format($bytes / 1024, 2) . ' KB';
    } elseif ($bytes > 1) {
        $bytes = $bytes . ' bytes';
    } elseif ($bytes == 1) {
        $bytes = $bytes . ' byte';
    } else {
        $bytes = '0 bytes';
    }

    return $bytes;
}
