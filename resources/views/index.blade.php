@extends('layouts.master')

@section('title', 'Index')

@section('content')
    <h2 class="fw-bold display-6">Products</h2> <br>
    @auth
        @if(auth()->user()->role === 'admin')
            <div class="d-flex justify-content-end gap-2 mb-5">
                
                <a href="/create" class="btn btn-primary">
                    + Add Product
                </a>
                <a href="/categories" class="btn btn-primary">
                    Manage Categories
                </a>
            </div>
        @endif
    @endauth
    
    @php
        $cart = session('cart', []);
    @endphp

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="row g-4">
        @forelse ($products as $product)
            <div class="col-md-4 col-lg-3">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-semibold">
                            {{ $product->name }} 
                        </h5>

                        <h6 class="text-success fw-bold mb-1">
                            ${{ number_format($product->price, 2) }}
                        </h6>

                        <small class="text-muted">
                            Stock: {{ $product->stock }}
                        </small> <br>

                        <div class="d-flex gap-2 mt-auto">
                            <a href="/view/{{ $product->id }}"
                               class="btn btn-sm btn-outline-primary w-100">
                                View
                            </a>

                            @auth
                                @if(auth()->user()->role === 'user')
                                    <form action="/cart/{{ $product->id }}" method="POST" class="w-100">
                                        @csrf
                                        <button class="btn btn-sm btn-outline-warning w-100">
                                            Add to Cart 
                                            @if(isset($cart[$product->id]))
                                                (x{{ $cart[$product->id]['quantity'] }})
                                            @endif
                                        </button>
                                    </form>
                                @endif
                            @endauth

                            @auth
                                @if(auth()->user()->role === 'admin')
                                    <a href="/product/edit/{{ $product->id }}"
                                    class="btn btn-sm btn-outline-secondary w-100">
                                        Edit
                                    </a>
                                @endif
                            @endauth
                        </div>
                        @auth
                            @if(auth()->user()->role === 'admin')
                                <form action="/product/delete/{{ $product->id }}"
                                    method="POST"
                                    class="mt-2"
                                    onsubmit="return confirm('Delete this product?')">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-sm btn-outline-danger w-100">
                                        Delete
                                    </button>
                                </form>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>

            {{-- <img src="{{asset("/storage/images/" . $product->image)}}" alt="{{$product->name}}"> --}}
            
        @empty
            <p class="text-center text-muted">No products found.</p>
        @endforelse
    </div>

    <div class="mt-4 mb-5">
        {{ $products->links() }}
    </div>

@endsection