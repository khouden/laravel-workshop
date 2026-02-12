<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'index']);


Route::controller(UserController::class)->group(function(){
    Route::get('/users', 'create')->name('users');
    Route::post('/users', 'store');
});

Route::controller(ProductController::class)->group(function(){

    // GET /products – list all products + show add form
    Route::get('/products', 'index')->name('products.index');
    
    // POST /products – store a new product
    Route::post('/products', 'store')->name('products.store');
    
    // DELETE /products/{id} – remove a product
    Route::delete('/products/{id}', 'delete')->name('products.destroy');
});

Route::controller(ContactController::class)->group(function(){

    // GET /contact – show contact form
    Route::get('/contact', 'index')->name('contact');
    
    // POST /contact – handle contact form submission
    Route::post('/contact', 'store')->name('contact.send');
});

Route::controller(ArticleController::class)->group(function(){
    
    // GET /articles – list all articles
    Route::get('/articles', 'index')->name('articles.index');
    
    // Route Model Binding – show a single article
    Route::get('/articles/{article}', 'show')->name('articles.show');
});

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
