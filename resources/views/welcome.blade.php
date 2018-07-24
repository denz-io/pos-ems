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
                    @if(!Auth::user())
                        <a href="/employee_logging" data-toggle="modal" data-target="#employee-login">Employee Logging</a>
                    @else 
                        <a href="/pos">Point of Sales</a>
                    @endif
                </div>
            </div>
        </div>
        @include('modals.employee.login')
@endsection
