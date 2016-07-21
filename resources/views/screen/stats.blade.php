@extends('layouts.app')

@section('content')
<style>
nav{
    display: none;
}
    .stats-box{
        border: 1px solid black;
    }
    .stats-header{
        padding:15px;
        border: 1px solid black;
        height: 50px;
    }
    .stats-header p {
        display:inline;
    }
    .driver-timer-green-bar{
        height: 20px;
        width: 25%;
        background-color: green;
        display: inline-block;
        color: white;
        text-align: right;
        padding-right: 5px;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 stats-box">
            <div class="row">
                <div class="col-md-12 stats-header">
                        <p>Vans / Lastbil</p>
                        <p class="pull-right">Top 10 Chauffører</p>
                </div>
                <div class="col-md-12">
                    <ul>
                        @foreach($drivers as $driver)
                        <li>
                            <div class="driver">
                                <span class="driver-name">{{ $driver->first_name .' '. $driver->middle_name .' '. $driver->last_name }}</span>
                                <div class="driver-timer">
                                    <span class="driver-timer-green-bar">10:10</span>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6 stats-box">
            <p>Biler</p>
            <ul>
                <li>Bil #1</li>
                <li>Bil #2</li>
                <li>Bil #3</li>
            </ul>
            <p>Trucks / Vans</p>
            <ul>
                <li>Van #1</li>
                <li>Van #2</li>
                <li>Van #3</li>
            </ul>
        </div>
    </div>
</div>
@endsection