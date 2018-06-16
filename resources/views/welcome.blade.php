@extends('layouts.app')
@section('title')
    EDV-Welcome
@endsection

@section('css')
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
@endsection

@section('content')
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    EDV Trading
                </div>

                <div class="links">
                    <a href="/point_of_sales">Point of Sales</a>
                    <a href="/employee_logging">Employee Logging</a>
                </div>
            </div>
        </div>
@endsection
