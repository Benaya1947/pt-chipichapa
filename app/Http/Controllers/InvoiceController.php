<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Mail\InvoiceMail;
use Illuminate\Support\Facades\Mail;

class InvoiceController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);

        return view('invoice.index', compact('cart'));
    }

    public function addToCart($id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if(isset($cart[$id])){
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "price" => $product->price,
                "quantity" => 1
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back();
    }

    public function store(Request $request)
    {
        $cart = session('cart');

        if(!$cart || count($cart) == 0){
            return redirect('/')->with('error', 'Cart is empty');
        }

        $request->validate([
            'address' => 'required|min:10|max:100',
            'postal_code' => 'required|digits:5'
        ]);

        $cart = session('cart');

        $total = 0;

        foreach($cart as $id => $item){
            $product = Product::findOrFail($id);

            $price = $product->price; // ambil dari DB

            $total += $price * $item['quantity'];
        }

        $invoice = Invoice::create([
            'invoice_number' => 'INV-' . time(),
            'user_id' => Auth::id(),
            'address' => $request->address,
            'postal_code' => $request->postal_code,
            'total_price' => $total
        ]);

        foreach($cart as $id => $item){
            $product = Product::findOrFail($id);

            $price = $product->price;

            InvoiceItem::create([
                'invoice_id' => $invoice->id,
                'product_id' => $id,
                'quantity' => $item['quantity'],
                'price' => $price,
                'subtotal' => $price * $item['quantity']
            ]);

            // 🔥 TAMBAH INI
            $product->stock -= $item['quantity'];
            $product->save();
        }

        foreach($cart as $id => $item){
            $product = Product::findOrFail($id);

            if($product->stock < $item['quantity']){
                return redirect()->back()->with('error', 'Stock tidak cukup untuk ' . $product->name);
            }
        }

        Mail::to(Auth::user()->email)->send(new InvoiceMail($invoice));
        
        session()->forget('cart');

        return redirect('/invoice/' . $invoice->id);
    }

    public function show($id)
    {
        $invoice = Invoice::with('items.product.category', 'user')
            ->where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        return view('invoice.show', compact('invoice'));
    }

    public function download($id)
    {
        $invoice = Invoice::with('items.product.category', 'user')->findOrFail($id);

        $pdf = Pdf::loadView('invoice.pdf', compact('invoice'));

        return $pdf->download('invoice-'.$invoice->invoice_number.'.pdf');
    }
}
