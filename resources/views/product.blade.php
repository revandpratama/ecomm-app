@extends('partials.main')

@section('container')
    <div class="row d-flex justify-content-center my-3">
        <div class="col-lg-8">
            <h2>{{ $product->name }}</h2>
            <hr class="hr">

            <div class="row" style="min-height: ">
                <div class="col-4">
    
                    <img class="img-fluid" src="https://source.unsplash.com/400x400" alt="{{ $product->name }}">
    
                </div>
    
                <div class="col-8 position-relative">
                    <p>{{ $product->description }}</p>

                    <span style="bottom:0; position: absolute;">
                    <hr class="hr w-100">
                        <form action="/product" method="POST">
                            @csrf
                            <input type="text" style="width:2rem;" value="1">
                            <button type="submit" class="badge bg-primary border-0">Add to cart</button>
                        </form>
                    </span>
                </div>

            </div>
            







        </div>
    </div>
@endsection


@section('script')
@endsection
