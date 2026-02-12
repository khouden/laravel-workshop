<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\WelcomeController;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'index']);






// GET /products – list all products + show add form
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// POST /products – store a new product
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

// DELETE /products/{id} – remove a product
Route::delete('/products/{id}', [ProductController::class, 'delete'])->name('products.destroy');

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

// GET /articles – list all articles
Route::get('/articles', function () {
    $articles = Article::all();
    return view('articles.index', compact('articles'));
})->name('articles.index');

// Route Model Binding – show a single article
Route::get('/articles/{article}', function (Article $article) {
    return view('articles.show', compact('article'));
})->name('articles.show');

// =============================================
// Middleware Example
// =============================================

// Simple middleware: check for ?token=secret123 in the URL
// Try: /dashboard              → blocked (403)
// Try: /dashboard?token=secret123 → allowed ✅

Route::get('/dashboard', function (Request $request) {
    if ($request->query('token') !== 'secret123') {
        abort(403, 'Access denied. Invalid token.');
    }
    return view('dashboard');
})->name('dashboard');

// Middleware on a group of routes
// All /admin/* routes require ?token=secret123
Route::prefix('admin')->group(function () {

    Route::get('/stats', function (Request $request) {
        if ($request->query('token') !== 'secret123') {
            abort(403, 'Access denied. Admin area.');
        }
        return view('admin.stats');
    })->name('admin.stats');

});
