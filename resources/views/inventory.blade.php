@extends('layouts.app')

@section('js')
    <script src="{{ asset('js/inventory.js') }}"></script>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12" style="padding-top: 30px;">
                <div class="card">
                    <div class="card-header">Inventory</div>
                    <div class="card-body">
			    @if(Auth::user()->status == 'admin')
				<div style="padding-bottom: 10px; color: #fff !important;"><button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-lg fa-plus"></i> Add Items</button></div>
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
						<img class="inventoryimage" src="{{ asset('images/item_pics/' . $item->image)}}" alt="Update Image"></img>
					    </td>
					    <td>{{ $item->stock }}</td>
					    <td>{{ $item->retail_price }} php</td>
					    <td>
						<div style="color: #fff !important">
						    <a href="#"  data-sold="{{ $item->sold }}" data-desc="{{ $item->description }}"data-sold="{{$item->sold}}" data-id="{{$item->id}}" data-original_price="{{$item->original_price}}" data-retail_price="{{$item->retail_price}}" data-stock="{{$item->stock}}" data-name="{{$item->name}}" data-toggle="modal" data-target="#showmoreinventory" class="btn btn-success"><i class="fa fa-lg fa-info-circle"></i> More</a>
						    @if(Auth::user()->status == 'admin')
							<a href="#" data-desc="{{ $item->description }}"data-sold="{{$item->sold}}" data-id="{{$item->id}}" data-original_price="{{$item->original_price}}" data-retail_price="{{$item->retail_price}}" data-stock="{{$item->stock}}" data-name="{{$item->name}}" data-toggle="modal" data-target="#update-item" class="btn btn-primary"><i class="fa fa-lg fa-pencil-square-o"></i> Update</a>
							<a type="button" href="#" data-id="{{$item->id}}" class="btn btn-danger delete"><i class="fa fa-lg fa-trash-o"></i> Delete</a>
						    @endif
						</div>
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
    @include('modals.inventory.createitems')
    @include('modals.inventory.updateitems')
    @include('modals.inventory.showmore')
@endsection

