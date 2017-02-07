 

<footer class="site-footer">

	<!-- <div class=""> --><!-- container -->
		<!-- <div class="row"> -->
				<!-- <div class="columns-12"> -->
					<!-- <nav class="main-navigation">
						<?php wp_nav_menu( array('menu_id' => 'footer-menu', 'theme_location' => 'footer-menu') ); ?>
					</nav> -->
					<div class="top-bar">
						<div class="container">
							<div class="row">
								<!-- <div class="columns-12"> -->
									<div class="footer-logo columns-1">
										<img src="<?php bloginfo('template_directory'); ?>/img/logo-footer.png">
									</div>
									<div class="signup columns-5">
										<div class="row">
										<?php echo do_shortcode('[mc4wp_form id="29"]'); ?>
										</div>
										<p class="mail-statement row">
											Stay in the loop with the occasional email update.<br>
											We promise not to overload you inbox and your email is confidential.
										</p>
									</div>
									<div class="search columns-3 offset-by-2">
										<div class="cta">
											<a class="cta-link" href="#">Download a visitors guide brochure</a>
										</div>
										<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
											<div class="form input">
												<label for="searchHeader" class="sr-only">Search the site</label>
												<input id="searchHeader" class="hide" type="text" placeholder="Search the site..." value="<?php the_search_query(); ?>" name="s" id="s" />
											</div>
											<div class="form submit">
												<button type="submit" class="search-submit" id="searchsubmit" value="" >
													<span class="sr-only">Submit search</span>
												</button>
											</div>
										</form>
									</div>
									
								<!-- </div> -->
							</div>
						</div>
					</div>
				</div>
				<div class="copy-bar">
					<div class="container">
							<div class="row">
								<div class="columns-12">
										<p class="copyright">Copyright &copy; <?php date('Y') ?> Hardy County CVB.  All rights reserved.</p> 
										<p class="signature">Site By <a href="http://meshfresh.com" target="_blank">MESH</a></p>
								</div>
							</div>
						</div>
				</div>
			<!-- </div> -->
		<!-- </div>
	</div> -->

</footer><!-- End of Footer -->

<?php wp_footer(); ?>

</body>
</html>
