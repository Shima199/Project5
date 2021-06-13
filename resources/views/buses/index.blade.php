@extends('layouts.master')
@section('main')

<div class="row">
    <div class="col-sm-12">
        @if(session()->get('success'))
        <div class="alert alert-success text-center">
            {{ session()->get('success') }}
        </div>
        @endif
    </div>

    <div class="col-sm-12">
        <br />
        <h3 class="display-5 text-center">Bus List</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Bus code</th>
                    <th>Operator name</th>
                    <th>Depart</th>
                    <th>Arrive</th>
                    <th>Date</th>
                    <th colspan="2" class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($buses as $count => $bus)
                <tr>
                    <td>{{++$count}}</td>
                    <td><a href="{{ route('buses.show',$bus->bus_id)}}">{{$bus->bus_code}} </a></td>
                    <td>{{$bus->operator_name}}</td>
                    <td>{{$bus->depart}}</td>
                    <td>{{$bus->arrive}}</td>
                    <td>{{$bus->date}}</td>
                    <td class="text-center">
                        <a href="{{ route('buses.edit',$bus->bus_id)}}" class="btn btn-primary btnblock">Edit</a>
                    </td>
                    <td class="text-center">
                        <form action="{{ route('buses.destroy', $bus->bus_id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-block" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-center">
            <a style="margin: 19px;" href="{{ route('buses.create')}}" class="btn btn-primary">New bus Details</a>
        </div>

    </div>

</div>
@endsection