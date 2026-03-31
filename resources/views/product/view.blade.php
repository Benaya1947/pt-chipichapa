@extends('layouts.master')

@section('title', 'View Page')

@section('content')
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-6">
                <div class="row justify-content-center py-5">
                    <div class="card shadow-sm border-0">
                        <div class="card-body p-5">
                            <h1 class="fw-bold mb-4 text-center display-6">{{$product->name}}</h1>

                            <h6 class="fw-bold">
                                Category : {{$product->products->category}}
                            </h6> <br>

                            <h6 class="text-success fw-bold mb-1">
                                Price : ${{ number_format($product->price, 2) }}
                            </h6> <br>

                            <h6 class="fw-bold">
                                Stock: {{ $product->stock }}
                            </h6> <br>

                            <label class="fw-bold" for="image">Image : </label> <br><br>
                            <div class="mb-4">
                                <img src="{{ asset('storage/images/'.$product->image) }}"
                                    class="img-fluid d-block mx-auto rounded"
                                    style="max-height: 250px; object-fit: cover;">
                            </div>

                            <br>
                            <a href="/" class="btn btn-outline-secondary px-4">
                                Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection