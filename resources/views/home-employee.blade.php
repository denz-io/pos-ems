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
                            <button type="button" data-toggle="modal" data-target="#show-payroll" class="btn-custom btn btn-success"><i class="fa fa-lg fa-usd"></i> Pay Stubs</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Current Pay Detials</div>
                    <div class="card-body">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-1">
                                <label><b>Name:</b></label>
                            </div>
                            <div class="col-md-3">
                                <input class="custom-input" value="{{ Auth::user()->name }}" type="text" readonly>
                            </div>
                            <div class="col-md-1">
                                <label><b>Status:</b></label>
                            </div>
                            <div class="col-md-3">
                                <input class="custom-input"  value="{{ Auth::user()->status }}" type="text" readonly>
                            </div>
                            <div class="col-md-1">
                                <label><b>Rate:</b></label>
                            </div>
                            <div class="col-md-3">
                                <input class="custom-input"  value="{{ Auth::user()->rate }} php/hr" type="text" readonly>
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
                            </div>
                        </div>
                    </div>
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
                                  @php($time = Carbon::parse(Carbon::parse($log->time_out))->diffInMinutes(Carbon::parse($log->time_in ?? Carbon::now('Asia/Manila'))))
                                  <td>{{ sprintf("%d hrs %02d min",   floor($time/60), $time%60)}}</td>
                                </tr>
			    @endforeach
			  </tbody>
			</table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('modals.payroll.paystubs');
@endsection

@section('js')
@endsection
