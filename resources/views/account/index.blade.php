@extends('partials.main')



@section('container')
    <div class="row d-flex justify-content-center my-5">
        <div class="col-md-5">
            <main class="form-signin w-100 m-auto">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form action="/account/{{ $user->username }}" method="POST">
                    @csrf
                    @method('put')
                    <h1 class="h3 mb-3 fw-normal">Account</h1>

                    <div class="form-floating my-4">
                        <input type="text" name="name" class="form-control @error('name') is-invalid  @enderror"
                            id="floatingInput" placeholder="name@example.com" autofocus required
                            value="{{ $user->name }}">
                        <label for="floatingInput">Name</label>
                    </div>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-floating my-4">
                        <input type="text" name="username" class="form-control @error('username') is-invalid  @enderror"
                            id="floatingInput" placeholder="name@example.com" required value="{{ $user->username }}">
                        <label for="floatingInput">Username</label>
                    </div>
                    @error('username')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-floating my-4">
                        <input type="email" name="email" class="form-control @error('email') is-invalid  @enderror"
                            id="floatingInput" placeholder="name@example.com" required value="{{ $user->email }}">
                        <label for="floatingInput">Email address</label>
                    </div>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Update</button>
                </form>
            </main>
        </div>
    </div>
@endsection
