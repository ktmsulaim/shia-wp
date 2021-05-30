<?php 

get_header(); 

$breadcrumb = [
    0 => [
        'label' => 'Notifications',
        'url' => get_post_type_archive_link('notification'),
    ],
    1 => [
        'label' => 'View',
        'url' => 'javascript:void(0)',
    ]
];

pageHeader([
    'title' => 'Notifications',
    'breadcrumb' => $breadcrumb,
    'page_banner' => null,
]);

$author_id = get_post_field( 'post_author', get_the_ID() );
$author_name = get_the_author_meta( 'display_name', $author_id );
?>
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
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
                            <span class="mdi mdi-account-outline"></span>
                            <span><?php echo ucfirst($author_name) ?: 'NULL'; ?></span>
                        </li>
                    </ul>
                </div>

                <div class="content">
                    <?php echo get_the_content(); ?>
                </div>
            </div>
            <div class="col-md-5">
                <div class="side-bar">
                    <?php get_template_part('template-parts/related', 'notifications');  ?>
                   
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>