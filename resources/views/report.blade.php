@extends('layouts.app')

@section('css')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Report</div>
                    <div class="card-body">
			<form action="/report" method="POST">
			    {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="report_start" id="datepicker" class="input-field" placeholder="Start Date" required />
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="report_end" id="expirydate" class="input-field" placeholder="End Date" required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4" style="padding-top: 10px;">
                                    <button type="Submit" class="btn-custom btn btn-primary">Create Report</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12" style="padding-top: 30px;">
                <div class="card">
                    <div class="card-header">Reports List</div>
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
                                        <td>{{ $report->report_start }}</td>
                                        <td>{{ $report->report_end }}</td>
                                        <td>{{ $report->total_amount }} php</td>
                                        <td>{{ $report->total_earned }} php</td>
                                        <td>
                                            <a type="button" href="report/{{$report->id}}" class="btn btn-primary delete">More</a>
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
@endsection
