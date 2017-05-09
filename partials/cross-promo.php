		<?php 
			$leadin_class = '';
			if(is_page_template('templates/template-listing.php')){
				$leadin_class = 'listing';
			}elseif(is_page_template('templates/template-landing.php')){
				$leadin_class = 'landing';
			}elseif(is_page_template('templates/template-events.php')){
				$leadin_class = 'event';
			}
			?>
		<div class="cp-leadin <?php echo $leadin_class; ?>">
			<?php $cp_leadin = get_field('cpl_text');?>
			<?php if($cp_leadin != ''){ ?>
				<p><?php echo $cp_leadin; ?></p>
			<?php }else{ ?>
				<p class="error">**You have not included text here, please return to the edit screen to add</p>
			<?php } ?>
		</div>
<!-- Cross promotion row -->
		<div class="grid">
			<div class="row">
				<?php 
					if(have_rows('cross_promotion_items')):
						while(have_rows('cross_promotion_items')):the_row();

						//Declare sub_fields for this row

						//__This section sets up the post_object for the 'cross_promotion_item' subfield
						$post_link=get_sub_field('cross_promotion_item');
						$promotion_row_bg = get_the_post_thumbnail_url($post_link->ID, 'large');
						$post_p = $post_link;
						setup_postdata( $post_p );

						//We used a repeater here to group content in the CMS
						//Get started pulling that content...
						$featured_items = get_field('featured_information', $post_p->ID);
						
						//Get all of your sub fields by looking at our "array" (it has only 1 row) by calling position [0]
						//We add to that the name of our sub_field in array syntax ['{ sub_field_name }']
						$cp_background=$featured_items[0]['background'];
						$background_url = $cp_background['sizes']['large'];
						$background_alt = $cp_background['alt'];
						$curated_bg = get_sub_field('curated_bg_image');
						$curated_bg_url=$curated_bg['sizes']['large'];
						$curated_alt = $curated_bg['alt'];
						$tagline = $featured_items[0]['tagline'];

						$block_type = '';

						if($curated_bg_url != ''){
							$bg = $curated_bg_url;
							$bg_alt = $curated_alt;
						}else{
							$bg = $background_url;
							$bg_alt = $background_alt;
						}

						if(is_page_template('templates/template-listing.php')){
					
					?>

					<a href="<?php echo the_permalink($post_p->ID); ?>">
						<figure class="columns-6 eq primary cpromo no-padding " ><!-- grid-item grid-item-width4  style="background-image:url('<?php //echo $thumbnail; ?>')"-->
							<div class="portrait" style="background-image:url('<?php echo $bg; ?>');">
								<span class="sr-only">
									<?php echo $bg_alt; ?>
								</span>
							</div>
									<!-- <img alt="<?php echo $bg_alt; ?>" src="<?php echo $bg; ?>"> -->
									<!-- <figcaption> -->
										<h1><?php echo $post_p->post_title; ?></h1>
										<p><?php echo $tagline; ?><br><span>&#10165;</span></p>
										<div class="width6-diamond"></div>
									<!-- </figcaption> -->

								<!-- </div>
							</div> -->

						</figure>
					</a>
					<?php }else{ ?>
					<a href="<?php echo the_permalink($post_p->ID); ?>" >
						<figure class="columns-6 eq secondary promo no-padding" ><!-- style="background-image:url('<?php echo $background_url; ?>');" -->
							<!-- <div class="wrap"> -->
							<div class="portrait" style="background-image:url('<?php echo $bg; ?>');">
								<span class="sr-only">
									<?php echo $bg_alt; ?>
								</span>
							</div>
							<!-- <img alt="<?php echo $bg_alt; ?>" src="<?php echo $bg; ?>"> -->
							<figcaption class="content">
								<p><?php echo $tagline; ?></p>
								<h2><?php echo $post_p->post_title; ?></h2>
								<!-- <h2><?php //echo $parent_post_title ?></h2> -->
							</figcaption>
							<!-- </div> -->
						</figure>
					</a>
				<?php } wp_reset_postdata(); endwhile; endif; ?>
			</div>
		</div>
		<!-- End cross promotion grid -->