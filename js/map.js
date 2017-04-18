

  var loadMap = function() {


    // Set the JSON file
    var listingsFile = $dir + '/helpers/listings.json';
    //console.log("The listings.json file is at "+listingsfile);

    //Declare this outside of the getJSON loop
    var map;

    //var infoWindow;

     var infoWindow = new google.maps.InfoWindow(), marker, i;

    //Keep this out of the getJSON loop
    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 10,
        center: new google.maps.LatLng(38.9991817,-79.1020919),
        //mapTypeId: 'terrain',
        disableDefaultUI: true,
        zoomControl: false,
        styles:
            [{"featureType":"all","elementType":"geometry","stylers":[{"color":"#ebe3cd"}]},{"featureType":"all","elementType":"labels.text.fill","stylers":[{"color":"#523735"}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"color":"#f5f1e6"}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#c9b2a6"}]},{"featureType":"administrative.land_parcel","elementType":"geometry.stroke","stylers":[{"color":"#dcd2be"}]},{"featureType":"administrative.land_parcel","elementType":"labels.text.fill","stylers":[{"color":"#ae9e90"}]},{"featureType":"landscape.natural","elementType":"geometry","stylers":[{"color":"#dfd2ae"}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#dfd2ae"}]},{"featureType":"poi","elementType":"labels.text.fill","stylers":[{"color":"#93817c"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"color":"#a5b076"}]},{"featureType":"poi.park","elementType":"labels.text.fill","stylers":[{"color":"#447530"}]},{"featureType":"road","elementType":"geometry","stylers":[{"color":"#f5f1e6"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#f8c967"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#e9bc62"}]},{"featureType":"road.highway.controlled_access","elementType":"geometry","stylers":[{"color":"#e98d58"}]},{"featureType":"road.highway.controlled_access","elementType":"geometry.stroke","stylers":[{"color":"#db8555"}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#fdfcf8"}]},{"featureType":"road.local","elementType":"labels.text.fill","stylers":[{"color":"#806b63"}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"color":"#dfd2ae"}]},{"featureType":"transit.line","elementType":"labels.text.fill","stylers":[{"color":"#8f7d77"}]},{"featureType":"transit.line","elementType":"labels.text.stroke","stylers":[{"color":"#ebe3cd"}]},{"featureType":"transit.station","elementType":"geometry","stylers":[{"color":"#dfd2ae"}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#b9d3c2"}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"color":"#92998d"}]}]

        //marker:marker
      });

    //var infoWindowContent = '<div class="title">' + title; + '</div>';
    
    //The JSON loop, parses the listings.json file for the information we need to make the map
    jQuery.getJSON(listingsFile).success(function(data) {
      var ctr = 0;
            // Loop through the JSON file adding the markers
      for (var i = 0; i < data.length; i++) {
        //console.log(data[i]['listing_category'][0]['slug']);

        // $listing = data[i]['listing_category'][0]['slug'];
       // console.log(data[i]['listing_category']);

        // if(data[i]['listing_category'] !== listing_cat){

        //   continue;
        // }
        // else if(data[i]['listing_category'] === listing_cat || full == all){

        //console.log(data);
          
        //Scoop out the titles from our JSON file
        var title = data[i]['title'];
        var color = data[i]['color'];

        //Construct url parameters
        //var $address, $city, $lat, $longitude
        var $address, $city, $state, $;

        var address = data[i]['address'];
        if (address != ''){
          $address = address;
        }else{
          $address = '';
        }
        var city =  data[i]['city'];
        if (city != ''){
          $city = city;
        }else{
          $city = '';
        }
        var zip = data[i]['zip'];
        if (zip != ''){
          $zip = zip;
        }else{
          $zip = '';
        }
        var lat = data[i]['coordinates'][0];
        var _long = data[i]['coordinates'][0];

        if (address != '' )
          //Option 1, if we don't want directions, but do have the address (only shows location on map)
          // $link = 'https://maps.google.com/?q='+address+city+zip;
          //Option 2, if we do want directions:
          //saddr var is the current location based on where Google "thinks" the user is
          //daddr var is the destination, made up of the link
          $link = 'https://www.google.com/maps?saddr=My+location&daddr='+$address+' '+$city+' '+$zip;
        else{

          $link = 'https://maps.google.com/maps/?ll='+lat+','+_long;
        }
        //console.log(address);

        //Let's start using our icons 
        var icon, text;
        var basedir = $dir;
          if(data[i]['primary_section'] == 'Outside &amp; In'){
            icon = '/img/outdoors-map-icon.png';
          }else if(data[i]['primary_section'] == 'Culture &amp; Heritage'){
            icon = '/img/culture-map-icon.png';
          }else if(data[i]['primary_section'] == 'Eat &amp; Drink'){
            icon = '/img/eat-map-icon.png';
          }else if(data[i]['primary_section'] == 'Sleep &amp; Relax'){
            icon = '/img/sleep-map-icon.png';
          }else if(data[i]['primary_section'] == 'Shop In Town &amp; Out'){
            icon = '/img/shop-map-icon.png';
          }


        //Create the html for the infoWindow
        var infoWindowContent = '<div class="map-marker-title"><span class="section">'+data[i]['primary_section'] +'</span><span class="list-title">'+ data[i]['title'] + '</span><span class="directions cta"><a class="cta-link" href="'+$link+'" target="_blank">Get Directions &#10165;</a></span></div>';
        //console.log(infoWindowContent);

        // //This is for creating multiple markers, in case we want to cluster
        // var markers = data.map(function(location, i) {
        //   return new google.maps.Marker({
        //     position: new google.maps.LatLng(data[i]['coordinates'][0], data[i]['coordinates'][1]),
        //     //label: labels[i % labels.length],
        //     //title: labels[i % labels.length]
        //     //var infoW = location[3];
        //     //title: infoW
        //   });
        // });
       
          
          //Create the marker
          marker = new google.maps.Marker({
            //This is just the title of the blog post
            title: title,
            //Style the dang label
            label: {
              //text:String(ctr+1),
              color:"#ffffff",
              fontSize:"2em",
              fontFamily:"alternate-gothic-no-1-d"
            },
            position: new google.maps.LatLng(data[i]['coordinates'][0], data[i]['coordinates'][1]),
            map: map,
            //Create the custom icon
            icon:basedir + icon,
            // icon:{

            //   // path: google.maps.SymbolPath.CIRCLE,
            //   // scale: 15,
            //   // fillColor:String(color),
            //   // fillOpacity:1,
            //   // strokeColor:'transparent',
            //  }
          });

          google.maps.event.addListener(marker, 'click', (function(marker, infoWindowContent, infoWindow) {
                return function() {
                  
                    infoWindow.setContent(infoWindowContent);
                    infoWindow.open(map, marker);
                }
            })(marker, infoWindowContent, infoWindow));

          // google.maps.event.addListener(marker, 'click', (function(marker, i) {
          //   return function() {

              // Close all previous info windows
              // if ($scope.firstRun == true) {
              //   $scope.firstRun = false;
              // } else {
              //   // $scope.infowindow.close();
              //   $scope.prevMarker.setIcon($scope.prevMarker['visIcon']);
              // }

              // $scope.panel_active.state=true;
              // $scope.toggle.state=false;

              // $scope.active_title = marker.title;
              // $scope.active_description = marker.description;
              // $scope.active_address = marker.address;
              // $scope.active_phone = marker.phone;

              // $scope.active_facebook = marker.facebook;
              // $scope.active_twitter = marker.twitter;
              // $scope.active_website = marker.website;

              // $scope.active_logo = marker.logo;

              // $scope.$apply();

              // Create the new info window
              // var cString = '<div id="content"><div id="bodyContent"><p>'+ title+'</p></div></div>';
              // //
              // var infowindow = new google.maps.InfoWindow({
              //   content: cString
              // });
              //
            //   $scope.infowindow.open($scope.map, marker);

              //marker.setIcon(marker['activeIcon']);
              //$scope.prevMarker = marker;
          //   }
          // })(marker, i));


          // allTitles.push(marker);
          // console.log(allTitles.length);

      //   }

      //   $scope.explore.push(marker);
        ctr = ctr+1;

        //} // end else

      }//end for loop

    }); //end $http.get
  }

// var listing_cat = jQuery('.listing-grid').attr('data-category');
var full = jQuery('main').attr('data-category');
//console.log(full);
// console.log(listing_cat);

loadMap(full);