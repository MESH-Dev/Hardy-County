<?php

//Use this file for wp menus, sidebars, image sizes, loadup scripts.



//enqueue scripts and styles *use production assets. Dev assets are located in  /css and /js
function loadup_scripts() {
    wp_enqueue_script( 'macy', get_template_directory_uri().'/js/macy.min.js', array('jquery'), '1.0.0', true );
     wp_enqueue_script( 'masonry', get_template_directory_uri().'/js/masonry.min.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'tweenmax', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.1/TweenMax.min.js', '1.0.0', true ); 
    wp_enqueue_script( 'scrollto', '//cdnjs.cloudflare.com/ajax/libs/gsap/1.19.1/plugins/ScrollToPlugin.min.js', '1.0.0', true ); 
    wp_enqueue_script( 'parallax', get_template_directory_uri().'/js/jquery.parallax-1.1.3.js', array('jquery'), '1.0.0', true );

	wp_enqueue_script( 'theme-js', get_template_directory_uri().'/js/mesh.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'packery', '//cdnjs.cloudflare.com/ajax/libs/packery/2.1.1/packery.pkgd.js', array('jquery'), '1.0.0', true );
    wp_enqueue_style( 'font-awesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css', '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'loadup_scripts' );

// Add Thumbnail Theme Support
add_theme_support('post-thumbnails');
add_image_size('background-fullscreen', 1800, 1200, true);
add_image_size('short-banner', 1800, 800, true);

add_image_size('large', 700, '', true); // Large Thumbnail
add_image_size('medium', 250, '', true); // Medium Thumbnail
add_image_size('small', 120, '', true); // Small Thumbnail
add_image_size('custom-size', 700, 200, true);
add_image_size('square', 500, 500, true); // Custom Square Size



//Register WP Menus
register_nav_menus(
    array(
        'main_nav' => 'Header and breadcrumb trail heirarchy',
        'social_nav' => 'Social menu used throughout',
        'gateway_nav' => 'Gateway navigation appearing in the header'
    )
);

// Register Widget Area for the Sidebar
register_sidebar( array(
    'name' => __( 'Primary Widget Area', 'Sidebar' ),
    'id' => 'primary-widget-area',
    'description' => __( 'The primary widget area', 'Sidebar' ),
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
) );

//Functions file can't seem to find this function...
function getInstagram(){
    $json = file_get_contents('https://api.instagram.com/v1/users/1167443738/media/recent?access_token=1167443738.d346c1d.1213de64f26e485e8ffe33eab03e1905');
    $obj = json_decode($json);
    return $obj->data;

    //$instagram = getInstagram();
}

//var_dump(getInstagram());

// function blogrollPosts($include, $tag_id, $returnNum){
//     $timestamps = array();

//     //if(in_array('instagram', $include)){
//                 //Get Instagram
//                 $instagram = getInstagram();
//                 //var_dump($instagram);
//                 foreach($instagram as $post){
//                     $post->unix_timestamp = $post->created_time;
//                     $post->post_source = 'instagram';
//                     array_push($timestamps, $post->created_time);
//                 }
//                 //var_dump($instagram);
//             // }else{
//             //     $instagram = array();
//             // }
// }

//Add ajax functionality to pages, all not just in admin
add_action('wp_head','pluginname_ajaxurl');
function pluginname_ajaxurl() {
    ?>
    <script type="text/javascript">
    var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
    </script>
    <?php
    }


?>
