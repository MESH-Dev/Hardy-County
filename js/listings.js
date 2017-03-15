

  var loadListings = function(listing_cat) {


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
        center: new google.maps.LatLng(38.9595194,-78.7438335),
        mapTypeId: 'terrain',
        disableDefaultUI: true,
        zoomControl: false,
        styles:
[
    {
        "featureType": "administrative",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "color": "#444444"
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "all",
        "stylers": [
            {
                "color": "#f2f2f2"
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "poi.attraction",
        "elementType": "labels.text",
        "stylers": [
            {
                "hue": "#003aff"
            },
            {
                "invert_lightness": true
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "all",
        "stylers": [
            {
                "saturation": -100
            },
            {
                "lightness": 45
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "transit",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "all",
        "stylers": [
            {
                "color": "#46bcec"
            },
            {
                "visibility": "on"
            }
        ]
    }
]

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
        // console.log()

        if(data[i]['listing_category'][0]['slug'] !== listing_cat){

          continue;
        }
        else{
          
        //Scoop out the titles from our JSON file
        var title = data[i]['title'];
        //var label  = '<span class="label">'+ctr+'</span>';

        //var allTitles = [];
        // allTitles.push(data[i]['title']);
        // console.log(allTitles.length);

        //console.log(title);

        
        //Create the html for the infoWindow
        var infoWindowContent = '<div class="title">' + data[i]['title'] + '</div>';
        console.log(infoWindowContent);

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
          
          //Marker color based on the listing category listing_cat
          var color = '';
          
          if(listing_cat == 'hunting-fishing'){
            color = '#4f6d6f';
          }else{
            color='cyan';
          }
       

          //Create the marker
          marker = new google.maps.Marker({
            title: title,
            label: String(ctr),
            labelClass: "label",
            position: new google.maps.LatLng(data[i]['coordinates'][0], data[i]['coordinates'][1]),
            map: map,
            
            icon:{
              path: google.maps.SymbolPath.CIRCLE,
              scale: 15,
              fillColor:color,
              fillOpacity:1,
              strokeColor:'transparent',
                // anchor: new google.maps.Point(15, 15),
                // url:'data:image/svg+xml;utf-8, \
                //   <svg width="40" height="40" xmlns="http://www.w3.org/2000/svg"> \
                //     <circle cx="15" cy="15" r="15" fill="#75BB3E" ></circle> \
                //   </svg>'

                  //#75BB3E
             }
          });
        //d="M3.5 3.5h25v25h-25z" viewBox="0 0 32 32"

          google.maps.event.addListener(marker, 'click', (function(marker, infoWindowContent, infoWindow) {
                return function() {
                    //var infoWindowContent = '<div class="title">' + title + '</div>';
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

        } // end else

      }//end for loop

    }); //end $http.get
  }

var listing_cat = jQuery('.listing-grid').attr('data-category');
console.log(listing_cat);

loadListings(listing_cat);