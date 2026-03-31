<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View {
        $products = Product::Paginate(12);
        return view("index", compact("products"));
    }

    public function view($id): View {
        $product = Product::findOrFail($id);
        $categories = ProductCategory::all();

        return view("product.view", compact("product", "categories"));
    }

    public function create(){
        $categories = ProductCategory::all();
        return view('product.create', compact('categories'));
    }

    public function store(Request $request): RedirectResponse{
        $validated = $request->validate([
            "category_id" => "required|exists:product_categories,id",
            "name" => "required|string|min:5|max:80",
            "price" => "required|numeric",
            "stock" => "required|numeric",
            "image" => "required|mimes:png,jpg,jpeg,gif",
        ]);

        if($request->hasFile("image")){
            $now = now()->format("Y-m-d_H.i.s");
            $filname = $now . "." . $request->file("image")->getClientOriginalName();
            $request->file("image")->storeAs("images", $filname, "public");
            $validated["image"] = $filname;
        }

        $product = Product::create($validated);
        return redirect('/');
    }

    public function edit($id){
        $product = Product::findOrFail($id);
        $categories = ProductCategory::all();

        return view('product.edit', compact('product', 'categories'));
    }

    public function update($id, Request $request){
        $newItem = $request->validate([
            "category_id" => "required|exists:product_categories,id",
            "name" => "required|string|min:5|max:80",
            "price" => "required|numeric",
            "stock" => "required|numeric",
            "image" => "nullable|mimes:png,jpg,jpeg,gif",
        ]);

        if ($request->hasFile('image')) {
            $filename = now()->format("Y-m-d_H.i.s") . "." . $request->file("image")->getClientOriginalName();
            $request->file("image")->storeAs("images", $filename, "public");
            $newItem["image"] = $filename;
        }

        $oldItem = Product::findOrFail($id);
        $oldItem->update($newItem);

        return redirect('/')->with('success', 'Item Updated Successfully');
    }

    public function destroy($id){
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect('/');
    }
}
