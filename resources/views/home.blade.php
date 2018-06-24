@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Employee Manager</div>
                <div class="card-body">
                    <div><button type="button" class="btn-custom btn btn-primary">Create Employee</button></div>
		    <div><button type="button" class="btn-custom btn btn-success">Payout</button></div>
		    <div><button type="button" class="btn-custom btn btn-info">Logs</button></div>
		    <div><button type="button" class="btn-custom btn btn-danger">Remove Employee</button></div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Employee List</div>
                <div class="card-body">
                    <div class="row">
			<table class="table table-striped">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Name</th>
			      <th scope="col">Position</th>
			      <th scope="col">Is Punched-in</th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr>
			      <th scope="row">1</th>
			      <td>Mark</td>
			      <td>Encoder</td>
			      <td><a type="button" class="btn-custom btn btn-success">Yes</a></td>
			    </tr>
			    <tr>
			      <th scope="row">2</th>
			      <td>Jacob</td>
			      <td>Inventory</td>
			      <td><a type="button" class="btn-custom btn btn-warning">No</a></td>
			    </tr>
			  </tbody>
			</table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
