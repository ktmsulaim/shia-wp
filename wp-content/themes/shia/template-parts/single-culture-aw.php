<div class="box box-3">
    <div class="box-categories">
        <?php the_category(' '); ?>
    </div>
    <div class="box-image">
        <img class="img-fluid" src="<?php echo post_image(); ?>" alt="Art work Image">
    </div>
    <div class="box-title <?php echo get_language_class(); ?>">
        <a href="<?php echo get_the_permalink(); ?>">
            <p><?php echo get_the_title(); ?></p>
        </a>
    </div>
    <div class="box-meta">
        <div class="box-meta-author">
            <div class="author-image">
                <?php student_author_image(); ?>
            </div>
            <div class="author-name">
                <p><?php echo get_field('author_name'); ?></p>
                <?php
                if (get_field('class')) :
                ?>
                    <p class="small text-muted">(<?php echo get_field('class'); ?>)</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>