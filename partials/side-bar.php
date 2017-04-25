

	<?php //if (have_rows('sidebar_block')):?>
		
		<?php while (have_rows('sidebar_block')):the_row(); ?>
		<div class="columns-4 sidebar">
<?php
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

					if($cta_text != ''){
			?>
			<div class="cta">
				<a class="cta-link" href="<?php echo $cta_link; ?>"><?php echo $cta_text ?> &#10165;</a>
			</div>
			<?php } endwhile; endif; //end cta link loop?> 
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
</div>
	<?php endwhile; ?>
	
<?php //endif; ?>
	
