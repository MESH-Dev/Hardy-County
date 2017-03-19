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

							$months = date('m');
							//var_dump($months);
							$list_month = date('M');
							$list_year = date("Y");
							//var_dump($list_year);
							$list_year = date("Y");
							//$date = date();
							// $today = date('F j Y');
							// $today_string = new DateTime($today);
							//echo $today_string;
							$lm_string=(string)$months;
							//$ly_string = (string)$list_year;
							//var_dump($ly_string);
							//$plus_year = strtotime("+12 Month", $ly_string); 
							//var_dump($plus_year);
							//var_dump($months);

							//$month_list_item = $currMonth;
							//$list_full = $month_list_item->format('M');
							//$m_cnt=0;
							//$loop = 0;
							$i=1;
							while($i < 13){
								//$i++;
								if($i == 1){ ?>
								<li>
									<a href="#<?php echo strtolower($list_month); ?>" class="monthscrolltrigger first">
											<div class="single_month">
												<p><?php echo $list_month; ?> <?php //echo $i; ?></p>
												<p class="arrow_indicator">&#10165;</p>
											</div>
									</a>
								</li>
							<?php  }elseif( $i > 1 && $i < 13 ){
								$month_string = (string)$list_month;
								//$lm_string++;
								//$single_month = date('M', strtotime())
								$ly_string = (string)$list_year;
								$month_text = new DateTime($month_string);
								//var_dump($month_text);
							//if($loop==0){
								?>
								<li>
									<a href="#<?php echo strtolower(date('M', strtotime('+'.($i+1).' Month', $lm_string))); ?>" class="monthscrolltrigger next">
										<div class="single_month">
											<p><?php echo date('M', strtotime("+".($i+1)." Month", $lm_string)); ?></p>
											<p class="arrow_indicator">&#10165;</p>
										</div>
									</a> 
								</li>
						<?php }elseif($i >= 13){ $i=1;
							// $loop=1;
							// }else{
								//$currMonth=$currMonth+1;
								// var_dump($currMonth);
								// for($currMonth; $currMonth < 13; $currMonth++){
									//$currMonth++;
								?>
							<!-- <a href="#<?php echo $currMonth; ?>" class="monthscrolltrigger next">
							<div class="single_month">
								<p><?php echo $currMonth; ?></p>
								<p class="arrow_indicator">&#10165;</p>
							</div>
						</a> -->
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
					//$da_date = get_field('start_date');
					//var_dump($da_date);
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
							$event_city = get_field('city');
							$event_address = get_field('street_address');
							$event_site = get_field('web_address');
							$event_phone = get_field('phone');
							
							//$s_test = $s_date->format('F');

							// $temp_date = get_post_meta( get_the_ID(), 'start_date', true );
							// $temp_test = new DateTime($temp_date);
							// $temp = $temp_test->format('F');
 
 							$start_date = get_field('start_date', false, false);
 							$end_date = get_field('end_date', false, false);
							$s_date = new DateTime($start_date);
							$e_date = new DateTime($end_date);
							$event_month = $s_date->format('m');
							$event_year = $s_date->format('Y');
							$event_month_text = $s_date->format('F');
							$event_month_abbr = strtolower($s_date->format('M'));
							$city = get_field('city', $post->ID);
							$address = get_field('street_address', $post->ID);
							$zip = get_field('zip', $post->ID);
							$site = get_field('web_address', $post->ID);
							$bare_event_str = preg_replace('#^https?://#', '', $site);
							$phone = get_field('phone_number', $post->ID);
							$hc_event = get_field('hardy_county_event', $post->ID);

							//echo "afoimwaie" . $currMonth;
 							
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
											<a href="<?php echo $site; ?>" target="_blank"><?php echo $bare_event_str; ?></a>
										<?php }
										if ($phone != ''){
											echo '| <span class="phone">'.$phone.'</span>';
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

<?php get_footer(); ?>
