@extends('layouts.masterlogin')

@section('content')
    <br>
    <br>
    <br>
    <br>
    <br>
<div class="all-wrapper menu-side with-pattern">
      <div class="auth-box-w">
        <div class="logo-w">
          <img src="{{asset('assets/img/logo/gsd-logo.png')}}" width="200">
          </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" >{{ __('User Name') }}</label>
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="username" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                            <div class="pre-icon os-icon os-icon-user-male-circle"></div>
                        </div>

                        <div class="form-group row">
                            <label for="password" >{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <div class="pre-icon os-icon os-icon-fingerprint"></div>
                        </div>

                        <div class="buttons-w">
                            <button type="submit" class="btn btn-primary">
                                    {{ __('Log me in') }}
                                </button>
                                <div class="form-check-inline">
                                    <label class="form-check-label" for="remember">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                                
                            </div>
                            <div class="buttons-w">
                            @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                    </form>
                </div>
            </div>
    <br>
    <br>
    <br>
    <br>
    <br>
<br>
@endsection