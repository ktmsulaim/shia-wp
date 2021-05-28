<form id="search-form" action="<?php echo esc_url(site_url('/')); ?>" method="get">
    <div class="input-group mb-3">
        <input type="text" name="s" class="form-control" placeholder="Search here..." aria-label="Search input" aria-describedby="search-label">
        <div class="input-group-append">
            <span class="input-group-text" id="search-label">
                <button id="searchSubmit" type="submit"><span class="mdi mdi-magnify"></span></button>
            </span>
        </div>
    </div>
</form>