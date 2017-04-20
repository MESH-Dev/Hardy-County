<footer class="site-footer">
	<div class="top-bar">
		<div class="container">
			<div class="row">
				<!-- <div class="columns-12"> -->
					<div class="footer-logo columns-1">
						<img src="<?php bloginfo('template_directory'); ?>/img/logo-footer.png" aria-hidden="true">
					</div>
					<div class="signup columns-6">
						<div class="row">
						<?php echo do_shortcode('[mc4wp_form id="29"]'); ?>
						</div>
						<p class="mail-statement row">
							Stay in the loop with the occasional email update.<br>
							We promise not to overload you inbox and your email is confidential.
						</p>
					</div>
					<div class="search columns-4 offset-by-1">
						<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
							<div class="form input">
								<label for="searchHeader" class="sr-only">Search the site</label>
								<input id="searchHeader" name="searchHeader" class="hide" type="text" placeholder="Search the site..." value="<?php the_search_query(); ?>" name="s" id="s" />
								<div class="focus-bg"></div>
								<button type="submit" class="form submit search-submit" id="searchsubmit" value="" >
									<span class="sr-only">Submit search</span>
								</button>			
							</div>
						</form>
						<div class="cta brochure">
							<?php $brochure_link = get_field('brochure_link', 'options'); ?>
							<a class="cta-link white" href="<?php echo $brochure_link; ?>" target="_blank" rel="Visit Brochure">Download a visitors guide brochure &#10165;</a>
						</div>
						
					</div>
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

</footer><!-- End of Footer -->

<?php wp_footer(); ?>

<?php if(is_page_template('templates/template-listing.php')){?>
 <script async src="<?php echo get_template_directory_uri() ?>/js/listings.js"></script>
<?php } ?>
<?php if(is_page_template('templates/template-map-full.php')){?>
	<script async src="<?php echo get_template_directory_uri() ?>/js/map.js"></script>
<?php } ?>

<?php if(is_page_template('templates/template-listing.php') || is_page_template('templates/template-map-full.php')){?>
<!-- <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script> -->

 <script src="//maps.googleapis.com/maps/api/js?key=AIzaSyCpTB55GXBBqmS_nEt_XH_HKGf_mSTQUY8&amp;callback=initMap"></script>
 
<?php } ?>

</body>
</html>
