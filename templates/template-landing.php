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
					//var_dump('Thumbnail info: '. $thumbnail);

				?>
			<a href="<?php the_permalink($children->ID); ?>">
			<figure class="columns-4 no-padding primary" style="background-image:url('<?php echo $thumbnail; ?>')"><!-- grid-item grid-item-width4 -->
				<!-- <div class="wrap">
					<div class="content"> -->
						<img src="<?php echo $thumbnail; ?>">
						<figcaption>
						<h1><?php echo $children->post_title; ?></h1>
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

			<div class="columns-5 event-feed no-padding"> <!-- grid-item grid-item-width5  -->
				<div class="content">
					<div class="head row">
						<div class="title">Upcoming Events</div>
						<div class="see-all">
							<a href="#">See all events &#10165;</a>
						</div>
					</div>
					<div class="feed row">
						<div class="feed-item row">
							<div class="date columns-2">
								<span class="date-wrap">
									<h5 class="month">Apr</h5>
									<h3 class="range">28</h3>
								</span>
							</div>
							<div class="event-desc columns-10">	
								<h1 class="title">Bean Festival</h1>
								<h2 class="loc">Moorfield</h2>
								<div class="more">
									<span class="website">
										<a href="#">beanfestival.com</a>
									</span> |
									<span class="phone">
										304.530.280
									</span>
								</div>
							</div>
						</div>
						<div class="feed-item row">
							<div class="date columns-2">
								<span class="date-wrap">
									<h5 class="month">Apr</h5>
									<h3 class="range">28</h3>
								</span>
							</div>
							<div class="event-desc columns-10">	
								<h1 class="title">Bean Festival</h1>
								<h2 class="loc">Moorfield</h2>
								<div class="more">
									<span class="website">
										<a href="#">beanfestival.com</a>
									</span> |
									<span class="phone">
										304.530.280
									</span>
								</div>
							</div>
						</div>
						<div class="feed-item row">
							<div class="date columns-2">
								<span class="date-wrap">
									<h5 class="month">Apr</h5>
									<h3 class="range">28</h3>
								</span>
							</div>
							<div class="event-desc columns-10">	
								<h1 class="title">Bean Festival</h1>
								<h2 class="loc">Moorfield | <span class="time">Noon-6pm</span></h2>
								<div class="more">
									<span class="website">
										<a href="#">beanfestival.com</a>
									</span> |
									<span class="phone">
										304.530.280
									</span>
								</div>
							</div>
						</div>
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

			?>
			<div class="columns-7 trip no-padding" style="background-image:url('<?php echo $background_url; ?>')"><!-- grid-item grid-item-width7 -->
				<div class="wrap">
					<div class="head">
						<h1> -  ideas for your trip  - </h1>
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


		<div class="cp-leadin">
			<?php $cp_leadin = get_field('cpl_text');?>
			<?php if($cp_leadin != ''){ ?>
				<p><?php echo $cp_leadin; ?></p>
			<?php }else{ ?>
				<p class="error">**You have not included text here, please return to the edit screen to add</p>
			<?php } ?>
		</div>

		<!-- Cross promotion row -->
		<div class="grid">
			<div class="row">
				<?php 
					if(have_rows('cross_promotion_items')):
						while(have_rows('cross_promotion_items')):the_row();

						//Declare sub_fields for this row

						//__This section sets up the post_object for the 'cross_promotion_item' subfield
						$post_link=get_sub_field('cross_promotion_item');
						$promotion_row_bg = get_the_post_thumbnail_url($post_link->ID, 'large');
						$post_p = $post_link;
						setup_postdata( $post_p );

						//We used a repeater here to group content in the CMS
						//Get started pulling that content...
						$featured_items = get_field('featured_information', $post_p->ID);
						
						//Get all of your sub fields by looking at our "array" (it has only 1 row) by calling position [0]
						//We add to that the name of our sub_field in array syntax ['{ sub_field_name }']
						$cp_background=$featured_items[0]['background'];
						$background_url = $cp_background['sizes']['large'];
						$tagline = $featured_items[0]['tagline'];
					?>
					<a href="<?php echo the_permalink($post_p->ID); ?>" >
						<figure class="columns-6 secondary promo no-padding" ><!-- style="background-image:url('<?php echo $background_url; ?>');" -->
							<!-- <div class="wrap"> -->
							<img src="<?php echo $background_url; ?>">
							<figcaption class="content">
								<p><?php echo $tagline; ?></p>
								<h2><?php echo $post_p->post_title; ?></h2>
								<!-- <h2><?php //echo $parent_post_title ?></h2> -->
							</figcaption>
							<!-- </div> -->
						</figure>
					</a>
				<?php wp_reset_postdata(); endwhile; endif; ?>
			</div>
		</div>
		<!-- End cross promotion grid -->
	</div>

</main><!-- End of Content -->

<?php get_footer(); ?>
