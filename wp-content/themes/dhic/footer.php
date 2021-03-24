	<footer>
		<!--WIDGET WRAP START-->
		<div class="widget_wrap them_overlay">
			<!--CONTAINER START-->
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<div class="widget_logo">
							<a href="<?php echo esc_url(site_url()); ?>"><img src="<?php echo get_theme_file_uri('/images/logo_inverse.png'); ?>" alt="DHIC Logo Inverse"></a>
							<p>Darul Hasanath Islamic Complex is a Charitable Institution established in 1993 for the sublime purpose of uplifting the downtrodden community.</p>
							<ul class="widget_call_info">
								<li><a href="javascript:void(0)"><i class="fa fa-map-marker"></i> Niduvat, Kannadiparamba, P. O. Narath <br>Kannur District, Kerala, India</a></li>
								<li><a href="tel:+914972796938"><i class="fa fa-phone"></i>+91 497 2796938</a></li>
								<li><a href="mailto:darulhasanath@gmail.com"><i class="fa fa-envelope"></i>darulhasanath@gmail.com</a></li>
							</ul>
							<ul class="widget_social_icon">
								<li><a class="hvr-ripple-out" href="https://www.facebook.com/darulhasanath" target="_blank"><i class="fa fa-facebook"></i></a></li>
								<li><a class="hvr-ripple-out" href="https://wa.me/919747619659" target="_blank"><i class="fa fa-whatsapp"></i></a></li>
								<li><a class="hvr-ripple-out" href="https://www.youtube.com/channel/UCo9Okjd_22LjGnmmEYVuhTw/videos" target="_blank"><i class="fa fa-youtube"></i></a></li>
								<li><a class="hvr-ripple-out" href="#"><i class="fa fa-instagram"></i></a></li>
								<li><a class="hvr-ripple-out" href="#"><i class="fa fa-twitter"></i></a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-4">
						<div class="widget_event">
							<h4 class="widget_title">Important Links</h4>
							<ul class="kode_calender_detail">
								<li>
									<div class="kode_calender_list">
										<div class="kode_event_text">
											<h6><a href="<?php echo esc_url(site_url('ahsan')); ?>">Ahsan</a></h6>
										</div>
									</div>
								</li>
								<li>
									<div class="kode_calender_list">
										<div class="kode_event_text">
											<h6><a href="<?php echo esc_url(site_url('ahsas')); ?>">Ahsas</a></h6>
										</div>
									</div>
								</li>
								<li>
									<div class="kode_calender_list">
										<div class="kode_event_text">
											<h6><a href="https://dhiu.in" target="_blank">Darul Huda Islamic University</a></h6>
										</div>
									</div>
								</li>
								<li>
									<div class="kode_calender_list">
										<div class="kode_event_text">
											<h6><a href="https://hifz.darulhasanath.com" target="_blank">Hifz Online Admission</a></h6>
										</div>
									</div>
								</li>
								<li>
									<div class="kode_calender_list">
										<div class="kode_event_text">
											<h6><a href="https://examathome.darulhasanath.com" target="_blank">Exam at home</a></h6>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-md-4">
						<div class="widget_event">
							<h4 class="widget_title">Notifications</h4>

							<div class="noti-controls">
								<span class="noti-left">
									<i class="fa fa-arrow-left"></i>
								</span>
								<span class="noti-right">
									<i class="fa fa-arrow-right"></i>
								</span>
							</div>
							<div class="notifications">
								<ul>
									<?php
									$notifications = new WP_Query([
										'post_type' => 'notification',
										'posts_per_page' => '10',
									]);

									if ($notifications->have_posts()) :
										while ($notifications->have_posts()) :
											$notifications->the_post();
									?>
											<li>
												<div class="noti-title" data-toggle="tooltip" data-text="<?php echo get_the_title(); ?>" title="<?php echo get_the_title(); ?>"><?php echo wp_trim_words(get_the_title(), 4); ?></div>
												<div class="noti-meta">
													<span class="dateTime"><i class="fa fa-clock-o"></i> <?php echo get_the_date(); ?></span>
													<span class="category"><i class="fa fa-tag"></i> <?php
                                                    $categories = get_the_category();
                                                    if (is_array($categories) && count($categories) > 0) :
                                                        foreach ($categories as $cat) :
                                                    ?>
                                                            <a href="<?php echo get_category_link($cat->cat_ID); ?>"><?php echo $cat->cat_name; ?></a>
                                                    <?php
                                                            if (count($categories) > 1) :
                                                                echo ', ';
                                                            endif;
                                                        endforeach;
                                                    endif;
                                                    ?></span>
												</div>
												<a href="<?php echo get_the_permalink(); ?>">Read more</a>
											</li>
										<?php
										endwhile;
										wp_reset_query();
									else :
										?>
										<li>No notification!</li>
									<?php
									endif;
									?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--CONTAINER END-->
		</div>
		<!--WIDGET WRAP END-->

		<!--WIDGET COPYRIGHT START-->
		<div class="widget_copyright">
			<!--CONTAINER START-->
			<div class="container">
				<div class="copyright_text">
					<p>Copyright &copy; <?php echo date('Y'); ?>. All Rights Reserved <a href="<?php echo esc_url(site_url()); ?>">Darul Hasanath Islamic Complex</a></p>
					<a id="child-topbtn" class="top_btn hvr-wobble-vertical" href="#"><i class="fa fa-long-arrow-up" aria-hidden="true"></i></a>
				</div>
			</div>
			<!--CONTAINER END-->
		</div>
		<!--WIDGET COPYRIGHT END-->
	</footer>
	</div>
	<!--WRAPER END-->
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/emailjs-com@2/dist/email.min.js">
	</script>
	<?php wp_footer(); ?>
	<script>
		$(function() {
			emailjs.init("user_NOhQZBQMtGEQ1YL5UaTrv");
			$('.loader').fadeOut();
		});
	</script>
	</body>

	</html>