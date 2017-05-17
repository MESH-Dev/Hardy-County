<?php get_header(); ?>
<?php get_template_part('partials/banner-interior')?>
<main id="content" class="is-404">

	
	
	<div class="container body-content">
		<div class="row">
			<div class="columns-7 body-copy">
				<!-- <h1>Page Not Found</h1> -->
				<h2>The page you requested could not be found. Perhaps searching will help.</h2>
				
				<?php get_template_part('partials/searchform') ?>
			</div>
			<?php get_template_part('partials/side-bar') ?>
		</div>
	</div>

</main><!-- End of Content -->


<?php //get_sidebar(); ?>
<?php get_footer(); ?>