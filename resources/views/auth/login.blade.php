@extends('layouts.backend.authBase')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-primary card-title text-center">Login</h2>
                    <hr class="">
                    <form method="POST" action="{{ route('login',tenant('id')) }}">
                        @csrf

                        <div class="form-group">
                            <input id="email" type="email"
                                   class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                                   required autocomplete="email" placeholder="Email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input id="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   name="password" required autocomplete="off" placeholder="Password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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

                        <div class="form-group">
                                <button type="submit" class="btn btn-block btn-primary">
                                    {{ __('Login') }}
                                </button>
                        </div>
                        <div class="form-group text-right">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request',tenant('id')) }}">
                                    {{ __('Forgot Password?') }}
                                </a>
                            @endif
                            @if(Route::has('register'))
                                <a class="btn btn-outline-danger" href="{{route('register',tenant('id'))}}">
                                    {{__('No Account? Sign up')}}
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
