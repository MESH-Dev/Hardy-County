<?php get_header(); ?>

<main id="content">
	<?php 
		$ip_banner=get_field('ip_banner');
		$ip_banner_url=$ip_banner['sizes']['short-banner'];
	?>
	<div class="banner interior" style="background-image:url('<?php echo $ip_banner_url; ?>')">	
		<div class="banner-content">
			<div class="container">
				<h1 class="page-title">
					<?php if ( $post->post_parent ) { ?>
						<span>
							<a href="<?php echo get_permalink( $post->post_parent ); ?>" >
								<?php echo get_the_title( $post->post_parent ); ?>
 							</a>
 						</span><br>
					<?php } ?>
			<?php the_title(); ?></h1>
			</div>
		</div>
	</div>
	<!-- 
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
 -->
	<div class="container body-content">
		<div class="row">
			<div class="columns-7 body-copy">

					<?php 
						$page_intro = get_field('page_intro_text');
						if ($page_intro != ''){?>
						<h1 class="page-intro"><?php echo $page_intro; ?></h1>
					<?php } ?>

					<?php the_content(); ?>

				
			</div>

			<div class="columns-4 sidebar">

				<?php if (have_rows('sidebar_block')):
					while (have_rows('sidebar_block')):the_row(); 

					$block_type = get_sub_field('block_type');
					//Choose:
					// 1) image-only
					// 2) text-box
					// 3) cross-promotional
					$background = get_sub_field('background_image');
					$background_url = $background['sizes']['large'];
					$tb_title = get_sub_field('text_block_title');
					$tb_content = get_sub_field('text_content');
					//cross_promotion_link

					if ($block_type == 'image-only'){
				?>
					<figure>
						<img src="<?php echo $background_url; ?>">		
					</figure>

				<?php }elseif ($block_type == 'text-box'){ ?>
					<div class="info">
						<h2><?php echo $tb_title; ?></h2>
						<div class="text-box-content">
							<?php echo $tb_content; ?>
						</div>
						<?php if (have_rows('cta_link')):
							while(have_rows('cta_link')):the_row(); 
								$cta_text = get_sub_field('cta_link_text');
								$cta_link = get_sub_field('cta_link');
						?>
						<div class="cta">
							<a class="cta-link" href="<?php echo $cta_link; ?>"><?php echo $cta_text ?> &#10165;</a>
						</div>
						<?php endwhile; endif; //end cta link loop?> 
					</div>	

				<?php }elseif ($block_type = 'cross-promotional'){ 
						//Declare sub_fields for this row

						//__This section sets up the post_object for the 'cross_promotion_item' subfield
						$post_link=get_sub_field('cross_promotion_link');
						$promotion_row_bg = get_the_post_thumbnail_url($post_link->ID, 'large');
						$post_p = $post_link;
						setup_postdata( $post_p );

						//We used a repeater here to group content in the CMS
						//Get started pulling that content...
						$featured_items = get_field('featured_information', $post_p->ID);
						//var_dump($featured_items);
						
						//Get all of your sub fields by looking at our "array" (it has only 1 row) by calling position [0]
						//We add to that the name of our sub_field in array syntax ['{ sub_field_name }']
						$cp_background=$featured_items[0]['background'];
						$background_url = $cp_background['sizes']['large'];
						$tagline = $featured_items[0]['tagline'];
					?>
					<a href="<?php echo the_permalink($post_p->ID); ?>" >
						<figure class="secondary promo" ><!-- style="background-image:url('<?php echo $background_url; ?>');" -->
							<!-- <div class="wrap"> -->
							<img src="<?php echo $background_url; ?>">
							<figcaption class="content">
								<p><?php echo $tagline; ?></p>
								<h2><?php echo $post_p->post_title; ?></h2>
								<!-- <h2><?php //echo $parent_post_title ?></h2> -->
							</figcaption>
							<!-- </div> -->
						</figure>
					</a>

				<?php }	?>	

				<?php endwhile; endif; ?>
				<!-- <figure>
					<img src="http://localhost:8888/hardy/wp-content/uploads/2017/01/secondary-cta-placeholder.png">		
				</figure> -->
				<!-- <div class="info">
					<h2>Item Title Style</h2>
					<p>Description style for the item listed.</p>				
					<p><a href="">linktowebsite.com</a> | 304.530.0280</p>
					<div class="linksection">
						<p><a href="">Link to Download PDF &#10165;</a></p>
						<p><a href="">Link Style to another section on the site &#10165;</a></p>
					</div>
				</div>			 -->	
				<!-- Change this to repeater of custom fields -->
				<!-- <figure>
					<img src="http://localhost:8888/hardy/wp-content/uploads/2017/01/primary-cta-placeholder2.png">
					<figcaption>
						<p>Paragraph</p>
						<h2>Heading 2</h2>
					</figcaption>		
				</figure> -->
				
			</div>

		</div>
	</div>

</main><!-- End of Content -->

<?php get_footer(); ?>
