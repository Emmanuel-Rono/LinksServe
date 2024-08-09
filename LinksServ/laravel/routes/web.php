<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


Route::get('/', function () {
    $links = \App\Models\Link::all(); //return all the links
    return view('welcome', ['links' => $links]); //pass links to the views
});

Route::get('/submit', function()
{
    return view('submit');
});

Route::get('/login', function()  //defines get route for /auth url
{
    return view('login'); //calback Function
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::post('/submit', function (Request $request) {
    $link->title = $request->input('title');
    $link->url = $request->input('url');
    $link->description = $request->input('description');

    $link = tap(new App\Link($data))->save();
    
    return redirect('/');
});
