@extends('layouts.app')

@section('js')
    <script src="{{ asset('js/inventory.js') }}"></script>
@endsection

@section('content')
    <div class="container">
        <div class="container custom">
            @if(Auth::user())
                <div style="padding-bottom: 10px; color: #fff !important;"><button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Add Items</button></div>
            @endif
            <table id="items" class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Item</th>
                        <th>Image</th>
                        <th>Stock Qty</th>
                        <th>Price</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                                <img class="inventoryimage" src="{{ asset('images/item_pics/' . $item->image)}}"></image>
                            </td>
                            <td>{{ $item->stock }}</td>
                            <td>{{ $item->retail_price }} php</td>
                            <td>
                                <div style="color: #fff !important">
                                    <a href="#" data-desc="{{ $item->description }}"data-sold="{{$item->sold}}" data-id="{{$item->id}}" data-original_price="{{$item->original_price}}" data-retail_price="{{$item->retail_price}}" data-stock="{{$item->stock}}" data-name="{{$item->name}}" data-toggle="modal" data-target="#showmoreinventory" class="btn btn-primary">More</a>
                                    @if(Auth::user())
                                        <a href="#" data-desc="{{ $item->description }}"data-sold="{{$item->sold}}" data-id="{{$item->id}}" data-original_price="{{$item->original_price}}" data-retail_price="{{$item->retail_price}}" data-stock="{{$item->stock}}" data-name="{{$item->name}}" data-toggle="modal" data-target="#update-item" class="btn btn-primary">Update</a>
                                        <a type="button" href="#" data-id="{{$item->id}}" class="btn btn-primary delete">Delete</a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('modals.inventory.createitems')
    @include('modals.inventory.updateitems')
    @include('modals.inventory.showmore')
@endsection

