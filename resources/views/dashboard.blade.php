@extends('layouts.app')

@section('content')
<div class="container-fluid">
    {{--<div class="row">--}}
        {{--<div class="col-md-12">--}}
            {{--@if (count($errors) > 0)--}}
                {{--<div class="alert alert-danger">--}}
                    {{--<ul>--}}
                        {{--@foreach ($errors->all() as $error)--}}
                            {{--<li>{{ $error }}</li>--}}
                        {{--@endforeach--}}
                    {{--</ul>--}}
                {{--</div>--}}
            {{--@endif--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="row">--}}
        {{--<div class="col-md-12">--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-6">--}}
                    {{--@include('driver.create')--}}
                {{--</div>--}}
                {{--<div class="col-md-6">--}}
                    {{--@include('vehicle.create')--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-6">--}}
                    {{--@include('heat.create')--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-12">--}}
                    {{--<h1>Driver's Vehicles</h1>--}}
                    {{--@include('driver.vehicle')--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
</div>
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
            var token = $(this).parent().children();
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