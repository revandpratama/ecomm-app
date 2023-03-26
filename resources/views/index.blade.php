
@extends('partials.main')

@section('container')
    <div class="container mt-4 d-flex mx-auto justify-content-evenly flex-wrap">

        @foreach ($products as $product)
        <a href="" class="text-decoration-none">
            <div class="card mx-5 mb-4" style="width: 18rem;">
                <img class="img-fluid card-img-top" src="https://source.unsplash.com/500x400" alt="...">
                <div class="card-body">
                    <span>{{ $product->name }}</span>
                </div>
            </div>
        </a>
        @endforeach
            
            
        </div>
    </div>
@endsection