@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <form action="/diims" method="post">
                <fieldset>
                <legend>Diims</legend>
                    <input type="text" class="form-control" name="name" placeholder="Kaldenavn">
                    <input type="text" class="form-control" name="number" placeholder="869606020004341">
                    <button class="btn btn-success">Gem</button>
                </fieldset>
            </form>
        </div>
        <div class="col-md-6">
            Diims Liste
            <ul class="list-group">
            @foreach($diims as $diimer)
                <li class="list-group-item">
                    {{ $diimer->name }} | {{ $diimer->number }} <a href="/diims/delete/{{ $diimer->id }}" class="btn btn-danger">Slet</a>
                </li>
            @endforeach
            </ul>
        </div>
    </div>
@endsection