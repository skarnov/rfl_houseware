@extends('layouts.app')

@section('content')

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

<form method="POST" action="{{ route('password.update') }}" class="form-auth-small">
    @csrf
    <div class="form-group">
        <input type="hidden" name="token" value="{{ $token }}">
        <label for="signin-email" class="control-label sr-only">Email</label>
        <input id="email" type="email" required name="email" class="form-control  @error('email') is-invalid @enderror" value="{{ $email ?? old('email') }}" placeholder="Email" autofocus>
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="signin-password" class="control-label sr-only">New Password</label>
        <input id="signin-password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="New Password" required autocomplete="current-password">
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="password-confirm" class="control-label sr-only">Confirm Password</label>
        <input id="password-confirm" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" placeholder="Confirm Password" required autocomplete="current-password">
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary btn-lg btn-block">Execute</button>
    <div class="bottom">
        <span class="helper-text m-b-10"><i class="fa fa-lock"></i>
            @if (Route::has('password.request'))
            <a href="{{ route('login') }}">Back To Login</a>
            @endif
        </span>
    </div>
</form>
@endsection