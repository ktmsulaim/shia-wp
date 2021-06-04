<li class="notification">
    <a href="<?php echo get_the_permalink(); ?>">
    <div class="notification-title">
        <?php the_title(); ?>
    </div>
    <div class="notification-date">
        <i class="mdi mdi-alarm"></i> <span class="ml-2"><?php echo get_the_date('d-m-Y'); ?></span>
    </div>
    </a>
</li>