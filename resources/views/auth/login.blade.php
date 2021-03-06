@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><i class="fa fa-lock fa-lg"> Admin Login</i></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="username" class="col-sm-4 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="username" class="custom-input form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="custom-input form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-12" style="text-align: center;">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-sign-in fa-lg"> {{ __('Login') }}</i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
