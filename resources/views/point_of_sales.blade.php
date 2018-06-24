@extends('layouts.app')

@section('title')
    EDV-Point of Sales
@endsection

@section('css')
    <link href="{{ asset('css/pos.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="custom-row-header">
                <div>
                   <h3>EDV TRADING & SERVICE CENTER</h3> 
                </div>
                <div>
                   VIRGILIO O. HERMIDA
                </div>
                <div>
                   P. Burgos St. Brgy. 22 Tacloban City 
                </div>
                <div>
                   VAT REG TIN NO. 180-486-825-001
                </div>
            </div>
            <div class="row custom-row">
                <div class="col-md-7"> 
                    <table class="table">
                      <tbody>
                        <tr>
                          <th>Sold To:</th>
                          <td><input type="text" class="custom-input2"></input></td>
                        </tr>
                        <tr>
                          <th>Business Style:</th>
                          <td><input type="text" class="custom-input2"></input></td>
                        </tr>
                        <tr>
                          <th>Address:</th>
                          <td><input type="text" class="custom-input2"></input></td>
                        </tr>
                        <tr>
                          <th>TIN:</th>
                          <td><input type="text" class="custom-input2"></input></td>
                        </tr>
                      </tbody>
                    </table>
                </div>     
                <div class="col-md-5" > 
                    <table class="table">
                      <tbody>
                        <tr>
                          <th>Invoice#:</th>
                          <td><input type="text" class="custom-input2" value="1232312321" disabled></input></td>
                        </tr>
                        <tr>
                          <th>Date:</th>
                          <td><input type="text" class="custom-input2" value="01/01/01" disabled></input></td>
                        </tr>
                        <tr>
                          <th>Terms:</th>
                          <td><input type="text" class="custom-input2"></input></td>
                        </tr>
                        <tr>
                          <th>Amount:</th>
                          <td><input type="text" class="custom-input2" value="500" ></input></td>
                        </tr>
                      </tbody>
                    </table>
                </div>     
            </div>
            <div class="row custom-row">
                <div class="table-container">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">QTY</th>
                          <th scope="col">UNIT</th>
                          <th scope="col">ARTICLE</th>
                          <th scope="col">UNIT PRICE</th>
                          <th scope="col">AMOUNT</th> </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th>Pencil</th>
                          <th>Image of pencil</th>
                          <th>6php</th>
                          <th>20 pieces</th>
                          <th>120php</th>
                        </tr>
                      </tbody>
                    </table>
                </div>
            </div>
            <div class="row custom-row">
            </div>
            <div class="row custom-row">
                <div class="col-md-7"> 
                    <div style="padding-left: 40px;">
                        <button type="button" class="btn-custom btn btn-success">Add Item</button>
                        <button type="button" class="btn-custom btn btn-primary">Print</button>
                    </div>
                </div>     
                <div class="col-md-5" > 
                    <table class="table table-striped">
                      <tbody>
                        <tr>
                          <th>Total Sales(Net of VAT):</th>
                          <td>120php</td>
                        </tr>
                        <tr>
                          <th>Add 12% VAT:</th>
                          <td>12php</td>
                        </tr>
                        <tr>
                          <th>TOTAL AMOUNT DUE:</th>
                          <td>140php</td>
                        </tr>
                      </tbody>
                    </table>
                </div>     
            </div>
        </div>
    </div>
@endsection
