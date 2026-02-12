<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// GET /products – list all products + show add form
Route::get('/products', function () {
    $products = session('products', []);
    return view('products.index', compact('products'));
})->name('products.index');

// POST /products – store a new product
Route::post('/products', function (Request $request) {
    $product = [
        'id'    => time(),
        'name'  => $request->name,
        'price' => $request->price,
    ];

    session()->push('products', $product);

    return redirect()->route('products.index')->with('success', 'Product "' . $product['name'] . '" added successfully!');
})->name('products.store');

// DELETE /products/{id} – remove a product
Route::delete('/products/{id}', function ($id) {
    $products = session('products', []);
    $products = array_values(array_filter($products, fn($p) => $p['id'] != $id));
    session(['products' => $products]);

    return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
})->name('products.destroy');

// GET /contact – show contact form
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// POST /contact – handle contact form submission
Route::post('/contact', function (Request $request) {
    $request->validate([
        'email'   => 'required|email',
        'message' => 'required|min:10',
    ]);

    return redirect()->route('contact')->with('success', 'Message sent successfully!');
})->name('contact.send');
