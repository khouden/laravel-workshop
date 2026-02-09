<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Groupe avec sous-domaine (OUTSIDE admin prefix)
Route::domain('blog.localhost')->group(function () {
    Route::get('/', function () {
        return 'Blog Homepage';
    });
    
    Route::get('/article/{slug}', function ($slug) {
        return "Blog Article: $slug";
    });
}); 

########################## Route de base ##################

// 1. Route simple
Route::get('/', function(){
    return view('welcome');
});
// 2. Route avec réponse texte
Route::get('/hello', function (){
    return 'Bonjour Laravel';
});
// 3. Route avec JSON
Route::get('/api/user', function(){
    return response()->json([
        'name' => 'Ahmed',
        'role' => 'Developer',
        'country' => 'Morocco'
    ]);
});
// 4. Route avec redirection
Route::get('/home', function(){
    return redirect('/');
});
// 5. Route avec nom
Route::get('/dashboard', function (){
    return 'Dashboard';
})->name('dashboard');
// 6. Route avec paramètre obligatoire
Route::get('/user/{id}', function($id){
    return "Utilisateur Id: $id";
});
// 7. Route avec paramètre optionnel
Route::get('/post/{id?}', function ($id = null){
    return $id ? "Post ID: $id" : "Tous les posts";
});
// 8. Route avec contrainte (regex)
Route::get('/article/{id?}', function($id=2){
    return "Article numero: $id";
})->where('id', '[0-9]+');

// 9. Route avec plusieurs paramètres
Route::get('/blog/{category}/{slug}', function($category, $slug){
    return "Categorie: $category - Article : $slug";
});

// 10. Route avec contraintes multiples
Route::get('/product/{name}/{id}', function ($name, $id){
    return "Produit: $name (ID: $id)";
})->where(['name'=>'[a-z]+', 'id'=>'[0-9]+']);


########################## Route de base ##################

// Groupe avec prefixe
Route::prefix('admin')->group(function(){
    Route::get('/dashboard', function(){
        return 'Admin Dashboard';
    });
    Route::get('/users', function () {
        return 'Admin Users List';
    });
    
    Route::get('/settings', function () {
        return 'Admin Settings';
    });

    // Groupe avec nom de route
Route::name('admin.')->group(function () {
    Route::get('/panel', function () {
        return 'Panel Admin';
    })->name('panel');
    
    Route::get('/stats', function () {
        return 'Statistics';
    })->name('stats');
});

// Groupe combiné (préfixe + nom)
Route::prefix('api')->name('api.')->group(function () {
    Route::get('/posts', function () {
        return 'API Posts';
    })->name('posts');
    
    Route::get('/comments', function () {
        return 'API Comments';
    })->name('comments');
});

});



Route::get('/form', function(){
    return view('form');
});

Route::post('/submit', function(Request $reauest){
    return "Donnees recues: ". $reauest->input('name');
})->name('submit');

Route::put('/update/{id}', function($id, Request $request){
    return "Mise a jour de l'element $id avec: ". $request->input('data');
})->name('update');

Route::delete('/delete/{id}', function($id){
    return "Element $id supprime";
})->name('delete');


