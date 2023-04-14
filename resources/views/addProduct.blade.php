@extends('partials.main')

@section('container')
    <div class="container my-5">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-10">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form action="/add" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="name"
                            placeholder="Product Name" autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Price per Item</label>
                        <input type="number" name="price" id="" class="form-control" min='1'
                            value='1'>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Qty</label>
                        <input type="number" name="quantity" id="" class="form-control" min='1'
                            value='1'>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>


            </div>
        </div>
    </div>
@endsection
