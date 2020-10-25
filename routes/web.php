<?php

use Illuminate\Support\Facades\Route;


Route::view('/','home');


// Route::get('/', function () {
//     return view('test');
// });

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Auth::routes();

 Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// add my route*
