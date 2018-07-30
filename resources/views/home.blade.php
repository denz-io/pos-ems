@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header"><i class="fa fa-lg fa-optin-monster"> Employee Manager</i></div>
                    <div class="card-body">
                        <div><button type="button" data-toggle="modal" data-target="#employee-create" class="btn-custom btn btn-primary"><i class="fa fa-lg fa-user-plus"> Create Employee</i></button></div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header"><i class="fa fa-lg fa-users"> Employee List</i></div>
                    <div class="card-body">
			<table class="table table-striped" id="users" style="width:100%; text-align: center;">
			  <thead>
			    <tr>
			      <th scope="col">Username</th>
			      <th scope="col">Name</th>
			      <th scope="col">Is Punched-in</th>
			      <th scope="col">Options</th>
			    </tr>
			  </thead>
			  <tbody>
			    @foreach($users as $user) 
				@if($user->status != 'admin')
				    <tr>
				      <td scope="row">{{$user->username}}</td>
				      <td>{{$user->name}}</td>
					  <td><a href="/home/attendance/{{$user->id}}" type="button" class="btn-custom btn {{$user->is_loggedin ? 'btn-success' : 'btn-warning' }}"><i class="fa fa-lg fa-clock-o"> {{ $user->is_loggedin ? 'Yes' : 'No' }}</i></a></td>
				      <td><button type="button" data-profile="{{$user->profile}}" data-name="{{$user->name}}" data-username="{{$user->username}}" data-status="{{$user->status}}" data-rate="{{$user->rate}}" data-phone="{{$user->phone}}" data-id="{{$user->id}}" data-toggle="modal" data-target="#employeeoptions" class="btn-custom btn btn-primary more-button"><i class="fa fa-lg fa-info-circle"> More</i></button></td>
				    </tr>
				@endif
			    @endforeach
			  </tbody>
			</table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('modals.employee.empoloyee-options')
    @include('modals.employee.create')
@endsection

@section('js')
    <script src="{{ asset('js/home.js') }}"></script>
@endsection
