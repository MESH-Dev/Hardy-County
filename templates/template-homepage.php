<?php 
/* Template Name: Homepage */

get_header(); 

?>

<main id="content">
	<?php 
		$lp_banner=get_field('lp_banner');
		$lp_banner_url=$lp_banner['sizes']['short-banner'];
		$lp_banner_alt=$lp_banner['alt'];
		$banner_intro_text=get_field('banner_intro_text');
		$banner_intro_statement=get_field('banner_intro_statement');
		$banner_intro_cta=get_field('banner_intro_cta');
		?>
	<div class="banner large has-parallax" style="background-image:url('<?php echo $lp_banner_url; ?>')">
		<div class="overlay" aria-hidden="true"></div>
		
		<div class="banner-content">
			<div class="container">
				<div class="text">
					<h1><?php echo $banner_intro_text; ?></h1>
					<h2><?php echo $banner_intro_statement; ?><br>
					<span class="banner-cta"><?php echo $banner_intro_cta; ?></span></h2>
				</div>
				<div class="wv-logo">
					<img src="<?php bloginfo('template_directory'); ?>/img/logo-color-white.png" alt="Wild, Wonderful, West Virginia">
				</div>
			</div>
		</div>
	</div>


	<?php 
	//Call the Intro Statement partial 
	get_template_part('partials/intro-statement'); 
	?>

	<div class="container">
		<div class="row">
			<div class="home-grid grid" id="packery"><!-- macy --><!-- masonry --><!-- macy -->

						<?php //Row 1 ?>

						<!-- Event Block 1 -->

						<?php 

							//Setup our query, based on the query we used on /events
							$today=date('Ymd');
							$currMonth = date('m');
							$currYear = date('Y');
							$args = array(
								'post_type' => 'event',
								'posts_per_page' => '3',
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

							//$curr_label = '';
							$event_query = new WP_Query( $args );
							$events = $event_query->posts;
							$event_ID_1 = $events[0]->ID;
							$event_ID_2 = $events[1]->ID;
							$event_ID_3 = $events[2]->ID;

							$event_city = get_field('city', $event_ID_1);
							$event_address = get_field('street_address', $event_ID_1);
							$event_site = get_field('web_address', $event_ID_1);
							$event_site_text = get_field('web_address_link_text', $event_ID_1);
							$bare_event_str = preg_replace('#^https?://#', '', $event_site);
							//$event_site_text substr($event_site, )
							$event_phone = get_field('phone', $event_ID_1);
							
							//$s_test = $s_date->format('F');

							// $temp_date = get_post_meta( get_the_ID(), 'start_date', true );
							// $temp_test = new DateTime($temp_date);
							// $temp = $temp_test->format('F');
 
 							$start_date = get_field('start_date', $event_ID_1, false, false);
 							$end_date = get_field('end_date', $event_ID_1, false, false);
							$s_date = new DateTime($start_date);
							$e_date = new DateTime($end_date);
							$event_month = $s_date->format('m');
							$event_year = $s_date->format('Y');
							$event_month_text = $s_date->format('F');
							$event_month_abbr = strtolower($s_date->format('M'));
							wp_reset_postdata();

							?>
						<a href="<?php echo the_permalink($event_ID_1); ?>">
							<div class="hg grid-item grid-item-width3 event no-padding">
								<div class="date date-wrap">
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
								</div>
								<div class="info">
									<p>Upcoming Event</p>
									<h2><?php echo get_the_title($event_ID_1); ?></h2>
									<div class="reveal">
										<p><?php echo $event_address; ?> <?php //if ($event_site != ''){?><!-- |  <a href="<?php //echo $event_site; ?>" target="_blank"><?php //echo $bare_event_str; ?>  </a>--><?php //} ?></p>
										<h6>Learn More &#10165;</h6>
									</div>
								</div>
							</div>
						</a>
						<!-- Secondary CTA block 1 -->
						<?php $secondary_row = get_field('secondary_cta_blocks');

							//Setup arraw items for each Secondary CTA Block
							//Each Primary block will begin with if (${row number}_secondary_row)
							$first_secondary_row = $secondary_row[0];
							$second_secondary_row = $secondary_row[1];
							$third_secondary_row = $secondary_row[2];
							$fourth_secondary_row = $secondary_row[3];
							$fifth_secondary_row = $secondary_row[4];
							$sixth_secondary_row = $secondary_row[5];
							$seventh_secondary_row = $secondary_row[6];

							if($first_secondary_row){

								//Declare sub_fields for this row
								$secondary_row_bg = $first_secondary_row['background_image'];
								//var_dump($secondary_row_bg);
								$secondary_row_bg_url = $secondary_row_bg['sizes']['medium'];
								$secondary_row_bg_alt = $secondary_row_bg['alt'];

								//__This section sets up the post_object for the 'section_title' subfield
								$s_post_link = $first_secondary_row['section_title'];
								$s_post_1 = $s_post_link;
								//var_dump($s_post_1);
								setup_postdata($s_post_1);

								//__This section queries the title of the post parent for the page chosen in the 'section_title' field
								$s_parent_post_id = $s_post_1->post_parent;
							    $s_parent_post = get_post($s_parent_post_id);
							    $s_parent_post_title = $s_parent_post->post_title;

						?>
						<a href="<?php echo the_permalink($s_post_1->ID); ?>">
							<figure class="hg grid-item grid-item-width3 secondary no-padding">
								<img alt="<?php echo $secondary_row_bg_alt; ?>" src="<?php echo $secondary_row_bg_url; ?>">
								<figcaption>
									<p><?php echo $s_parent_post_title; ?></p>
									<h2><?php echo $s_post_1->post_title; ?></h2>
								</figcaption>
							</figure>
						</a>
						<?php wp_reset_postdata(); } ?>
					
						<!-- Primary CTA block 1 -->

						<?php $primary_row = get_field('primary_cta_blocks');
						
								//Setup array location for each row
								//__Each Primary block will begin with if (${row number}_primary_row)
								$first_primary_row = $primary_row[0];
								$second_primary_row = $primary_row[1];
								$third_primary_row = $primary_row[2];
								$fourth_primary_row = $primary_row[3];
								$fifth_primary_row = $primary_row[4];

							if($first_primary_row){

								//Declare sub_fields for this row
								$primary_row_bg = $first_primary_row['background_image'];
								$primary_row_url = $primary_row_bg['sizes']['large'];
								$primary_row_alt = $primary_row_bg['alt'];
								$hover = $first_primary_row['hover_text'];

								//__This section sets up the post_object for the 'section_title' subfield
								$post_link=$first_primary_row['section_title'];
								$post_1 = $post_link;
								setup_postdata( $post_1 );
						?>

						<!-- Primary Block 1 -->
						<a href="<?php echo the_permalink($post_1->ID); ?>">
							<figure class="hg grid-item grid-item-width4 primary no-padding" style="background-image:url('<?php echo $primary_row_url; ?>');">
								<!-- columns-4 -->
								<img alt="<?php echo $primary_row_alt; ?>" src="<?php echo $primary_row_url; ?>" alt=""/>
								<figcaption>
									<h1><?php echo $post_1->post_title; ?></h1>
									<!--Hover Content?-->
									<p><?php echo $hover; ?><br><span>&#10165;</span></p>
									<!-- <h2><?php //echo $parent_post_title ?></h2> -->
									
								</figcaption>
							</figure>
						</a>
						<?php wp_reset_postdata(); } ?>

						<div class="hg grid-item grid-item-width2 weather weather-api no-padding">
							<div class="wrap">
								<?php 
									//Get info from our Weather plugin, and display it here
									//Edit shortcode through the options page
									//Uses WP Cloudy plugin

									$weather = get_field('weather_shortcode', 'options');
									echo do_shortcode(''.$weather.'');
								?>
							</div>
						</div>

						<?php //Setup Instagram look at helpers/instagram.php with questions

						$instagram = getInstagram();
						//var_dump($instagram);
						?>

						<!-- Instagram Block 1 -->

						<a href="<?php echo $instagram[2]->link; ?>" target="_blank">
							<div class="hg grid-item grid-item-width2 instagram no-padding"style="background-image:url('<?php echo $instagram[2]->images->low_resolution->url; ?>');">
								<div class="instagram-icon">
									<i class="fa fa-fw fa-instagram fa-2x"></i>
								</div>
							</div>
						</a>
						<?php //End Row 1::Start Row 2 ?>

						<!-- Secondary CTA block 2 -->
						<?php if($second_secondary_row){

								//Declare sub_fields for this row
								$secondary_row_bg = $second_secondary_row['background_image'];
								$secondary_row_bg_url_2 = $secondary_row_bg['sizes']['medium'];
								$secondary_row_bg_alt = $secondary_row_bg['alt'];

								//__This section sets up the post_object for the 'section_title' subfield
								$s2_post_link = $second_secondary_row['section_title'];
								$s_post_2 = $s2_post_link;
								setup_postdata($s_post_2);

								//__This section queries the title of the post parent for the page chosen in the 'section_title' field
								$s2_parent_post_id = $s_post_2->post_parent;
							    $s2_parent_post = get_post($s2_parent_post_id);
							    $s2_parent_post_title = $s2_parent_post->post_title;

						?>
						<a href="<?php echo the_permalink($s_post_2->ID); ?>">
							<figure class="hg grid-item grid-item-width3 secondary no-padding">
								<img alt="<?php echo $secondary_row_bg_alt; ?>" src="<?php echo $secondary_row_bg_url_2; ?>">
								<figcaption>
									<p><?php echo $s2_parent_post_title; ?></p>
									<h2><?php echo $s_post_2->post_title; ?></h2>
								</figcaption>	
							</figure>
						</a>
						<?php wp_reset_postdata(); } ?>

						<!-- Secondary CTA block 3 -->

						<?php if($third_secondary_row){

								//Declare sub_fields for this row
								$secondary_row_bg_3 = $third_secondary_row['background_image'];
								$secondary_row_bg_url = $secondary_row_bg['sizes']['large'];
								$secondary_row_bg_alt = $secondary_row_bg['alt'];

								//__This section sets up the post_object for the 'section_title' subfield
								$s3_post_link = $third_secondary_row['section_title'];
								$s_post_3 = $s3_post_link;
								//var_dump($s_post_1);
								setup_postdata($s_post_3);

								//__This section queries the title of the post parent for the page chosen in the 'section_title' field
								$s_parent_post_id = $s_post_3->post_parent;
							    $s_parent_post = get_post($s_parent_post_id);
							    $s_parent_post_title = $s_parent_post->post_title;

						?>
						<a href="<?php echo the_permalink($s_post_3->ID); ?>">
							<figure class="hg grid-item grid-item-width3 secondary no-padding">
								<img alt="<?php echo $secondary_row_bg_alt; ?>" src="<?php echo $secondary_row_bg_url; ?>">
								<figcaption>
									<p><?php echo $s_parent_post_title; ?></p>
									<h2><?php echo $s_post_3->post_title; ?></h2>
								</figcaption>	
							</figure>
						</a>
						
						<?php wp_reset_postdata(); } ?>
						
						<!-- Event Block 2 -->
						<?php $event_city = get_field('city', $event_ID_2);
							$event_address = get_field('street_address', $event_ID_2);
							$event_site = get_field('web_address', $event_ID_2);
							$event_site_text = get_field('web_address_link_text', $event_ID_2);
							//$event_site_text substr($event_site, )
							$event_phone = get_field('phone', $event_ID_2);
							
							//$s_test = $s_date->format('F');

							// $temp_date = get_post_meta( get_the_ID(), 'start_date', true );
							// $temp_test = new DateTime($temp_date);
							// $temp = $temp_test->format('F');
 
 							$start_date = get_field('start_date', $event_ID_2, false, false);
 							$end_date = get_field('end_date', $event_ID_2, false, false);
							$s_date = new DateTime($start_date);
							$e_date = new DateTime($end_date);?>
						<a href="<?php echo the_permalink($event_ID_2); ?>">
							<div class="hg grid-item grid-item-width3 event no-padding">
								<div class="date date-wrap">
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
								</div>
								<div class="info">
									<p>Upcoming Event</p>
									<h2><?php echo get_the_title($event_ID_2); ?></h2>
									<div class="reveal">
										<p><?php echo $event_address; ?> <?php //if ($event_site != ''){?><!-- |  <a href="<?php //echo $event_site; ?>" target="_blank"><?php //echo $event_site; ?>  </a>--><?php //} ?></p>
										<h6>Learn More &#10165;</h6>
									</div>
								</div>
							</div>
						</a>
						<!-- Primary CTA Block 2 -->

						<?php 

						if($second_primary_row){

							//Declare sub_fields for this row
							$primary_row_bg = $second_primary_row['background_image'];
							$primary_row_url = $primary_row_bg['sizes']['large'];
							$primary_row_alt = $primary_row_bg['alt'];
							$hover = $second_primary_row['hover_text'];

							//__This section sets up the post_object for the 'section_title' subfield
							$post_link=$second_primary_row['section_title'];
							$post_2 = $post_link;
							setup_postdata( $post_2 );

						?>
						<a href="<?php echo the_permalink($post_2->ID); ?>">
							<figure class="hg grid-item grid-item-width3 primary no-padding">
								<!-- columns-4 -->
								<img alt="<?php echo $primary_row_alt; ?>" src="<?php echo $primary_row_url; ?>" alt=""/>
								<figcaption>
									<h1><?php echo $post_2->post_title; ?></h1>
									<!-- Hover? -->
									<p><?php echo $hover; ?><br><span>&#10165;</span></p>
									<!-- <h2><?php //echo $parent_post_title ?></h2> -->
									
								</figcaption>
							</figure>						
						</a>
						<?php wp_reset_postdata(); } ?>

						<?php //End Row 2::Start Row 3 ?>

						<!-- Primary CTA Block 3 -->

						<?php 

						if($third_primary_row){

							//Declare sub_fields for this row
							$primary_row_bg = $third_primary_row['background_image'];
							$primary_row_url = $primary_row_bg['sizes']['large'];
							$primary_row_alt = $primary_row_bg['alt'];
							$hover = $third_primary_row['hover_text'];

							//__This section sets up the post_object for the 'section_title' subfield
							$post_link=$third_primary_row['section_title'];
							$post_3 = $post_link;
							setup_postdata( $post_3 );

						?>
						<a href="<?php echo the_permalink($post_1->ID); ?>">
							<figure class="hg grid-item grid-item-width6 primary no-padding">
								<img alt="<?php echo $primary_row_alt; ?>"src="<?php echo $primary_row_url; ?>">
								<h1><?php echo $post_3->post_title; ?></h1>
								<!--Hover?-->
								<p><?php echo $hover; ?><br><span>&#10165;</span></p>
								<div class="width6-diamond"></div>
							</figure>
						</a>
						<?php wp_reset_postdata(); } ?>

						<div class="hg grid-item grid-item-width2 nest">

							<!-- Instagram Block 2 -->
							<a href="<?php echo $instagram[3]->link; ?>" target="_blank">
								<div class="hg nested instagram no-padding" style="background-image:url('<?php echo $instagram[3]->images->low_resolution->url; ?>');">
									<div class="instagram-icon">
										<i class="fa fa-fw fa-instagram fa-2x"></i>
									</div>
								</div>
							</a>
							<!-- Secondary CTA block 4 - Small -->

							<?php if($fourth_secondary_row){

								//Declare sub_fields for this row
								$secondary_row_bg = $fourth_secondary_row['background_image'];
								$secondary_row_bg_url = $secondary_row_bg['sizes']['large'];
								$secondary_row_bg_alt = $secondary_row_bg['alt'];

								//__This section sets up the post_object for the 'section_title' subfield
								$s4_post_link = $fourth_secondary_row['section_title'];

								//__This section tests whether the 'section_title' field has
								//__been populated. If not, we don't want to bother with declaring these variables
								//__so that we don't get any errors.
								//__**Only applies to Secondary blocks 4, 6, 7

								if($s4_post_link != null ){
									$s_post_4 = $s4_post_link;
									//var_dump($s_post_1);
									setup_postdata($s_post_4);

									//__This section queries the title of the post parent for the page chosen in the 'section_title' field
									$s_parent_post_id = $s_post_4->post_parent;
								    $s_parent_post = get_post($s_parent_post_id);
								    $s_parent_post_title = $s_parent_post->post_title;
								}

							?>
							<?php if ($s4_post_link != null ){ ?>
							<a href="<?php echo the_permalink($s_post_4->ID); ?>">
							<?php } ?>
								<figure class="hg nested secondary no-padding <?php if ($s_post_link == null ){ echo 'no-hover'; }?>">
									<img alt="<?php $secondary_row_bg_alt; ?>" src="<?php echo $secondary_row_bg_url; ?>">
									<?php 
									//Don't render this stuff if we aren't passing any of the variables above
									if ($s_post_link != null){ 
									?>

									<figcaption>
										<p><?php echo $s_parent_post_title; ?></p>
										<h2><?php echo $s_post_1->post_title; ?></h2>
									</figcaption>	

									<?php } ?>

								</figure>
							<?php if ($s4_post_link != null ){ ?>
							</a>
							<?php } ?>
							<?php wp_reset_postdata(); } ?>

						</div>
						
						<!-- Primary Block 4 -->
						
						<?php 

						if($fourth_primary_row){

							//Declare sub_fields for this row
							$primary_row_bg = $fourth_primary_row['background_image'];
							$primary_row_url = $primary_row_bg['sizes']['large'];
							$primary_row_alt = $primary_row_bg['alt'];
							$hover = $fourth_primary_row['hover_text'];

							//__This section sets up the post_object for the 'section_title' subfield
							$post_link=$fourth_primary_row['section_title'];
							$post_4 = $post_link;
							setup_postdata( $post_4 );

						?>
						<a href="<?php echo the_permalink($post_1->ID); ?>">
							<figure class="hg grid-item grid-item-width4 primary no-padding">
								<img alt="<?php echo $primary_row_alt; ?>" src="<?php echo $primary_row_url; ?>" alt=""/>
								<figcaption>
									<h1><?php echo $post_4->post_title; ?></h1>
									<p><?php echo $hover; ?><br><span>&#10165;</span></p>
									<!-- <h2><?php //echo $parent_post_title ?></h2> -->
									
								</figcaption>
							</figure>
						</a>
						<?php wp_reset_postdata(); } ?>


						<?php //End Row 3::Start Row 4 ?>

						<!-- Event Block 3 -->

						<?php $event_city = get_field('city', $event_ID_3);
							$event_address = get_field('street_address', $event_ID_3);
							$event_site = get_field('web_address', $event_ID_3);
							$event_site_text = get_field('web_address_link_text', $event_ID_3);
							//$event_site_text substr($event_site, )
							$event_phone = get_field('phone', $event_ID_3);
							
							//$s_test = $s_date->format('F');

							// $temp_date = get_post_meta( get_the_ID(), 'start_date', true );
							// $temp_test = new DateTime($temp_date);
							// $temp = $temp_test->format('F');
 
 							$start_date = get_field('start_date', $event_ID_3, false, false);
 							$end_date = get_field('end_date', $event_ID_3, false, false);
							$s_date = new DateTime($start_date);
							$e_date = new DateTime($end_date);?>

						<a href="<?php echo the_permalink($event_ID_3); ?>">
							<div class="hg grid-item grid-item-width3 event no-padding">
								<div class="date date-wrap">
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
								</div>
								<div class="info">
									<p>Upcoming Event</p>
									<h2><?php echo get_the_title($event_ID_3); ?></h2>
									<div class="reveal">
										<p><?php echo $event_address; ?> <?php //if ($event_site != ''){?><!-- |  <a href="<?php //echo $event_site; ?>" target="_blank"><?php //echo $event_site; ?>  </a>--><?php //} ?></p>
										<h6 class="learn-more">Learn More &#10165;</h6>
									</div>
								</div>
							</div>
						</a>
						<!-- Secondary CTA Block 5 small -->

						<?php if($fifth_secondary_row){

								//** Note: This block had to be placed "out of order" in the code
								//   for the js library (packery.js) to render in the correct order
								//   visually.

								//Declare sub_fields for this row
								$secondary_row_bg = $fifth_secondary_row['background_image'];
								$secondary_row_bg_url = $secondary_row_bg['sizes']['large'];
								$secondary_row_bg_alt = $secondary_row_bg['alt'];

								//__This section sets up the post_object for the 'section_title' subfield
								$s5_post_link = $fifth_secondary_row['section_title'];
								$s_post_5 = $s5_post_link;
								//var_dump($s_post_1);
								setup_postdata($s_post_5);

								//__This section queries the title of the post parent for the page chosen in the 'section_title' field
								$s_parent_post_id = $s_post_5->post_parent;
							    $s_parent_post = get_post($s_parent_post_id);
							    $s_parent_post_title = $s_parent_post->post_title;

							?>
						
						<a href="<?php echo the_permalink($s_post_1->ID); ?>">
							<figure class="hg grid-item grid-item-width3 secondary no-padding">
								<img alt="<?php echo $secondary_row_bg_alt; ?>" src="<?php echo $secondary_row_bg_url; ?>">
								<?php if ($s_post_5 != ''){ ?>

								<figcaption>
									<p><?php echo $s_parent_post_title; ?></p>
									<h2><?php echo $s_post_5->post_title; ?></h2>
								</figcaption>		

								<?php } ?>
							</figure>
						</a>

						<?php //End Row 4::Start Row 5 ?>

						<?php wp_reset_postdata(); } ?>

						<!-- Primary Block 5 -->

						<?php 

						if($fifth_primary_row){

							//Declare sub_fields for this row
							$primary_row_bg = $fifth_primary_row['background_image'];
							$primary_row_url = $primary_row_bg['sizes']['large'];
							$primary_row_alt = $primary_row_bg['alt'];
							$hover = $fifth_primary_row['hover_text'];

							//__This section sets up the post_object for the 'section_title' subfield
							$post_link=$fifth_primary_row['section_title'];
							$post_5 = $post_link;
							setup_postdata( $post_5 );
						?>
						<a href="<?php echo the_permalink($post_1->ID); ?>">
							<figure class="hg grid-item grid-item-width6 primary no-padding">
								<img alt="<?php echo $primary_row_alt; ?>" src="<?php echo $primary_row_url; ?>">
								<h1><?php echo $post_5->post_title; ?></h1>
								<!--Hover?-->
								<p><?php echo $hover; ?><br><span>&#10165;</span></p>
								<div class="width6-diamond"></div>
							</figure>
						</a>

						<?php wp_reset_postdata(); } ?>

						<!-- Instagram block  3-->
						<a href="<?php echo $instagram[4]->link; ?>" target="_blank">
							<div class="hg grid-item grid-item-width2 instagram no-padding" style="background-image:url('<?php echo $instagram[4]->images->low_resolution->url; ?>');">
								<div class="instagram-icon">
									<i class="fa fa-fw fa-instagram fa-2x"></i>
								</div>
							</div>
						</a>
						<!-- Secondary CTA block 6 - Small -->

						<?php if($sixth_secondary_row){

							//Declare sub_fields for this row
							$secondary_row_bg = $sixth_secondary_row['background_image'];
							$secondary_row_bg_url = $secondary_row_bg['sizes']['large'];
							$secondary_row_bg_alt = $secondary_row_bg['alt'];

							//__This section sets up the post_object for the 'section_title' subfield
							$s6_post_link = $sixth_secondary_row['section_title'];

							//__This section tests whether the 'section_title' field has
							//__been populated. If not, we don't want to bother with declaring these variables
							//__so that we don't get any errors.
							//__**Only applies to Secondary blocks 4, 6, 7
							if($s6_post_link != null ){
								$s_post_6 = $s6_post_link;
								//var_dump($s_post_1);
								setup_postdata($s_post_6);

								//__This section queries the title of the post parent for the page chosen in the 'section_title' field
								$s_parent_post_id = $s_post_6->post_parent;
							    $s_parent_post = get_post($s_parent_post_id);
							    $s_parent_post_title = $s_parent_post->post_title;
							}

						?>
						<?php if ($s6_post_link != null ){ ?>
						<a href="<?php echo the_permalink($s_post_6->ID); ?>">
							<?php } ?>
							<figure class="hg grid-item grid-item-width2 secondary no-padding <?php if ($s6_post_link == null ){ echo 'no-hover'; }?>">
								<img alt="<?php echo $secondary_row_bg_alt; ?>"src="<?php echo $secondary_row_bg_url; ?>">
								<?php 
								//Don't render this stuff if we aren't passing any of the variables above
								if ($s6_post_link != null){ 
								?>

								<figcaption>
									<p><?php echo $s_parent_post_title; ?></p>
									<h2><?php echo $s_post_1->post_title; ?></h2>
								</figcaption>	

								<?php } ?>
							</figure>
						</a>
						<?php wp_reset_postdata(); } ?>

						<!-- Secondary CTA block 7 - Small -->

						<?php if($seventh_secondary_row){

							//Declare sub_fields for this row
							$secondary_row_bg = $seventh_secondary_row['background_image'];
							$secondary_row_bg_url = $secondary_row_bg['sizes']['large'];
							$secondary_row_bg_alt = $secondary_row_bg['alt'];

							
							//__This section sets up the post_object for the 'section_title' subfield
							$s7_post_link = $seventh_secondary_row['section_title'];


							//__This section tests whether the 'section_title' field has
							//__been populated. If not, we don't want to bother with declaring these variables
							//__so that we don't get any errors.
							//__**Only applies to Secondary blocks 4, 6, 7

							if($s7_post_link != null ){
								$s_post_7 = $s7_post_link;
								//var_dump($s_post_1);
								setup_postdata($s_post_7);

								//__This section queries the title of the post parent for the page chosen in the 'section_title' field
								$s_parent_post_id = $s_post_7->post_parent;
							    $s_parent_post = get_post($s_parent_post_id);
							    $s_parent_post_title = $s_parent_post->post_title;
							}
						?>
						<?php if ($s7_post_link != null ){ ?>
						<a href="<?php echo the_permalink($s_post_7->ID); ?>">
						<?php } ?>
							<figure class="hg grid-item grid-item-width2 secondary no-padding <?php if ($s7_post_link == null ){ echo 'no-hover'; }?> ">
								<img alt="<?php echo $secondary_row_bg_alt; ?>" src="<?php echo $secondary_row_bg_url; ?>">
								<?php 
								//Don't render this stuff if we aren't passing any of the variables above
								if ($s7_post_link != null ){ 
								?>

								<figcaption>
									<p><?php echo $s_parent_post_title; ?></p>
									<h2><?php echo $s_post_7->post_title; ?></h2>
								</figcaption>	

								<?php } ?>
							</figure>
						<?php if ($s7_post_link != null ){ ?>
						</a>
						<?php }?>
						<?php wp_reset_postdata(); } ?>	

						<?php //End Row 5 ?>
			</div>

			

		</div>
	</div>

</main><!-- End of Content -->

<?php get_footer(); ?>
