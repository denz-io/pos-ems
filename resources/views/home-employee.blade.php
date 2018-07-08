@extends('layouts.app')

@section('css')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">Log out </div>
                    <div class="card-body">
                        <div><button type="button" data-toggle="modal" data-target="#employee-create" class="btn-custom btn btn-primary">Punch Out</button></div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Your Logs</div>
                    <div class="card-body">
			<table class="table table-striped" id="users" style="width:100%">
			  <thead>
			    <tr>
			      <th scope="col">Punch-in</th>
			      <th scope="col">Punch-out</th>
			      <th scope="col">Hours Worked</th>
			    </tr>
			  </thead>
			  <tbody>
			    @foreach($logs as $log) 
                                <tr>
                                  <td>{{$log->time_in}}</td>
                                  <td>{{$log->time_out ? $log->time_out:'' }}</td>
                                  <td>{{$log->time_out ? $log->time_out:'' }}</td>
                                </tr>
			    @endforeach
			  </tbody>
			</table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
