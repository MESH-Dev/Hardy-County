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
					<div id="monthselectors">
						<a href="#jan" class="monthscrolltrigger">
						<div class="single_month">
							<p>JAN</p>
							<p class="arrow_indicator">&#10165;</p>
						</div>
						</a>
						<a href="#feb" class="monthscrolltrigger">
						<div class="single_month">
							<p>FEB</p>
							<p class="arrow_indicator">&#10165;</p>
						</div>
						</a>
						<a href="#mar" class="monthscrolltrigger">
						<div class="single_month">
							<p>MAR</p>
							<p class="arrow_indicator">&#10165;</p>
						</div>
						</a>
						<a href="#apr" class="monthscrolltrigger">
						<div class="single_month">
							<p>APR</p>
							<p class="arrow_indicator">&#10165;</p>
						</div>
						</a>
						<a href="#may" class="monthscrolltrigger">
						<div class="single_month">
							<p>MAY</p>
							<p class="arrow_indicator">&#10165;</p>
						</div>
						</a>
						<a href="#jun" class="monthscrolltrigger">
						<div class="single_month">
							<p>JUN</p>
							<p class="arrow_indicator">&#10165;</p>
						</div>
						</a>
						<a href="#jul" class="monthscrolltrigger">
						<div class="single_month">
							<p>JUL</p>
							<p class="arrow_indicator">&#10165;</p>
						</div>
						</a>
						<a href="#aug" class="monthscrolltrigger">
						<div class="single_month">
							<p>AUG</p>
							<p class="arrow_indicator">&#10165;</p>
						</div>
						</a>
						<a href="#sep" class="monthscrolltrigger">
						<div class="single_month">
							<p>SEP</p>
							<p class="arrow_indicator">&#10165;</p>
						</div>
						</a>
						<a href="#oct" class="monthscrolltrigger">
						<div class="single_month">
							<p>OCT</p>
							<p class="arrow_indicator">&#10165;</p>
						</div>
						</a>
						<a href="#nov" class="monthscrolltrigger">
						<div class="single_month">
							<p>NOV</p>
							<p class="arrow_indicator">&#10165;</p>
						</div>
						</a>
						<a href="#dec" class="monthscrolltrigger">
						<div class="single_month">
							<p>DEC</p>
							<p class="arrow_indicator">&#10165;</p>
						</div>
						</a>
					</div>
				</div>
				<div id="mar" class="events_month">
					<p>MARCH</p>
					<div class="single_event">
						<div class="date">
							<h5>APR</h5>
							<h3>28</h3>
						</div>
						<div class="info">
							<h2>Bean Settlement Spring Festival</h2>
							<p>North River Road, Bean Settlement</p>
						</div>
					</div><div class="single_event">
						<div class="date">
							<h5>APR</h5>
							<h3>28</h3>
						</div>
						<div class="info">
							<h2>McNeill's Rangers SCV Camp 482 Memorial Day Festival</h2>
							<p>Moorefield | Noon - 6pm</p>
						</div>
					</div><div class="single_event">
						<div class="date">
							<div class="day_container">
								<h5>Jun</h5>
								<h3>20</h3>
							</div>
							<div class="day_container">
								<h3>-</h3>
							</div>
							<div class="day_container">
								<h5>Jun</h5>
								<h3>25</h3>
							</div>
						</div>
						<div class="info">
							<h2>Hardy County Heritage Weekend</h2>
							<p><a href="">heritageweekend.com</a> | 304.530.0280</p>
						</div>
					</div>					
				</div>	
				<div id="apr" class="events_month">
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
				<div id="may" class="events_month">
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
				<div id="jun" class="events_month">
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
					<div class="widebutton aquamarine"><div class="button_text"><h6>Have an event related to Hunting and Fishing that you want to tell people about? Fill out a form to get your post out there for people to attend.</h6><a href=""><h5>Share it with us! &#10165;</h5></a></div></div>
					<div class="widebutton white"><div class="button_text"><p><em>Keep learning about all the things Outdoors &amp; In around Hardy County and the Potomac Highlands...</em></p></div></div><figure>
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
