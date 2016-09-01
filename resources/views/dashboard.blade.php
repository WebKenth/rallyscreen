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
                                <a href="#" class="btn btn-default switch_type" data-id="{{ $heat->id }}">Skift Type</a>
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
                                <h3>Control Til Heatet</h3>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="stop_timers btn btn-danger">Stop Alt (Timere)</button>
                                        <button data-heat_id="{{$heat->id}}" class="reset_heat_stats btn btn-danger">Reset Data</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Start / Stop Knapper til Bilerne</h3>
                            </div>
                        </div>
                        <div class="row">

                            <ul class="list-group list-container">
                            @foreach($heat->drivers as $driver)
                            @if($driver->getHeatVehicle($heat->id))
                                <li class="list-group-item"
                                    data-heat_id="{{ $heat->id }}"
                                    data-driver_id="{{ $driver->id }}"
                                    data-vehicle_id="{{ $driver->getHeatVehicleId($heat->id) }}"
                                    data-csrf_token="{{csrf_token()}}"
                                >
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p>{{ $driver->first_name }} {{ $driver->middle_name }} {{ $driver->last_name }}</p>
                                                <p>{{ $driver->getHeatVehicle($heat->id)->type }}, {{ $driver->getHeatVehicle($heat->id)->name }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p>Placering til højre</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <a class="btn btn-default setOnLivescore" data-order="4">Truck #1</a>
                                                    <a class="btn btn-default setOnLivescore" data-order="5">Truck #2</a>
                                                    <a class="btn btn-default setOnLivescore" data-order="6">Truck #3</a>
                                                </div>
                                                <div class="col-md-6">
                                                    <a class="btn btn-default setOnLivescore" data-order="1">Van #4</a>
                                                    <a class="btn btn-default setOnLivescore" data-order="2">Van #5</a>
                                                    <a class="btn btn-default setOnLivescore" data-order="3">Van #6</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <p>Control</p>
                                            <a class="btn btn-default livescoreStartTimer" >Tillad Start</a>
                                            <a class="btn btn-default livescoreStopTimer" >Stop Timer</a>
                                        </div>
                                    </div>
                                </li>
                            @endif
                            @endforeach
                            </ul>
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
    <input type="hidden" id="csrf_token" value="{{ csrf_token() }}">
    <br>
    <style>
        .heat-rename-input{
            border: 0;
            display: inline-block;
            width: 100%;
            font-size: 23px;
        }
        .list-container{
            max-height: 350px;
            overflow: auto;
            border: 10px solid #dddddd;
            border-left: 3px solid #dddddd;
            border-right: 3px solid #dddddd;
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


        // Websocket - Direct Link to Live Score Sites and Map
        // 'http://rallyscreen.app:3000'
        // 'http://139.59.177.94:3000'
//        var socket = io('http://rallyscreen.app:3000');

        var socket = io('http://139.59.177.94:3000');

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

        $('.setOnLivescore').on('click',function(){
            var data = $(this).closest('li').data();
            data.order = $(this).data('order');
            $(this).closest('li').data('order', data.order);

            socket.emit('setOnLivescore', data);
        });

        $('.livescoreStartTimer').on('click',function(){
            var data = $(this).closest('li').data();
            data.active = 1;
            data._token = $('#csrf_token').val();
            $.ajax({
                type: "POST",
                url: '/api/livescore/getLivescoreOrder',
                data: data,
                success: function (response){
                    if(parseInt(response))
                    {
                        data.order = response;
                        socket.emit('startTimerOnLivescore', data);
                    }else{
                        $(this).addClass('btn-danger');
                    }
                }
            });
        });
        $('.livescoreStopTimer').on('click',function(){
            var data = $(this).closest('li').data();
            data.active = 0;
            data._token = $('#csrf_token').val();
            $.ajax({
                type: "POST",
                url: '/api/livescore/getLivescoreOrder',
                data: data,
                success: function (response){
                    if(parseInt(response))
                    {
                        data.order = response;
                        socket.emit('stopTimerOnLivescore', data);
                    }else{
                        $(this).addClass('btn-danger');
                    }
                }
            });
        });

        $('#connectedButton').on('click',function(){
            socket.emit('is_livescore_online','1');
            socket.emit('is_map_online','1');
        });
        $('.activate_heat').on('click',function(e){
            e.preventDefault();
            var heat_id = $(this).data('id');
            $.ajax({
                type: "POST",
                url: '/api/livescore/setActiveHeat',
                data: {
                    _token : $('#csrf_token').val(),
                    heat_id : heat_id
                }
            });
            socket.emit('change_heat', heat_id);
        });

        $('.switch_type').on('click', function(e){
            e.preventDefault();
            var heat_id = $(this).data('id');
            $.ajax({
                type: "POST",
                url: '/api/livescore/switchHeatType',
                data: {
                    _token : $('#csrf_token').val(),
                    heat_id : $(this).data('id')
                }
            });
            socket.emit('change_heat', heat_id);
        });

        $('.reset_heat_stats').on('click',function(e){
            e.preventDefault();
            var confirm = window.confirm("Er du sikker?");
            if (confirm == true)
            {
                $.ajax({
                    type: "POST",
                    url: '/api/livescore/reset_heat_stats',
                    data: {
                        _token : $('#csrf_token').val(),
                        heat_id : $(this).data('heat_id')
                    }
                });
            }
        });

        $('.stop_timers').on('click',function(e){
            e.preventDefault();
            socket.emit('livescore_stop_timers');
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



{{--<div class="col-md-3" style="margin-bottom: 20px">--}}
    {{--<!-- Single button -->--}}
    {{--<div class="btn-group">--}}
      {{--<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
        {{--{{ $driver->first_name }}<span class="caret"></span>--}}
      {{--</button>--}}
      {{--<ul class="dropdown-menu"--}}
          {{--data-heat_id="{{ $heat->id }}"--}}
          {{--data-driver_id="{{ $driver->id }}"--}}
          {{--data-vehicle_id="{{ $driver->getHeatVehicleId($heat->id) }}"--}}
      {{-->--}}
        {{--<li><a href="#" class="driver_start_race" data-order="4">Vis Livescore på #1</a></li>--}}
        {{--<li><a href="#" class="driver_start_race" data-order="5">Vis Livescore på #2</a></li>--}}
        {{--<li><a href="#" class="driver_start_race" data-order="6">Vis Livescore på #3</a></li>--}}
        {{--<li role="separator" class="divider"></li>--}}
        {{--<li><a href="#" class="driver_start_race" data-order="1">Vis Livescore på #4</a></li>--}}
        {{--<li><a href="#" class="driver_start_race" data-order="2">Vis Livescore på #5</a></li>--}}
        {{--<li><a href="#" class="driver_start_race" data-order="3">Vis Livescore på #6</a></li>--}}
      {{--</ul>--}}
    {{--</div>--}}
{{--</div>--}}