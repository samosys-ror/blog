@extends('layouts.app')

@section('content')
<style type="text/css">
    body{
    background-image: url('https://staging.signifycrm.net/portal_support/img/2.png');
    }
</style>
<div class="container"style="width: 60%;margin-top: 10%">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card"style="background: transparent;">
                <div class="card-header"style="background: transparent;"><center><img src="image/logo.png"/></center></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class=""style="width: 20%">{{ __('') }}</label>

                            <div class="col-md-8">
                                <input id="email" type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="Enter Your Username"value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class=""style="width:20%">{{ __('') }}</label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"placeholder="Enter Password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary"style="width:60%;">
                                    {{ __('Login') }}
                                </button>

                              


                            </div>
                        </div>


                      <div class="form-group row">
                          <div class="col-md-8 offset-md-4">

                               @if (Route::has('register'))
                                    <a class="btn btn-link" href="{{ route('register') }}">
                                        {{ __(' Register New User?') }}
                                    </a>
                                @endif

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif

                          </div>
                      </div>  
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
