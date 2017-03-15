<?php 
/* Template Name: Listing Template*/

get_header(); 

?>



<main id="content">
	<div class="banner interior" >	
		<div id="map" style="height:400px; width:100%; position:absolute; left:0; top:0;"></div>
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
	<script>
      var map;
      function initMap() {
        // map = new google.maps.Map(document.getElementById('map'), {
        //   zoom: 10,
        //   center: new google.maps.LatLng(38.9595194,-78.7438335),
        //   mapTypeId: 'terrain',
        //   disableDefaultUI: true,
        //   zoomControl: false,
        // });

        // // Create a <script> tag and set the USGS URL as the source.
        //var script = document.createElement('script');
        // //This example uses a local copy of the GeoJSON stored at
        // //http://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/2.5_week.geojsonp
        //script.src = 'https://developers.google.com/maps/documentation/javascript/examples/json/earthquake_GeoJSONP.js';
        //document.getElementsByTagName('head')[0].appendChild(script);
      //}

      //var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

      //Get multiple markers from the 'locations' variable
      // var markers = locations.map(function(location, i) {
      //     return new google.maps.Marker({
      //       position: location,
      //       //label: labels[i % labels.length],
      //       //title: labels[i % labels.length]
      //       //var infoW = location[3];
      //       //title: infoW
      //     });
      //   });
      // var marker = new google.maps.marker({
      // 	title: locations[3]
      // })

		///////////////
     //  var contentString = '<div style="width:50px;height:50px;background:red"></div>'

     //  var infowindow = new google.maps.InfoWindow({
     //      content: contentString
     //    });

      // var markerCluster = new MarkerClusterer(map, marker,
      //       {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
      
     //  markers.event.addListener('click', function() {
     //      infowindow.open(map, marker);
    	// });

      }

      

      //var titles = locations[i];
      // var titles = [
      // 	{'Location 1'},
      // 	{'Location 2'},
      // 	{'Location 3'},
      // 	{'Location 4'}
      // ]


      var locations = [
        {lat: 38.9581118, lng: -78.7461391, title:'Location 1'},
        {lat: 38.9550347, lng: -78.7423462, title:'Location 2'},
        {lat: 38.9543483, lng: -78.7403604, title:'Location 3'},
        {lat: 38.964584, lng: -78.7436266, title:'Location 4'}
        // {lat: 38.9961849, lng: -78.9929852}
        // {lat: -34.671264, lng: 150.863657},
        // {lat: -35.304724, lng: 148.662905},
        // {lat: -36.817685, lng: 175.699196},
        // {lat: -36.828611, lng: 175.790222},
        // {lat: -37.750000, lng: 145.116667},
        // {lat: -37.759859, lng: 145.128708},
        // {lat: -37.765015, lng: 145.133858},
        // {lat: -37.770104, lng: 145.143299},
        // {lat: -37.773700, lng: 145.145187},
        // {lat: -37.774785, lng: 145.137978},
        // {lat: -37.819616, lng: 144.968119},
        // {lat: -38.330766, lng: 144.695692},
        // {lat: -39.927193, lng: 175.053218},
        // {lat: -41.330162, lng: 174.865694},
        // {lat: -42.734358, lng: 147.439506},
        // {lat: -42.734358, lng: 147.501315},
        // {lat: -42.735258, lng: 147.438000},
        // {lat: -43.999792, lng: 170.463352}
      ]

      // Loop through the results array and place a marker for each
      // set of coordinates.
      // window.eqfeed_callback = function(results) {
      //   for (var i = 0; i < results.features.length; i++) {
      //     var coords = results.features[i].geometry.coordinates;
      //     var latLng = new google.maps.LatLng(coords[1],coords[0]);
      //     var marker = new google.maps.Marker({
      //       position: latLng,
      //       map: map
      //     });
      //   }
      //}
    </script>
<?php get_template_part('helpers/getListings'); ?>
    <?php 

// $arr = array();

// $args = array(
//   'post_type' => 'listing',
//   'posts_per_page'=> -1,
//   'orderby' => 'title',
//   'order' => 'asc'
// );

// query_posts( $args );

// while (have_posts()) { the_post();

//   $title = get_the_title();
//   $address = get_field('street_address');
//   $city = get_field('city');
//   $phone = get_field('phone_number');
//   $website = get_field('web_address');
//   $zip = get_field('zip');
//   $listing = get_the_terms($post->ID,'category');
//   //var_dump($listing_group);
//   //$listing='';
//   // foreach($listing_group as $group){
//   // 	$listing = $group->slug;
//   // }
//   //var_dump($listing);
//   //$facebook = get_field('facebook');
//   //$twitter = get_field('twitter');
//   $description = get_the_content();
//   //$logo = wp_get_attachment_url(get_post_thumbnail_id());

//   //$business_category = get_field('business_category');

//   $f = $address . ' ' . $city . ' ' . $zip;

//   //$terms = get_the_terms($post->ID,'businesstype');

//   //$d = get_field('show_in_app');

//   // if($d) {

//     $coordinates = getCoordinates($f);

//     if(is_null($coordinates[0])) {
//       if (get_field('latitude') && get_field('longitude')) {
//         $lat = get_field('latitude');
//         $long = get_field('longitude');
//         $coordinates = array($lat, $long);
//       }
//     }

