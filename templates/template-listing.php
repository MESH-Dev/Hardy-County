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
					$args = array(
						'post_type' => 'listing',
						'posts_per_page' => '-1',
						'orderby'=>'title',
						'order'=>'ASC',
						'tax_query'=>array(
								array(
								'taxonomy'=>'category',
								'field'=>'slug',
								'terms'=>$listing_cat,
								),
							),
					);

					$the_query = new WP_Query( $args );

					$count=$the_query->post_count;
					$half_count=$count/2;
					$half_round = round($half_count);
					
					if ($the_query->have_posts()){

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
						if($site != ''){
							$site_parse = parse_url($site);
							$domain = preg_replace('/^www\./', '', $site_parse['host']);
						}
						//var_dump($site_parse);
						$phone = get_field('phone_number', $post->ID);
						$email = get_field('email', $post->ID);
						global $post;
    					$post_slug=$post->post_name;

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
						$separator = ', ';

						if($tags != ''){
							foreach($tags as $tag){
								$tag_name .= $tag->name.$separator;
							}
						}else{
							$tag_name = "&nbsp;";
						}

						$title = get_the_title();
					
					    //Lower case everything
					    $title_lc = strtolower($title);
					    //Make alphanumeric (removes all other characters)
					    $title_cln = preg_replace("/[^a-z0-9_\s-]/", "", $title_lc);
					    //Clean up multiple dashes or whitespaces
					    $title_sanit = preg_replace("/[\s-]+/", " ", $title_cln);
					    //Convert whitespaces and underscore to dash
					    $title_id = preg_replace("/[\s_]/", "-", $title_sanit);
					    
						?>

						<?php if($l_cnt == $half_round+1){ ?>
							</div><div class='columns-6'>
							<?php } ?>
						<div class="listing row" id="<?php echo $post_slug; ?>" tabindex="<?php echo $l_cnt; ?>">  
							
							<div class="line-item" >
								<h2><?php echo $l_cnt; ?>.</h2>
							</div>
							<div class="listing-content">
								<span class="tags"><?php echo rtrim($tag_name, $separator); ?></span>
							<h2><?php the_title(); ?></h2>
							<div class="lc-push">
								<?php //if ($address != '' && $site != '' && $phone != ''){?>
								<p class="loc">
									<?php 
										
										if($address != ''){
											echo '<span class="address">'.$address.'</span>';
											echo '</br>';
										}
										// if($address != '' && $city == ''){
										// 	echo '</br>';	
										// }
										if($city != ''){
											echo '<span class="city">'.$city.'</span>';
											echo ' ';
										}
										if($zip != ''){
											echo $zip;
											echo '</br>';
										}
										elseif($zip == '' && $city != ''){
											echo '</br>';
										}
										if ($phone != ''){
											echo '<span class="phone">'.$phone.'</span><br>';
										}
										if($email != ''){?>
											Contact: <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a><br>
										<?php }
										if($site != ''){?>
											<a class="site" href="<?php echo $site; ?>" target="_blank">
												<?php if (strpos($site, 'facebook')){ ?>
												<i class="fa fa-fw fa-facebook-official"></i>
												<?php }elseif(strpos($site, 'pdf')){
													if($site_text !=''){
													echo $site_text; 
													}else{
														echo 'View PDF';
													}
													?>
												<i class="fa fa-fw fa-file-text"></i>
												<?php }else{ 
												if ($site_text == ''){
													echo $domain; 
												}else{
													echo $site_text;
												}
												}
												 ?>
											</a>
										<?php }
										// if(($site !='' || $email !='') && $phone != ''){
										// 	echo '| ';
										// }
										// if ($phone != ''){
										// 	echo '<br><span class="phone">'.$phone.'</span>';
										// }
										?>
								</p>
								<?php //} ?>
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
