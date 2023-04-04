
@extends('partials.main')

@section('container')

    <h2 class="mt-5 text-center">New Arrival</h2>
    <hr class="hr" />
    <div class="container mt-4 d-flex mx-auto justify-content-evenly flex-wrap">
        @foreach ($products as $product)
        <div class="card mx-5 mb-4" style="width: 18rem;">
            <a href="/product/{{ $product->slug }}" class="text-decoration-none">
                <img class="img-fluid card-img-top" src="https://source.unsplash.com/500x400" alt="...">
                <div class="card-body text-dark">
                    <span>{{ $product->name }}</span>
                </div>
            </a>
        </div>
        @endforeach

        

            
        </div>
    </div>
@endsection