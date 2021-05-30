<a class="news-box-wrapper" href="<?php echo get_the_permalink(); ?>">
    <div class="news-box news-box-1" style="background-image: url(<?php echo post_image(); ?>);">
        <div class="news-box-title <?php echo get_language_class(); ?>">
            <?php echo get_the_title(); ?>
        </div>
        <div class="news-box-date">
            <span class="mdi mdi-alarm"></span>
            <span class="ml-2"><?php echo get_the_date('d-m-Y'); ?></span>
        </div>
    </div>
</a>