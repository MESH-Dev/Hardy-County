<?php get_header(); ?>

<main id="content">
	<?php get_template_part('partials/banner-interior')?>
	
	<div class="container body-content">
		<div class="row">
			<div class="columns-7 body-copy shaun">

					<?php 
						$page_intro = get_field('page_intro_text');
						if ($page_intro != ''){?>
						<h1 class="page-intro"><?php echo $page_intro; ?></h1>
					<?php } ?>
					
					<?php 
							$start_date = get_field('start_date', false, false);
 							$end_date = get_field('end_date', false, false);
							$s_date = new DateTime($start_date);
							$e_date = new DateTime($end_date);
							$event_month = $s_date->format('m');
							$event_year = $s_date->format('Y');
							$event_month_text = $s_date->format('F');
							$event_month_abbr = strtolower($s_date->format('M'));
							$city = get_field('city', $post->ID);
							$address = get_field('street_address');
							$zip = get_field('zip', $post->ID);
							$site = get_field('web_address');
							$bare_event_str = preg_replace('#^https?://#', '', $site);
							$phone = get_field('phone_number');
							$hc_event = get_field('hardy_county_event');
						?>
					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

						<?php the_content(); ?>
						<p>
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
									<a href="<?php echo $site; ?>" target="_blank"><?php echo $bare_event_str; ?></a>
								<?php }
								if ($phone != ''){
									echo '| <span class="phone">'.$phone.'</span>';
								}
							?>
						</p>
					<?php endwhile; ?>

				
			</div>

			<?php get_template_part('partials/side-bar')?>

		</div>
	</div>

</main><!-- End of Content -->

<?php get_footer(); ?>
