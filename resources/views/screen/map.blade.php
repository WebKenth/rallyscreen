@extends('layouts.app')

@section('content')
    <style>
        nav{
            display: none;
        }
        #map {
            margin-right: auto;
            margin-left:auto;
            width: 80%;
            height: 60vh;
            margin-top: 50px;
        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div id="map"></div>
                <button id="pan_to" class="btn btn-primary">Test</button>
                <input type="text" id="pan_to_lat" value="57.0495141">
                <input type="text" id="pan_to_lng" value="9.875893">
                <pre id="test">

                </pre>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        function initMap() {
            var mapDiv = document.getElementById('map');
            var map = new google.maps.Map(mapDiv, {
                center: {lat: 57.051281, lng: 9.893145},
                zoom: 14
            });

            marker = new google.maps.Marker({
                position: {
                    lat: 57.0495141,
                    lng: 9.875893
                },
                map: map
            });
            var truck1 = new google.maps.Marker({
                position: {
                    lat: 57.0509141,
                    lng: 9.885893
                },
                map: map
            });
            position = [marker.position.lat(), marker.position.lng()];

            google.maps.event.addListener(map, 'click', function(me) {
                $('#pan_to_lat').val(me.latLng.lat());
                $('#pan_to_lng').val(me.latLng.lng());
            });

        }
            $('#pan_to').on('click',function(){
                transition([$('#pan_to_lat').val(),$('#pan_to_lng').val()]);
            });
        var position = [57, 9];
        var numDeltas = 200;
        var delay = 10; //milliseconds
        var i = 0;
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