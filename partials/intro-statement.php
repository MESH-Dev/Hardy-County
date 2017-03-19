<div class="container">
	<?php 
		if(is_page_template('templates/template-listing.php')){
			$template="listing";
		}else{
			$template="";
		}
		
	$intro_text=get_field('intro_text'); ?>
	<div class="intro-statement <?php echo $template; ?>">
		<h2 class="intro-text">
			<?php echo $intro_text; ?>
		</h2>
	</div>
		
</div> 