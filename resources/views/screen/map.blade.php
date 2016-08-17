@extends('layouts.app')

@section('content')
    <style>
        nav{
            display: none;
        }
        #map {
            margin-right: auto;
            margin-left:auto;
            width: 100%;
            height: 90vh;
            margin-top: 10px;
        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div id="map"></div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.4.8/socket.io.min.js"></script>
    <script>
        // Web Socket

        var socket = io('http://rallyscreen.app:3000');

        socket.on('map_check_connection', function(){
            socket.emit('map_is_connected','1');
        });

        socket.on('update_map', function(data){
            console.log(data);
            transtion
        });

        socket.on('change_heat', function(){
            // Check if need to Update Map
        });


        function initMap() {
            var mapDiv = document.getElementById('map');

            var myOptions = {
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                disableDefaultUI: true,
                center: {lat: 57.051281, lng: 9.893145},
                zoom: 15,
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
            var map = new google.maps.Map(mapDiv, myOptions);
            var truck_img = {
                url: 'images/truck.png',
                // This marker is 20 pixels wide by 32 pixels high.
                size: new google.maps.Size(128, 64),
                // The origin for this image is (0, 0).
                origin: new google.maps.Point(0, 0),
                // The anchor for this image is the base of the flagpole at (0, 32).
                anchor: new google.maps.Point(64, 64)
//                scaledSize: new google.maps.Size(100,100)
            };
            var van_img = {
                url: 'images/van.png',
                // This marker is 20 pixels wide by 32 pixels high.
                size: new google.maps.Size(128, 64),
                // The origin for this image is (0, 0).
                origin: new google.maps.Point(0, 0),
                // The anchor for this image is the base of the flagpole at (0, 32).
                anchor: new google.maps.Point(64, 64)
//                scaledSize: new google.maps.Size(100,100)
            };

            van_1 = new google.maps.Marker({
                position: {
                    lat: 57.0495141,
                    lng: 9.875893
                },
                icon: van_img,
                map: map
            });
            van_2 = new google.maps.Marker({
                position: {
                    lat: 57.0495141,
                    lng: 9.876893
                },
                icon: van_img,
                map: map
            });
            van_3 = new google.maps.Marker({
                position: {
                    lat: 57.0495141,
                    lng: 9.877893
                },
                icon: van_img,
                map: map
            });


            truck_1 = new google.maps.Marker({
                position: {
                    lat: 57.0509141,
                    lng: 9.885893
                },
                icon: truck_img,
                map: map
            });

            truck_2 = new google.maps.Marker({
                position: {
                    lat: 57.0509141,
                    lng: 9.885893
                },
                icon: truck_img,
                map: map
            });

            truck_3 = new google.maps.Marker({
                position: {
                    lat: 57.0509141,
                    lng: 9.885893
                },
                icon: truck_img,
                map: map
            });
            google.maps.event.addListener(map, 'click', function(me) {
                $('#pan_to_lat').val(me.latLng.lat());
                $('#pan_to_lng').val(me.latLng.lng());
            });

        }

        $('#pan_to').on('click',function(){
            marker = van_1;
            transition([$('#pan_to_lat').val(),$('#pan_to_lng').val()]);
        });
        $('#van_1').on('click',function(){
            marker = van_1;
            transition([$('#pan_to_lat').val(),$('#pan_to_lng').val()]);
        });
        $('#van_2').on('click',function(){
            marker = van_2;
            transition([$('#pan_to_lat').val(),$('#pan_to_lng').val()]);
        });
        $('#van_3').on('click',function(){
            marker = van_3;
            transition([$('#pan_to_lat').val(),$('#pan_to_lng').val()]);
        });
        var position = [57.049507, 9.875636];
        var numDeltas = 200;
        var delay = 10; //milliseconds
        var i = 0;
        var marker;
        var deltaLat;
        var deltaLng;
        var c = -1;
        var test_array = [
            [57.052261851512526, 9.873576164245605 ],
            [57.05398901073571, 9.876837730407715 ],
            [57.05566941287305, 9.892544746398926 ],
            [57.05324214093019, 9.905247688293457 ],
            [57.049881040899166, 9.903616905212402 ],
            [57.0503945619811, 9.896750450134277 ],
            [57.05109480655856, 9.895462989807129 ],
            [57.051561628941386, 9.891514778137207 ],
            [57.049414197390014, 9.875893592834473 ]
        ];
        function transition(result){
            i = 0;
            deltaLat = (result[0] - position[0])/numDeltas;
            deltaLng = (result[1] - position[1])/numDeltas;
            moveMarker();
        }
        function moveMarker(){
            position[0] += deltaLat;
            position[1] += deltaLng;
            var latlng = new google.maps.LatLng(position[0], position[1]);
            marker.setPosition(latlng);
            if(i!=numDeltas){
                i++;
                setTimeout(moveMarker, delay);
            }else{
                if(c != 8)
                {
                    c++;
                    transition(test_array[c]);
                    console.log(c);
                }
            }
        }
    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD4vNwABL7zyNnHJ9FH4JZh1bAfR7FUTMA&callback=initMap">
    </script>


    {{-- API KEY AIzaSyD4vNwABL7zyNnHJ9FH4JZh1bAfR7FUTMA--}}
@endsection