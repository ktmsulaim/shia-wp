<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-6">
                <h4 class="title-3 text-white">Quick Links</h4>
                <ul class="footer-links">
                    <li><a href="<?php echo esc_url(site_url('/about-us')); ?>">About US</a></li>
                    <li><a href="<?php echo get_category_link(get_cat_ID('main')); ?>">News & Events</a></li>
                    <li><a href="<?php echo esc_url(site_url('/download')); ?>">Downloads</a></li>
                    <li><a href="<?php echo esc_url(site_url('/gallery')); ?>">Gallery</a></li>
                </ul>
            </div>
            <div class="col-md-3 col-6">
                <h4 class="title-3 text-white">Academic</h4>
                <ul class="footer-links">
                    <li><a href="<?php echo esc_url(site_url('/students-corner#students-union')); ?>">Students' Union</a></li>
                    <li><a href="<?php echo esc_url(site_url('/students-corner#creative-frame-section')); ?>">Creative Frames</a></li>
                    <li><a href="http://portal.dhiu.in/parent">Students portal</a></li>
                </ul>
            </div>
            <div class="col-md-3 col-6 mt-4 mt-md-0">
                <h4 class="title-3 text-white">Others</h4>
                    <ul class="footer-links">
                        <li><a href="https://dhiu.in">DHIU</a></li>
                    </ul>
            </div>
            <div class="col-md-3 col-6 mt-4 mt-md-0">
                <h4 class="title-3 text-white">Contact US</h4>
                <div>
                    <p>Shamsul Huda Islamic academy </p>
                    <p> by: Kuttikkattoor Muslim orphanage committee </p>
                    <p>Kuttikkattoor (po), Calicut- 673008, Kerala, India </p>
                    <div class="contact mt-2">
                        <a class="me-2" href="tel:914952965145">04952965145</a>
                        <a href="tel:918281536145"> 8281536145</a>
                    </div>
                </div>
                <div class="mt-3">
                    <ul class="social-icons justify-md-content-center">
                        <li><a href="javascript:void(0)">
                                <span class="mdi mdi-whatsapp"></span>
                            </a></li>
                        <li><a href="https://www.facebook.com/ShamsulHudaKuttikkattoor" target="_blank">
                                <span class="mdi mdi-facebook"></span>
                            </a></li>
                        <li><a href="https://instagram.com/shamsul_huda_kuttikkattur?igshid=1c90b61kzwtsf" target="_blank">
                                <span class="mdi mdi-instagram"></span>
                            </a></li>
                        <li><a href="https://www.youtube.com/channel/UCfZ2RjtePdJutaE6kHrW5HA/video00" target="_blank">
                                <span class="mdi mdi-youtube"></span>
                            </a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="credits">
            <div class=" text-center">
                Copyright &copy; <?php echo date('Y'); ?> Shamsul Huda Islamic Academy. All rights reserved | Developed by: <a href="#">Artitudes</a>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>