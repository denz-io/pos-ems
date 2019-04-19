@extends('layouts.app')
@section('title')
    EDV-Welcome
@endsection

@section('css')
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            @if(count($items))
                <div class="col-md-4">
                    @foreach($items as $item)
                        <div class="low-stock">
                            <div class="labels">
                                Stock is low for: 
                            </div>
                            <div class="content">
                                <label>{{$item->name}}</label>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
            @if(count($items))
                <div class="col-md-8">
            @else
                <div class="col-md-12">
            @endif
                <div class="title m-b-md" style="padding-top: 200px; {{count($items) ? '' : 'text-align: center;'}}">
                   POS-EMS 
                </div>
            </div>
        </div>
    </div>
    @include('modals.employee.login')
@endsection
