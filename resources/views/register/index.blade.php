@extends('partials.authmain')

@section('container')
<main class="form-signin w-100 m-auto">
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
      <form action="/register" method="POST">
      @csrf
        <h1 class="h3 mb-3 fw-normal">Register</h1>
    
        <div class="form-floating"> 
            <input type="text" name="name" class="form-control @error('name') is-invalid  @enderror" id="floatingInput" placeholder="name@example.com" autofocus required>
            <label for="floatingInput">Name</label>
          </div>
          @error('name')
              <span class="text-danger">{{ $message }}</span>
                
              
          @enderror
          <div class="form-floating"> 
            <input type="text" name="username" class="form-control @error('username') is-invalid  @enderror" id="floatingInput" placeholder="name@example.com" required>
            <label for="floatingInput">Username</label>
          </div>
          @error('username')
          <span class="text-danger">{{ $message }}</span>
          @enderror
          <div class="form-floating"> 
            <input type="email" name="email" class="form-control @error('email') is-invalid  @enderror" id="floatingInput" placeholder="name@example.com" required>
            <label for="floatingInput">Email address</label>
          </div>
          @error('email')      
          <span class="text-danger">{{ $message }}</span>
          @enderror
          <div class="form-floating">
            <input type="password" name="password"class="form-control @error('password') is-invalid  @enderror" id="floatingPassword" placeholder="Password" required>
            <label for="floatingPassword">Password</label>
          </div>
          @error('password')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
        <small>Already Registered? <a href="/register" class="text-decoration-none">Login</a></small>
        <p class="mt-5 mb-3 text-muted">&copy; 2023</p>
      </form>
    </main>
@endsection