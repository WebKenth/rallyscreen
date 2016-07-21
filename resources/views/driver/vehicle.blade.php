<ul class="list-group">
@foreach($drivers as $driver)
    <li class="list-group-item">
        <div class="row">
            <div class="col-md-4">
                <p>{{ $driver->first_name .' '. $driver->middle_name .' '. $driver->last_name }}</p>
            </div>
            <div class="col-md-8">
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
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </li>
@endforeach
</ul>
