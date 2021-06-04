<?php 

get_header(); 

$parent = null;

$breadcrumb = [
    0 => [
        'label' => 'Gallery',
        'url' => esc_url(site_url('/gallery/')),
    ],
    1 => [
        'label' => get_the_title(),
        'url' => 'javascript:void(0)',
    ]
];

pageHeader([
    'title' => 'Images',
    'breadcrumb' => $breadcrumb,
    'page_banner' => null,
]);


?>
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="content" id="gallery" data-name="<?php echo get_the_title(); ?>">
                    <?php echo get_the_content(); ?>
                </div>
                <div class="share-button mt-5" data-text="<?php echo get_the_title(); ?>" data-url="<?php echo get_the_permalink(); ?>" data-text="<?php echo short_content(); ?>"></div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>