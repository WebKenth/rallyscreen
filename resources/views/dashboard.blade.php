@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <button id="connectedButton" class="btn btn-default">Check Forbindelse
                    <span id="livescore_status" class="label label-danger">LiveScore Status</span>
                    <span id="map_status" class="label label-danger">Map Status</span>
                </button>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <legend>Liste af Heats</legend>
                <ul class="list-group">
                @foreach($heats as $heat)
                    <li class="list-group-item">
                    <form action="/heats" method="POST">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{$heat->id}}">
                        <div class="row">
                            <div class="col-md-1">
                                <p></p>
                                <a href="#" class="btn btn-default activate_heat" data-id="{{ $heat->id }}">Aktiver</a>
                            </div>
                            <div class="col-md-2">
                                <p></p>
                                <input class="heat-rename-input form-control" type="text" name="number" value="{{ $heat->number }}">
                            </div>
                            <div class="col-md-2">
                                Driver / Bil Forhold
                                <a data-id="{{$heat->id}}" data-csrf_token="{{csrf_token()}}" class="driver_vehicle_relationship btn btn-default">Forhold</a>
                            </div>
                            <div class="col-md-3">
                                Tilføj Biler
                                <select name="vehicles[]" id="vehicles" class="form-control" multiple>
                                    @foreach($vehicles as $vehicle)
                                        <option value="{{ $vehicle->id }}" {{ ($heat->hasVehicle($vehicle->id)) ? 'selected' : '' }}>{{ $vehicle->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                Tilføj Drivers
                                <select name="drivers[]" id="drivers" class="form-control" multiple>
                                    @foreach($drivers as $driver)
                                        {{ $driver->hasVehicleInHeat($heat->id,$driver->id,$vehicle->id) }}
                                        <option value="{{ $driver->id }}" {{ ($heat->hasDriver($driver->id)) ? 'selected' : '' }}>{{ $driver->first_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-1">
                                <button type="submit" class="btn btn-success">Gem</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Start Knapper til Bilerne</h3>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($heat->drivers as $driver)
                            <div class="col-md-2">
                                <!-- Single button -->
                                <div class="btn-group">
                                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ $driver->first_name }} | {{ $driver->getHeatVehicle($heat->id) }} <span class="caret"></span>
                                  </button>
                                  <ul class="dropdown-menu"
                                      data-heat_id="{{ $heat->id }}"
                                      data-driver_id="{{ $driver->id }}"
                                      data-vehicle_id="{{ $driver->getHeatVehicleId($heat->id) }}"
                                  >
                                    <li><a href="#" class="driver_start_race" data-order="4">Vis Livescore på #1</a></li>
                                    <li><a href="#" class="driver_start_race" data-order="5">Vis Livescore på #2</a></li>
                                    <li><a href="#" class="driver_start_race" data-order="6">Vis Livescore på #3</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#" class="driver_start_race" data-order="1">Vis Livescore på #4</a></li>
                                    <li><a href="#" class="driver_start_race" data-order="2">Vis Livescore på #5</a></li>
                                    <li><a href="#" class="driver_start_race" data-order="3">Vis Livescore på #6</a></li>
                                  </ul>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </form>
                    </li>
                @endforeach
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">

                <form class="form-horizontal" method="POST" action="/heats">
                <fieldset>

                {{ csrf_field() }}

                <!-- Form Name -->
                <legend>Heat</legend>

                <!-- Text input-->
                <div class="form-group">
                  <label class="col-md-4 control-label" for="number">Nummer</label>
                  <div class="col-md-8">
                  <input id="number" name="number" type="text" placeholder="1" class="form-control input-md">

                  </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                  <label class="col-md-4 control-label" for="submit"></label>
                  <div class="col-md-8">
                    <button id="submit" name="submit" class="btn btn-success">Create</button>
                  </div>
                </div>

                </fieldset>
                </form>
            </div>
        </div>
    </div>
    <br>
    <style>
        .heat-rename-input{
            border: 0;
            display: inline-block;
            width: 100%;
            font-size: 23px;
        }
    </style>
@endsection

@section('links')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.4.8/socket.io.min.js"></script>
    <script src="/js/all.js"></script>

    <script type="text/javascript">
        $('select').select2();

        // Driver - Vehicle Relationship Modal
        $('.driver_vehicle_relationship').on('click',function(){
            var id = $(this).data('id');
            var csrf_token = $(this).data('csrf_token');
            data = {
                _token : csrf_token
            };
            $.ajax({
                type: "POST",
                url: '/driver/relationship/'+id,
                dataType: "html",
                data: data,
                success: function (data)
                {
                    swal({
                        html: data
                    });
                    $('.driver-vehicle-select').select2();
                }
            });
        });

        // Websocket - Direct Link to Live Score Sites and Map
        // 'http://rallyscreen.app:3000'
        // 'http://139.59.177.94:3000'
//        var socket = io('http://rallyscreen.app:3000');
        var socket = io('http://139.59.177.94:3000');

        $('#connectedButton').on('click',function(){
            socket.emit('is_livescore_online','1');
            socket.emit('is_map_online','1');
        });
        $('.activate_heat').on('click',function(){
            $('.activate_heat').removeClass('btn-success');
            $(this).addClass('btn-success');
            var heat_id = $(this).data('id');
            socket.emit('change_heat', heat_id);
        });
        drivers = [];
        $('.driver_start_race').on('click',function(e){
            e.preventDefault();
            $(this).parent().parent().prev().toggleClass('btn-success');
            var data = {
                'heat_id' : $(this).parent().parent().data('heat_id'),
                'driver_id' : $(this).parent().parent().data('driver_id'),
                'vehicle_id' : $(this).parent().parent().data('vehicle_id'),
                'order' : $(this).data('order')
            };
            socket.emit('driver_update', data);

        });
        socket.on('livescore_connected', function(msg){
            $('#livescore_status').toggleClass('label-success').toggleClass('label-danger');
        });
        socket.on('map_connected', function(msg){
            $('#map_status').toggleClass('label-success').toggleClass('label-danger');
        });
    </script>
@endsection