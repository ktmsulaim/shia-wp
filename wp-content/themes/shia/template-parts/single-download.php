<?php
$link = null;
$file = get_field('file');

if ($file && $file['url']) {
    $link = $file['url'];
}
?>

<a href="<?php echo $link ?: 'javascript:void(0)'; ?>" <?php echo $link ? 'download' : null; ?>>
    <div class="box box-3 downloadable">
        <div class="icon">
            <?php if ($file['type'] == 'application') : ?>
                <span class="mdi mdi-file-document-outline"></span>
            <?php elseif ($file['type'] == 'image') : ?>
                <span class="mdi mdi-file-image-outline"></span>
            <?php elseif ($file['type'] == 'video') : ?>
                <span class="mdi mdi-file-video-outline"></span>
            <?php elseif ($file['type'] == 'audio') : ?>
                <span class="mdi mdi-volume-high"></span>
            <?php else : ?>
                <span class="mdi mdi-file"></span>
            <?php endif; ?>
        </div>
        <div class="data">
            <div class="title"><?php echo get_the_title(); ?></div>

            <div class="meta">
                <div class="filename">
                    <span class="prop">Filename: </span>
                    <span class="value"><?php echo $file['filename'] ?: 'NULL'; ?></span>
                </div>
                <div class="filesize">
                    <span class="prop">Size: </span>
                    <span class="value"><?php echo $file['filesize'] ? formatSizeUnits($file['filesize']) : 'NULL'; ?></span>
                </div>
                <div class="date">
                    <span class="prop">Uploaded: </span>
                    <span class="value"><?php echo get_the_date('F d, Y'); ?></span>
                </div>
            </div>
        </div>
    </div>
</a>