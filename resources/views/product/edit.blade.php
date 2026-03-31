@extends('layouts.master')

@section('title', 'Edit Product')

@section('content')
<div class="container">
    <div class="row justify-content-center py-5">
        <div class="col-md-6">
            <div class="card shadow-sm border-0 mb-5">
                <div class="card-body">

                    <h4 class="fw-bold mb-4 text-center display-6">
                        Edit Product
                    </h4>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="/product/update/{{ $product->id }}" 
                          method="POST" 
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- CATEGORY --}}
                        <div class="mb-4">
                            <label class="form-label">Category</label>
                            <select name="category_id" class="form-select">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->category }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- NAME --}}
                        <div class="mb-4">
                            <label class="form-label">Product Name</label>
                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   value="{{ old('name', $product->name) }}">
                        </div>

                        {{-- PRICE --}}
                        <div class="mb-4">
                            <label class="form-label">Price</label>
                            <input type="number"
                                   name="price"
                                   class="form-control"
                                   value="{{ old('price', $product->price) }}">
                        </div>

                        {{-- STOCK --}}
                        <div class="mb-4">
                            <label class="form-label">Stock</label>
                            <input type="number"
                                   name="stock"
                                   class="form-control"
                                   value="{{ old('stock', $product->stock) }}">
                        </div>

                        {{-- IMAGE --}}
                        <div class="mb-5">
                            <label class="form-label">Image</label>
                            <input type="file" name="image" class="form-control">

                            {{-- 🔥 PREVIEW IMAGE --}}
                            <div class="mt-3 text-center pt-3">
                                <img src="{{ asset('storage/images/'.$product->image) }}"
                                     class="img-fluid rounded d-block mx-auto rounded"
                                     style="max-height: 250px; object-fit: cover;">
                            </div>
                        </div>

                        {{-- BUTTON --}}
                        <div class="d-flex justify-content-between">
                            <a href="/" class="btn btn-outline-secondary">
                                Back
                            </a>

                            <button class="btn btn-success">
                                Update Product
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection