<ul class="list-group">
    <li class="list-group-item">
        <div class="row driver-titles">
            <div class="col-md-2">
                <p>First Name</p>
            </div>
            <div class="col-md-2">
                <p>Middle Name</p>
            </div>
            <div class="col-md-2">
                <p>Last Name</p>
            </div>
            <div class="col-md-3">
                <p>Vehicles</p>
            </div>
            <div class="col-md-1">
                <p>Controls</p>
            </div>
        </div>
    </li>
@foreach($drivers as $driver)
    <li class="list-group-item">
        <div class="row">
            <div class="col-md-6">
                <div class="row driver-change-name">
                    {{ csrf_field() }}
                    <div class="col-md-4">
                        <input data-id="{{ $driver->id }}" data-type="first_name" class="driver-change-name-input" type="text" value="{{ $driver->first_name }}">
                    </div>
                    <div class="col-md-4">
                        <input data-id="{{ $driver->id }}" data-type="middle_name" class="driver-change-name-input" type="text" value="{{ $driver->middle_name }}">
                    </div>
                    <div class="col-md-4">
                        <input data-id="{{ $driver->id }}" data-type="last_name" class="driver-change-name-input" type="text" value="{{ $driver->last_name }}">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <form method="POST" action="/driver/{{$driver->id}}/update_relationship" class="form-horizontal">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{$driver->id}}">
                    <div class="row">
                        <div class="col-md-6">
                            <select name="vehicle[]" class="form-control" multiple>
                                @foreach( $vehicles as $vehicle)
                                    <option value="{{ $vehicle->id }}" {{ ($driver->hasVehicle($vehicle->id)) ? 'selected' : '' }}>{{ $vehicle->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-success">Update</button>
                            <a class="btn btn-danger" href="/driver/delete/{{ $driver->id }}">Delete</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </li>
@endforeach
</ul>
<style>
    .driver-titles p{
        font-size: 20px;
    }

</style>