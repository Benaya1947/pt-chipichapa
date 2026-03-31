@extends('layouts.master')
 
@section('title', 'Update Page')
 
@section('content')


    <div class="row justify-content-center mt-5 pt-5">
        <div class="col-lg-6">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body">
                    <h1 class="fw-bold text-center display-6 mb-5">Edit Category</h1>

                    <form action="/categories/edit/{{ $category->id }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="category" class="form-label mb-4">Category Name</label>
                            <input type="text" name="category" class="form-control" value="{{ $category->category }}">
                        </div>
            
                        <div class="d-flex justify-content-between pt-5">
                            <a href="/categories" class="btn btn-outline-secondary px-4">Back</a>

                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
 