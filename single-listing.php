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
						<h2>Location</h2>
						<?php 
						$city = get_field('city', $post->ID);
						$address = get_field('street_address', $post->ID);
						$zip = get_field('zip', $post->ID);
						$site = get_field('web_address', $post->ID);
						$phone = get_field('phone_number', $post->ID);
						?>
						<p class="loc">
									<?php 
										
										if($address != ''){
											echo $address;
											echo '</br>';
										}
										if($city != ''){
											echo $city;
											echo ' ';
										}
										if($zip != ''){
											echo $zip;
											echo '</br>';
										}
										if($site != ''){?>
											<a href="<?php echo $site; ?>" target="_blank"><?php echo $site; ?></a>
										<?php }
										if ($phone != ''){
											echo '| <span class="phone">'.$phone.'</span>';
										}
										?>
						</p>

						<?php the_content(); ?>

					<?php endwhile; ?>

				
			</div>

			<?php get_template_part('partials/side-bar')?>

		</div>
	</div>

</main><!-- End of Content -->

<?php get_footer(); ?>
