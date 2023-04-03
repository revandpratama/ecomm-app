@extends('partials.authmain')

@section('container')
    <div class="container">
        <div class="row d-flex justify-content-center align-item-center">
            <div class="col-lg-10">
                <table class="table align-middle text-center bg-body-tertiary">

                    @php
                        $total = 0;
                    @endphp
                    @foreach ($cart_items as $item)
                        <tr class="tablerow">
                            <td style="width:20em"><img class="img-fluid" src="https://source.unsplash.com/400x400"
                                    alt="..."></td>
                            <td style="width:40em">{{ $item->product->name }}</td>
                            <td style="width:10em">
                                {{-- <form action="/cart" method="post" enctype="multipart/form-data" id="addSubForm">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" name="add" class="badge bg-primary border-0 btn-add"
                                        value="add1">+</button>
                                    <input type="text" name="qty" id="" disabled
                                        value="{{ $item->quantity }}" style="max-width:1em">
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <button type="submit" name="subtract" class="badge bg-primary border-0 btn-sub"
                                        value="sub1">-</button>
                                </form> --}}
                                <div class="d-flex justify-content-center">
                                    <button class="inc badge bg-primary border-0 p-2">+</button>
                                    <input type="text" class="qty-input mx-2" value="{{ $item->quantity }}" style="width:2rem">
                                    <input type="hidden" name="productId" class="productId" value="{{ $item->id }}">
                                    <input type="hidden" name="price" class="price" value="{{ $item->product->price * $item->quantity }}">
                                    <button class="dec badge bg-primary border-0 p-2">-</button>
                                    <span class="ms-4 me-2">$ </span><input type="text" name="" class="price bg-light border-0" value="{{ $item->product->price * $item->quantity }}" style="width:3rem;height:1.5rem" disabled>

                                </div>

                            </td>
                            <td style="width:5em"></td>
                            <td style="width:5em">
                                <input type="hidden" name="productId" class="productId" value="{{ $item->id }}">
                                <button type="submit" class="btn btn-warning btn-sm btn-delete" onclick="return confirm('Delete this from cart?')"><i class="bi bi-trash-fill"></i></button>
                            </td>
                        </tr>
                        @php
                            $total += $item->product->price * $item->quantity;
                        @endphp
                    @endforeach

                    <tfoot>
                        <td></td>
                        <td></td>
                        <td>Sub Total</td>
                        <td class="total">$ {{ $total }}</td>
                    </tfoot>

                </table>

                <button class="btn btn-primary mb-5">Pay</button>
            </div>
        </div>
    </div>
@endsection

