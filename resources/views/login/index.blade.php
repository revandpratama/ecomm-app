@extends('partials.authmain')

@section('container')
<main class="form-signin w-100 m-auto">
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if (session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
      <form action="/login" method="POST">
      @csrf
        <h1 class="h3 mb-3 fw-normal">Login</h1>
    
        <div class="form-floating"> 
          <input type="email" name="email" class="form-control @error('email') is-invalid  @enderror" id="floatingInput" placeholder="name@example.com" autofocus required>
          <label for="floatingInput">Email address</label>
        </div>
        @error('email')
            <div class="invalid-response">
              {{ $message }}
            </div>
        @enderror
        <div class="form-floating">
          <input type="password" name="password"class="form-control @error('password') is-invalid  @enderror" id="floatingPassword" placeholder="Password" autofocus required>
          <label for="floatingPassword">Password</label>
        </div>
        @error('password')
            <div class="invalid-response">
              {{ $message }}
            </div>
        @enderror
    
        <div class="checkbox mb-3">
          {{-- <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label> --}}
        </div>
        
        <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
        <small>Not Registered yet? <a href="/register" class="text-decoration-none">Register</a></small>
        <p class="mt-5 mb-3 text-muted">&copy; 2023</p>
      </form>
    </main>
@endsection