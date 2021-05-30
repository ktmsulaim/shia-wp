<?php
    $category = get_queried_object();
    $sub_categories = get_categories(['child_of' => $category->term_id]);

    if($sub_categories):
?>

<div class="widget">
    <div class="widget-title">
        <h4>Categories</h4>
    </div>
    <div class="widget-content">
        <ul class="wpb_page_list">
            <?php foreach($sub_categories as $scat): ?>
                <li>
                    <a href="<?php echo get_category_link($scat->term_id) ?>"><?php echo $scat->name; ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
        

    </div>
</div>

<?php endif; ?>