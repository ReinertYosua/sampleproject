@extends('layouts.guest')

@section('title', 'Login')

@section('content')
<!-- isi konten html -->
<div class="card mb-3">

    <div class="card-body">

    <div class="pt-4 pb-2">
        <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
        <p class="text-center small">Enter your username & password to login</p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="row g-3 needs-validation" novalidate>
        @csrf
        <div class="col-12">
            <label for="yourUsername" class="form-label">Email</label>
            <div class="input-group has-validation">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="yourEmail" required>
                <div class="invalid-feedback">Please enter your email.</div>
                 <!-- error message untuk email -->
                @error('email')
                    <div class="invalid-feedback" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="col-12">
            <label for="yourPassword" class="form-label">Password</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="yourPassword" required>
            <div class="invalid-feedback">Please enter your password!</div>
            <!-- error message untuk email -->
            @error('password')
                <div class="invalid-feedback" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-12">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
            <label class="form-check-label" for="rememberMe">Remember me</label>
        </div>
        </div>
        <div class="col-12">
        <button class="btn btn-primary w-100" type="submit">Login</button>
        </div>
        <div class="col-12">
        <p class="small mb-0">Don't have account? <a href="/register">Create an account</a></p>
        </div>
    </form>

    </div>
</div>
@endsection