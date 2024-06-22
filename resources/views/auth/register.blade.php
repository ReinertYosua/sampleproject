@extends('layouts.guest')

@section('title', 'Register')

@section('content')
<div class="card mb-3">

    <div class="card-body">

    <div class="pt-4 pb-2">
        <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
        <p class="text-center small">Enter your personal details to create account</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="row g-3 needs-validation" novalidate>
        @csrf
        <div class="col-12">
            <label for="yourName" class="form-label">Your Name</label>
            <input type="text" value="{{ old('name') }}" name="name" class="form-control @error('name') is-invalid @enderror" id="yourName" required>
            <div class="invalid-feedback">Please, enter your name!</div>
            <!-- error message untuk name -->
            @error('name')
                <div class="invalid-feedback" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-12">
            <label for="yourEmail" class="form-label">Your Email</label>
            <input type="email" value="{{ old('email') }}" name="email" class="form-control @error('email') is-invalid @enderror" id="yourEmail" required>
            <div class="invalid-feedback">Please enter a valid Email adddress!</div>
            <!-- error message untuk email -->
            @error('email')
                <div class="invalid-feedback" role="alert">
                    {{ $message }}
                </div>
            @enderror
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
            <label for="yourPassword" class="form-label">Password Confirmation</label>
            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="yourPassword" required>
            <div class="invalid-feedback">Please enter your password!</div>
            <!-- error message untuk email -->
            @error('password_confirmation')
                <div class="invalid-feedback" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-12">
        <div class="form-check">
            <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
            <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
            <div class="invalid-feedback">You must agree before submitting.</div>
        </div>
        </div>
        <div class="col-12">
        <button class="btn btn-primary w-100" type="submit">Create Account</button>
        </div>
        <div class="col-12">
        <p class="small mb-0">Already have an account? <a href="/login">Log in</a></p>
        </div>
    </form>

    </div>
    </div>
@endsection