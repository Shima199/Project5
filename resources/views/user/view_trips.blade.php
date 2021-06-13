@extends('layouts.app2')

@section('content')
<div class="col-sm-12">
<br/>
<h3 class="display-5 text-center">Trips</h3>
<table class="table table-striped">
  <thead>
    <tr>
      <th>No</th>
      <th>Bus code</th>
      <th>Depart</th>
      <th>Arrive</th>
      <th>Date</th>
    </tr>
  </thead>
  <tbody>
  @foreach($buses as $count => $bus)
    <tr>
      <th>{{++$count}}</th>
      <th>{{$bus->bus_code}}</th>
      <th>{{$bus->depart}}</th>
      <th>{{$bus->arrive}}</th>
      <th>{{$bus->date}}</th>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection
