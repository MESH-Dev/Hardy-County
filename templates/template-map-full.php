<?php 
/* Template Name: Full Map Template*/

get_header(); 

?>

<main id="content" class="map-full" data-category="all">
	<h1 class="sr-only">Full Hardy County Map</h1>
	<div class="map-container">
		<div class="full-map" id="map">
		</div>
		<div class="map-legend">
			<div class="legend-title">Map Color Key <span class="indicator">&#10165;</span></div>
			<ul class="map-key">
				<li class="key eat-drink">
					<span> 
						Eat &amp; Drink
					</span>
				</li>
				<li class="key outside-in">
					<span>
						Outside &amp; In
					</span>
				</li>
				<li class="key shop">
					<span>
						Shop In Town &amp; Out
					</span>
				</li>
				<li class="key culture-heritage">
					<span>
						Culture &amp; Heritage
					</span>
				</li>
				<li class="key sleep-relax">
					<span>
						Sleep &amp; Relax
					</span>
				</li>
		</ul>
	</div>
</main><!-- End of Content -->

<?php get_footer(); ?>
