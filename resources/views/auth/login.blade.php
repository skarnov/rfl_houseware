@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('login') }}" class="form-auth-small">
    @csrf
    <div class="form-group">
        <label for="signin-email" class="control-label sr-only">Email</label>
        <input type="email" required name="email" class="form-control  @error('email') is-invalid @enderror" id="signin-email" value="{{ old('email') }}" placeholder="Email" autofocus>
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="signin-password" class="control-label sr-only">Password</label>
        <input id="signin-password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group clearfix">
        <label class="fancy-checkbox element-left">
            <input name="remember" id="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                   <span>Remember me</span>
        </label>
    </div>
    <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
    <div class="bottom">
        <span class="helper-text m-b-10"><i class="fa fa-lock"></i>
            @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}">Forgot password?</a>
            @endif
        </span>
    </div>
</form>
@endsection
