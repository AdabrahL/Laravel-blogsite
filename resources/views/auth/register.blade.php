@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
  <div class="card shadow-lg p-4" style="max-width: 500px; width: 100%;">
    <h3 class="text-center mb-4">Register</h3>

    <form method="POST" action="{{ route('register') }}">
      @csrf

      <!-- Social buttons -->
      <div class="text-center mb-3">
        <p>Sign up with:</p>
        <button type="button" class="btn btn-link btn-floating mx-1"><i class="fab fa-facebook-f"></i></button>
        <button type="button" class="btn btn-link btn-floating mx-1"><i class="fab fa-google"></i></button>
        <button type="button" class="btn btn-link btn-floating mx-1"><i class="fab fa-twitter"></i></button>
        <button type="button" class="btn btn-link btn-floating mx-1"><i class="fab fa-github"></i></button>
      </div>

      <p class="text-center">or:</p>

      <!-- Name -->
      <div class="form-outline mb-4">
        <input type="text" id="registerName" name="name" class="form-control" required />
        <label class="form-label" for="registerName">Name</label>
      </div>

      <!-- Username -->
      <div class="form-outline mb-4">
        <input type="text" id="registerUsername" name="username" class="form-control" required />
        <label class="form-label" for="registerUsername">Username</label>
      </div>

      <!-- Email -->
      <div class="form-outline mb-4">
        <input type="email" id="registerEmail" name="email" class="form-control" required />
        <label class="form-label" for="registerEmail">Email</label>
      </div>

      <!-- Password -->
      <div class="form-outline mb-4">
        <input type="password" id="registerPassword" name="password" class="form-control" required />
        <label class="form-label" for="registerPassword">Password</label>
      </div>

      <!-- Confirm password -->
      <div class="form-outline mb-4">
        <input type="password" id="registerRepeatPassword" name="password_confirmation" class="form-control" required />
        <label class="form-label" for="registerRepeatPassword">Repeat password</label>
      </div>

      <!-- Terms -->
      <div class="form-check d-flex justify-content-center mb-4">
        <input class="form-check-input me-2" type="checkbox" required id="registerCheck" />
        <label class="form-check-label" for="registerCheck"> I have read and agree to the terms </label>
      </div>

      <!-- Submit -->
      <button type="submit" class="btn btn-primary btn-block mb-3">Sign up</button>

      <!-- Login link -->
      <div class="text-center">
        <p>Already a member? <a href="{{ route('login') }}">Login</a></p>
      </div>
    </form>
  </div>
</div>
@endsection
