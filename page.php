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
	<div class="container body-content">
		<div class="row">
			<div class="columns-7 body-copy">
				<h2>H2 Sub-Title Style</h2>

				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

					<?php the_content(); ?>

				<?php endwhile; ?>
			</div>

			<div class="columns-4 sidebar">
				<figure class="">
					<img src="/wp-content/uploads/2017/01/secondary-cta-placeholder.png">		
				</figure>
				<div class="info">
					<h2>Item Title Style</h2>
					<p>Description style for the item listed.</p>				
					<p><a href="">linktowebsite.com</a> | 304.530.0280</p>
					<div class="linksection">
						<p><a href="">Link to Download PDF &#10165;</a></p>
						<p><a href="">Link Style to another section on the site &#10165;</a></p>
					</div>
				</div>				
				<!-- Change this to repeater of custom fields -->
				<figure class="">
					<img src="/wp-content/uploads/2017/01/primary-cta-placeholder2.png">
					<figcaption>
						<p>Paragraph</p>
						<h2>Heading 2</h2>
					</figcaption>		
				</figure>
				
			</div>

		</div>
	</div>

</main><!-- End of Content -->

<?php get_footer(); ?>
