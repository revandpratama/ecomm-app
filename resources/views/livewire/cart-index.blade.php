<div class="mb-5">
    <table class="table align-middle text-center bg-body-tertiary">
        @php
            $total = 0;
        @endphp
        @foreach ($items as $item)
            <tr class="tablerow">
                <td style="width:20rem"><img class="img-fluid" src="https://source.unsplash.com/400x400?clothes"
                        alt="..."></td>
                <td>{{ $item->product->name }}</td>
                <td>{{ $item->quantity }}
                    <div class="d-flex justify-content-center flex-wrap">
                        <button wire:click="increment({{ $item->id }})" class="btn btn-primary btn-sm mx-1"
                            style="width: 2rem">+</button>
                        <button wire:click="decrement({{ $item->id }})" class="btn btn-primary btn-sm mx-1"
                            style="width: 2rem">-</button>
                    </div>
                </td>
                <td>
                    @php
                        $subTotal = $item->quantity * $item->product->price;
                        $total += $subTotal;
                    @endphp
                    $ {{ $subTotal }}
                </td>
                <td>
                    <button wire:click="delete({{ $item->id }})" onclick="return confirm('Remove item from cart?')"
                        class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></button>
                </td>
            </tr>
        @endforeach
        <tr>
            <td colspan="3">Total</td>
            <td>$ {{ $total }}</td>
            <td></td>
        </tr>
    </table>

    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Pay</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <label for="payment" class="form-label">Payment Method</label>
                    <form action="/invoice" method="POST" id="payForm">
                        @csrf
                        
                        <select name="payment_method" id="" class="form-control">
                            <option value="Paypal">Paypal</option>
                            <option value="Debit">Debit</option>
                            <option value="Credit Card">Credit Card</option>
                        </select>
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        <input type="hidden" name="product_name" value="{{  }}">
                        <input type="hidden" name="total" value="{{ $total }}">
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button> --}}
                    <span>Total: $ {{ $total }}</span>
                    <button form="payForm" class="btn btn-primary ms-auto">Pay</button>
                </div>

            </div>
        </div>
    </div>
</div>
