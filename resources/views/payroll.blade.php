@extends('layouts.app')

@section('css')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header">Options</div>
                    <div class="card-body">
                        <div>
                            <button type="button" data-toggle="modal" data-target="#show-payroll" class="btn-custom btn btn-success"><i class="fa fa-lg fa-usd"></i> Pay Stubs</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Current Logs</div>
                    <div class="card-body">
                        <form action="/payroll" method="POST">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-1">
                                    <label><b>Name:</b></label>
                                </div>
                                <div class="col-md-3">
                                    <input class="custom-input" value="{{ $employee->name }}" type="text" readonly>
                                </div>
                                <div class="col-md-1">
                                    <label><b>Status:</b></label>
                                </div>
                                <div class="col-md-3">
                                    <input class="custom-input"  value="{{ $employee->status }}" type="text" readonly>
                                </div>
                                <div class="col-md-1">
                                    <label><b>Rate:</b></label>
                                </div>
                                <div class="col-md-3">
                                    <input class="custom-input"  value="{{ $employee->rate }} php/hr" type="text" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <label><b>Current Pay:</b></label>
                                </div>
                                <div class="col-md-3">
                                    <input class="custom-input" name="payout" type="text" value="{{$pay_detail ? $pay_detail[0] : '0' }} php" readonly>
                                </div>
                                <div class="col-md-2">
                                    <label><b>Total Hrs Worked:</b></label>
                                </div>
                                <div class="col-md-3">
                                    <input class="custom-input" name="total_hrs" type="text" value="{{ sprintf("%d hrs %02d min",   floor($pay_detail[1]/60), $pay_detail[1]%60)}}" readonly>
                                    <input class="custom-input"  name="user_id" value="{{ $employee->id }}" type="hidden" readonly>
                                </div>
                                <div class="col-md-2">
                                    <button style="float: right;" type="submit" class="btn-custom btn btn-warning"><i class="fa fa-lg fa-money"></i> Create Payroll</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
			<table class="table table-striped" id="users" style="width:100%; text-align: center;">
			  <thead>
			    <tr>
			      <th scope="col">Punch-in</th>
			      <th scope="col">Punch-out</th>
			      <th scope="col">Hours Worked</th>
			      <th scope="col">Options</th>
			    </tr>
			  </thead>
			  <tbody>
                            @foreach($logs as $log) 
                                <tr id="{{'log_'.$log->id}}">
                                  <td>{{Carbon::parse($log->time_in)->format('F j Y, g:i a')}}</td>
                                  <td>{{$log->time_out ? Carbon::parse($log->time_out)->format('F j Y, g:i a'):'' }}</td>
                                  <td>{{Carbon::parse($log->time_out ? Carbon::parse($log->time_out) : Carbon::now('Asia/Manila'))->diff(Carbon::parse($log->time_in))->format('%H hr %I min')}}</td>
                                  <td>
                                    <button type="button" data-toggle="modal" data-id="{{$log->id}}" data-time_out="{{$log->time_out ? Carbon::parse($log->time_out)->format('F j Y, g:i a'):'' }}" data-time_in="{{Carbon::parse($log->time_in)->format('F j Y, g:i a')}}" data-target="#update-log" class="btn-custom btn btn-success"><i class="fa fa-lg fa-pencil-square-o"></i>Update</button>
                                    <a class="delete_log btn btn-danger" data-id="{{$log->id}}" href="#"><i class="fa fa-lg fa-trash-o"></i> Delete</a>
                                  </td>
                                </tr>
                            @endforeach
			  </tbody>
			</table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('modals.payroll.update')
    @include('modals.payroll.paystubs')
@endsection

@section('js')
    <script src="{{ asset('js/payroll.js') }}"></script>
@endsection