//     //Add all of the listing 'parts' to an array
//     $a = [
//       "title" => $title,
//       "address" => $address,
//       "phone" => $phone,
//       "website" => $website,
//       //"facebook" => $facebook,
//       //"twitter" => $twitter,
//       "zip" => $zip,
//       "coordinates" => $coordinates,
//       //"businesstype" => $terms,
//       //"business_category" => $business_category,
//       "description" => $description,
//       //"logo" => $logo
//       "listing_category" => $listing
//     ];

//     array_push($arr, $a);
//   //}
//     //wp_reset_postdata();
// }
// wp_reset_query();
// //var_dump($arr);

// # JSON-encode the response
// $json = json_encode($arr, JSON_PRETTY_PRINT);

// $directory = get_template_directory().'/helpers/listings.json';

// $myfile = fopen(''. $directory. '', "w") or die("Unable to open file!");
// fwrite($myfile, $json);
// fclose($myfile);  


// function getCoordinates($address){
//   $address = urlencode($address);

//   $url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address=" . $address;
//   $response = file_get_contents($url);
//   $json = json_decode($response,true);

//   $lat = $json['results'][0]['geometry']['location']['lat'];
//   $lng = $json['results'][0]['geometry']['location']['lng'];

//   // echo "Latitude: " . $lat . "<br/>";
//   // echo "Longitude: " . $lng . "<br/>";

//   return array($lat, $lng);
// }

?>


    <?php 

    	//Get the appropriate listing from the custom fiels, returns an array
    	$listing_category = get_field('listing_category');
    	//var_dump($listing_category);
    	//Set our variable to nothing, to use as a container for our category
    	$listing_cat='';

    	//Break the array into chunks, and pull out the slug, since it matches our taxonomy
    	foreach($listing_category as $listing){
    		$listing_cat = $listing->slug;
    	}
    ?>
	<div class="container">
		<?php get_template_part('partials/intro-statement'); ?>
		<div class="row">
			
			<div class="listing-grid" data-category="<?php echo $listing_cat; ?>" >
				<div class="listings row">
			<?php 
					//$da_date = get_field('start_date');
					//var_dump($da_date);
					//$today=date('Ymd');
					//$currMonth = date('m');
					//$currYear = date('Y');
					$args = array(
						'post_type' => 'listing',
						'posts_per_page' => '-1',
						'orderby'=>'name',
						'order'=>'ASC',
						'tax_query'=>array(
								array(
								'taxonomy'=>'category',
								'field'=>'slug',
								'terms'=>$listing_cat,
								),
							),
						//'meta_key'=>'primary_section',
						// 'date_query'=>array(
						// 		'month'=>'12',
						// 	),
						// 'meta_query' => array(
						// 		array(
						// 				'key'=>'start_date',
						// 				'compare'=>'>=',
						// 				'value'=>$today,
						// 			)
						// 	)
					);

					$the_query = new WP_Query( $args );

					$count=$the_query->post_count;
					$half_count=$count/2;
					
					$half_round = round($half_count);
					

					//var_dump($count);
					if ($the_query->have_posts()){
					
						//$first_loop = 0; 
						$l_cnt=0;?>
						<div class="columns-6">
						<?php
						while($the_query->have_posts()) { $the_query->the_post();
						$l_cnt++;
						$city = get_field('city', $post->ID);
						$address = get_field('street_address', $post->ID);
						$zip = get_field('zip', $post->ID);
						$site = get_field('web_address', $post->ID);
						$phone = get_field('phone_number', $post->ID);

						$sections = get_the_terms($post->ID,'category');
						$sec_name = '';
						if($sections != ''){
							foreach($sections as $section){
								$sec_name = $section->name;
							}
						}else{
							$sec_name="Uncategorized";
						}
						$tag_name = '';
						$tags = get_the_tags($post->ID);
						//var_dump($tags);
						if($tags != ''){
							foreach($tags as $tag){
								$tag_name = $tag->name;
							}
						}


						?>

						<?php if($l_cnt == $half_round+1){ ?>
							</div><div class='columns-6'>
							<?php } ?>
						<div class="listing">  <!-- columns-6 -->
							<?php if($tags != ' '){?>
							<div class="push">
								<span class="tags"><?php echo $tag_name; ?></span>
							</div>
							<?php } ?>
							<h2><?php echo $l_cnt; ?>. <?php the_title(); ?></h2>
							<div class="push">
								<p class="loc">
									<?php 
										
										if($address != ''){
											echo $address;
											echo '</br>';
										}
										if($city != ''){
											echo $city;
											echo ' ';
										}
										if($zip != ''){
											echo $zip;
											echo '</br>';
										}
										if($site != ''){?>
											<a href="<?php echo $site; ?>" target="_blank"><?php echo $site; ?></a>
										<?php }
										if ($phone != ''){
											echo '| <span class="phone">'.$phone.'</span>';
										}
										?>
								</p>
							</div>
						</div>
						<?php if($count-$l_cnt == 0){?>
							</div>
						<?php } ?>
				<?php } } wp_reset_postdata(); ?>
			</div>
		</div>
		<!-- <div class="cp-leadin">
			<?php $cp_leadin = get_field('cpl_text');?>
			<?php if($cp_leadin != ''){ ?>
				<p><?php echo $cp_leadin; ?></p>
			<?php }else{ ?>
				<p class="error">**You have not included text here, please return to the edit screen to add</p>
			<?php } ?>
		</div> -->
		<?php get_template_part('partials/cross-promo'); ?>
		</div>
	</div>

</main><!-- End of Content -->

<?php get_footer(); ?>
