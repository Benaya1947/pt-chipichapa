<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- 🔥 WAJIB buat Breeze -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    {{-- 🔥 NAVBAR --}}
    @include('layouts.navigation')

    <div class="container mt-4">

        {{-- 🔥 ALERT --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        {{-- 🔥 CART (lebih rapi) --}}
        @auth
            @if(auth()->user()->role === 'user')
                @php
                    $cart = session('cart', []);
                    $totalQty = array_sum(array_column($cart, 'quantity'));
                @endphp

                <div class="d-flex justify-content-end mb-3">
                    <a href="/invoice" class="btn btn-warning">
                        🛒 Cart ({{ $totalQty }})
                    </a>
                </div>
            @endif
        @endauth

        {{-- 🔥 CONTENT --}}
        @yield("content")

    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>