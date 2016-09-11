@extends('layouts.app')

@section('content')
    <style>
        nav{
            display: none;
        }
        #map {
            width: 100vw;
            height: 100vh;
            margin-left: -15px;
        }
    </style>
    <div id="map"></div>
@endsection
@section('scripts')

    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD4vNwABL7zyNnHJ9FH4JZh1bAfR7FUTMA&callback=initMap">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.4.8/socket.io.min.js"></script>
    <script>
        // Web Socket

        // 'http://rallyscreen.app:3000'
        // 'http://139.59.177.94:3000'
//        var socket = io('http://rallyscreen.app:3000');
        var socket = io('http://139.59.177.94:3000');

        socket.on('map_check_connection', function(){
            socket.emit('map_is_connected','1');
        });

        socket.on('update_map', function(data){
//            console.log(data);
            var latlng = new google.maps.LatLng(data.diims_data.Lat, data.diims_data.Long);
            markers[data.vehicle_id].setPosition(latlng);

            var bounds = markers.reduce(function(bounds, marker) {
                return bounds.extend(marker.getPosition());
            }, new google.maps.LatLngBounds());

            map.setCenter(bounds.getCenter());
            map.fitBounds(bounds);
        });

        socket.on('change_heat', function(heat_id){
            markers.forEach(function(marker,index,array){
               marker.setMap(null);
            });
            getHeatdata(heat_id);
        });

        socket.on('setOnLivescore',function(data) {
//            console.log(data);
        });

        vehicles = [];

        function getHeatdata(heat_id)
        {
            $.ajax({
                type: "GET",
                url: '/api/livescore/getHeatVehicles/' + heat_id,
                success: function (response) {
                    vehicles = response;
                    var diims_ids = [];
                    vehicles.forEach(function (vehicle, index, array) {
                        diims_ids.push(vehicle.diims_id);
                    });
                    diims_ids = diims_ids.join();
//                    console.log(diims_ids);
                    $.ajax({
                        type: "POST",
                        url: 'http://eco.commotive.dk/WebService.asmx/GetGPSbyDiims',
                        contentType: "application/json; charset=utf-8",
                        crossDomain: true,
                        data: JSON.stringify({DeviceId: diims_ids}),
                        dataType: "json",
                        success: function (data) {
                            var result = JSON.parse(data.d);
//                            console.log(result);
                            vehicles.forEach(function(vehicle,index,array){
                                var position = {
                                    lat: 55.600994,
                                    lng: 12.139964
                                };
                                result.forEach(function(diims,index,array){
                                    if(diims.DeviceId == vehicle.diims_id)
                                    {
                                        position = {
                                            lat: diims.Lat,
                                            lng: diims.Long
                                        }
                                    }
                                });
                                markers[vehicle.id] = new google.maps.Marker({
                                    position: position,
                                    icon: van_img,
                                    map: map
                                });
                            });

                            var bounds = markers.reduce(function(bounds, marker) {
                                return bounds.extend(marker.getPosition());
                            }, new google.maps.LatLngBounds());

                            map.setCenter(bounds.getCenter());
                            map.fitBounds(bounds);
                        }
                    });
                }
            });
        }

        function initMap() {
            var mapDiv = document.getElementById('map');

            markers = [];

            var myOptions = {
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                disableDefaultUI: true,
                center: {
                    lat: 55.600994,
                    lng: 12.139964
                },
                zoom: 14,
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
            truck_img = {
                url: 'images/truck.png',
                size: new google.maps.Size(128, 64),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(64, 64)
            };
            van_img = {
                url: 'images/van.png',
                size: new google.maps.Size(128, 64),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(64, 64)
            };
            map = new google.maps.Map(mapDiv, myOptions);

            markers = [];
            getHeatdata();
        }

//
//        var position = [57.049507, 9.875636];
//        var numDeltas = 200;
//        var delay = 10; //milliseconds
//        var i = 0;
//        var marker;
//        var deltaLat;
//        var deltaLng;
//        var c = -1;
//        var test_array = [
//            [57.052261851512526, 9.873576164245605 ],
//            [57.05398901073571, 9.876837730407715 ],
//            [57.05566941287305, 9.892544746398926 ],
//            [57.05324214093019, 9.905247688293457 ],
//            [57.049881040899166, 9.903616905212402 ],
//            [57.0503945619811, 9.896750450134277 ],
//            [57.05109480655856, 9.895462989807129 ],
//            [57.051561628941386, 9.891514778137207 ],
//            [57.049414197390014, 9.875893592834473 ]
//        ];
//        function transition(result){
//            i = 0;
//            deltaLat = (result[0] - position[0])/numDeltas;
//            deltaLng = (result[1] - position[1])/numDeltas;
//            moveMarker();
//        }
//        function moveMarker(){
//            position[0] += deltaLat;
//            position[1] += deltaLng;
//            var latlng = new google.maps.LatLng(position[0], position[1]);
//            marker.setPosition(latlng);
//            if(i!=numDeltas){
//                i++;
//                setTimeout(moveMarker, delay);
//            }else{
//                if(c != 8)
//                {
//                    c++;
//                    transition(test_array[c]);
//                    console.log(c);
//                }
//            }
//        }
    </script>


    {{-- API KEY AIzaSyD4vNwABL7zyNnHJ9FH4JZh1bAfR7FUTMA--}}
@endsection