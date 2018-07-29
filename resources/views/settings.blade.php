@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Settings</div>
                    <div class="card-body">
                        <form action="/settings" method="POST" enctype="multipart/form-data">
                          {{ csrf_field() }}
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Employee Name</label>
                                <div class="col-md-6">
                                    <input class="custom-input" value="{{Auth::user()->name}}" type="text" name="name" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Phonenumber</label>
                                <div class="col-md-6">
                                    <input class="custom-input" value="{{Auth::user()->phone}}" type="text" name="phone" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Username</label>
                                <div class="col-md-6">
                                    <input class="custom-input" value="{{Auth::user()->username}}" type="text" name="username" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <input class="custom-input" value="" type="password" name="password" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>
                                <div class="col-md-6">
                                    <input class="custom-input" value="" type="password" name="new_password">
                                </div>
                            </div>
                            @if(Auth::user()->status != 'admin')
                                <div class="row">
                                    <div class="form-group">
                                        <span class="input-group-btn">
                                            <span class="btn btn-default btn-file">
                                                <input style="width:50%;"type="file" name="image" multiple>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            @endif
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-lg fa-floppy-o"></i> Update</button>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
