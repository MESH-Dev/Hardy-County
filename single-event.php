<?php get_header(); ?>

<main id="content">
	<?php get_template_part('partials/banner-interior')?>
	
	<div class="container">
		<div class="row">
			<div class="columns-7 event-single">

					<?php 
						//$page_intro = get_field('page_intro_text');
						//if ($page_intro != ''){?>
						<!-- <h1 class="page-intro"><?php echo $page_intro; ?></h1> -->
					<?php //} ?>
					
					<?php 
							$start_date = get_field('start_date', false, false);
 							$end_date = get_field('end_date', false, false);
 							$event_start_time = get_field('start_time');
 							$event_end_time = get_field('end_time');
							$s_date = new DateTime($start_date);
							$e_date = new DateTime($end_date);
							$event_month = $s_date->format('m');
							$event_start_day = $s_date->format('d');
							$event_end_day = $e_date->format('d');
							$event_year = $s_date->format('Y');
							$event_month_text = $s_date->format('F');
							$event_month_abbr = strtolower($s_date->format('M'));
							$city = get_field('city');
							$address = get_field('street_address');
							$zip = get_field('zip');
							$site = get_field('web_address');
							$site_text = get_field('web_address_link_text');
							$bare_event_str = preg_replace('#^https?://#', '', $site);
							$phone = get_field('phone_number');
							$hc_event = get_field('hardy_county_event');
						?>
					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
						<h2 class="event-title"><?php the_title(); ?></h2>
						<p class="event-time"><?php echo $event_month_text; ?> <?php echo $event_start_day; ?><?php if($s_date > $e_date){echo ' &ndash; '.$event_end_day;}?><?php if ($event_start_time !=''){ echo ', '.$event_start_time; }?> <?php if($event_end_time != ''){ echo ' &ndash; '.$event_end_time; }?> </p> 
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
									<a href="<?php echo $site; ?>" target="_blank">
										<?php 
											if ($site_text == ''){
												echo $bare_event_str; 
											}else{
												echo $site_text;
											}
									 	?>
									</a>
								<?php }
								if($site !='' && $phone != ''){
											echo '| ';
										}
								if ($phone != ''){
									echo '<span class="phone">'.$phone.'</span>';
								}
							?>
						</p>
						<h3 class="event-description-title">Description</h3>
						<?php the_content(); ?>
					<?php endwhile; ?>

				
			</div>

			<?php get_template_part('partials/side-bar')?>

		</div>
	</div>

</main><!-- End of Content -->

<?php get_footer(); ?>
