<?php 

$arr = array();

$args = array(
  'post_type' => 'listing',
  'posts_per_page'=> -1,
  'orderby' => 'title',
  'order' => 'asc'
);

query_posts( $args );
//$ct = 0;
while (have_posts()) { the_post();
  //$ct++;
  $title = get_the_title();
  $address = get_field('street_address');
  $city = get_field('city');
  $phone = get_field('phone_number');
  $website = get_field('web_address');
  $zip = get_field('zip');
  $listing = get_the_terms($post->ID,'category');
//   //var_dump($listing_group);
//   //$listing='';
//   // foreach($listing_group as $group){
//   //   $listing = $group->slug;
//   // }');
  $description = get_the_content();
  //$logo = wp_get_attachment_url(get_post_thumbnail_id());

  //$business_category = get_field('business_category');

  $f = $address . ' ' . $city . ' ' . $zip;

  //$terms = get_the_terms($post->ID,'businesstype');

  //$d = get_field('show_in_app');

  // if($d) {

    $coordinates = getCoordinates($f);

    if(is_null($coordinates[0])) {
      if (get_field('latitude') && get_field('longitude')) {
        $lat = get_field('latitude');
        $long = get_field('longitude');
        //$coordinates = array($lat, $long);
      }
    }

    //Add all of the listing 'parts' to an array
    $a = [
      "title" => $title,
      "address" => $address,
      "phone" => $phone,
      "website" => $website,
      //"count"=>$ct,
      //"facebook" => $facebook,
      //"twitter" => $twitter,
      "zip" => $zip,
      "coordinates" => $coordinates,
      "listing_category" => $listing,
      //"businesstype" => $terms,
      //"business_category" => $business_category,
      "description" => $description,
      //"logo" => $logo
    ];

    array_push($arr, $a);
  //}

}

//var_dump($arr);
wp_reset_query();

# JSON-encode the response
$json = json_encode($arr, JSON_PRETTY_PRINT);

$directory = get_template_directory().'/helpers/listings.json';

$myfile = fopen(''.$directory.'', "w") or die("Unable to open file!");
fwrite($myfile, $json);
fclose($myfile);  


function getCoordinates($address){
  $address = urlencode($address);

  $url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address=" . $address;
  $response = file_get_contents($url);
  $json = json_decode($response,true);

  $lat = $json['results'][0]['geometry']['location']['lat'];
  $lng = $json['results'][0]['geometry']['location']['lng'];

  // echo "Latitude: " . $lat . "<br/>";
  // echo "Longitude: " . $lng . "<br/>";

  return array($lat, $lng);
}

?>