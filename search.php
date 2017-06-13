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

					<?php while ( have_posts() ) : the_post(); 
						
						$sections = get_the_terms($post->ID, 'primary_section' );
						$section_title="";
						$section_slug='';
						$cats = get_the_terms($post->ID, 'category');
						$category_name = '';
						$category_slug = '';

						foreach($sections as $section){
							$section_title = $section->name;
							$section_slug = $section->slug;
						}

						foreach($cats as $cat){
							$category_name = $cat->name;
							$category_slug = $cat->slug;
						}

						$post_type = get_post_type($post->ID);
						$home = esc_url( home_url( '/' ) );
						$link='';
						if($post_type == 'listing'){
							$link = $home.'/'.$section_slug.'/'.$category_slug;
						}else{
							$link = get_the_permalink();
						}
					?>
						<div class="post">
							<h2>
								<a href="<?php echo $link; ?>">
									<?php the_title(); ?> &#10165;
								</a>
							</h2>
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
