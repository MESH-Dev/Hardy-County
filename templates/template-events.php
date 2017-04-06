<?php 
/* Template Name: Events Template*/

get_header(); 

?>

<main id="content">
	<?php get_template_part('partials/banner-interior')?>
	<div class="container">
		<?php get_template_part('partials/intro-statement'); ?>
		<div class="row">
			<div class="columns-12">
				<div class="events_heading">
					
					<nav id="monthselectors">
						<div class="wrap">
						<ul>

						<?php 
							//Query only to pull the months available via Event posts
							$today=date('Ymd');
							$currMonth = date('m');
							$currYear = date('Y');
							$month_args = array(
								'post_type' => 'event',
								'posts_per_page' => '-1',
								'orderby'=>'meta_value_num',
								'order'=>'ASC',
								'meta_key'=>'start_date',
								// 'date_query'=>array(
								// 		'month'=>'12',
								// 	),
								'meta_query' => array(
										array(
												'key'=>'start_date',
												'compare'=>'>=',
												'value'=>$today,
											)
									)
							);

							$curr_label = '';
							$month_query = new WP_Query( $month_args );

							if ($month_query->have_posts()){
								//Declare month array ($month_arr) to house the months found in the query
								$month_arr= array();
								while($month_query->have_posts()) { $month_query->the_post();
									$start_date = get_field('start_date', false, false);
		 							$end_date = get_field('end_date', false, false);
									$s_date = new DateTime($start_date);
									$e_date = new DateTime($end_date);
									$event_month = $s_date->format('m');
									$event_year = $s_date->format('Y');
									$event_month_text = $s_date->format('M');
									//Add each instance of a month to the array
									$month_arr[] = (string)strtolower($event_month_text);
									//var_dump($month_arr);
								} } wp_reset_postdata();
						?>
						<?php 

							$months = date('m');
							//var_dump($months);
							$list_month = date('M');
							$list_string = (string)strtolower($list_month);
							//var_dump($list_string);
							$list_year = date("Y");
							//var_dump($list_year);
							$list_year = date("Y");
						
							$i=1;

							//Loop creates 12 month span of date elements
							while($i < 13){

								//If this is the first loop, pull the current month, based on server time
								//And create an <li> with our information
								if($i == 1){ ?>
								<li <?php if (!in_array($list_string, $month_arr)){ echo 'class="disabled"';}?>>
									<?php if (in_array($list_string, $month_arr)){ ?>
									<a href="#<?php echo strtolower($list_month); ?>" class="monthscrolltrigger first">
									<?php } ?>
											<div class="single_month">
												<p><?php echo $list_month; ?> <?php //echo $i; ?></p>
												<p class="arrow_indicator">&#10165;</p>
											</div>
									<?php if (in_array($list_string, $month_arr)){ ?>
									</a>
									<?php } ?>
								</li>
							<?php  
								//If we are in loops 2-12
								//iterate over the months in this period, based on the current month from server
								}elseif( $i > 1 && $i < 13 ){
								$month_string = (string)$list_month;
								$ly_string = (string)$list_year;
								$month_text = new DateTime($month_string);
								$lm_string=(string)$months;
								$lm_string=$lm_string+1;
								$abbr = strtolower(date('M', strtotime('+'.($i+2).' Month', $lm_string)));
								//var_dump($abbr);
								
								?>
								<li <?php if (!in_array($abbr, $month_arr, TRUE)){ echo 'class="disabled"'; }?>>
									<?php if (in_array($abbr, $month_arr, TRUE)){ ?>
									<a href="#<?php echo strtolower(date('M', strtotime('+'.($i+2).' Month', $lm_string))); ?>" class="monthscrolltrigger next">
									<?php } ?>
										<div class="single_month">
											<p><?php echo date('M', strtotime("+".($i+2)." Month", $lm_string)); ?></p>
											<p class="arrow_indicator">&#10165;</p>
										</div>
									<?php if (in_array($abbr, $month_arr, TRUE)){ ?>
									</a> 
									<?php } ?>
								</li>
						<?php }
							//If we have looped through 13 times (greater than months in year)
							//reset our count control to 1, and stop
							elseif($i >= 13){ $i=1;
								break;
								?>
						
						<?php  } //end if
								$i++;} //end for

						?>
						</ul>
					</div>
					</nav>
				</div>
			</div><!-- end columns-12 -->
		</div> <!-- end row -->
		<div class="event-listing row">
				<?php 
					$today=date('Ymd');
					$currMonth = date('m');
					$currYear = date('Y');
					$args = array(
						'post_type' => 'event',
						'posts_per_page' => '-1',
						'orderby'=>'meta_value_num',
						'order'=>'ASC',
						'meta_key'=>'start_date',
						// 'date_query'=>array(
						// 		'month'=>'12',
						// 	),
						'meta_query' => array(
								array(
										'key'=>'start_date',
										'compare'=>'>=',
										'value'=>$today,
									)
							)
					);

					$curr_label = '';
					$the_query = new WP_Query( $args );

					if ($the_query->have_posts()){
					
						$first_loop = 0; 
						while($the_query->have_posts()) { $the_query->the_post();
							//ACF fields from post
							// $event_city = get_field('city');
							// $event_address = get_field('street_address');
							// $event_site = get_field('web_address');
							// $event_phone = get_field('phone');
							$city = get_field('city', $post->ID);
							$address = get_field('street_address', $post->ID);
							$zip = get_field('zip', $post->ID);
							$site = get_field('web_address', $post->ID);
							$site_text = get_field('web_address_link_text', $post->ID);
							$bare_event_str = preg_replace('#^https?://#', '', $site);
							$phone = get_field('phone_number', $post->ID);
							$hc_event = get_field('hardy_county_event', $post->ID);

							//Date calculations from ACF fields
 							$start_date = get_field('start_date', false, false);
 							$end_date = get_field('end_date', false, false);
							$s_date = new DateTime($start_date);
							$e_date = new DateTime($end_date);
							$event_month = $s_date->format('m');
							$event_year = $s_date->format('Y');
							$event_month_text = $s_date->format('F');
							$event_month_abbr = strtolower($s_date->format('M'));

 							
							if($first_loop == 0){ ?>
								
								<div class="events_month row" id="<?php echo $event_month_abbr; ?>"><h2 class="event-title"><?php echo $event_month_text; //change this to text! ?></h2>
								<?php $first_loop = 1;
							}
							
							if($event_month == $currMonth){ ?>
															<div class="single_event columns-4">
									<div class="date-item">
										<span class="date-wrap">
											<span class="date-info">
												<span class="month"><?php echo $s_date->format('M');?></span>
												<span class="range"><?php echo $s_date->format('d');?></span>
											</span>
											<?php if ($end_date > $start_date){ ?>
												<div class="date-sep"><span>&mdash;</span></div>
												<span class="date-info">
													<span class="month"><?php echo $e_date->format('M');?></span>
													<span class="range"><?php echo $e_date->format('d');?></span>
												</span>
											<?php } ?>
										</span>


									</div>
									<!-- <div class="columns-8"> -->
									<div class="info">
										<h2><?php if ($hc_event == true){ ?><a href="<?php the_permalink(); ?>" target="_self"> <?php } ?><?php the_title(); ?><?php if ($hc_event == true){ ?></a> <?php } ?></h2>
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
										?></p>
									</div>
									<!-- </div> -->
								</div>
						<?php 	
							}
							else{
								echo "</div>";
								$currMonth = $event_month;?>
								<div class="events_month row" id="<?php echo $event_month_abbr;  ?>">
									<h2 class="event-title"><?php echo $event_month_text; //change this to text! ?></h2>
								<div class="single_event columns-4">
									<div class="date-item">
										<span class="date-wrap">
											<span class="date-info">
												<span class="month"><?php echo $s_date->format('M');?></span>
												<span class="range"><?php echo $s_date->format('d');?></span>
											</span>
											<?php if ($end_date > $start_date){ ?>
												<div class="date-sep"><span>&mdash;</span></div>
												<span class="date-info">
													<span class="month"><?php echo $e_date->format('M');?></span>
													<span class="range"><?php echo $e_date->format('d');?></span>
												</span>
											<?php } ?>
										</span>
									</div>
									<!-- <div class="columns-8"> -->
									<div class="info">
										<h2><?php if ($hc_event == true){ ?><a href="<?php the_permalink(); ?>" target="_self"> <?php } ?><?php the_title(); ?><?php if ($hc_event == true){ ?></a> <?php } ?></h2>
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
									</div>
									<!-- </div> -->
								</div>
						<?php } ?>
 
	 

				<?php } } wp_reset_postdata(); ?>
				</div><!-- end row -->
				
		</div><!-- end event-listing -->
				<div class="events_cta">
					<div class="widebutton aquamarine">
						<div class="button_text">
							<h6>Have an event that you want to tell people about? Fill out a form to get your post out there for people to attend.</h6>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>/submit-an-event">
								<h5>Share it with us! &#10165;</h5>
							</a>
						</div>
					</div> <!-- end widebutton aquamarine -->
				</div><!-- end events cta -->

				<?php 
				//Add Cross promotional partial
				get_template_part('partials/cross-promo'); ?>
		
		</div>
	</div>

</main><!-- End of Content -->

<?php
// $people = array("Peter", "Joe", "Glenn", "Cleveland");
// var_dump($people);

// if (in_array("Glenn", $people))
//   {
//   echo "Match found";
//   }
// else
//   {
//   echo "Match not found";
//   }
?>

<?php get_footer(); ?>
