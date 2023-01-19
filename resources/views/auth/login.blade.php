@extends('layouts.auth')

@section('left-content')
<div class="auth-logo">
    <a href="index.html"><img src="{{ asset('assets/logo/logo.svg') }}" alt="Logo" /></a>
</div>
<h1 class="auth-title">Log in.</h1>
<p class="auth-subtitle mb-5">
    Log in with your data that you entered during registration.
</p>

<form action="#" method="POST">
    @csrf
    <div class="form-group position-relative has-icon-left mb-4">
        <input type="text" class="form-control form-control-xl" placeholder="Email" />
        <div class="form-control-icon">
            <i class="bi bi-envelope"></i>
        </div>
    </div>
    <div class="form-group position-relative has-icon-left mb-4">
        <input type="password" class="form-control form-control-xl" placeholder="Password" />
        <div class="form-control-icon">
            <i class="bi bi-shield-lock"></i>
        </div>
    </div>
    <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" type="submit">
        Log in
    </button>
</form>
@endsection
