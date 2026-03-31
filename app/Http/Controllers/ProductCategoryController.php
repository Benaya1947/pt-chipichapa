<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function create() {
        $categories = ProductCategory::Paginate(5);
        return view('categories.create', compact('categories'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'category' => 'required|string|max:50'
        ]);

        ProductCategory::create($validated);

        return redirect('/categories')->with('success', 'Category created');
    }

    public function edit($id) {
        $category = ProductCategory::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'category' => 'required|string|max:50'
        ]);

        $category = ProductCategory::findOrFail($id);
        $category->update($validated);

        return redirect('/categories')->with('success', 'Category updated');
    }

    public function destroy($id) {
        $category = ProductCategory::findOrFail($id);
        $category->delete();

        return redirect('/categories')->with('success', 'Category deleted');
    }
}