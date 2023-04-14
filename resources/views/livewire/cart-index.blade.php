<div class="mb-5">
    <table class="table align-middle text-center bg-body-tertiary">
        @php
            $total = 0;
        @endphp
        @foreach ($items as $item)
            <tr class="tablerow">
                <td style="width:20em"><img class="img-fluid" src="https://source.unsplash.com/400x400"
                    alt="..."></td>
                <td>{{ $item->product->name }}</td>
                <td>{{ $item->quantity }}
                    <div class="d-flex justify-content-center flex-wrap">
                        <button wire:click="increment({{ $item->id }})" class="btn btn-primary btn-sm mx-1" style="width: 2rem">+</button>
                        <button wire:click="decrement({{ $item->id }})" class="btn btn-primary btn-sm mx-1" style="width: 2rem">-</button>
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
                    <button wire:click="delete({{ $item->id }})" onclick="return confirm('Remove item from cart?')" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></button>
                </td>
            </tr>
        @endforeach
            <tr>
                <td colspan="3">Total</td>
                <td>$ {{ $total }}</td>
                <td></td>
            </tr>
    </table>
</div>
