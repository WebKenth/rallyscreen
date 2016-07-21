<ul class="list-group">
    @foreach($drivers as $driver)
        <li class="list-group-item">
            <div class="driver-change-name">
                {{ csrf_field() }}
                <input data-id="{{ $driver->id }}" data-type="first_name" class="driver-change-name-input" type="text" value="{{ $driver->first_name }}">
                <input data-id="{{ $driver->id }}" data-type="middle_name" class="driver-change-name-input" type="text" value="{{ $driver->middle_name }}">
                <input data-id="{{ $driver->id }}" data-type="last_name" class="driver-change-name-input" type="text" value="{{ $driver->last_name }}">
            </div>
            <hr>
            <p>Vehicles</p>
            <ul class="list-group">
                @foreach($driver->vehicles as $vehicle)
                    <li class="list-group-item">{{ $vehicle->name }}</li>
                @endforeach
            </ul>
        </li>
    @endforeach
</ul>
<style>
.driver-change-name-input
{
    border: 0;
    display: inline-block;
    width: calc( 33% - 15px );
    font-size: 23px;
}
</style>