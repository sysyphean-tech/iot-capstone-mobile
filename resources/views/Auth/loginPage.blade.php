@extends('layouts.mainLoginPage')
@section('container')
<div class="col-lg d-flex justify-content-center mt-9">
    <div id="auth-left">
        {{--  --}}
        <h1 class="auth-title text-center">Log in.</h1>
        <p class="auth-subtitle mb-5 text-center">Login Your Account.</p>

        <form action="index.html">
            <div class="form-group position-relative has-icon-left mb-4">
                <input type="text" class="form-control form-control-xl" placeholder="Username">
                <div class="form-control-icon">
                    <i class="bi bi-person"></i>
                </div>
            </div>
            <div class="form-group position-relative has-icon-left mb-4">
                <input type="password" class="form-control form-control-xl" placeholder="Password">
                <div class="form-control-icon">
                    <i class="bi bi-shield-lock"></i>
                </div>
            </div>

        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
    </form>
    <div class="text-center mt-5 text-lg fs-4">
        {{-- <p class="text-gray-600">Don't have an account? <a href="auth-register.html" class="font-bold">Sign
            up</a>.</p>
            <p><a class="font-bold" href="auth-forgot-password.html">Forgot password?</a>.</p> --}}
        </div>
    </div>
</div>
@endsection
