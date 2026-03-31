@extends('layouts.master')
 
@section('title', 'Create Page')
 
@section('content')

    <h1 class="fw-bold text-center display-6">List Of Categories</h1>
    
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body">

                    <h5 class="fw-bold mb-3">Add Category</h5>

                    <form action="/categories" method="POST" class="d-flex gap-2">
                        @csrf

                        <input type="text" 
                            name="category" 
                            class="form-control"
                            placeholder="Category name">

                        <button class="btn btn-primary">
                            Save
                        </button>
                    </form>

                </div>
            </div>

            

            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark text-center">
                    <tr>
                    <th scope="col">Categories</th>
                    <th scope="col">Option</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @forelse ($categories as $category)
                    <tr>
                    <th scope="row">{{$category->category}}</th>
                    <td>
                        <div class="d-flex justify-content-center gap-2">

                            <a href="categories/edit/{{ $category->id }}" 
                            class="btn btn-sm btn-outline-primary px-4">
                                Edit
                            </a>

                            <form action="/categories/delete/{{ $category->id }}" 
                                method="POST"
                                onsubmit="return confirm('Delete this category?')">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-sm btn-outline-danger px-4">
                                    Delete
                                </button>
                            </form>

                        </div>
                    </td>
                    </tr>
                    @empty
                        <h1>No Categories</h1>
                    @endforelse
                </tbody>
                
            </table>
            {{ $categories->links() }}

            <div class="d-flex justify-content-between align-items-center mt-4 mb-5">
                <a href="/" class="btn btn-outline-secondary px-4">Back</a>
            </div>
        </div>
    </div>
 
@endsection
 