@section('script')
    {{-- <script>
        var subTotal = 0;
        $(document).ready(function() {

            $('.inc').click(function(e) {
                e.preventDefault();
                var productId = $(this).siblings('.productId').val();
                var status = "inc";
                var price = $(this).siblings('.price');
                var priceValue = parseInt(price.val());
                var $qtyInput = $(this).siblings('.qty-input');
                var inc_value = $qtyInput.val();
                var value = parseInt(inc_value, 10);
                value = isNaN(value) ? 0 : value;


                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "PUT",
                    url: "{{ route('cart') }}",
                    data: {
                        status: status,
                        id: productId,
                    },
                    success: function(data) {
                        priceValue = priceValue / value;
                        $qtyInput.val(value + 1); // increment the quantity value
                        price.val(priceValue * (value + 1));
                        // subTotal += priceValue * (value - 1);
                        // $('.total').text('$ ' + subTotal);
                    }
                });
            });



            $('.dec').click(function(e) {
                e.preventDefault();


                var productId = $(this).siblings('.productId').val();
                var status = "dec";
                var price = $(this).siblings('.price');
                var priceValue = price.val();
                var $qtyInput = $(this).siblings('.qty-input');
                var dec_value = $qtyInput.val();
                var value = parseInt(dec_value, 10);
                value = isNaN(value) ? 0 : value;

                if (value > 1) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: "PUT",
                        url: "{{ route('cart') }}",
                        data: {
                            status: status,
                            id: productId,
                        },
                        success: function(data) {
                            priceValue = priceValue / value;
                            $qtyInput.val(value - 1);
                            price.val(priceValue * (value - 1));
                        }
                    });
                }


            });


            $('.btn-delete').click(function(e) {
                e.preventDefault();
                $(this).closest('tr').remove();

                const productId = $(this).siblings('.productId').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "delete",
                    url: "{{ route('cart') }}",
                    data: {
                        id: productId
                    },
                    success: function(response) {


                    }
                });
            });
        });
    </script> --}}

    <script>
        $(document).ready(function() {
            var subTotal = {{ $total }}; // initialize the subtotal with the total value

            $('.inc').click(function(e) {
                e.preventDefault();
                var productId = $(this).siblings('.productId').val();
                var status = "inc";
                var price = $(this).siblings('.price');
                var priceValue = parseInt(price.val());
                var $qtyInput = $(this).siblings('.qty-input');
                var inc_value = $qtyInput.val();
                var value = parseInt(inc_value, 10);
                value = isNaN(value) ? 0 : value;

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "PUT",
                    url: "{{ route('cart') }}",
                    data: {
                        status: status,
                        id: productId,
                    },
                    success: function(data) {
                        priceValue = priceValue / value;
                        $qtyInput.val(value + 1); // increment the quantity value
                        price.val(priceValue * (value + 1));
                        subTotal += priceValue; // add the new item price to the subtotal
                        $('.total').text('$ ' + subTotal); // update the subtotal value in the UI
                    }
                });
            });

            $('.dec').click(function(e) {
                e.preventDefault();
                var productId = $(this).siblings('.productId').val();
                var status = "dec";
                var price = $(this).siblings('.price');
                var priceValue = price.val();
                var $qtyInput = $(this).siblings('.qty-input');
                var dec_value = $qtyInput.val();
                var value = parseInt(dec_value, 10);
                value = isNaN(value) ? 0 : value;

                if (value > 1) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: "PUT",
                        url: "{{ route('cart') }}",
                        data: {
                            status: status,
                            id: productId,
                        },
                        success: function(data) {
                            priceValue = priceValue / value;
                            $qtyInput.val(value - 1); // decrement the quantity value
                            price.val(priceValue * (value - 1));
                            subTotal -= priceValue; // subtract the item price from the subtotal
                            $('.total').text('$ ' + subTotal); // update the subtotal value in the UI
                        }
                    });
                }
            });

            $('.btn-delete').click(function(e) {
                e.preventDefault();
                $(this).closest('tr').remove();

                const productId = $(this).siblings('.productId').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "delete",
                    url: "{{ route('cart') }}",
                    data: {
                        id: productId
                    },
                    success: function(response) {


                    }
                });
            });
        });
    </script>


    {{-- <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#inc').click(function(e) {
                e.preventDefault();

                

                var inc_value = $('.qty-input').val();
                var value = parseInt(inc_value, 10);
                value = isNaN(value) ? 0 : value;
                if (value < 10) {
                    value++
                    $('.qty-input').val(value);
                }
            });
            $.ajax({
                    type: "PUT",
                    url: "{{ route('cart') }}",
                    data: {
                        quantity: value
                    },
                    success: function(response) {
                        alert('inc1')
                    }
                });
            $('#dec').click(function(e) {
                e.preventDefault();

                var dec_value = $('.qty-input').val();
                var value = parseInt(dec_value, 10);
                value = isNaN(value) ? 0 : value;
                if (value > 1) {
                    value--
                    $('.qty-input').val(value);

                }
                $.ajax({
                    type: "PUT",
                    url: "{{ route('cart') }}",
                    data: {
                        quantity: value
                    },
                    success: function(response) {
                        alert('dec1')
                    }
                });
            });

        });
    </script> --}}

    {{-- <script>
        $(document).ready(function () {

            var qty = $('.qty-input').val();

            $('.increment').click(function (e) { 
                e.preventDefault();
                $.ajax({
                    type: "put",
                    url: "/cart",
                    data: {quantity:quantity},
                    success: function (response) {
                        
                    }
                });

            });
        });
    </script> --}}
@endsection
