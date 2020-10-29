<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


Route::view('/','home');


Route::middleware(['auth:sanctum', 'verified'])->get('/Home', function () {
    return view('home');
})->name('home');

// Auth::routes();
// Auth::routes(['register' => false]);
// Route::get('/loginn', function () {
//     return view('auth.login');
// });

 Route::get('/{any}', [HomeController::class, 'index'])->name('home')->where('any','.*');

// add my route*
