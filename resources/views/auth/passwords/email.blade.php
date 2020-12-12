@extends('layouts.app')

@section('content')

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

<form method="POST" action="{{ route('password.email') }}" class="form-auth-small">
    @csrf
    <div class="form-group">
        <label for="signin-email" class="control-label sr-only">Email</label>
        <input id="email" type="email" required name="email" class="form-control  @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Email" autofocus>
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary btn-lg btn-block">Send Password Reset Link</button>
    <div class="bottom">
        <span class="helper-text m-b-10"><i class="fa fa-lock"></i>
            @if (Route::has('password.request'))
            <a href="{{ route('login') }}">Back To Login</a>
            @endif
        </span>
    </div>
</form>
@endsection