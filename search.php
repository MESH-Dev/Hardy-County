<?php 
/* Template Name: Search Results Page */
get_header(); ?>

<?php get_template_part('partials/banner-interior')?>
<main id="content" class="search-page">
	
	<div class="container body-content">
		<div class="row">
			<div class="columns-7 body-copy">
				<?php if ( have_posts() ) : ?>
					<h2><?php printf( __( 'Search Results for: %s' ), '<span>' . get_search_query() . '</span>' ); ?></h2>

					<?php while ( have_posts() ) : the_post(); ?>

						<div class="post">
							<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?> &#10165;</a></h2>
							<!-- <p class="postinfo">By <?php the_author(); ?> | Categories: <?php the_category(', '); ?> | <?php comments_popup_link(); ?></p> -->
							<?php
								if(get_the_content() != 0){ 
								the_content('Read more &#10165'); 
									}
								?>
						</div>

					<?php endwhile; ?>

				<?php else : ?>
					<h1>Nothing Found</h1>
					<p>Nothing matched your search criteria. Please try again with some different keywords.</p>

					<?php get_template_part('partials/searchform') ?>
				<?php endif; ?>
			</div>
			<?php get_template_part('partials/side-bar') ?>
			
		</div>
	</div>

</main><!-- End of Content -->

<?php get_footer(); ?>
