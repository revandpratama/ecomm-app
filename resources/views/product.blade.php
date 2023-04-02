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

                    <span style="bottom:0; position: absolute; right:0;">
                        <form action="/product" method="POST">
                            @csrf
                            <input type="text" name="quantity" style="width:2rem;" value="1">
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <button type="submit" class="badge bg-primary border-0">Add to cart</button>
                        </form>
                        <hr class="hr w-100">
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Added to cart</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <span>{{ $product->name }}</span> <br>
                    <span>Qty: {{ session('success') }}</span>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
@endsection


@section('script')

    @if (session()->has('success'))
        <script>
        $(document).ready(function() {
            $("#myModal").modal('show');
        });
    </script>
    @endif
    
@endsection
