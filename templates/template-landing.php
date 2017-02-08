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
				<!-- <div class="text">
					<h1><?php echo $banner_intro_text; ?></h1>
					<h2><?php echo $banner_intro_statement; ?><br>
					<span class="banner-cta"><?php echo $banner_intro_cta; ?></span></h2>
				</div> -->
				<!-- <div class="wv-logo">
					<img src="<?php bloginfo('template_directory'); ?>/img/logo-color-white.png">
				</div> -->
			</div>
		</div>
	</div>
	<?php 
	//Call the Intro Statement partial 
	get_template_part('partials/intro-statement'); 
	?>
	<div class="container">
		<div class="landing-grid" id="packery">
			<!-- Row 1 stuff from sub-pages -->
			<div class="grid-item grid-item-width4 primary" style="background-color:orange;">
				<h1>PRIMARY ITEM!</h1>
			</div>
			<div class="grid-item grid-item-width4 primary" style="background-color:purple;">
				<h1>PRIMARY ITEM!</h1>
			</div>
			<div class="grid-item grid-item-width4 primary" style="background-color:green;">
				<h1>PRIMARY ITEM!</h1>
			</div>

			<!-- Row 2 Calendar Feed/See More -->

			<div class="grid-item grid-item-width5" style="background-color:burlywood;">
				<h1>Calendar Feed!</h1>
			</div>
			<div class="grid-item grid-item-width7" style="background-color:blue;">
				<h1>SEE MORE STUFF!!</h1>
			</div>
		</div><!-- End Packery Grid -->

		<div class="cta-leadin" style="background-color:#e5b070;" >
			<h2>FIND MORE STUFF BY CLICKING ONE OF THE LINKS BELOW!!!!</h2>
		</div>

		<div class="row">
			<div class="columns-6 promo no-padding" style="background-color:red;">
				<h1>CROSS PROMO ITEM!!</h1>
			</div> 
			<div class="columns-6 promo no-padding" style="background-color:purple;">
				<h1>CROSS PROMO ITEM!!</h1>
			</div> 
		</div>
	</div>

</main><!-- End of Content -->

<?php get_footer(); ?>
