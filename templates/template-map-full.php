<?php 
/* Template Name: Full Map Template*/

get_header(); 

?>

<main id="content" style="height:95vh;" data-category="all">
	<div class="map-container">
		<div class="full-map" id="map" style="height:95vh; width:100%; position:relative; left:0; top:0;">
		</div>
		<div class="map-legend columns-2" style="background-color:white; position:absolute; bottom:2em; left:2em;">
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
