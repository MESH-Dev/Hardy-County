<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->

<head>

	<meta charset="utf-8">
	<title><?php bloginfo('name'); ?> <?php if(!is_front_page()){ echo ' | ' . get_the_title(); } ?></title>

	<!-- Meta / og: tags -->
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Mobile Specific Metas
	================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
	================================================== -->
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="/favicon.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/manifest.json">
	<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="theme-color" content="#ffffff">

	<!-- Fonts
	================================================== -->
	<script src="https://use.typekit.net/wlr8dyx.js"></script>
	<script>try{Typekit.load({ async: false });}catch(e){}</script>
	<?php wp_head(); ?>

	<script type='text/javascript'>
		(function (d, t) {
		  var bh = d.createElement(t), s = d.getElementsByTagName(t)[0];
		  bh.type = 'text/javascript';
		  bh.src = 'https://www.bugherd.com/sidebarv2.js?apikey=zz5bdnqbi0dq6e1b2bb8ea';
		  s.parentNode.insertBefore(bh, s);
		  })(document, 'script');
	</script>

</head>
<script>var $dir = '<?php echo get_template_directory_uri(); ?>';  </script>
<body <?php body_class(); ?>>
 
	<header <?php if(is_page_template('templates/template-listing.php') || is_page_template('templates/template-map-full.php')){?> class="has-overlay" <?php } ?>>
		<div class="container">

			<div>

				<nav class="gateway-nav">
					<?php if(has_nav_menu('gateway_nav')){
								$defaults = array(
									'theme_location'  => 'gateway_nav',
									'menu'            => 'gateway_nav',
									'container'       => false,
									'container_class' => '',
									'container_id'    => '',
									'menu_class'      => 'menu',
									'menu_id'         => '',
									'echo'            => true,
									'fallback_cb'     => 'wp_page_menu',
									'before'          => '',
									'after'           => '',
									'link_before'     => '',
									'link_after'      => '',
									'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
									'depth'           => 0,
									'walker'          => ''
								); wp_nav_menu( $defaults );
							}else{
								echo "<p><em>gateway_nav</em> doesn't exist! Create it and it'll render here.</p>";
							} ?>
					<ul class="social_nav">
						<li>
							<a href="https://www.youtube.com/user/HardyCountyCVB" target="_blank">
								<i class="fa fa-fw fa-youtube-square fa-lg">
									<span class="sr-only">Follow us on twitter</span>
								</i>
							</a>
						</li>
						<li>
							<a href="https://www.facebook.com/pages/Visit-Hardy/153163514721890" target="_blank">
								<i class="fa fa-fw fa-facebook fa-lg">
									<span class="sr-only">Follow us on facebook</span>
								</i>
							</a>
						</li>
						<li>
							<a href="https://www.instagram.com/visithardy/" target="_blank">
								<i class="fa fa-fw fa-instagram fa-lg">
									<span class="sr-only">Follow us on instagram</span>
								</i>
							</a>
						</li>
					</ul>
				</nav>

				<div class="logo">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<span class="sr-only"><?php bloginfo( 'name' ); ?></span>
							<img src="<?php bloginfo('template_directory'); ?>/img/hardy-logo.png" alt="Hardy County Logo, Click here to return to the homepage">
						</a>
				</div>
				<div class="sidr-trigger"><span>MENU <i class="fa fa-fw fa-bars"></i></span></div>
				<nav class="main-navigation">
					<div class="close"><span>Close <img src="<?php bloginfo('template_directory'); ?>/img/sidr-close.png" alt="Close this navigation" aria-hidden="true"></span></div>
					<?php if(has_nav_menu('main_nav')){
								$defaults = array(
									'theme_location'  => 'main_nav',
									'menu'            => 'main_nav',
									'container'       => false,
									'container_class' => '',
									'container_id'    => '',
									'menu_class'      => 'menu',
									'menu_id'         => '',
									'echo'            => true,
									'fallback_cb'     => 'wp_page_menu',
									'before'          => '',
									'after'           => '',
									'link_before'     => '',
									'link_after'      => '',
									'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
									'depth'           => 0,
									'walker'          => ''
								); wp_nav_menu( $defaults );
							}else{
								echo "<p><em>main_nav</em> doesn't exist! Create it and it'll render here.</p>";
							} ?>
				</nav>
			</div>

		</div>
	</header>