<ul class="list-group">
    <li class="list-group-item">
        <div class="row driver-titles">
            <div class="col-md-3">
                <p>First Name</p>
            </div>
            <div class="col-md-3">
                <p>Middle Name</p>
            </div>
            <div class="col-md-3">
                <p>Last Name</p>
            </div>
            <div class="col-md-3">
                <p>Controls</p>
            </div>
        </div>
    </li>
@foreach($drivers as $driver)
    <li class="list-group-item">
        <div class="row driver-change-name">
            {{ csrf_field() }}
            <div class="col-md-3">
                <input data-id="{{ $driver->id }}" data-type="first_name" class="driver-change-name-input" type="text" value="{{ $driver->first_name }}">
            </div>
            <div class="col-md-3">
                <input data-id="{{ $driver->id }}" data-type="middle_name" class="driver-change-name-input" type="text" value="{{ $driver->middle_name }}">
            </div>
            <div class="col-md-3">
                <input data-id="{{ $driver->id }}" data-type="last_name" class="driver-change-name-input" type="text" value="{{ $driver->last_name }}">
            </div>
            <div class="col-md-3">
                <a class="btn btn-danger" href="/driver/delete/{{ $driver->id }}">Delete</a>
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