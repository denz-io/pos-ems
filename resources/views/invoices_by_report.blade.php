@extends('layouts.app')

@section('css')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12" style="padding-top: 30px;">
                <div class="card">
                    <div class="card-header">Report Details</div>
                    <div class="card-body">
                        <div class="row" style="text-align: center;">
                            <div class="col-md-3">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label><b>Start:</b></label>
                                    </div>
                                    <div class="col-md-9">
                                        {{$report->report_start}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label><b>End:</b></label>
                                    </div>
                                    <div class="col-md-9">
                                        {{$report->report_end}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label><b>Sales:</b></label>
                                    </div>
                                    <div class="col-md-9">
                                        {{$report->total_amount}} php
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label><b>Profit:</b></label>
                                    </div>
                                    <div class="col-md-9">
                                        {{$report->total_earned}} php
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12" style="padding-top: 30px;">
                <div class="card">
                    <div class="card-header">Invoices List</div>
                    <div class="card-body">
                        <table id="items" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Created at</th>
                                    <th>Sales</th>
                                    <th>Profit</th>
                                    <th>Amount Given</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($invoices as $invoice)
                                    <tr>
                                        <td>{{ $invoice->invoice_number }}</td>
                                        <td>{{ $invoice->created_at }}</td>
                                        <td>{{ $invoice->total_sales}}</td>
                                        <td>{{ $invoice->profit}}</td>
                                        <td>{{ $invoice->amount_given}}</td>
                                        <td>
                                            <a type="button" href="{{ '/invoices/' . $invoice->id }}" class="btn btn-primary">More</a>
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
