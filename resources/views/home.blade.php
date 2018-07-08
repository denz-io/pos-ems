@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">Employee Manager</div>
                    <div class="card-body">
                        <div><button type="button" data-toggle="modal" data-target="#employee-create" class="btn-custom btn btn-primary">Create Employee</button></div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Employee List</div>
                    <div class="card-body">
			<table class="table table-striped" id="users" style="width:100%">
			  <thead>
			    <tr>
			      <th scope="col">Username</th>
			      <th scope="col">Name</th>
			      <th scope="col">Phone#</th>
			      <th scope="col">Position</th>
			      <th scope="col">Rate</th>
			      <th scope="col">Is Punched-in</th>
			      <th scope="col">Options</th>
			    </tr>
			  </thead>
			  <tbody>
			    @foreach($users as $user) 
				@if($user->status != 'superadmin')
				    <tr>
				      <th scope="row">{{$user->username}}</th>
				      <td>{{$user->name}}</td>
				      <td>{{$user->phone}}</td>
				      <td>{{$user->position}}</td>
				      <td>{{$user->rate}} php/hr</td>
				      @if ($user->is_loggedin) 
					  <td><button type="button" class="btn-custom btn btn-success">Yes</button></td>
				      @else
					  <td><button type="button" class="btn-custom btn btn-warning">No</button></td>
				      @endif
				      <td><button type="button" data-id="{{$user->id}}" data-toggle="modal" data-target="#employeeoptions" class="btn-custom btn btn-primary more-button">More</button></td>
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
