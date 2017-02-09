<?php 
/* Template Name: Homepage */

get_header(); 

?>

<main id="content">
	<?php 
		$lp_banner=get_field('lp_banner');
		$lp_banner_url=$lp_banner['sizes']['short-banner'];
		$banner_intro_text=get_field('banner_intro_text');
		$banner_intro_statement=get_field('banner_intro_statement');
		$banner_intro_cta=get_field('banner_intro_cta');
		?>
	<div class="banner large" style="background-image:url('<?php echo $lp_banner_url; ?>')">
		<div class="overlay" aria-hidden="true"></div>
		
		<div class="banner-content">
			<div class="container">
				<div class="text">
					<h1><?php echo $banner_intro_text; ?></h1>
					<h2><?php echo $banner_intro_statement; ?><br>
					<span class="banner-cta"><?php echo $banner_intro_cta; ?></span></h2>
				</div>
				<div class="wv-logo">
					<img src="<?php bloginfo('template_directory'); ?>/img/logo-color-white.png">
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
			<div class="home-grid" id="packery"><!-- macy --><!-- masonry --><!-- macy -->

						<?php //Row 1 ?>

						<!-- Event Block 1 -->
						<div class="hg grid-item grid-item-width3 event no-padding">
							<div class="date">
								<h5>APR</h5>
								<h3>03</h3>
							</div>
							<div class="info">
								<p>Paragraph</p>
								<h2>The Poultry Festival</h2>
								<div class="reveal">
									<p>Paragraph | <a href="http://poultryfest.com">poultryfest.com</a></p>
									<h6>Learn More &#10165;</h6>
								</div>
							</div>
						</div>

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
								$secondary_row_bg_url = $secondary_row_bg['sizes']['medium'];

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
						<figure class="hg grid-item grid-item-width3 secondary no-padding">
							<img src="<?php echo $secondary_row_bg_url; ?>">
							<figcaption>
								<p><?php echo $s_parent_post_title; ?></p>
								<h2><?php echo $s_post_1->post_title; ?></h2>
							</figcaption>
						</figure>

						<?php wp_reset_postdata(); } ?>
					
						<!-- Primary CTA block 1 -->

						<?php $primary_row = get_field('primary_cta_blocks');
						
								//Setup array location for each row
								//__Each Primary block will begin with if (${row number}_primary_row)
								$first_primary_row = $primary_row[0];
								$second_primary_row = $primary_row[1];
								$third_primary_row = $primary_row[2];
								$fourth_primary_row = $primary_row[3];
								$fifth_primary_row = $primary_row[1];

							if($first_primary_row){

								//Declare sub_fields for this row
								$primary_row_bg = $first_primary_row['background_image'];
								$primary_row_url = $primary_row_bg['sizes']['large'];

								//__This section sets up the post_object for the 'section_title' subfield
								$post_link=$first_primary_row['section_title'];
								$post_1 = $post_link;
								setup_postdata( $post_1 );
						?>

						<!-- Primary Block 1 -->
						<figure class="hg grid-item grid-item-width4 primary no-padding" style="background-image:url('<?php echo $primary_row_url; ?>');">
							<!-- columns-4 -->
							<img src="<?php echo $primary_row_url; ?>" alt=""/>
							<figcaption>
								<h1><?php echo $post_1->post_title; ?></h1>
								<p>Your hike is over and you're ready to tear into a burger.<br><span>&#10165;</span></p>
								<!-- <h2><?php //echo $parent_post_title ?></h2> -->
								
							</figcaption>
						</figure>
						<?php wp_reset_postdata(); } ?>
						<div class="hg grid-item grid-item-width2 weather weather-api no-padding">
							<h2>WEATHER BLOCK!</h2>
						</div>

						<?php //Setup Instagram look at helpers/instagram.php with questions

						$instagram = getInstagram();

						?>

						<!-- Instagram Block 1 -->
						<div class="hg grid-item grid-item-width2 instagram no-padding"style="background-image:url('<?php echo $instagram[2]->images->low_resolution->url; ?>');">
							<div class="instagram-icon">
								<i class="fa fa-fw fa-instagram fa-2x"></i>
							</div>
						</div>

						<?php //End Row 1::Start Row 2 ?>

						<!-- Secondary CTA block 2 -->
						<?php if($second_secondary_row){

								//Declare sub_fields for this row
								$secondary_row_bg = $second_secondary_row['background_image'];
								$secondary_row_bg_url_2 = $secondary_row_bg['sizes']['medium'];

								//__This section sets up the post_object for the 'section_title' subfield
								$s2_post_link = $second_secondary_row['section_title'];
								$s_post_2 = $s2_post_link;
								setup_postdata($s_post_2);

								//__This section queries the title of the post parent for the page chosen in the 'section_title' field
								$s2_parent_post_id = $s_post_2->post_parent;
							    $s2_parent_post = get_post($s2_parent_post_id);
							    $s2_parent_post_title = $s2_parent_post->post_title;

						?>
						<figure class="hg grid-item grid-item-width3 secondary no-padding">
							<img src="<?php echo $secondary_row_bg_url_2; ?>">
							<figcaption>
								<p><?php echo $s2_parent_post_title; ?></p>
								<h2><?php echo $s_post_2->post_title; ?></h2>
							</figcaption>	
						</figure>

						<?php wp_reset_postdata(); } ?>

						<!-- Secondary CTA block 3 -->

						<?php if($third_secondary_row){

								//Declare sub_fields for this row
								$secondary_row_bg_3 = $third_secondary_row['background_image'];
								$secondary_row_bg_url = $secondary_row_bg['sizes']['medium'];

								//__This section sets up the post_object for the 'section_title' subfield
								$s_post_link = $third_secondary_row['section_title'];
								$s_post_1 = $s_post_link;
								//var_dump($s_post_1);
								setup_postdata($s_post_1);

								//__This section queries the title of the post parent for the page chosen in the 'section_title' field
								$s_parent_post_id = $s_post_1->post_parent;
							    $s_parent_post = get_post($s_parent_post_id);
							    $s_parent_post_title = $s_parent_post->post_title;

						?>
						<figure class="hg grid-item grid-item-width3 secondary no-padding">
							<img src="<?php echo $secondary_row_bg_url; ?>">
							<figcaption>
								<p><?php echo $s_parent_post_title; ?></p>
								<h2><?php echo $s_post_1->post_title; ?></h2>
							</figcaption>	
						</figure>
						
						<?php wp_reset_postdata(); } ?>

						<!-- Event Block 2 -->
						<div class="hg grid-item grid-item-width3 event second no-padding">
							<div class="date">
								<h5>APR</h5>
								<h3>03</h3>
							</div>
							<div class="info">
								<p>Paragraph</p>
								<h2>The Poultry Festival</h2>
								<div class="reveal">
									<p>Paragraph | <a href="http://poultryfest.com">poultryfest.com</a></p>
									<h6>Learn More &#10165;</h6>
								</div>
							</div>
						</div>

						<!-- Primary CTA Block 2 -->

						<?php 

						if($second_primary_row){

							//Declare sub_fields for this row
							$primary_row_bg = $second_primary_row['background_image'];
							$primary_row_url = $primary_row_bg['sizes']['large'];

							//__This section sets up the post_object for the 'section_title' subfield
							$post_link=$second_primary_row['section_title'];
							$post_2 = $post_link;
							setup_postdata( $post_2 );

						?>
						<div class="hg grid-item grid-item-width3 primary no-padding" style="background-image:url('<?php echo $primary_row_url; ?>');">
							<div class="wrap">
								<div class="content">
									<div class="overlay" aria-hidden="true"></div>
									<h1><?php echo $post_2->post_title; ?></h1>
									<!-- <h2><?php //echo $parent_post_title ?></h2> -->
								</div>
							</div>
						</div>

						<?php wp_reset_postdata(); } ?>

						<?php //End Row 2::Start Row 3 ?>

						<!-- Primary CTA Block 3 -->

						<?php 

						if($third_primary_row){

							//Declare sub_fields for this row
							$primary_row_bg = $third_primary_row['background_image'];
							$primary_row_url = $primary_row_bg['sizes']['large'];

							//__This section sets up the post_object for the 'section_title' subfield
							$post_link=$third_primary_row['section_title'];
							$post_1 = $post_link;
							setup_postdata( $post_1 );

						?>

						<div class="hg grid-item grid-item-width6 primary no-padding" style="background-image:url('<?php echo $primary_row_url; ?>');">
							<div class="wrap">
								<div class="content">
									<div class="overlay" aria-hidden="true"></div>
									<h1><?php echo $post_1->post_title; ?></h1>
									<!-- <h2><?php //echo $parent_post_title ?></h2> -->
								</div>
							</div>
						</div>
						
						<?php wp_reset_postdata(); } ?>

						<div class="hg grid-item grid-item-width2 nest">

							<!-- Instagram Block 2 -->
							<div class="hg nested instagram no-padding" style="background-image:url('<?php echo $instagram[3]->images->low_resolution->url; ?>');">
								<div class="instagram-icon">
									<i class="fa fa-fw fa-instagram fa-2x"></i>
								</div>
							</div>

							<!-- Secondary CTA block 4 - Small -->

							<?php if($fourth_secondary_row){

								//Declare sub_fields for this row
								$secondary_row_bg = $fourth_secondary_row['background_image'];
								$secondary_row_bg_url = $secondary_row_bg['sizes']['medium'];

								//__This section sets up the post_object for the 'section_title' subfield
								$s_post_link = $fourth_secondary_row['section_title'];

								//__This section tests whether the 'section_title' field has
								//__been populated. If not, we don't want to bother with declaring these variables
								//__so that we don't get any errors.
								//__**Only applies to Secondary blocks 4, 6, 7

								if($s_post_link != null ){
									$s_post_1 = $s_post_link;
									//var_dump($s_post_1);
									setup_postdata($s_post_1);

									//__This section queries the title of the post parent for the page chosen in the 'section_title' field
									$s_parent_post_id = $s_post_1->post_parent;
								    $s_parent_post = get_post($s_parent_post_id);
								    $s_parent_post_title = $s_parent_post->post_title;
								}

							?>
							<div class="hg nested secondary no-padding" style="background-image:url('<?php echo $secondary_row_bg_url; ?>');">
								<div class="overlay" aria-hidden="true"></div>

								<?php 
								//Don't render this stuff if we aren't passing any of the variables above
								if ($s_post_link != null){ 
								?>

								<div class="content">
									<div class="post-parent"><?php echo $s_parent_post_title; ?></div>
									<div class="post-title"><?php echo $s_post_1->post_title; ?></div>
								</div>

								<?php } ?>

							</div>

							<?php wp_reset_postdata(); } ?>

						</div>
						
						<!-- Primary Block 4 -->
						
						<?php 

						if($fourth_primary_row){

							//Declare sub_fields for this row
							$primary_row_bg = $fourth_primary_row['background_image'];
							$primary_row_url = $primary_row_bg['sizes']['large'];

							//__This section sets up the post_object for the 'section_title' subfield
							$post_link=$fourth_primary_row['section_title'];
							$post_1 = $post_link;
							setup_postdata( $post_1 );

						?>
						<figure class="hg grid-item grid-item-width4 primary no-padding">
							<img src="<?php echo $primary_row_url; ?>" alt=""/>
							<figcaption>
								<h1><?php echo $post_1->post_title; ?></h1>
								<p>Your hike is over and you're ready to tear into a burger.<br><span>&#10165;</span></p>
								<!-- <h2><?php //echo $parent_post_title ?></h2> -->
								
							</figcaption>
						</figure>

						<?php wp_reset_postdata(); } ?>


						<?php //End Row 3::Start Row 4 ?>

						<div class="hg grid-item grid-item-width3 event third no-padding">
							<div class="date">
								<h5>APR</h5>
								<h3>03</h3>
							</div>
							<div class="info">
								<p>Paragraph</p>
								<h2>The Poultry Festival</h2>
								<div class="reveal">
									<p>Paragraph | <a href="http://poultryfest.com">poultryfest.com</a></p>
									<h6>Learn More &#10165;</h6>
								</div>
							</div>
						</div>

						<!-- Secondary CTA Block 5 -->

						<?php if($fifth_secondary_row){

								//** Note: This block had to be placed "out of order" in the code
								//   for the js library (packery.js) to render in the correct order
								//   visually.

								//Declare sub_fields for this row
								$secondary_row_bg = $fifth_secondary_row['background_image'];
								$secondary_row_bg_url = $secondary_row_bg['sizes']['medium'];

								//__This section sets up the post_object for the 'section_title' subfield
								$s_post_link = $fifth_secondary_row['section_title'];
								$s_post_1 = $s_post_link;
								//var_dump($s_post_1);
								setup_postdata($s_post_1);

								//__This section queries the title of the post parent for the page chosen in the 'section_title' field
								$s_parent_post_id = $s_post_1->post_parent;
							    $s_parent_post = get_post($s_parent_post_id);
							    $s_parent_post_title = $s_parent_post->post_title;

							?>
						<figure class="hg grid-item grid-item-width3 secondary no-padding">
							<img src="<?php echo $secondary_row_bg_url; ?>">
							<?php if ($s_post_1 != ''){ ?>

							<figcaption>
								<p><?php echo $s_parent_post_title; ?></p>
								<h2><?php echo $s_post_1->post_title; ?></h2>
							</figcaption>	
							<?php } ?>
						</figure>

						<?php //End Row 4::Start Row 5 ?>

						<?php wp_reset_postdata(); } ?>

						<!-- Primary Block 5 -->

						<?php 

						if($fifth_primary_row){

							//Declare sub_fields for this row
							$primary_row_bg = $fifth_primary_row['background_image'];
							$primary_row_url = $primary_row_bg['sizes']['large'];

							//__This section sets up the post_object for the 'section_title' subfield
							$post_link=$fifth_primary_row['section_title'];
							$post_1 = $post_link;
							setup_postdata( $post_1 );
						?>
						<div class="hg grid-item grid-item-width6 primary no-padding" style="background-image:url('<?php echo $primary_row_url; ?>');">
							<div class="wrap">
								<div class="content">
									<div class="overlay" aria-hidden="true"></div>
									<h1><?php echo $post_1->post_title; ?></h1>
								</div>
							</div>
						</div>

						<?php wp_reset_postdata(); } ?>

						<!-- Instagram block  3-->
						<div class="hg grid-item grid-item-width2 instagram no-padding" style="background-image:url('<?php echo $instagram[4]->images->low_resolution->url; ?>');">
							<div class="instagram-icon">
								<i class="fa fa-fw fa-instagram fa-2x"></i>
							</div>
						</div>

						<!-- Secondary CTA block 6 - Small -->

						<?php if($sixth_secondary_row){

							//Declare sub_fields for this row
							$secondary_row_bg = $sixth_secondary_row['background_image'];
							$secondary_row_bg_url = $secondary_row_bg['sizes']['medium'];

							//__This section sets up the post_object for the 'section_title' subfield
							$s_post_link = $sixth_secondary_row['section_title'];

							//__This section tests whether the 'section_title' field has
							//__been populated. If not, we don't want to bother with declaring these variables
							//__so that we don't get any errors.
							//__**Only applies to Secondary blocks 4, 6, 7
							if($s_post_link != null ){
								$s_post_1 = $s_post_link;
								//var_dump($s_post_1);
								setup_postdata($s_post_1);

								//__This section queries the title of the post parent for the page chosen in the 'section_title' field
								$s_parent_post_id = $s_post_1->post_parent;
							    $s_parent_post = get_post($s_parent_post_id);
							    $s_parent_post_title = $s_parent_post->post_title;
							}

						?>

						<div class="hg grid-item grid-item-width2 secondary no-padding" style="background-image:url('<?php echo $secondary_row_bg_url; ?>');">
							<?php 
							//Don't render this stuff if we aren't passing any of the variables above
							if ($s_post_link != null){ 
							?>

							<div class="content">
								<div class="post-parent"><?php echo $s_parent_post_title; ?></div>
								<div class="post-title"><?php echo $s_post_1->post_title; ?></div>
							</div>	

							<?php } ?>
						</div>
						<?php wp_reset_postdata(); } ?>

						<!-- Secondary CTA block 7 - Small -->

						<?php if($seventh_secondary_row){

							//Declare sub_fields for this row
							$secondary_row_bg = $seventh_secondary_row['background_image'];
							$secondary_row_bg_url = $secondary_row_bg['sizes']['medium'];

							
							//__This section sets up the post_object for the 'section_title' subfield
							$s_post_link = $seventh_secondary_row['section_title'];


							//__This section tests whether the 'section_title' field has
							//__been populated. If not, we don't want to bother with declaring these variables
							//__so that we don't get any errors.
							//__**Only applies to Secondary blocks 4, 6, 7

							if($s_post_link != null ){
								$s_post_1 = $s_post_link;
								//var_dump($s_post_1);
								setup_postdata($s_post_1);

								//__This section queries the title of the post parent for the page chosen in the 'section_title' field
								$s_parent_post_id = $s_post_1->post_parent;
							    $s_parent_post = get_post($s_parent_post_id);
							    $s_parent_post_title = $s_parent_post->post_title;
							}
						?>
						<div class="hg grid-item grid-item-width2 secondary no-padding" style="background-image:url('<?php echo $secondary_row_bg_url; ?>');">
							<?php 
							//Don't render this stuff if we aren't passing any of the variables above
							if ($s_post_link != null ){ 
							?>

							<div class="content">
								<div class="post-parent"><?php echo $s_parent_post_title; ?></div>
								<div class="post-title"><?php echo $s_post_1->post_title; ?></div>
							</div>	

							<?php } ?>
						</div>

						<?php wp_reset_postdata(); } ?>	

						<?php //End Row 5 ?>
			</div>

			

		</div>
	</div>

</main><!-- End of Content -->

<?php get_footer(); ?>
