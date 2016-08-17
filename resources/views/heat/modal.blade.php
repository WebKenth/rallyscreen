<form action="/drivers/relationships/add" method="GET">
    <input type="hidden" name="heat_id" value="{{$heat->id}}">
    {{ csrf_field() }}
    <ul class="list-group">
        @foreach($drivers as $driver)
            <li class="list-group-item">
                <input type="hidden" name="drivers[]" value="{{ $driver->id }}">
                <div class="row">
                    <div class="col-md-6">
                        {{ $driver->first_name }} {{ $driver->middle_name }} {{ $driver->last_name }}
                    </div>
                    <div class="col-md-5">
                        <select name="vehicles[]" class="driver-vehicle-select form-control">
                            @foreach($vehicles as $vehicle)
                                <option value="{{ $vehicle->id }}" {{ ($driver->hasVehicleInHeat($heat->id,$driver->id,$vehicle->id) ? 'selected' : '')  }}>{{ $vehicle->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    <button class="btn btn-success" type="submit">Gem</button>
</form>
<script>
</script>
<style>
    .select2-container{
        z-index: 2000;
    }
</style>