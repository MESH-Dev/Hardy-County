<?php

//Add all custom functions, hooks, filters, ajax etc here

include('functions/start.php');
include('functions/cpt.php');
include('functions/clean.php');

//Custon wp-admin logo
function my_custom_login_logo() {
  echo '<style type="text/css">
		        h1 a {
		          background-size: 227px 85px !important;
		          margin-bottom: 20px !important;
		          background-image:url('.get_bloginfo('template_directory').'/images/hardy-logo.png) !important; }
		    </style>';
}

//Add ACF Options page, good for Global ACF inputs, like things in the header/footer.
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}

?>
