<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


Route::view('/','home');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Auth::routes();

 Route::get('/{any}', [HomeController::class, 'index'])->name('home')->where('any','.*');

// add my route*
