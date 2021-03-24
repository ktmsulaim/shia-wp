<?php
$day = datetimeFromString(get_field('event_date'), 'd');
$month = datetimeFromString(get_field('event_date'), 'M');
?>

<div class="kode_calender_list">
    <span><?php echo $day; ?><i><?php echo $month; ?></i></span>
    <div class="kode_event_text">
        <h4 class="<?php renderMalayalamClass(); ?>"><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
        <p style="text-transform:none;" class="<?php renderMalayalamClass(); ?>">
            <?php if (has_excerpt()) :
                echo get_the_excerpt();
            else :
                echo substr(strip_tags(get_the_content()), 0, 100);
            endif; ?>
        </p>
        <div class="meta">
            <div class="category">
                <span>
                    <?php
                    $categories = get_the_category();
                    if (is_array($categories) && count($categories) > 0) :
                    ?>
                        <i class="fa fa-tag"></i>
                        <?php foreach ($categories as $cat) :
                        ?>
                            <a href="<?php echo get_category_link($cat->cat_ID); ?>"><?php echo $cat->cat_name; ?></a>
                    <?php
                            if (count($categories) > 1) :
                                echo ', ';
                            endif;
                        endforeach;
                    endif;
                    ?>
                </span>
            </div>
        </div>
    </div>
</div>