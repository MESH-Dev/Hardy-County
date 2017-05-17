<?php 
		$ip_banner=get_field('ip_banner');
		$ip_banner_url=$ip_banner['sizes']['short-banner'];
?>	
<div class="banner interior" <?php if ($ip_banner != ''){ ?> style="background-image:url('<?php echo $ip_banner_url; ?>')" <?php } ?>>	
	<div class="overlay" aria-hidden="true"></div>
	<div class="banner-content">
		<div class="container">
			<h1 class="page-title">
				<?php if(is_search()){ ?>
					Search Results
				<?php 
				}elseif(is_singular('event')){?>
				Events
				<?php }elseif(is_404()){?>
				Page Not found!
				<?php }else{
				if ( $post->post_parent ) { ?>
					<span>
						<a href="<?php echo get_permalink( $post->post_parent ); ?>" >
							<?php echo get_the_title( $post->post_parent ); ?>
							</a>
						</span><br>
				<?php 
					} 
				 the_title(); 
					} ?>

			</h1>
		</div>
	</div>
</div>