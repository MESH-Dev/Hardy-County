<?php

//Add all custom functions, hooks, filters, ajax etc here

include('functions/start.php');
include('functions/cpt.php');
include('functions/clean.php');

//Custon wp-admin logo
function my_custom_login_logo() {
  echo '<style type="text/css">
            h1 a {
              width:100% !important;
              background-size: 250px 85px !important;
              margin-bottom: 20px !important;
              background-image:url('.get_bloginfo('template_directory').'/img/hardy-logo_black.png) !important; }
        </style>';
}

//Add ACF Options page, good for Global ACF inputs, like things in the header/footer.
if( function_exists('acf_add_options_page') ) {
  
  acf_add_options_page();
  
}

//Reduce the number of revisions available in the site
add_filter( 'wp_revisions_to_keep', 'filter_function_name', 10, 2 );

function filter_function_name( $num, $post ) {
    $num=3;
    return $num;
}

//Functions file can't seem to find this function...
function getInstagram(){
    //Get Likes  
    //$json = file_get_contents('https://api.instagram.com/v1/users/self/media/liked?access_token=5484662713.fe363d8.a42b970204c040918c2ee52f5c7d9462');
    //Original - recent posts
    $json = file_get_contents('https://api.instagram.com/v1/users/5484662713/media/recent?access_token=5484662713.fe363d8.a42b970204c040918c2ee52f5c7d9462');
    $obj = json_decode($json);
    //var_dump($obj);
    return $obj->data;
}

//Add ajax functionality to pages, all not just in admin
add_action('wp_head','pluginname_ajaxurl');
function pluginname_ajaxurl() {
    ?>
    <script type="text/javascript">
    var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
    </script>
    <?php
    }

// Updates the map with new or updated listings on listing post-type update
function update_listings_map( $post_id ) {

    $post_type = get_post_type($post_id);

    if("listing" != $post_type){ return; }
    else{
        $arr = array();

        $args = array(
          'post_type' => 'listing',
          'posts_per_page'=> -1,
          'post_status' => 'publish',
          'orderby' => 'title',
          'order' => 'asc'
        );

        query_posts( $args );

        while (have_posts()) { the_post();
          //Save the post ID to a variable
          $p_id = get_the_ID();

          //Get post info to save to our json file
          $title = get_the_title();
          GLOBAL $post;
          $slug = $post->post_name;
          $address = get_field('street_address',$p_id);
          $city = get_field('city',$p_id);
          $phone = get_field('phone_number',$p_id);
          $website = get_field('web_address',$p_id);
          $zip = get_field('zip',$p_id);
          $primary_section = get_the_terms($p_id, 'primary_section'); 
          $color = get_term_meta($primary_section[0]->term_id, 'color');
          //__Get the categories for the post, we'll break it up below
          $listing_cats = get_the_category($p_id); 
          //----
        
          //get one category by splitting the value from above
          if($listing_cats){
            foreach ($listing_cats as $cat) {
             $listing_category = $cat->slug;
             $listing_name = $cat->name;
             break;
            }
          }
          
          if($primary_section){
            foreach ($primary_section as $ps){
             $primary_sec = $ps->name;
              break;
            }
          }
          

          $description = get_the_content();

          //Save the address, city, & zip to a variable to use in the getCoordinates function
         
           
          //Override   
          //Check to see if the latitude and longitude overides on the listing posttype are being used
          //If so, use those values to retrieve our location information for our map
          //If not, run the getCoordinates function to dynamically retrieve the lat and lng  
           if (get_field('latitude',$p_id) && get_field('longitude',$p_id)) {
             $lat = get_field('latitude');
             $long = get_field('longitude');
             $coordinates = array((float)$lat, (float)$long);
           }else{
            $f = $address . ' ' . $city . ' ' . $zip;
            $coordinates = getCoordinates($f);
            //If we got a good response from Google, update post_meta 
            //For latitude and longitude to help save some time when new entries are created
            update_post_meta($post->ID, 'latitude', $coordinates[0]);
            update_post_meta($post->ID, 'longitude' , $coordinates[1]);
          }
  
            //Add all of the listing 'parts' to an array
            $a = [
              "title" => $title,
              "slug"=> $slug,
              "address" => $address,
              "city" => $city,
              "phone" => $phone,
              "website" => $website,
              "zip" => $zip,
              "coordinates" => $coordinates,
              "listing_category" => $listing_category,
              "listing_name"=>$listing_name,
              "primary_section" => $primary_sec,
              "description" => $description,
              "color" => $color
            ];

            array_push($arr, $a);

        }

        

        //Reset the query in-between loops
        wp_reset_query();

        // JSON-encode the response
        $json = json_encode($arr, JSON_PRETTY_PRINT);

        //The file location for the json file we're creating
        $directory = get_template_directory().'/helpers/listings.json';

        //Write to our file
        $myfile = fopen(''.$directory.'', "w") or die("Unable to open file!");
        fwrite($myfile, $json);
        fclose($myfile);  
    }

}

add_action('save_post', 'update_listings_map', 10, 3);

//Dynamically retrieve our lat lng info based on the address provided
//** See Override above for situations where the use of this function is overriden per lisitng post
function getCoordinates($address){

          //var_dump($response)
          $address = urlencode($address);

          $url = "https://maps.google.com/maps/api/geocode/json?sensor=false&address=" . $address . "&key=AIzaSyDXR8bORut0sXyoust5FWnhi-9TA8TWktw";
          $response = file_get_contents($url);
          $json = json_decode($response,true);

          //Check to see if we received a good response from GoogleMaps
          if ($json['status'] == 'OK'){
            $lat = $json['results'][0]['geometry']['location']['lat'];
            $lng = $json['results'][0]['geometry']['location']['lng'];
          //If not, set lat lng values to 0 
          //** This should be good to narrow down issues with a particular listing,
          //   as problem listings will return a 0 value lat lng in our json file
          }else{
            $lat = $json['status'];
            $lng = $json['results'];
          }

          return array($lat, $lng);      
}


?>
