<?php get_header(); ?>

<main id="content">
	<?php get_template_part('partials/banner-interior')?>
	
	<div class="container">
		<div class="row">
			<div class="columns-7 event-single">		
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
									<a class="site" href="<?php echo $site; ?>" target="_blank">
										<?php if (strpos($site, 'facebook')){ ?>
										<i class="fa fa-fw fa-facebook-official"></i>
										<?php }elseif(strpos($site, 'pdf')){
											if($site_text !=''){
											echo $site_text; 
											}else{
												echo 'View PDF';
											}
											?>
										<i class="fa fa-fw fa-file-text"></i>
										<?php }else{ 
										if ($site_text == ''){
											echo $domain; 
										}else{
											echo $site_text;
										}
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
						<?php if (get_the_content() != ''){ ?>
						<h3 class="event-description-title">Description</h3>
						<?php the_content(); ?>
						<?php } ?>
					<?php endwhile; ?>

				
			</div>

			<?php get_template_part('partials/side-bar')?>

		</div>
	</div>

</main><!-- End of Content -->

<?php get_footer(); ?>
