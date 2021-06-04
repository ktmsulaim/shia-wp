<?php

get_header();

pageHeader([
    'title' => 'Search',
    'breadcrumb' => [
        0 => [
            'label' => "Search",
            'url' => 'javascript:void(0)'
        ],
        1 => [
            'label' => '"' . $_GET['s'] . '"',
            'url' => 'javascript:void(0)'
        ]
    ],
    'page_banner' => null,
]);

$q = $_GET['s'];


// prepare search data
$pages = get_posts([
    'post_type' => 'page',
    'posts_per_page' => 8,
    's' => $q,
]);

$general = new WP_Query([
    'post_type' => 'post',
    'category_name' => 'main',
    'posts_per_page' => 6,
    's' => $q,
]);

$students = new WP_Query([
    'post_type' => 'post',
    'category_name' => 'students-union',
    'posts_per_page' => 6,
    's' => $q,
]);

$notifications = new WP_Query([
    'post_type' => 'notification',
    'posts_per_page' => 5,
    's' => $q,
]);

$artworks = new WP_Query([
    'post_type' => 'artwork',
    'posts_per_page' => 5,
    's' => $q,
]);

$downloads = new WP_Query([
    'post_type' => 'download',
    'posts_per_page' => 5,
    's' => $q
]);

?>
<section class="section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <ul class="nav nav-pills mb-3 flex-column" id="search-category-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pages-tab" data-toggle="pill" href="#pages" role="tab" aria-controls="pages" aria-selected="true">
                            <span class="mdi mdi-page-layout-sidebar-right"></span>
                            <span class="ml-3">Pages</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="news-tab" data-toggle="pill" href="#news" role="tab" aria-controls="news" aria-selected="false">
                            <span class="mdi mdi-newspaper-variant-outline"></span>
                            <span class="ml-3">News</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="other-tab" data-toggle="pill" href="#other" role="tab" aria-controls="other" aria-selected="false">
                            <span class="mdi mdi-apps"></span>
                            <span class="ml-3">Other</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-8">
                <div class="tab-content" id="search-category-tab-content">
                    <div class="tab-pane fade show active" id="pages" role="tabpanel" aria-labelledby="pages-tab">
                        <?php
                        if ($pages && is_array($pages) && count($pages)) :
                        ?>
                            <div class="row">
                                <?php
                                foreach($pages as $key => $page) :
                                ?>
                                     <div class="col-md-3">
                                        <div class="box box-3 <?php echo $key > 3 ? 'mt-4' : ''; ?>">
                                            <div class="box-title text-center"><a href="<?php echo get_the_permalink($page->ID); ?>"><?php echo $page->post_title; ?></a></div>
                                        </div>
                                    </div>
                                <?php
                                endforeach;
                                wp_reset_query();
                                ?>
                            </div>
                        <?php
                        else :
                            no_data('pages', 100);
                        endif;
                        ?>
                    </div>
                    <div class="tab-pane fade" id="news" role="tabpanel" aria-labelledby="news-tab">
                        <ul class="nav nav-pills mb-3" id="search-news-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-general-tab" data-bs-toggle="pill" data-bs-target="#pills-general" type="button" role="tab" aria-controls="pills-general" aria-selected="true">
                                    General News
                                    <?php
                                    if ($general->have_posts()) :
                                    ?>
                                        <span class="badge text-dark bg-white"><?php echo $general->post_count; ?></span>

                                    <?php endif; ?>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-student-tab" data-bs-toggle="pill" data-bs-target="#pills-student" type="button" role="tab" aria-controls="pills-student" aria-selected="false">
                                    Students' union
                                    <?php
                                    if ($students->have_posts()) :
                                    ?>
                                        <span class="badge text-dark bg-white"><?php echo $students->post_count; ?></span>

                                    <?php endif; ?>
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-general" role="tabpanel" aria-labelledby="pills-general-tab">
                                <?php
                                if ($general->have_posts()) :
                                ?>
                                    <div class="row">
                                        <?php
                                        $generalCount = 1;
                                        while ($general->have_posts()) :
                                            $general->the_post();
                                        ?>
                                            <div class="col-md-4 <?php echo $generalCount > 3 ? 'mt-3' : ''; ?>">
                                                <?php
                                                get_template_part('template-parts/single', 'news');
                                                ?>
                                            </div>
                                        <?php
                                            $generalCount++;
                                        endwhile;
                                        wp_reset_query();
                                        ?>
                                    </div>
                                <?php
                                else :
                                    no_data('general news', 100);
                                endif;
                                ?>
                            </div>
                            <div class="tab-pane fade" id="pills-student" role="tabpanel" aria-labelledby="pills-student-tab">
                                <?php
                                if ($students->have_posts()) :
                                ?>
                                    <div class="row">
                                        <?php
                                        $studentCount = 1;
                                        while ($students->have_posts()) :
                                            $students->the_post();
                                        ?>
                                            <div class="col-md-6 <?php echo $studentCount > 2 ? 'mt-3' : ''; ?>">
                                                <?php
                                                get_template_part('template-parts/single', 'news-2');
                                                ?>
                                            </div>
                                        <?php
                                            $studentCount++;
                                        endwhile;
                                        wp_reset_query();
                                        ?>
                                    </div>
                                <?php
                                else :
                                    no_data('students\' union related news', 100);
                                endif;
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="other" role="tabpanel" aria-labelledby="other-tab">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-3">
                                    <div class="title">
                                        <h4 class="title-1 mb-4 text-center">Notifications</h4>
                                    </div>

                                    <?php
                                    if ($notifications->have_posts()) :
                                        echo '<ul class="notifications">';
                                        while ($notifications->have_posts()) :
                                            $notifications->the_post();

                                            get_template_part('template-parts/single', 'notification');
                                        endwhile;

                                        echo '</ul>';

                                        wp_reset_query();
                                    else :
                                        no_data('notifications', 100);
                                    endif;
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-12 mt-4">
                                <div class="box box-3">
                                    <div class="title">
                                        <h4 class="title-1 mb-4 text-center">Creative frame</h4>
                                    </div>

                                    <?php
                                    if ($artworks->have_posts()) :
                                        echo '<ul class="artworks-list">';
                                        while ($artworks->have_posts()) :
                                            $artworks->the_post();

                                            get_template_part('template-parts/single', 'artwork-list');
                                        endwhile;
                                        echo '</ul>';
                                        wp_reset_query();
                                    else :
                                        no_data('data', 100);
                                    endif;
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-12 mt-4">
                                <div class="box box-3">
                                    <div class="title">
                                        <h4 class="title-1 mb-4 text-center">Downloads</h4>
                                    </div>

                                    <?php
                                    if ($downloads->have_posts()) :
                                        echo '<ul class="downloads-list">';
                                        while ($downloads->have_posts()) :
                                            $downloads->the_post();
                                            get_template_part('template-parts/single', 'download-list');
                                        endwhile;
                                        echo '</ul>';
                                        wp_reset_query();
                                    else :
                                        no_data('downloads', 100);
                                    endif;
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>