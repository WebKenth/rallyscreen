$(document).ready(function() {
	var map;
	var marker;
	var bounds = new google.maps.LatLngBounds();
	var locations = [
		['BMW M3', 57.047726, 9.921392, 'Gråbrødregade 10, 9000 Aalborg', 1],
		['Audi A7', 57.044875, 9.910948, 'Vesterbro 21 E, 9000 Aalborg', 'i går kl. 22:21'],
		['Mountainbike', 57.051978, 9.910166, 'Poul Paghs Gade 21, 9000 Aalborg', '15. juni 16:39']
	];

	function initialize() {

		var myOptions = {
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			disableDefaultUI: true,
			zoom: 10,
			styles: [
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
		};

		var map = new google.maps.Map(document.getElementById("overview-map"), myOptions);

		setMarkers(map,locations)
	}

	function setMarkers(map,locations){

		var marker, i

		for (i = 0; i < locations.length; i++) {  
			var car = locations[i][0];
			var lat = locations[i][1];
			var long = locations[i][2];
			var add =  locations[i][3];
			var last = locations[i][4];

			latlngset = new google.maps.LatLng(lat, long);

			bounds.extend(latlngset);

			var marker = new google.maps.Marker({  
				map: map, 
				title: car, 
				position: latlngset,
				id: 'marker' + i
			});

			map.fitBounds(bounds);
			map.panToBounds(bounds);

			if(last == 1) {
				last = 'Køre nu, fart: 54 km/t';
			} else {
				last = 'Sidst set: ' + last;
			}

			var content = "<h3>" + car +  '</h3>' + "<p>" + add + '</p><p>'+ last +'</p>';

			var infowindow = new google.maps.InfoWindow()

			google.maps.event.addListener(marker,'mouseover', (function(marker,content,infowindow){ 
				return function() {
					infowindow.setContent(content);
					infowindow.open(map,marker);
				};
			})(marker,content,infowindow)); 

			google.maps.event.addListener(marker,'mouseout', (function(marker,content,infowindow){ 
				return function() {
					infowindow.close(map,marker);
				};
			})(marker,content,infowindow)); 

		}
	}

	initialize();
});