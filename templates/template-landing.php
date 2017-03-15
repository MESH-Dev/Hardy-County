<?php 
/* Template Name: Landing Page */

get_header(); ?>

<main id="content">
	<?php 
		$ip_banner=get_field('ip_banner');
		$ip_banner_url=$ip_banner['sizes']['short-banner'];
	?>
	<div class="banner interior" style="background-image:url('<?php echo $ip_banner_url; ?>')">
		<!-- <div class="overlay" aria-hidden="true"></div> -->
		<div class="banner-content">
			<div class="container">
				<h1 class="page-title"><?php the_title(); ?></h1>
			</div>
		</div>
	</div>
	<?php 
	// Call the Intro Statement partial
	get_template_part('partials/intro-statement'); 
	?>
	<div class="container">
		<div class="landing-grid grid" id=""><!-- packery -->
			<div class="row">
			<?php 

			//Per Codex https://codex.wordpress.org/Function_Reference/get_page_children#Examples
			//Setup new WP Query
			$my_wp_query = new WP_Query();

			//Setup a new array from the query made up of all pages,
			$all_wp_pages = $my_wp_query->query(array('post_type' => 'page', 'posts_per_page' =>'-1')); //var_dump($all_wp_pages);
			
			//Get the page ID for the current page
			$page_ID=get_the_ID(); //var_dump($page_ID); 

			//Get the children (as an array) for the current page
			$get_children=get_page_children($page_ID, $all_wp_pages); 
			//var_dump($get_children);

			?>
			<!-- Row 1 stuff from sub-pages -->
			<!-- <div class="row"> -->
			<?php foreach( $get_children as $children){ 
					
					$child_ID = $children->ID; //var_dump($children->ID);
					$thumbnail = get_the_post_thumbnail_url($child_ID, 'large'); 
					$alt = get_the_post_thumbnail($child_ID, 'large');
					$landing_link = get_field('landing_link', $child_ID);
					$landing_link_row = $landing_link[0];
					$background= $landing_link_row['background'];
					$background_url = $background['sizes']['large'];
					$background_alt = $background['alt'];
					$hover = $landing_link_row['hover_text'];
					//var_dump($alt);
					//var_dump('Thumbnail info: '. $thumbnail);

				?>
			<a href="<?php the_permalink($children->ID); ?>">
			<figure class="columns-4 no-padding primary" style="background-image:url('<?php echo $background_url; ?>')"><!-- grid-item grid-item-width4 -->
				<!-- <div class="wrap">
					<div class="content"> -->
						<!-- <img src="<?php echo $thumbnail; ?>"> -->
						<img alt="<?php echo $background_alt; ?>" src="<?php echo $background_url; ?>">
						<figcaption>
						<h1><?php echo $children->post_title; ?></h1>
						<p><?php echo $hover; ?><br><span>&#10165;</span></p>
						</figcaption>
					<!-- </div>
				</div> -->

			</figure>
			</a>
			<?php } wp_reset_query(); ?>
			<!-- </div> -->
			<!-- <div class="grid-item grid-item-width4 primary" style="background-color:purple;">
				<h1>PRIMARY ITEM!</h1>
			</div>
			<div class="grid-item grid-item-width4 primary" style="background-color:green;">
				<h1>PRIMARY ITEM!</h1>
			</div> -->

			<!-- Row 2 Calendar Feed/See More -->

			<div class="columns-5 event-feed no-padding"> 

				<div class="content">
					<div class="head row">
						<div class="title">Upcoming Events</div>
						<div class="see-all">
							<a href="#">See all events &#10165;</a>
						</div>
					</div>
				<div class="feed row">
				<?php 
					//$da_date = get_field('start_date');
					//var_dump($da_date);
					$today=date('Ymd');
					$currMonth = date('m');
					$currYear = date('Y');
					$args = array(
						'post_type' => 'event',
						'posts_per_page' => 3,
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
					
						//$first_loop = 0; 
						while($the_query->have_posts()) { $the_query->the_post();
							$start_date = get_field('start_date', false, false);
							$s_date = new DateTime($start_date);
							$event_month = $s_date->format('m');
							$event_year = $s_date->format('Y');
							$event_month_text = $s_date->format('F');
							$event_month_abbr = strtolower($s_date->format('M'));
							$event_city = get_field('city');
							$event_address = get_field('street_address');
							$event_site = get_field('web_address');
							$event_phone = get_field('phone');
							?>

						<div class="feed-item row">
							<div class="date columns-2">
								<span class="date-wrap">
									<h5 class="month"><?php echo $s_date->format('M'); ?></h5>
									<h3 class="range"><?php echo $s_date->format('d'); ?></h3>
								</span>
							</div>
							<div class="event-desc columns-10">	
								<h1 class="title"><?php the_title(); ?></h1>
								<h2 class="loc"><?php echo $event_city; ?></h2>
								<div class="more">
									<span class="website">
										<a href="<?php echo $event_site; ?>"><?php echo $event_site; ?></a>
									</span> |
									<span class="phone">
										<?php echo $event_phone; ?>
									</span>
								</div>
							</div>
						</div>
						<?php } } wp_reset_query(); ?>
					
						
					</div>
					<div class="foot row">
						Have an event you want to tell people about? <a href="#">Share it with us! &#10165;</a>
					</div>
				</div>	
			</div>
			
			<?php if(have_rows('trip_idea_block')):
					while(have_rows('trip_idea_block')):the_row(); 

					$callout_text = get_sub_field('callout_text');
					$background = get_sub_field('bg_image');
					$background_url = $background['sizes']['large'];
					$trip_title = get_sub_field('title');

			?>
			<div class="columns-7 trip no-padding" style="background-image:url('<?php echo $background_url; ?>')"><!-- grid-item grid-item-width7 -->
				<div class="wrap">
					<div class="head">
						<h1> -  <?php echo $trip_title; ?>  - </h1>
					</div>
					<div class="foot">
						<h2><?php echo $callout_text; ?></h2>
						<?php 
							if(have_rows('link')):
							while(have_rows('link')):the_row(); 
							$link_text = get_sub_field('link_text');
							$link = get_sub_field('link_url');
							$is_external = get_sub_field('external');

							$target='';
							if($is_external == true){
								$target = 'target="_blank"';
							}

							if($link_text != ''){
						?>
							<a href="<?php echo $link; ?>" <?php echo $target; ?> ><?php echo $link_text; ?></a>
						<?php } endwhile; endif; ?>
					</div>
				</div>
			</div>

			<?php endwhile; endif; ?>
			</div>
		</div><!-- End Packery Grid -->

		<?php 
		//Add Cross promotional partial
		get_template_part('partials/cross-promo'); ?>
	</div>

</main><!-- End of Content -->

<?php get_footer(); ?>
