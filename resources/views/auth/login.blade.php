@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
  <div class="card shadow-lg p-4" style="max-width: 500px; width: 100%;">
    <h3 class="text-center mb-4">Login</h3>

    <form method="POST" action="{{ route('login') }}">
      @csrf

      <!-- Social login buttons -->
      <div class="text-center mb-3">
        <p>Sign in with:</p>
        <button type="button" class="btn btn-link btn-floating mx-1"><i class="fab fa-facebook-f"></i></button>
        <button type="button" class="btn btn-link btn-floating mx-1"><i class="fab fa-google"></i></button>
        <button type="button" class="btn btn-link btn-floating mx-1"><i class="fab fa-twitter"></i></button>
        <button type="button" class="btn btn-link btn-floating mx-1"><i class="fab fa-github"></i></button>
      </div>

      <p class="text-center">or:</p>

      <!-- Email -->
      <div class="form-outline mb-4">
        <input type="email" id="loginEmail" name="email" class="form-control" required />
        <label class="form-label" for="loginEmail">Email</label>
      </div>

      <!-- Password -->
      <div class="form-outline mb-4">
        <input type="password" id="loginPassword" name="password" class="form-control" required />
        <label class="form-label" for="loginPassword">Password</label>
      </div>

      <!-- Remember me + Forgot -->
      <div class="row mb-4">
        <div class="col-md-6 d-flex justify-content-center">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember" id="loginCheck" />
            <label class="form-check-label" for="loginCheck"> Remember me </label>
          </div>
        </div>
        <div class="col-md-6 d-flex justify-content-center">
          <a href="{{ route('password.request') }}">Forgot password?</a>
        </div>
      </div>

      <!-- Submit -->
      <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

      <!-- Register link -->
      <div class="text-center">
        <p>Not a member? <a href="{{ route('register') }}">Register</a></p>
      </div>
    </form>
  </div>
</div>
@endsection
