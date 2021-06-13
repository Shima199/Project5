@extends('layouts.app')

@section('content')
<div class="col-sm-12">
<br/>
<h3 class="display-5 text-center">Users</h3>
<table class="table table-striped">
  <thead>
    <tr>
      <th>No</th>
      <th>Name</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Is Admin</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $count => $users)
    <tr>
      <th>{{++$count}}</th>
      <th>{{$users['name']}}</th>
      <th>{{$users['email']}}</th>
      <th>{{$users['phone']}}</th>
      <th>{{$users['is_admin']}}</th>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection
