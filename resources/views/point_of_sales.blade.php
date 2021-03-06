@extends('layouts.app')

@section('title')
    Point of Sales
@endsection

@section('css')
    <link href="{{ asset('css/pos.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container" id="pos_div">
        <div class="card">
            <div class="custom-row-header">
                <div>
                   <h3>POS-EMS</h3> 
                </div>
                <div>
                   OWNER NAME 
                </div>
                <div>
                   Business Address 
                </div>
                <div>
                   VAT REG TIN NO. ###-###-###-###
                </div>
            </div>
            <form id="pos_form" action="/pos" method="POST">
                {{ csrf_field() }}
                <div class="row custom-row">
                    <div class="col-md-7"> 
                        <table class="table">
                          <tbody>
                            <tr>
                              <th>Sold To:</th>
                              <td><input type="text" id="sold_to" name="customer" class="custom-input2"></input></td>
                            </tr>
                            <tr>
                              <th>Business Style:</th>
                              <td><input type="text" id="business_style" name="business_style" class="custom-input2"></input></td>
                            </tr>
                            <tr>
                              <th>Address:</th>
                              <td><input type="text" id="address" name="address" class="custom-input2"></input></td>
                            </tr>
                            <tr>
                              <th>TIN:</th>
                              <td><input type="text" id="tin" name="tin" class="custom-input2"></input></td>
                            </tr>
                          </tbody>
                        </table>
                    </div>     
                    <div class="col-md-5" > 
                        <table class="table">
                          <tbody>
                            <tr>
                              <th>Invoice#:</th>
                              <td><input type="text" id="invoice_number" name="invoice_number" class="custom-input2" value="{{rand()}}" readonly></input></td>
                            </tr>
                            <tr>
                              <th>Date:</th>
                              <td><input type="text" class="custom-input2" name="date" value="{{Carbon\Carbon::now('Asia/Manila')->format('F j Y, g:i a')}}" readonly></input></td>
                            </tr>
                            <tr>
                              <th>Terms:</th>
                              <td><input type="text" class="custom-input2" name="terms"></input></td>
                            </tr>
                            <tr>
                              <th>Amount:</th>
                              <td><input type="text" class="custom-input2" value="0" name="amount_given" id="given_amount"></input></td>
                            </tr>
                          </tbody>
                        </table>
                    </div>     
                </div>
                <div class="row custom-row">
                    <div class="col-md-6"> 
                        <div style="padding-left: 40px;">
                            <button type="button" onCLick="refresh()" id="clear-btn" class="hidden-print btn-custom btn btn-success"><i class="fa fa-lg fa-refresh"></i></button>
                            <button type="button"  data-toggle="modal" data-target="#pos-add-item" class="hidden-print btn-custom btn btn-success"><i class="fa fa-lg fa-plus"></i></button>
                            <button type="button" onCLick="printDiv('pos_div')" class="hidden-print btn-custom btn btn-success"><i class="fa fa-lg fa-print"></i></button>
                            <button type="button" onCLick="saveTransaction()" id="clear-btn" class="hidden-print btn-custom btn btn-success"><i class="fa fa-lg fa-save"></i></button>
                        </div>
                    </div>     
                </div>
                <div class="row custom-row">
                    <div class="table-container">
                        <table class="table table-striped">
                          <thead>
                              <tr>
                                  <th scope="col">UNIT</th>
                                  <th scope="col">UNIT PRICE</th>
                                  <th scope="col">QTY</th>
                                  <th scope="col">AMOUNT</th> 
                              </tr>
                          </thead>
                          <tbody class="tbl-pos">
                          <tbody>
                        </table>
                    </div>
                </div>
                <div class="row custom-row">
                    <div class="col-md-6"> 
                    </div>     
                    <div class="col-md-6" > 
                        <table class="table table-striped pos-table">
                          <tbody>
                            <tr>
                              <th>Total Sales(Net of VAT):</th>
                              <td><input type="text" class="custom-input2" value="0" name="total_sales" id="amount_total" readonly></td>
                            </tr>
                            <tr>
                              <th>Add 12% VAT:</th>
                              <td><input type="text" class="custom-input2" value="0" name="total_sales_vat" id="amount_vat" readonly></td>
                            </tr>
                            <tr>
                              <th>TOTAL AMOUNT DUE:</th>
                              <td><input type="text" class="custom-input2" value="0" name="amount_due" id="amount_due" readonly></td>
                            </tr>
                            <tr>
                              <th>CHANGE:</th>
                              <td><input name="change" type="text" class="custom-input2" value="0" id="change" readonly></td>
                              <input type="hidden" id="item" name="items" >
                              <input type="hidden" value="0" id="profit" name="profit" >
                            </tr>
                          </tbody>
                        </table>
                    </div>     
                </div>
            </form>
        </div>
    </div>
    @include('modals.pos.showitems')
@endsection

@section('js')
    <script src="{{ asset('js/pos.js') }}"></script>
@endsection
