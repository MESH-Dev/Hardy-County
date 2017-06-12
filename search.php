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
							//$link='';
						$home = esc_url( home_url( '/' ) );
						var_dump($home);
						$link='';
						if($post_type == 'listing'){
							//$link = $home .'/culture-heritage/';
							// if($section_title == 'Culture & Heritage' ){
							// 	$link = $home .'/culture-heritage';
							// }elseif($section_title == 'Eat & Drink' ){
							// 	$link = $home .'/eat-drink';
							// }elseif($section_title == 'Eat & Drink' )
							//Eat & Drink
							//Fairs & Festivals
							//Hunt & Fish
							//	Outside & In
							//Shop In Town & Out
							//Sleep & Relax
							//	Take it Easy
							$link = $home.'/'.$section_slug.'/'.$category_slug;
						}else{
							$link = get_the_permalink();
						}
					?>
						<div class="post">
							<h2>
								<a href="<?php echo $link; ?>">
									<?php the_title(); ?> <?php echo $post_type; ?> <?php echo $section_title; ?> &#10165;
								</a>
							</h2>
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
