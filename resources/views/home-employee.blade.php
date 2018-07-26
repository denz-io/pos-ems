@extends('layouts.app')

@section('css')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header">Your Options</div>
                    <div class="card-body">
                        <div>
                            @if (Auth::user()->is_loggedin)
                                <a href="/attendance" class="btn-custom btn btn-warning"><i class="fa fa-lg fa-money"></i> Punch Out</a>
                            @else
                                <a href="/attendance" class="btn-custom btn btn-primary"><i class="fa fa-lg fa-money"></i> Punch In</a>
                            @endif
                        </div>
                        <br>
                        
                        <div>
                            <button type="button" data-toggle="modal" data-target="#employee-create" class="btn-custom btn btn-success"><i class="fa fa-lg fa-usd"></i> Pay Stubs</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Your Logs</div>
                    <div class="card-body">
			<table class="table table-striped" id="users" style="width:100%; text-align: center;">
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
                                  <td>{{Carbon::parse($log->time_in)->format('F j Y, g:i a')}}</td>
                                  <td>{{$log->time_out ? Carbon::parse($log->time_out)->format('F j Y, g:i a'):'' }}</td>
                                  <td>{{Carbon::parse($log->time_out ? Carbon::parse($log->time_out) : Carbon::now())->diff(Carbon::parse($log->time_in))->format('%H hr %I min')}}</td>
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
