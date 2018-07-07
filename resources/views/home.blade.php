@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Employee Manager</div>
                    <div class="card-body">
                        <div><button type="button" data-toggle="modal" data-target="#employee-create" class="btn-custom btn btn-primary">Create Employee</button></div>
                        <div><button type="button" class="btn-custom btn btn-success">Payout</button></div>
                        <div><button type="button" class="btn-custom btn btn-info">Logs</button></div>
                        <div><button type="button" class="btn-custom btn btn-danger">Remove Employee</button></div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Employee List</div>
                    <div class="card-body">
                        <div class="row">
                            <table class="table table-striped" id="users">
                              <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Name</th>
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
                                          <th scope="row">{{$user->id}}</th>
                                          <td>{{$user->name}}</td>
                                          <td>{{$user->position}}</td>
                                          <td>{{$user->rate}} php/hr</td>
                                          @if ($user->is_loggedin) 
                                              <td><button type="button" class="btn-custom btn btn-success">Yes</button></td>
                                          @else
                                              <td><button type="button" class="btn-custom btn btn-warning">No</button></td>
                                          @endif
                                          <td><button type="button" class="btn-custom btn btn-primary">More</button></td>
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
    </div>
    @include('modals.employee.create')
@endsection
