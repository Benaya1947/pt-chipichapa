@extends('layouts.master')

@section('title', 'Cart')

@section('content')

<div class="row justify-content-center py-5">
    <div class="col-lg-10">

        <h2 class="fw-bold mb-4">🛒 Your Cart</h2>

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @php $total = 0; @endphp

        @if(count($cart) > 0)

            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body p-4">

                    {{-- 🔥 LIST ITEM --}}
                    @foreach($cart as $id => $item)
                        @php 
                            $subtotal = $item['price'] * $item['quantity']; 
                            $total += $subtotal;
                        @endphp

                        <div class="d-flex justify-content-between align-items-center border-bottom py-3">

                            <div>
                                <h6 class="mb-1 fw-semibold">{{ $item['name'] }}</h6>
                                <small class="text-muted">
                                    Qty: {{ $item['quantity'] }}
                                </small>
                            </div>

                            <div class="text-end">
                                <div class="text-muted small">
                                    Rp {{ number_format($item['price'], 0, ',', '.') }}
                                </div>
                                <div class="fw-bold text-success">
                                    Rp {{ number_format($subtotal, 0, ',', '.') }}
                                </div>
                            </div>

                        </div>
                    @endforeach

                    {{-- 🔥 TOTAL --}}
                    <div class="d-flex justify-content-between mt-4">
                        <h5>Total</h5>
                        <h5 class="text-success fw-bold">
                            Rp {{ number_format($total, 0, ',', '.') }}
                        </h5>
                    </div>

                </div>
            </div>

            {{-- 🔥 CHECKOUT --}}
            <div class="card mt-4 shadow-sm border-0 rounded-4">
                <div class="card-body p-4">

                    <h5 class="fw-bold mb-3">Checkout</h5>

                    <form action="/checkout" method="POST">
                        @csrf

                        <input type="text" name="address" 
                               class="form-control mb-3" 
                               placeholder="Address">

                        <input type="text" name="postal_code" 
                               class="form-control mb-3" 
                               placeholder="Postal Code">

                        <button class="btn btn-success w-100">
                            Checkout Now
                        </button>
                    </form>

                </div>
            </div>

        @else

            {{-- 🔥 EMPTY STATE --}}
            <div class="text-center py-5">
                <h5 class="text-muted">Cart kamu kosong</h5>
                <a href="/" class="btn btn-primary mt-3">
                    Belanja sekarang
                </a>
            </div>

        @endif

        {{-- 🔥 BACK --}}
        <div class="mt-4">
            <a href="/" class="btn btn-outline-secondary">
                Back to Shop
            </a>
        </div>

    </div>
</div>

@endsection