@extends('layouts.app')

@section('css')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12" style="padding-top: 30px;">
                <div class="card">
                    <div class="card-header">Invoice List</div>
                    <div class="card-body">
                        <table id="items" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Sold to</th>
                                    <th>Created at</th>
                                    <th>Sales</th>
                                    <th>12% Vat</th>
                                    <th>Profit</th>
                                    <th>Amount Given</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($invoices as $invoice)
                                    <tr>
                                        <td>{{ $invoice->invoice_number }}</td>
                                        <td>{{ $invoice->customer }}</td>
                                        <td>{{ Carbon::parse($invoice->date)->format('F j Y, g:i a') }}</td>
                                        <td>{{ $invoice->total_sales}}</td>
                                        <td>{{ $invoice->total_sales_vat}}</td>
                                        <td>{{ $invoice->profit}}</td>
                                        <td>{{ $invoice->amount_given}}</td>
                                        <td>
                                            <a type="button" href="{{ '/invoices/' . $invoice->id }}" class="btn btn-primary"><i class="fa fa-lg fa-info-circle"></i> More</a>
                                            @if(Auth::user()->status == 'admin')
                                            <a type="button" data-id="{{$invoice->id}}" href="#" class="delete_invoice btn btn-danger"><i class="fa fa-lg fa-trash-o"></i> Delete</a>
                                            @endif
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
    <script src="{{ asset('js/invoice.js') }}"></script>
@endsection
