<li>
    <div class="artwork-wrapper go-to-url" data-target="<?php echo get_the_permalink(); ?>">
        <div class="artwork-box">
            <div class="artwork-box__image">
                <img src="<?php post_image(); ?>" alt="Post image" class="img-fluid">
            </div>
            <div class="artwork-box__data">
                <div class="title <?php echo get_language_class(); ?>">
                    <?php echo get_the_title(); ?>
                </div>
                <div class="category-names">
                    <?php the_category(' '); ?>
                </div>
                <div class="author">
                    <div class="author-image">
                        <?php student_author_image(); ?>
                    </div>
                    <div class="author-name <?php echo get_language_class(); ?>">
                        <p><?php echo get_field('author_name'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</li>