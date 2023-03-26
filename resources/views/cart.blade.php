
@extends('partials.authmain')

@section('container')
    <div class="container">
        <div class="row d-flex justify-content-center align-item-center">
            <div class="col-lg-10">
                <table class="table align-middle text-center">
                    <tr>
                        <td style="width:25em">image</td>
                        <td style="width:40em">name</td>
                        <td style="width:25em">qty</td>
                        <td style="width:25em">price</td>
                        <td style="width:10em">action</td>
                    </tr>
                    @php
                        $total = 0;
                    @endphp
                    @foreach ($cart_items as $item)
                        <tr class="">
                            <td style="width:20em"><img class="img-fluid" src="https://source.unsplash.com/400x400" alt="..."></td>
                            <td style="width:40em">{{ $item->product->name }}</td>
                            <td style="width:25em">{{ $item->quantity }}</td>
                            <td style="width:25em">$ {{ $item->product->price*$item->quantity }}</td>
                            <td style="width:25em">
                                <button type="submit" class="btn btn-warning btn-sm">Delete</button>
                            </td>
                        </tr>
                        @php
                            $total+=$item->product->price*$item->quantity;
                        @endphp
                    @endforeach

                    <tfoot>
                        <td></td>
                        <td></td>
                        <td>Sub Total</td>
                        <td>$ {{ $total }}</td>
                    </tfoot>
                    
                </table>

                <button class="btn btn-primary mb-5">Pay</button>
            </div>
        </div>
    </div>

@endsection