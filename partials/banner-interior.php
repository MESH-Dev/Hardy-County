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