<?php 
/* Template Name: Listing Template*/

get_header(); 

?>



<main id="content">
	<div class="banner interior with-map" >	
		<!-- <div class="overlay" aria-hidden="true"></div> -->
		<div id="map" style="height:650px; width:100%; position:absolute; left:0; top:0;"></div>
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
	<?php //var_dump(get_post_type($post->ID)); ?>
	</div>
	



    <?php 

    	//Get the appropriate listing from the custom fiels, returns an array
    	$listing_category = get_field('listing_category');
    	//var_dump($listing_category);
    	//Set our variable to nothing, to use as a container for our category
    	$listing_cat='';

    	//Break the array into chunks, and pull out the slug, since it matches our taxonomy
    	foreach($listing_category as $listing){
    		$listing_cat = $listing->slug;
    	}
    ?>
	<div class="container">
		<?php get_template_part('partials/intro-statement'); ?>
		<div class="row">
			
			<div class="listing-grid" data-category="<?php echo $listing_cat; ?>" >
				<div class="listings row">
			<?php 
					//$da_date = get_field('start_date');
					//var_dump($da_date);
					//$today=date('Ymd');
					//$currMonth = date('m');
					//$currYear = date('Y');
					$args = array(
						'post_type' => 'listing',
						'posts_per_page' => '-1',
						'orderby'=>'name',
						'order'=>'ASC',
						'tax_query'=>array(
								array(
								'taxonomy'=>'category',
								'field'=>'slug',
								'terms'=>$listing_cat,
								),
							),
						//'meta_key'=>'primary_section',
						// 'date_query'=>array(
						// 		'month'=>'12',
						// 	),
						// 'meta_query' => array(
						// 		array(
						// 				'key'=>'start_date',
						// 				'compare'=>'>=',
						// 				'value'=>$today,
						// 			)
						// 	)
					);

					$the_query = new WP_Query( $args );

					$count=$the_query->post_count;
					//$post_slug = $the_query->post_name;
					$half_count=$count/2;
					
					$half_round = round($half_count);
					

					//var_dump($count);
					if ($the_query->have_posts()){
						//var_dump($the_query);
						//$first_loop = 0; 
						$l_cnt=0;?>
						<div class="columns-6">
						<?php
						while($the_query->have_posts()) { $the_query->the_post();
						$l_cnt++;
						$city = get_field('city', $post->ID);
						$address = get_field('street_address', $post->ID);
						$zip = get_field('zip', $post->ID);
						$site_text = get_field('web_address_link_text');
						$site = get_field('web_address', $post->ID);
						$strip_site = preg_replace('#^https?://#', '', $site);
						//var_dump($strip_site);
						$phone = get_field('phone_number', $post->ID);
						$email = get_field('email', $post->ID);
						global $post;
    					$post_slug=$post->post_name;
						//$post_slug = $the_query->slug;
						//var_dump($post_slug);

						$sections = get_the_terms($post->ID,'category');
						$sec_name = '';
						if($sections != ''){
							foreach($sections as $section){
								$sec_name = $section->name;
							}
						}else{
							$sec_name="Uncategorized";
						}
						$tag_name = '';
						$tags = get_the_tags($post->ID);
						//var_dump($tags);
						if($tags != ''){
							foreach($tags as $tag){
								$tag_name = $tag->name;
							}
						}else{
							$tag_name = "&nbsp;";
						}

						$title = get_the_title();
						//$title_lc = strtolower($title);

						//function seoUrl($string) {
						    //Lower case everything
						    $title_lc = strtolower($title);
						    //Make alphanumeric (removes all other characters)
						    $title_cln = preg_replace("/[^a-z0-9_\s-]/", "", $title_lc);
						    //Clean up multiple dashes or whitespaces
						    $title_sanit = preg_replace("/[\s-]+/", " ", $title_cln);
						    //Convert whitespaces and underscore to dash
						    $title_id = preg_replace("/[\s_]/", "-", $title_sanit);
						    //return $title;
						//}

						?>

						<?php if($l_cnt == $half_round+1){ ?>
							</div><div class='columns-6'>
							<?php } ?>
						<div class="listing row" id="<?php echo $post_slug; ?>" tabindex="<?php echo $l_cnt; ?>">  <!-- columns-6 -->
							
							<div class="line-item" >
								<h2><?php echo $l_cnt; ?>.</h2>
							</div>
							<div class="listing-content">
							<!-- <div class=""> --><!-- push -->
							<?php //if($tags != ''){?>
								<span class="tags"><?php echo $tag_name; ?></span>
							<!-- </div> -->
							<?php //}else ?>

							<h2><?php //echo $l_cnt; ?> <?php the_title(); ?></h2>
							<div class="lc-push"><!-- push -->
								<p class="loc">
									<?php 
										
										if($address != ''){
											echo $address;
											echo '</br>';
										}
										if($city != ''){
											echo $city;
											echo ' ';
										}
										if($zip != ''){
											echo $zip;
											echo '</br>';
										}
										if($email != ''){?>
											Contact: <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
										<?php }
										if($site != ''){?>
											<a class="site" href="<?php echo $site; ?>" target="_blank">
												<?php //echo $strip_site; ?>
												<?php 
												if ($site_text == ''){
													echo $strip_site; 
												}else{
													echo $site_text;
												}
												 ?>
											</a>
										<?php }
										if($site !='' && $phone != ''){
											echo '| ';
										}
										if ($phone != ''){
											echo '<span class="phone">'.$phone.'</span>';
										}
										?>
								</p>
							</div><!-- end lc-push -->
						</div><!-- end listing.row -->
					</div>
						<?php if($count-$l_cnt == 0){?>
							</div>
						<?php } ?>
				<?php } } wp_reset_postdata(); ?>
			</div>
		</div>
		
		<?php get_template_part('partials/cross-promo'); ?>
		</div>
	</div>

</main><!-- End of Content -->

<?php get_footer(); ?>
