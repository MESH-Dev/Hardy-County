<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->

<head>

	<meta charset="utf-8">
	<title><?php bloginfo('name'); ?></title>

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
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">

	<!-- Fonts
	================================================== -->
	<script src="https://use.typekit.net/wlr8dyx.js"></script>
	<script>try{Typekit.load({ async: true });}catch(e){}</script>
	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
 
	<header>
		<div class="container">

			<div class=""><!-- columns-12 -->

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
							<a href="#">
								<i class="fa fa-fw fa-twitter fa-lg">
									<span class="sr-only">Follow us on twitter</span>
								</i>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fa fa-fw fa-facebook fa-lg">
									<span class="sr-only">Follow us on facebook</span>
								</i>
							</a>
						</li>
						<li>
							<a href="#">
								<i class="fa fa-fw fa-instagram fa-lg">
									<span class="sr-only">Follow us on instagram</span>
								</i>
							</a>
						</li>
					</ul>
				</nav>

				<div class="logo">
					<!-- <h1 class="site-title"> -->
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<span class="sr-only"><?php bloginfo( 'name' ); ?></span>
							<img src="<?php bloginfo('template_directory'); ?>/img/hardy-logo.png">
							<!-- <svg 
								 xmlns="http://www.w3.org/2000/svg"
								 xmlns:xlink="http://www.w3.org/1999/xlink"
								 
								 >
								 width="240px" height="75px" 
								<image style="max-width:100%; height:auto;" x="0px" y="0px"   xlink:href="data:img/png;base64,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" />
							 width="240px" height="75px" 
							</svg> -->
						</a>
					<!-- </h1> -->
				</div>
				
				<nav class="main-navigation">
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
				<!-- </div> -->
			</div>

		</div>
	</header>

	<!-- <h1>Header 1</h1>
	<h2>Header 2</h2>
	<h3>Header 3</h3>
	<h4>Header 4</h4>
	<h5>Header 5</h5>
	<h6>Header 6</h6>
	<p><a href="#">This is a link, inside of a paragraph</a></p> -->

	<?php //$posts = blogrollPosts('all','',''); var_dump($posts); 
		//$instagram = getInstagram();
		//var_dump($instagram);
	?>

		<!-- <div class="post-instagram-feature">
			<a href="<?php echo $instagram[3]->link; ?>">
				<img src="<?php echo $instagram[3]->images->low_resolution->url; ?>" />
			</a>
		</div> -->
		
