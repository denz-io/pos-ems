@extends('layouts.app')

@section('css')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><i class="fa fa-lg fa-creative-commons"> Create Report</i></div>
                    <div class="card-body">
			<form action="/report" method="POST">
			    {{ csrf_field() }}
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <i class="fa fa-lg fa-calendar"></i>
                                    <input style="width:89%" type="text" name="report_start" id="datepicker" class="input-field" placeholder="Start" required />
                                </div>
                                <div class="col-md-4">
                                    <i class="fa fa-lg fa-calendar"></i>
                                    <input style="width:89%" type="text" name="report_end" id="expirydate" class="input-field" placeholder="End" required />
                                </div>
                                <div class="col-md-4">
                                    <button type="Submit" class="btn-custom btn btn-primary"><i class="fa fa-lg fa-plus"></i> Create Report</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12" style="padding-top: 30px;">
                <div class="card">
                    <div class="card-header"><i class="fa fa-lg fa-bookmark"> Report List</i></div>
                    <div class="card-body">
                        <table id="items" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Start</th>
                                    <th>End</th>
                                    <th>Total Sales</th>
                                    <th>Profit</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reports as $report)
                                    <tr>
                                        <td>{{ $report->id }}</td>
                                        <td>{{ Carbon::parse($report->report_start)->format('F j Y, g:i a') }}</td>
                                        <td>{{ Carbon::parse($report->report_end)->format('F j Y, g:i a') }}</td>
                                        <td>{{ $report->total_amount }} php</td>
                                        <td>{{ $report->total_earned }} php</td>
                                        <td>
                                            <a type="button" href="report/{{$report->id}}" class="btn btn-primary"><i class="fa fa-lg fa-info-circle"></i> More</a>
                                            <a type="button" data-id="{{$report->id}}" href="#" class="delete_report btn btn-danger"><i class="fa fa-lg fa-trash-o"></i> Delete</a>
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
@endsection

@section('js')
    <script src="{{asset('js/report.js')}}"></script>    
@endsection
