<?php 
/* Template Name: Events Template*/

get_header(); 

?>

<main id="content">
	<div class="banner interior" style="background-image: url('http://localhost:8888/hardy/wp-content/uploads/2017/02/narrow-banner-placeholder.png');">
		<div class="banner-heading">
			<div class="container">
				<p>Optional Parent Page</p>
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<h1><?php the_title(); ?></h1>
				<?php endwhile; ?>	
			</div>		
		</div>
	</div>
	<div class="container body-content">
		<div class="row">
			<div class="columns-12">
				<div class="events_heading">
					<p>Hardy County hosts a great selection of events happening in and around the Potomac Highlands. Check out the listing below for events throughout the year. Click on a Month to jump ahead.</p>
					<div class="monthselectors">
						<p>
							<a href="">JAN</a>
							<a href="">FEB</a>
							<a href="">MAR</a>
							<a href="">APR</a>
							<a href="">MAY</a>
							<a href="">JUN</a>
							<a href="">JUL</a>
							<a href="">AUG</a>
							<a href="">SEP</a>
							<a href="">OCT</a>
							<a href="">NOV</a>
							<a href="">DEC</a>
						</p>
					</div>
				</div>
				<div class="events_month">
					<p>MARCH</p>
					<div class="date">
						<h5>APR</h5>
						<h3>28</h3>
					</div>
					<div class="info">
						<h2>Bean Settlement Spring Festival</h2>
						<p>North River Road, Bean Settlement</p>
					</div>
					<div class="date">
						<h5>APR</h5>
						<h3>28</h3>
					</div>
					<div class="info">
						<h2>McNeill's Rangers SCV Camp 482 Memorial Day Festival</h2>
						<p>Moorefield | Noon - 6pm</p>
					</div>
					<div class="date">
						<h5>Jun</h5>
						<h3>20 - 25</h3>
					</div>
					<div class="info">
						<h2>Hardy County Heritage Weekend</h2>
						<p><a href="">heritageweekend.com</a> | 304.530.0280</p>
					</div>					
				</div>	
				<div class="events_month">
					<p>APRIL</p>
					<div class="date">
						<h5>APR</h5>
						<h3>28</h3>
					</div>
					<div class="info">
						<h2>Bean Settlement Spring Festival</h2>
						<p>North River Road, Bean Settlement</p>
					</div>
				</div>
				<div class="events_month">
					<p>MAY</p>
					<div class="date">
						<h5>APR</h5>
						<h3>28</h3>
					</div>
					<div class="info">
						<h2>Bean Settlement Spring Festival</h2>
						<p>North River Road, Bean Settlement</p>
					</div>
				</div>
				<div class="events_month">
					<p>JUNE</p>
					<div class="date">
						<h5>APR</h5>
						<h3>28</h3>
					</div>
					<div class="info">
						<h2>Bean Settlement Spring Festival</h2>
						<p>North River Road, Bean Settlement</p>
					</div>
				</div>																
				<!-- <?//php if ( have_posts() ) while ( have_posts() ) : the_post(); ?> -->
					<!-- <?//php the_content(); ?> -->
				<!-- <?//php endwhile; ?> -->
				<div class="events_cta">
					<a href=""><div class="widebutton aquamarine"><p>Have an event related to Hunting and Fishing that you want to tell people about? Fill out a form to get your post out there for people to attend.</p></div></a>
					<div class="widebutton white"><p><em>Keep learning about all the things Outdoors &amp; In around Hardy County and the Potomac Highlands...</em></p></div><figure>
						<img src="http://localhost:8888/hardy/wp-content/uploads/2017/01/primary-cta-placeholder3.png">
						<figcaption>
							<p>Paragraph</p>
							<h2>Heading 2</h2>
						</figcaption>		
					</figure><figure><img src="http://localhost:8888/hardy/wp-content/uploads/2017/02/primary-cta-placeholder_landscape.png"><figcaption><p>Paragraph</p><h2>Heading 2</h2></figcaption></figure></div>
			</div>
		</div>
	</div>

</main><!-- End of Content -->

<?php get_footer(); ?>
