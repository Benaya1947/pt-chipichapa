@extends('layouts.master')

@section('title', 'Invoice')

@section('content')

<div class="d-flex justify-content-center mt-5 mb-5">
    <div class="card shadow p-4" style="width: 500px;">

        <h4 class="text-center mb-3">INVOICE</h4>

        <hr>

        <p class="mt-3"><strong>Invoice:</strong> {{ $invoice->invoice_number }}</p>
        <p class="mt-3"><strong>Customer:</strong> {{ $invoice->user->name }}</p>
        <p class="mt-3"><strong>Address:</strong> {{ $invoice->address }}</p>
        <p class="mt-3 mb-3"><strong>Postal Code:</strong> {{ $invoice->postal_code }}</p>

        <hr>

        <table class="table table-borderless">
            <thead>
                <tr>
                    <th>Item</th>
                    <th class="text-center">Qty</th>
                    <th class="text-end">Price</th>
                    <th class="text-end">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($invoice->items as $item)
                    <tr>
                        <td>
                            {{ $item->product->name }} <br>
                            <small class="text-muted">
                                {{ $item->product->category->category }}
                            </small>
                        </td>
                        <td class="text-center">{{ $item->quantity }}</td>
                        <td class="text-end">{{ number_format($item->price) }}</td>
                        <td class="text-end">{{ number_format($item->subtotal) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <hr><br>

        <div class="d-flex justify-content-between">
            <h5>Total</h5>
            <h5 class="text-success">
                Rp {{ number_format($invoice->total_price) }}
            </h5>
        </div>

        <br><hr><br>

        <p class="text-center text-muted mb-0">
            Terima kasih sudah berbelanja 🙏
        </p>

    </div>
    
</div>

<div class="d-flex justify-content-between align-items-center mb-3">
    <a href="/" class="btn btn-outline-secondary btn-sm">
        Back
    </a>
</div>
@endsection