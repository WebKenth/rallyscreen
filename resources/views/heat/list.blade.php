@extends('layouts.app')

@section('content')
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
    <div class="row">
        <div class="col-md-12">
            Liste af Heats
            <ul class="list-group">
            @foreach($heats as $heat)
                <li class="list-group-item">
                <form action="/heats" method="POST">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{$heat->id}}">
                    <div class="row">
                        <div class="col-md-3">
                            <input class="heat-rename-input" type="text" name="number" value="{{ $heat->number }}">
                        </div>
                        <div class="col-md-3">
                            <select name="vehicles[]" id="vehicles" class="form-control" multiple>
                                @foreach($vehicles as $vehicle)
                                    <option value="{{ $vehicle->id }}" {{ ($heat->hasVehicle($vehicle->id)) ? 'selected' : '' }}>{{ $vehicle->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select name="drivers[]" id="drivers" class="form-control" multiple>
                                @foreach($drivers as $driver)
                                    <option value="{{ $driver->id }}" {{ ($heat->hasDriver($driver->id)) ? 'selected' : '' }}>{{ $driver->first_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-1">
                            <button type="submit" class="btn btn-success">Gem</button>
                        </div>
                    </div>
                </form>
                </li>
            @endforeach
            </ul>
        </div>
    </div>

    <style>
        .heat-rename-input{
            border: 0;
            display: inline-block;
            width: calc( 33% - 15px );
            font-size: 23px;
        }
    </style>
@endsection
@section('links')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script type="text/javascript">
        $('select').select2();
        $('.heat-rename-input').on('focusout',function(){
            var heat_id = $(this).data('id');
            var token = $(this).parent().children();
            token = token.first().val();
            $.ajax({
                url: '/heats/rename/'+heat_id,
                async: true,
                type: 'POST',
                data: {
                    number: $(this).val(),
                    _token: token
                }
            });
        });
    </script>
@endsection