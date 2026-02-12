<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index() {
        $products = session('products', []);
        return view('products.index', compact('products'));
    }

    public function store (Request $request) {
    $product = [
        'id'    => time(),
        'name'  => $request->name,
        'price' => $request->price,
    ];

    session()->push('products', $product);

    return redirect()->route('products.index')->with('success', 'Product |"' . $product['name'] . '" added successfully!');
    }

    public function delete($id) {
        $products = session('products', []);
        $products = array_values(array_filter($products, fn($p) => $p['id'] != $id));
        session(['products' => $products]);

    return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
}
}
