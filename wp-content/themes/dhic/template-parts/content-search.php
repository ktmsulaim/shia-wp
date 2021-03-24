<div class="kode_search margin">
    <form action="<?php echo esc_url(site_url()); ?>" method="get" class="comment-form">
        <div class="kf_commet_field">
            <input id="search-input" placeholder="Search Here" name="s" type="text" value="<?php echo isset($_GET['s']) ? $_GET['s'] : ''; ?>" data-default="Name*" size="30" required>
            <button><i class="fa fa-paper-plane"></i></button>
        </div>
    </form>
</div>