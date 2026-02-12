<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

$defaultPosts = [
    ['id' => 1, 'title' => 'My first post',  'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'],
    ['id' => 2, 'title' => 'My second post', 'content' => 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'],
    ['id' => 3, 'title' => 'My third post',  'content' => 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.'],
];


Route::get('/', function () {
    return view('welcome');
});


Route::prefix('admin')->name('admin.')->group(function () use ($defaultPosts) {
    Route::prefix('posts')->name('posts.')->group(function () use ($defaultPosts) {

        // INDEX – list all posts
        Route::get('', function () use ($defaultPosts) {
            if (!session()->has('posts')) {
                session(['posts' => $defaultPosts]);
            }
            $posts = session('posts');
            return view('posts.index', compact('posts'));
        })->name('index');

        // CREATE – show create form
        Route::get('create', function () {
            return view('posts.create');
        })->name('create');

        // STORE – save a new post
        Route::post('', function (Request $request) {
            $posts = session('posts', []);

            $newPost = [
                'id'      => count($posts) > 0 ? max(array_column($posts, 'id')) + 1 : 1,
                'title'   => $request->title,
                'content' => $request->content,
            ];

            $posts[] = $newPost;
            session(['posts' => $posts]);

            return redirect()->route('admin.posts.index')
                             ->with('success', $newPost['title']);
        })->name('store');

        // EDIT – show edit form
        Route::get('{id}/edit', function ($id) {
            $posts = session('posts', []);
            $post  = collect($posts)->firstWhere('id', (int) $id);

            if (!$post) {
                abort(404);
            }

            $post = (object) $post;
            return view('posts.edit', compact('post'));
        })->where('id', '[0-9]+')->name('edit');

        // UPDATE – save changes to a post
        Route::put('{id}', function (Request $request, $id) {
            $posts = session('posts', []);

            foreach ($posts as $key => $post) {
                if ($post['id'] == $id) {
                    $posts[$key]['title']   = $request->title;
                    $posts[$key]['content'] = $request->content;
                    break;
                }
            }

            session(['posts' => $posts]);

            return redirect()->route('admin.posts.index')
                             ->with('success', $request->title);
        })->where('id', '[0-9]+')->name('update');

        // DELETE – remove a post
        Route::delete('{id}', function ($id) {
            $posts = session('posts', []);
            $posts = array_filter($posts, function ($post) use ($id) {
                return $id != $post['id'];
            });
            session(['posts' => array_values($posts)]);
            return redirect()->route('admin.posts.index')
                             ->with('deleted', true);
        })->where('id', '[0-9]+')->name('delete');
    });
});


