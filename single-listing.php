<?php get_header(); ?>

<main id="content">
	<?php get_template_part('partials/banner-interior')?>
	
	<div class="container body-content">
		<div class="row">
			<div class="columns-7 body-copy">

					<?php 
						$page_intro = get_field('page_intro_text');
						if ($page_intro != ''){?>
						<h1 class="page-intro"><?php echo $page_intro; ?></h1>
					<?php } ?>

					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
						<?php the_content(); ?>
					<?php endwhile; ?>

				
			</div>

			<?php get_template_part('partials/side-bar')?>

		</div>
	</div>

</main><!-- End of Content -->

<?php get_footer(); ?>
