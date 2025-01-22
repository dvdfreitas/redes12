<?php

use App\Models\Category;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {    
    return view('welcome');
});

Route::get('/stories', function () {
    $stories = Story::with('categories')->get();    
    return view('stories.index', compact('stories'));
 });

Route::get('/css', function () {
    return view('css');
});

Route::get('/categories', function () {
    $categories = Category::all();
    return view('categories.index', compact('categories'));
});

Route::get('/categories/create', function () {
    return view('categories.create');
});

Route::post('/categories/store', function (Request $request) {
    
    $validated = $request->validate([
        'name' => 'required',
        'slug' => 'required',
        'description' => 'min:4'                       
    ]);

    Category::create([
        'name' => $request->input('name'),
        'slug' => $request->input('slug'),
        'description' => $request->input('description'),
        'image' => $request->input('image'),
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
