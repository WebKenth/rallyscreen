@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-6">
        @include('driver.create')
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <h1>Driver's Vehicles</h1>
        @include('driver.vehicle')
    </div>
</div>
{{--<div class="row">--}}
    {{--<div class="col-md-12">--}}
        {{--<h1>List of Driver's with Vehicles</h1>--}}
        {{--<ul class="list-group">--}}
            {{--@foreach($drivers as $driver)--}}
                {{--<li class="list-group-item">--}}
                    {{--<div class="driver-change-name">--}}
                        {{--{{ csrf_field() }}--}}
                        {{--<input data-id="{{ $driver->id }}" data-type="first_name" class="driver-change-name-input" type="text" value="{{ $driver->first_name }}">--}}
                        {{--<input data-id="{{ $driver->id }}" data-type="middle_name" class="driver-change-name-input" type="text" value="{{ $driver->middle_name }}">--}}
                        {{--<input data-id="{{ $driver->id }}" data-type="last_name" class="driver-change-name-input" type="text" value="{{ $driver->last_name }}">--}}
                    {{--</div>--}}
                    {{--<span><a class="driver-delete" href="/driver/delete/{{ $driver->id }}">X</a></span>--}}
                    {{--<hr>--}}
                    {{--<p>Vehicles</p>--}}
                    {{--<ul class="list-group">--}}
                        {{--@foreach($driver->vehicles as $vehicle)--}}
                            {{--<li class="list-group-item">{{ $vehicle->name }}</li>--}}
                        {{--@endforeach--}}
                    {{--</ul>--}}
                {{--</li>--}}
            {{--@endforeach--}}
        {{--</ul>--}}
    {{--</div>--}}
{{--</div>--}}
<style>
.driver-change-name-input {
    border: 0;
    display: inline-block;
    font-size: 23px;
    width: 100%;
    border-bottom: 1px dotted rgba(0, 0, 0, 0.27);
}
.driver-delete{
    position: absolute;
    top: 5px;
    right: 15px;
    color:red;
    font-size: 30px;
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
        $('.driver-change-name-input').on('focusout',function(){
            var driver_id = $(this).data('id');
            var token = $(this).parent().parent().children();
            token = token.first().val();
            $.ajax({
                url: '/driver/'+driver_id+'/change_name',
                async: true,
                type: 'POST',
                data: {
                    type: $(this).data('type'),
                    value: $(this).val(),
                    _token: token
                }
            });
        });
    </script>
@endsection