<?php get_header(); ?>

<main id="content">
	<div class="banner interior" style="background-image: url('http://localhost:8888/hardy/wp-content/uploads/2017/02/narrow-banner-placeholder.png');">
		<div class="banner-heading">
			<div class="container">
				<p>Optional Parent Page</p>
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

					<h1><?php the_title(); ?></h1>

				<?php endwhile; ?>	
			</div>		
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="columns-9">
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

					<?php the_content(); ?>

				<?php endwhile; ?>
			</div>

			<div class="columns-3">

				<!-- Change this to repeater of custom fields -->

				<?php get_sidebar(); ?>
			</div>

		</div>
	</div>

</main><!-- End of Content -->

<?php get_footer(); ?>
