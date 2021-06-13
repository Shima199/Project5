@extends('layouts.master')
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <br />
        <h3 class="display-5 text-center">Update Bus Details</h3>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br />
        @endif

        <form method="post" action="{{ route('buses.update', $buses->bus_id) }}">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="bus_code">Bus Code</label>
                <input type="text" class="form-control" name="bus_code" value="{{$buses->bus_code}}" />
            </div>

            <div class="form-group">
                <label for="operator_name">Operator name</label>
                <input type="text" class="form-control" name="operator_name" value="{{$buses->operator_name}}" />
            </div>

            <div class="form-group">
                <label for="depart">Depart</label>
                <input type="text" class="form-control" name="depart" value="{{$buses->depart}}" />
            </div>

            <div class="form-group">
                <label for="arrive">Arrive</label>
                <input type="text" class="form-control" name="arrive" value="{{$buses->arrive}}" />
            </div>

            <div class="form-group">
                <label for="date">Date</label>
                <input id="date" class="form-control" name="date" value="{{$buses->date}}" />
            </div>
            <div class="text-center">
                <a href="{{ route('buses.index')}}" class="btn btn-primary textcenter">Return</a>&nbsp;&nbsp;
                <button type="submit" class="btn btn-primary textcenter">Update Details</button>
            </div>
        </form>
    </div>
</div>
@endsection