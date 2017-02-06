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

	<div class="container">
		<?php $intro_text=get_field('intro_text'); ?>
		<div class="intro-statement">
			<h2 class="intro-text">
				<?php echo $intro_text; ?>
			</h2>
		</div>
		
	</div> 
	<div class="container">
		<div class="row">
			<div class="home-grid" id="packery"><!-- macy --><!-- masonry --><!-- macy -->

				<!-- Row 1-->
						<!--Event Block 1 -->
						<div class="hg grid-item grid-item-width3 no-padding" style="background-color:red;background-image:url('http://placehold.it/500x500');" >
							<h2>EVENT BLOCK!</h2>
						</div>
						<!-- Secondary CTA -->
						<?php $secondary_row = get_field('secondary_cta_blocks');

							//Setup arraw items for each Secondary CTA Block
							$first_secondary_row = $secondary_row[0];
							$second_secondary_row = $secondary_row[1];
							$third_secondary_row = $secondary_row[2];
							$fourth_secondary_row = $secondary_row[3];

							if($first_secondary_row){

								//Declare sub_fields for this row
								$secondary_row_bg = $first_secondary_row['background_image'];
								$secondary_row_bg_url = $secondary_row_bg['sizes']['medium'];

								//__This section sets up the post_object for the 'section_title' subfield
								$s_post_link = $first_secondary_row['section_title'];
								$s_post_1 = $s_post_link;
								var_dump($s_post_1);
								setup_postdata($s_post_1);

								//__This section queries the title of the post parent for the page chosen in the 'section_title' field
								$s_parent_post_id = $s_post_1->post_parent;
							    $s_parent_post = get_post($s_parent_post_id);
							    $s_parent_post_title = $s_parent_post->post_title;

						?>
						<div class="hg grid-item grid-item-width3 secondary no-padding" style="background-image:url('<?php echo $secondary_row_bg_url; ?>');">
							<div class="overlay" aria-hidden="true"></div>
							<div class="content">
								<div class="post-parent"><?php echo $s_parent_post_title; ?></div>
								<div class="post-title"><?php echo $s_post_1->post_title; ?></div>
							</div>
						</div>

						<?php wp_reset_postdata(); } ?>
					<!-- </div> -->
					<!-- <div class="row"> -->
					<!-- Primary block -->

						<?php $primary_row = get_field('primary_cta_blocks');
						//var_dump($primary_row);
								$first_primary_row = $primary_row[0];
								//var_dump($first_primary_row);
								$second_primary_row = $primary_row[1];

							if($first_primary_row){
								$primary_row_bg = $first_primary_row['background_image'];
								$primary_row_url = $primary_row_bg['sizes']['large'];
								$post_link=$first_primary_row['primary_cta_link'];
								$post_1 = $post_link;
								setup_postdata( $post_1 );
								//var_dump($post_1);

								$parent_post_id = $post_1->post_parent;
							    $parent_post = get_post($parent_post_id);
							    $parent_post_title = $parent_post->post_title;
							    //echo $parent_post_title;
								//var_dump($post->post_parent);
						?>
						<div class="hg grid-item grid-item-width4 primary no-padding" style="background-image:url('<?php echo $primary_row_url; ?>');">
							<!-- columns-4 -->
							<!-- <img src="http://placehold.it/1000x500"> -->
							<div class="wrap">
								<div class="content">
									<div class="overlay" aria-hidden="true"></div>
									<h1><?php echo $post_1->post_title; ?></h1>
									<!-- <h2><?php //echo $parent_post_title ?></h2> -->
								</div>
							</div>
						</div>
						<?php wp_reset_postdata(); } ?>
						<div class="hg grid-item grid-item-width2 no-padding"style="background-color:purple;background-image:url('http://placehold.it/500x500');">
							<h2>WEATHER BLOCK!</h2>
						</div>

						<?php //Setup Instagram look at helpers/instagram.php with questions

						$instagram = getInstagram();

						?>
						<div class="hg grid-item grid-item-width2 instagram no-padding"style="background-image:url('<?php echo $instagram[2]->images->low_resolution->url; ?>');">
							<!-- <h2>INSTAGRAM BLOCK!</h2> -->
							<i class="fa fa-fw fa-instagram"></i>
						</div>

						
						
						<div class="hg grid-item grid-item-width3 instagram no-padding" style="background-image:url('<?php //echo $instagram[1]->images->low_resolution->url; ?>');">
							
						</div>
						
						<div class="hg grid-item grid-item-width3 no-padding" style="background-color:orange;background-image:url('http://placehold.it/500x500');"></div>
						<div class="hg grid-item grid-item-width3 no-padding" style="background-color:orange;background-image:url('http://placehold.it/500x500');"></div>
						<div class="hg grid-item grid-item-width3 no-padding" style="background-color:orange;background-image:url('http://placehold.it/500x500');"></div>
						<div class="hg grid-item grid-item-width6 no-padding" style="background-color:orange;background-image:url('http://placehold.it/500x500');"></div>
						
						<div class="hg grid-item grid-item-width2 nest">
							<div class="hg no-padding" style="background-color:orange;background-image:url('http://placehold.it/500x500');">
								<h2>INSTAGRAM BLOCK!</h2>
							</div>
							<div class="hg no-padding" style="background-color:orange;background-image:url('http://placehold.it/500x500');">
								<p>TAKE IT EASY</p>
							</div>
						</div>
						
						<!-- <div class="hg grid-item grid-item-width2 no-padding" style="background-color:orange;background-image:url('http://placehold.it/500x500');"></div> -->
						<div class="hg grid-item grid-item-width4 no-padding" style="background-color:orange;background-image:url('http://placehold.it/500x500');">
							<p>CULTURE &amp; HERITAGE</p>
						</div>
						<div class="hg grid-item grid-item-width3 no-padding" style="background-color:orange;background-image:url('http://placehold.it/500x500');">
							<p>Event</p>
						</div>
						<div class="hg grid-item grid-item-width3 no-padding" style="background-color:orange;background-image:url('http://placehold.it/500x500');">
							<p>Coffee To Burgers To Candelight</p>
						</div>

						<div class="hg grid-item grid-item-width2 no-padding" style="background-color:orange;background-image:url('http://placehold.it/500x500');">
							<h2>INSTAGRAM BLOCK!</h2>
						</div>
						<div class="hg grid-item grid-item-width2 no-padding" style="background-color:orange;background-image:url('http://placehold.it/500x500');">
							<h2>INSTAGRAM BLOCK!</h2>
						</div>
						<div class="hg grid-item grid-item-width2 no-padding" style="background-color:orange;background-image:url('http://placehold.it/500x500');">
							<h2>INSTAGRAM BLOCK!</h2>
						</div>
						<div class="hg grid-item grid-item-width6 no-padding" style="background-color:orange;background-image:url('http://placehold.it/500x500');">
							<p>Outside &amp; In</p>
						</div>
						<div class="test">
						<?php 
						// if (have_rows('primary_cta_blocks')):
						// 		while(have_rows('primary_cta_blocks')):the_row(); 

						// 			$post_link=get_sub_field('primary_cta_link');
						// 			$post = $post_link;
						// 			setup_postdata( $post );
						// 			var_dump($post->post_title);
								?>

						<?php //wp_reset_postdata(); 
						// endwhile; endif; ?>
						</div>
					<!-- </div> -->
				<!-- </div> -->

				<!-- <div class="columns-6 no-padding">
					<div class="row">
						<div class="hg columns-8 no-padding" style="background-color:purple;background-image:url('http://placehold.it/500x500');"></div>
						<div class="hg columns-4 no-padding" style="background-color:black;"></div>
						<div class="hg columns-4 no-padding" style="background-color:cyan;"></div>
					</div>
					<div class="row">
						<div class="hg columns-6 no-padding" style="background-color:brown;"></div>
						<div class="hg columns-6 no-padding"style="background-color:green;"></div>
					</div>
				</div> -->
				<!-- Row 2-->
				<!-- <div class="hg columns-3 no-padding"></div>
				<div class="hg columns-3 no-padding"></div>
				<div class="hg columns-3 no-padding"></div>
				<div class="hg columns-3 no-padding"></div> -->

			</div>

			

		</div>
	</div>

</main><!-- End of Content -->

<?php get_footer(); ?>
