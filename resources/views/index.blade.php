@extends('partials.main')

@section('carousel')
    <div class="d-flex justify-content-center align-item-center w-100">
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" style="max-width: 100%">
                    <img class="img-fluid" src="https://source.unsplash.com/1500x500?yellow" class="d-block w-100"
                        alt="...">
                </div>
                <div class="carousel-item">
                    <img class="img-fluid" src="https://source.unsplash.com/1500x500?yellow+shirt" class="d-block w-100"
                        alt="...">
                </div>
                <div class="carousel-item">
                    <img class="img-fluid" src="https://source.unsplash.com/1500x500?pillow" class="d-block w-100"
                        alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
@endsection

@section('container')
    <h2 class="mt-5 text-center">New Arrival</h2>
    <hr class="hr" />
    <div class="container mt-4 d-flex mx-auto justify-content-evenly flex-wrap">
        @foreach ($products as $product)
            <div class="card mx-5 mb-4" style="width: 18rem;">
                <a href="/product/{{ $product->slug }}" class="text-decoration-none">
                    <img class="img-fluid card-img-top" src="https://source.unsplash.com/500x400?streetwear" alt="...">
                    <div class="card-body text-dark">
                        <span>{{ $product->name }}</span>
                    </div>
                </a>
            </div>
        @endforeach




    </div>
    </div>
@endsection
