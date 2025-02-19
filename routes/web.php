<?php

use App\Models\Category;
use App\Models\Image;
use App\Models\Race;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {    
//     return view('welcome');
// });

Route::get('/stories', function () {
    $stories = Story::with('categories')->get();    
    return view('stories.index', compact('stories'));
 });


Route::get('/races', function () {    
    return view('races.index');
});

Route::get('/images', function () {    
    $images = Image::all();
    return view('images.index', compact('images'));
});

Route::get('/images/create', function () {    
    return view('images.create');
});

Route::post('/images', function (Request $request) {    

    $request->validate([
        'name' => 'required',
        'image' => 'required|image|mimes:jpeg,png,gif|max:2048'
    ]);
    
    $imageName = time() . "." . $request->image->extension();
    $request->image->move(public_path('img'), $imageName);

    Image::create([
        'name' => $request['name'],
        'path' => $imageName
    ]);

    return redirect('/images');
});


Route::get('/races/create', function () {    
    return view('races.create');
});

Route::post('/races/store', function (Request $request) {
    
    $validated = $request->validate([
        'name' => 'required',
        'date' => 'required|date',
        'place' => 'required',
        'distance' => 'required|numeric',        
        'description' => 'min:4'
    ]);

    Race::create($validated);
})->name('races.store');



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
