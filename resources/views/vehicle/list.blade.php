@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6">
            @include('vehicle.create')
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h2>Liste af Vehicles</h2>
            <div class="row">
                <div class="col-md-2"><h3>Navn</h3></div>
                <div class="col-md-2"><h3>Brand</h3></div>
                <div class="col-md-1"><h3>Type</h3></div>
                <div class="col-md-2"><h3>Reg_nr</h3></div>
                <div class="col-md-1"><h3>Model</h3></div>
                <div class="col-md-2"><h3>Diims</h3></div>
                <div class="col-md-2"><h3>Controls</h3></div>
            </div>
            <ul class="list-group">
            @foreach($vehicles as $vehicle)
                <li class="list-group-item">
                    <form action="/vehicle/{{$vehicle->id}}" method="POST">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-2">
                            <input class="vehicle-rename-input" type="text" name="name" value="{{ $vehicle->name }}"/>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="vehicle-rename-input" name="brand" value="{{ $vehicle->brand }}">
                        </div>
                        <div class="col-md-1">
                            <select name="type" id="type" class="form-control">
                                <option value="truck" {{ ($vehicle->type == "truck") ? 'selected' : '' }}>Lastbil</option>
                                <option value="van" {{ ($vehicle->type == "van") ? 'selected' : '' }}>Van</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="vehicle-rename-input" name="reg_nr" value="{{ $vehicle->reg_nr }}">
                        </div>
                        <div class="col-md-1">
                            <input type="text" class="vehicle-rename-input" name="model" value="{{ $vehicle->model }}">
                        </div>
                        <div class="col-md-2">
                            <select name="diims_id" class="form-control" id="diims_id">
                              @foreach($diims as $diimsen)
                                <option value="{{ $diimsen->number }}" {{($diimsen->number == $vehicle->diims_id) ? 'selected' : ''}}>{{ $diimsen->name }} | {{ $diimsen->number }}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-success">Update</button>
                            <a href="/vehicle/delete/{{ $vehicle->id }}" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                    </form>
                </li>
            @endforeach
            </ul>
        </div>
    </div>
    <style>
        .vehicle-rename-input{
            border: 0;
            display: inline-block;
            font-size: 23px;
            width: 100%;
            border-bottom: 1px dotted rgba(0, 0, 0, 0.27);
        }
        .vehicle-type{
            font-size: 15px;
            vertical-align: text-top;
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
    </script>
@endsection