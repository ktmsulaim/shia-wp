<?php 

get_header(); 

$parent = null;

$category = get_the_category();

if($category && is_array($category)) {
    $category = array_shift($category);
}

$breadcrumb = [
    0 => [
        'label' => 'News',
        'url' => get_category_link($category->term_id),
    ],
    1 => [
        'label' => 'News in detail',
        'url' => 'javascript:void(0)',
    ]
];

pageHeader([
    'title' => 'News & Events',
    'breadcrumb' => $breadcrumb,
    'page_banner' => null,
]);

$author_id = get_post_field( 'post_author', get_the_ID() );
$author_name = get_the_author_meta( 'display_name', $author_id );
?>
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="post-thumbnail">
                    <img src="<?php echo post_image('large'); ?>" alt="" class="img-fluid">
                </div>
                <div class="post-title">
                    <?php echo get_the_title(); ?>
                </div>
                <div class="post-meta">
                    <ul class="meta-list">
                        <li>
                            <span class="mdi mdi-clock-outline"></span>
                            <span><?php echo get_the_date('F d, Y'); ?></span>
                        </li>
                        <li>
                            <span class="mdi mdi-tag-outline"></span>
                            <span><?php the_category(' '); ?></span>
                        </li>
                        <li>
                            <span class="mdi mdi-account-outline"></span>
                            <span><?php echo ucfirst($author_name) ?: 'NULL'; ?></span>
                        </li>
                    </ul>
                </div>

                <div class="content">
                    <?php echo get_the_content(); ?>
                </div>
                <div class="share-button mt-5" data-text="<?php echo get_the_title(); ?>" data-url="<?php echo get_the_permalink(); ?>" data-text="<?php echo short_content(); ?>"></div>
            </div>
            <div class="col-md-4">
                <div class="side-bar">
                    <?php get_template_part('template-parts/related', 'news');  ?>
                   
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>