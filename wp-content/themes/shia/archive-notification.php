<?php

get_header();

pageHeader([
    'title' => 'Notifications',
    'breadcrumb' => [
            0 => [
            'label' => 'Notifications',
            'url' => 'javascript:void(0)',
            ],
    ],
    'page_banner' => null,
]);
?>
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="box box-1">
                    <div class="notification-wrapper">
                        <h4 class="title-2 d-flex justify-content-between">
                            <span class="prev">
                                <div class="mdi mdi-arrow-left"></div>
                            </span>
                            <span class="text">Notifications</span>
                            <span class="next">
                                <div class="mdi mdi-arrow-right"></div>
                            </span>
                        </h4>
                        
                        <div class="notifications">
                            <?php 
                                if (have_posts()) :
                                    echo '<ul>';
                                    while (have_posts()) :
                                        the_post();
                                        get_template_part('template-parts/single', 'notification');
                                    endwhile;
                                    echo '</ul>';
    
                                    wp_reset_query();
                                else :
                                    echo '<p>No notifications found!</p>';
                                endif;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>