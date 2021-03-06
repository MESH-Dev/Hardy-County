<?php 
/* Template Name: Landing Page */

get_header(); ?>

<main id="content">
	<?php 
		$ip_banner=get_field('ip_banner');
		$ip_banner_url=$ip_banner['sizes']['short-banner'];
	?>
	<div class="banner interior" style="background-image:url('<?php echo $ip_banner_url; ?>')">
		<div class="overlay" aria-hidden="true"></div>
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
			$all_wp_pages = $my_wp_query->query(array('post_type' => 'page', 'posts_per_page' =>'-1', 'order'=>'ASC', 'orderby'=>'menu_order')); //var_dump($all_wp_pages);
			
			//Get the page ID for the current page
			$page_ID=get_the_ID(); //var_dump($page_ID); 

			//Get the children (as an array) for the current page
			$get_children=get_page_children($page_ID, $all_wp_pages); 
			//var_dump($get_children);

			?>
			<!-- Row 1 stuff from sub-pages -->
			<?php foreach( $get_children as $children){ 
					
					$child_ID = $children->ID; 
					$thumbnail = get_the_post_thumbnail_url($child_ID, 'large'); 
					$alt = get_the_post_thumbnail($child_ID, 'large');
					$landing_link = get_field('featured_information', $child_ID);
					$landing_link_row = $landing_link[0];
					$background= $landing_link_row['background'];
					$background_url = $background['sizes']['large'];
					$background_alt = $background['alt'];
					$hover = $landing_link_row['tagline'];

				?>
			<a href="<?php the_permalink($children->ID); ?>">
			<figure class="columns-4 no-padding primary child-links" >
				<div class="portrait" alt="<?php echo $background_alt; ?>" style="background-image:url('<?php echo $background_url ?>');">
					<span class="sr-only">
						<?php echo $background_alt; ?>
					</span>
				</div>
				<figcaption>
					<h1><?php echo $children->post_title; ?></h1>
					<p><?php echo $hover; ?><br><span>&#10165;</span></p>
				</figcaption>
			</figure>
			</a>
			<?php } wp_reset_query(); ?>

			<!-- Row 2 Calendar Feed/See More -->
		</div><!-- end child page row -->
		<div class="row">
			<div class="columns-5 event-feed no-padding"> 

				<div class="content">
					<div class="head row">
						<div class="title">Upcoming Events</div>
						<div class="see-all">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>/events">See all events &#10165;</a>
						</div>
					</div>
				<div class="feed row">
				<?php 

					global $post;
					$post_slug = $post->post_name;

					$today=date('Ymd');
					$currMonth = date('m');
					$currYear = date('Y');
					$args = array(
						'post_type' => 'event',
						'posts_per_page' => 3,
						'orderby'=>'meta_value_num',
						'order'=>'ASC',
						'tax_query' => array(
							array(
									'taxonomy'=>'primary_section',
									'field' => 'slug',
									'terms' => $post_slug,
								),	
							),
						'meta_key'=>'start_date',
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
					
						while($the_query->have_posts()) { $the_query->the_post();
							$start_date = get_field('start_date', false, false);
							$end_date = get_field('end_date', false, false);
							$s_date = new DateTime($start_date);
							$e_date = new DateTime($end_date);
							$event_month = $s_date->format('m');
							$event_year = $s_date->format('Y');
							$event_month_text = $s_date->format('F');
							$event_month_abbr = strtolower($s_date->format('M'));
							$event_city = get_field('city');
							$event_address = get_field('street_address');
							$event_site = get_field('web_address');
							$bare_event_str = preg_replace('#^https?://#', '', $event_site);
							$event_phone = get_field('phone');
							$hc_event = get_field('hardy_county_event', $post->ID);
							?>

						<div class="feed-item row">
							<div class="date">
								<span class="date-wrap">
									<span class="date-info">
										<span class="month"><?php echo $s_date->format('M'); ?></span>
										<span class="range"><?php echo $s_date->format('d'); ?></span>
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
							<div class="event-desc">	
								<h1 class="title">
									<a href="<?php the_permalink(); ?>"> 
										<?php the_title(); ?>
									</a> 
								</h1>
								<h2 class="loc"><?php echo $event_city; ?></h2>
							</div>
						</div>
						<?php
								}
						 	}
					
						  wp_reset_query(); ?>
					
						
					</div>
					<div class="foot row">
						<?php 
							$event_form = get_field('submit_form_url', 'options');
						?>
						Have an event you want to tell people about? <a href="<?php echo $event_form; ?>">Share it with us! &#10165;</a>
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

							if($link != ''){
						?>
							<a href="<?php echo $link; ?>" <?php echo $target; ?> ><?php echo $link_text; ?></a>

							<?php }elseif ($link_text != '' && $link == ''){ ?>
							<p><?php echo $link_text ?></p>
							<?php }elseif($link_text == '' && $link == ''){ ?>
							
						<?php } endwhile; endif; ?>
					</div>
				</div>
			</div>

			<?php endwhile; endif; ?>
		</div> <!-- end calendar feed/see more row -->
		</div><!-- End Packery Grid -->

		<?php 
		//Add Cross promotional partial
		get_template_part('partials/cross-promo'); ?>
	</div> <!-- end container for page content -->

</main><!-- End of Content -->

<?php get_footer(); ?>
